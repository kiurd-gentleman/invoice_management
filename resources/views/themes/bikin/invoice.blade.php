<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('themes/bikin/css/style.css') }}">

    <title>AnalytiQ Invoice</title>
</head>
<body>

<section id="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Invoice System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Invoice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
<section id="banner" class="pt-5">
    <div id="banner-area">
        <div class="container banner-content pb-5">
            <h2 class=" pt-5">Quick & Easy Online Billing & Accounting Software</h2>
            <div class="row">
                <div class="col-md-7" >
                    <p data-aos="fade-down" class="pt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi perferendis molestiae assumenda? Fugit soluta labore molestiae impedit pariatur, quam ea facilis itaque, commodi deleniti recusandae libero odio exercitationem sequi neque?</p>
                </div>
                <div class="col-md-4">
                    <img src="https://www.onlineinvoices.com/js/1/images/2.png" alt="" class="img-fluid animate__animated animate__pulse animate__delay-1s animate__infinite infinite d-none d-md-block">
                </div>
            </div>
        </div>

    </div>
</section>
<section id="about" class="pt-5 pb-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <img src="https://www.onlineinvoices.com/css/images/features/additional_features.png" alt="" class="img-fluid w-50" data-aos="fade-left">
            <h1 class="text-center">Track Sales, Invoices & Clients' Payments Easily</h1>
            <div class="heading-bar mt-2"></div>
            <p class="text-center p-5" data-aos="fade-right">The Online Invoices innovative system enables you to invoice clients fast - receive and track payments online. Use built-in powerful features to manage recurring invoices and payments. Combine this with easy transitions from estimates and quotes to active invoices and you will discover how it will help you to develop your business .</p>
        </div>
    </div>
</section>


