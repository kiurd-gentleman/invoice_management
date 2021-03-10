@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.expense_categories'))

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.account_settings') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">business</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ __('messages.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.expense_categories') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content-detached content-right">
        <div class="content-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="h4 mb-0">
                                <strong class="headings-color">{{ __('messages.expense_categories') }}</strong>
                            </p>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
                                <a href="{{ route('settings.expense_categories.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-primary btn-sm">
                                    {{ __('messages.add_expense_category') }}
                                </a>
{{--                                <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Submit Bug</button>--}}
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Task List table -->
                                @if($expense_categories->count() > 0)
                                    <div class="table-responsive" data-toggle="lists">
                                        <table class="table table-xl mb-0 thead-border-top-0 table-striped">
                                            <thead>
                                            <tr>
                                                <th>{{ __('messages.name') }}</th>
                                                <th>{{ __('messages.description') }}</th>
                                                <th class="w-30">{{ __('messages.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list" id="expense_categories">
                                            @foreach($expense_categories as $expense_category)
                                                <tr>
                                                    <td class="h6">
                                                        <a href="{{ route('settings.expense_categories.edit', ['expense_category' => $expense_category->id, 'company_uid' => $currentCompany->uid]) }}">
                                                            <strong class="h6">
                                                                {{ $expense_category->name }}
                                                            </strong>
                                                        </a>
                                                    </td>
                                                    <td class="h6">
                                                        {{ $expense_category->description ?? '-' }}
                                                    </td>
                                                    <td class="h6">
                                                        <a class="btn btn-warning btn-sm" href="{{ route('settings.expense_categories.edit', ['expense_category' => $expense_category->id, 'company_uid' => $currentCompany->uid]) }}" >
                                                            <i class="ft-edit icon-16pt"></i>

                                                        </a>
                                                        <a class="btn btn-danger btn-sm delete-confirm" href="{{ route('settings.expense_categories.delete', ['expense_category' => $expense_category->id, 'company_uid' => $currentCompany->uid]) }}" >
                                                            <i class="ft-trash icon-16pt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row card-body pagination-light justify-content-center text-center">
                                        {{ $expense_categories->links() }}
                                    </div>
                                @else
                                    <div class="row justify-content-center card-body pb-0 pt-5">
                                        <i class="material-icons fs-64px">account_balance_wallet</i>
                                    </div>
                                    <div class="row justify-content-center card-body pb-5">
                                        <p class="h4">{{ __('messages.no_expense_categories') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="sidebar-detached sidebar-left">
        <div class="sidebar">
            <div class="bug-list-sidebar-content">
                <!-- Predefined Views -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Predefined Views</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- bug-list search -->
                    <div class="card-content">
                        <!-- /bug-list search -->
                        <!-- bug-list view -->
                        <div class="card-body ">
                            @include('application.settings._aside', ['tab' => 'expense_categories'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

