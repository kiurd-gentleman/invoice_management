<table width="100%" class="items-table" cellspacing="0" border="0">
    <tr class="item-table-heading-row">
        <th width="2%" class="pr-20 text-right item-table-heading">#</th>
        @if($estimate->tax_per_item)
            <th width="30%" class="pl-0 text-left item-table-heading">{{ __('messages.product') }}</th>
        @else
            <th width="40%" class="pl-0 text-left item-table-heading">{{ __('messages.product') }}</th>
        @endif
        <th class="pr-20 text-right item-table-heading">{{ __('messages.quantity') }}</th>
        <th class="pr-20 text-right item-table-heading">{{ __('messages.price') }}</th>
        @if($estimate->tax_per_item)
            <th class="pl-10 text-right item-table-heading">{{ __('messages.tax') }}</th>
        @endif
        @if($estimate->discount_per_item)
            <th class="pl-10 text-right item-table-heading">{{ __('messages.discount') }}</th>
        @endif
        <th class="text-right item-table-heading">{{ __('messages.amount') }}</th>
    </tr>
    @php
        $index = 1
    @endphp
    @foreach ($estimate->items as $item)
        <tr class="item-row">
            <td class="pr-20 text-right item-cell" style="vertical-align: top;">
                {{$index}}
            </td>
            <td class="pl-0 text-left item-cell">
                <span>{{ $item->product->name }}</span><br>
                <span class="item-description">
                    {!! nl2br(htmlspecialchars($item->product->description)) !!}
                </span>
            </td>
            <td class="pr-20 text-right item-cell" style="vertical-align: top;">
                {{ $item->quantity }}
            </td>
            <td class="pr-20 text-right item-cell" style="vertical-align: top;">
                {{ money($item->price, $estimate->currency_code)->format() }}
            </td>
            @if($estimate->tax_per_item)
                <td class="pl-10 text-right item-cell" style="vertical-align: top;">
                    @foreach ($item->getTotalPercentageOfTaxesWithNames() as $key => $value)
                        {{$key . ' ('. $value. '%' .')'}}
                    @endforeach
                </td>
            @endif
            @if($estimate->discount_per_item)
                <td class="pl-10 text-right item-cell" style="vertical-align: top;">
                    {{ $item->discount_val }}% 
                </td>
            @endif
            <td class="text-right item-cell" style="vertical-align: top;">
                {{ money($item->total, $estimate->currency_code)->format() }}
            </td>
        </tr>
        @php
            $index += 1
        @endphp
    @endforeach
</table>

<hr class="item-cell-table-hr">

<div class="total-display-container">
    <table width="100%" cellspacing="0px" border="0" class="total-display-table @if(count($estimate->items) > 12) page-break @endif">
        <tr>
            <td class="border-0 total-table-attribute-label"><h4>{{ __('messages.sub_total') }}</h4></td>
            <td class="border-0 item-cell total-table-attribute-value ">
                @if($estimate->tax_per_item  == false)
                    {{ money($estimate->sub_total, $estimate->currency_code)->format() }}
                @else
                    {{ money($estimate->getItemsSubTotalByBasePrice(), $estimate->currency_code)->format() }}
                @endif
            </td>
        </tr>

        @if($estimate->tax_per_item  == false)
            @foreach ($estimate->getTotalPercentageOfTaxesWithNames() as $key => $value)
                <tr>
                    <td class="border-0 total-table-attribute-label">
                        <h4>{{$key . ' ('. $value. '%' .')'}}</h4>
                    </td>
                    <td class="border-0 item-cell total-table-attribute-value">
                        {{ money(($value / 100) * $estimate->sub_total, $estimate->currency_code)->format() }}
                    </td>
                </tr>
            @endforeach
        @else
            @foreach ($estimate->getItemsTotalPercentageOfTaxesWithNames() as $key => $value)
                <tr>
                    <td class="border-0 total-table-attribute-label">
                        <h4>{{$key}}</h4>
                    </td>
                    <td class="border-0 item-cell total-table-attribute-value">
                        {{ money($value, $estimate->currency_code)->format() }}
                    </td>
                </tr>
            @endforeach
        @endif

        @if ($estimate->discount_per_item == false)
            @if($estimate->discount_val > 0)
                <tr>
                    <td class="border-0 total-table-attribute-label">
                        <h4>{{ __('messages.discount') . ' (' . $estimate->discount_val . '%)' }}</h4>
                    </td>
                    <td class="py-2 border-0 item-cell total-table-attribute-value">
                        - {{ money(($estimate->discount_val / 100) * $estimate->sub_total, $estimate->currency_code)->format() }}
                    </td>
                </tr>
            @endif
        @else
            @php $discount_val = $estimate->getItemsTotalDiscount() @endphp
            @if($discount_val > 0)
                <tr>
                    <td class="border-0 total-table-attribute-label">
                        <h4>{{ __('messages.discount') }}</h4>
                    </td>
                    <td class="py-2 border-0 item-cell total-table-attribute-value">
                        - {{ money($discount_val, $estimate->currency_code)->format() }}
                    </td>
                </tr>
            @endif
        @endif
        
        <tr>
            <td class="py-3"></td>
        </tr>
        <tr>
            <td class="border-0 total-border-left total-table-attribute-label"><h3>{{ __('messages.total') }}</h3></td>
            <td class="py-8 border-0 total-border-right item-cell total-table-attribute-value">
                <h3>{{ money($estimate->total, $estimate->currency_code)->format() }}</h3>
            </td>
        </tr>
    </table>
</div>