<div class="card">
    <div class="card-header">
        Create invoice
    </div>
    <div class="card-body">
        <form action="" method="post" class="form">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="customer_name">Customer name</label>
                        <input type="text" name="customer_name" class="form-control">
                        @error('customer_name') <span class="help-block text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="customer_email">Customer email</label>
                        <input type="text" name="customer_email" class="form-control">
                        @error('customer_email') <span class="help-block text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="customer_mobile">Customer mobile</label>
                        <input type="text" name="customer_mobile" class="form-control">
                        @error('customer_mobile') <span class="help-block text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="company_name">Company name</label>
                        <input type="text" name="company_name" class="form-control">
                        @error('company_name') <span class="help-block text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="invoice-number">Invoice number</label>
                        <input type="text" name="invoice_number" class="form-control">
                        @error('invoice-number') <span class="help-block text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="invoice-date">Invoice date</label>
                        <input type="text" name="invoice_date" class="form-control pickdate">
                        @error('invoice-date') <span class="help-block text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table" id="invoice_details">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Product name</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Unite Price</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="cloning_row" id="0" >
                        <td></td>
                        <td>
                            <input type="text" name="product_name[]" id="product_name" class="product_name form-control">
                            @error('product_name') <span class="help-block text-danger">{{$message}}</span> @enderror
                        </td>
                        <td>
                            <select name="unit[]" id="unit" class="unit form-control">
                                <option></option>
                                <option value="piece">Piece</option>
                                <option value="g">Gram</option>
                                <option value="kg">Kilo Gram</option>
                            </select>
                            @error('unit') <span class="help-block text-danger">{{$message}}</span> @enderror
                        </td>
                        <td>
                            <input type="number" name="quantity[]" step="0.01" id="quantity" class="quantity form-control">
                            @error('quantity') <span class="help-block text-danger">{{$message}}</span> @enderror
                        </td>
                        <td>
                            <input type="number" name="unit_price[]" step="0.01" id="unit_price" class="unit_price form-control">
                            @error('unit_price') <span class="help-block text-danger">{{$message}}</span> @enderror
                        </td>
                        <td>
                            <input type="number" step="0.01" name="row_sub_total[]" id="row_sub_total" class="row_sub_total form-control" readonly="readonly">
                            @error('row_sub_total') <span class="help-block text-danger">{{$message}}</span> @enderror
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6">
                            <button type="button" class="btn_add btn btn-primary">Add another product</button>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">Sub Total</td>
                        <td><input type="number" step="0.01" name="sub_total" id="sub_total" class="sub_total form-control" readonly="readonly" ></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">Discount</td>
                        <td>
                            <div class="input-group mb-3">
                                <select name="discount_type" id="discount_type" class="discount_type custom-select">
                                    <option>SR</option>
                                    <option>Percentage</option>
                                </select>
                                <div class="input-group-append">
                                    <input type="number" step="0.01" name="discount_value" id="discount_value" class="discount_value form-control" value="0.00" >
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">VAT (5%)</td>
                        <td><input type="number" step="0.01" name="vat_value" id="vat_value" class="vat_value form-control" readonly="readonly" ></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">Shipping</td>
                        <td><input type="number" step="0.01" name="shipping" id="shipping" class="shipping form-control"  ></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">Total Due</td>
                        <td><input type="number" step="0.01" name="total_due" id="total_due" class="total_due form-control" readonly="readonly" ></td>
                    </tr>
                    </tfoot>

                </table>
            </div>
            <div class="text-right pt-3">
                <button type="submit" name="save" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script><!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
{{--<script type="text/javascript" src="{{asset('/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.2.0/mdb.min.js"
></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('themes/bikin/js/script.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    AOS.init();
</script>
<script>
    $(document).ready(function(){

        $('.pickdate').datepicker({
            format: 'yyyy-mm-dd',
            selectMonth : true ,
            selectYear: true,
            clear :'Clear',
            close : 'Ok',
            closeOnSelect : true
        });


        $('#invoice_details').on('keyup blur' ,'.quantity' , function () {

            let $row = $(this).closest('tr');
            let quantity = $row.find('.quantity').val() || 0;
            let unit_price = $row.find('.unit_price').val() || 0;
            $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2))
            $('#sub_total').val(sum_total('.row_sub_total'));
            $('#vat_value').val(calculate_vat());
            $('#total_due').val(sum_due_total());
        })
        $('#invoice_details').on('keyup blur' ,'.unit_price' , function () {
            let $row = $(this).closest('tr');
            let quantity = $row.find('.quantity').val() || 0;
            let unit_price = $row.find('.unit_price').val() || 0;
            $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2))
            $('#sub_total').val(sum_total('.row_sub_total'));
            $('#vat_value').val(calculate_vat());
            $('#total_due').val(sum_due_total());
        })
        $('#invoice_details').on('keyup blur' ,'.discount_type' , function () {
            $('#vat_value').val(calculate_vat());
            $('#total_due').val(sum_due_total());
        })
        $('#invoice_details').on('keyup blur' ,'.discount_value' , function () {
            $('#vat_value').val(calculate_vat());
            $('#total_due').val(sum_due_total());
        })
        $('#invoice_details').on('keyup blur' ,'.shipping' , function () {
            $('#vat_value').val(calculate_vat());
            $('#total_due').val(sum_due_total());
        })



        let sum_total = function ($selector){
            let sum = 0;
            $($selector).each(function(){
                let selectorVal = $(this).val() != '' ? $(this).val() : 0;
                sum += parseFloat(selectorVal);
            });
            return sum.toFixed(2);
        }

        let calculate_vat = function (){
            let sub_totalVal = $('.sub_total').val() || 0;
            let discount_type = $('.discount_type').val() || 0;
            let discount_value = parseFloat($('.discount_value').val()) || 0;
            let discountVal = discount_value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value : 0 ;
            let vatVal = (sub_totalVal - discountVal) * 0.05 ;
            return vatVal.toFixed(2);
        }

        let sum_due_total = function (){
            let sum = 0;
            let sub_totalVal = $('.sub_total').val() || 0;
            let discount_type = $('.discount_type').val() || 0;
            let discount_value = parseFloat($('.discount_value').val()) || 0;
            let discountVal = discount_value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value : 0 ;
            let vatVal = parseFloat($('.vat_value').val()) || 0;
            let shippingVal = parseFloat($('.shipping').val()) || 0;
            sum += sub_totalVal;
            sum -= discountVal;
            sum += vatVal;
            sum += shippingVal;
            return sum.toFixed(2);

        }

        $(document).on('click','.btn_add' ,function(){
            let trCount = $('#invoice_table').find('tr.cloning_row:last').length;
            let numberIncr = trCount > 0 ? parseInt($('#invoice_details').find('tr.cloning_row:last').attr('id')) + 1 : 0;
            $('#invoice_details').find('tbody').append($('' +
                '<tr class="cloning_row" id="' + numberIncr + '">' +
                '<td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +
                '<td><input type="text" name="product_name[' + numberIncr + ']" class="product_name form-control"></td>' +
                '<td><select name="unit[' + numberIncr + ']" class="unit form-control"><option></option><option value="piece">Piece</option><option value="g">Gram</option><option value="kg">Kilo Gram</option></select></td>' +
                '<td><input type="number" name="quantity[' + numberIncr + ']" step="0.01" class="quantity form-control"></td>' +
                '<td><input type="number" name="unit_price[' + numberIncr + ']" step="0.01" class="unit_price form-control"></td>' +
                '<td><input type="number" name="row_sub_total[' + numberIncr + ']" step="0.01" class="row_sub_total form-control" readonly="readonly"></td>' +
                '</tr>'));
        });
        $(document).on('click','.delegated-btn',function(e){
            e.preventDefault()
            $(this).parent().parent().remove();
            $('#sub_total').val(sum_total('.row_sub_total'));
            $('#vat_value').val(calculate_vat());
            $('#total_due').val(sum_due_total());
        })

        $('form').on('submit',function(e){
            $('input.product_name').each(function(){ $(this).rules("add",{required:true});});
            $('select.unit').each(function(){ $(this).rules("add",{required:true});});
            $('input.quantity').each(function(){ $(this).rules("add",{required:true});});
            $('input.unit_price').each(function(){ $(this).rules("add",{required:true});});
            $('input.row_sub_total').each(function(){ $(this).rules("add",{required:true});});



            e.preventDefault

        });

        // $('form').validate({
        //     rules:{
        //         'customer_name':{required:true},
        //         'customer_email':{required:true , email:true},
        //         'customer_mobile':{required:true , digits:true ,minlength:10 , maxlength:14},
        //         'company_name':{required:true},
        //         'invoice_number':{required:true , digits:true},
        //         'invoice_date':{required:true},
        //     },
        //     submitHandler : function (form){
        //         form.submit();
        //     }
        // });
    });

</script>
</body>
</html>
