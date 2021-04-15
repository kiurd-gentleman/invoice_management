"use strict";

function changePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(input).closest('.form-group').find('.avatar-img').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function setupDatePickerInput() {
    // Flatpicker options
    $('[data-toggle="flatpickr"]').each(function () {
        var element = $(this);
        var options = {
            mode: void 0 !== element.data('flatpickr-mode') ? element.data('flatpickr-mode') : 'single',
            altInput: void 0 !== element.data('flatpickr-alt-input') ? element.data('flatpickr-alt-input') : true,
            altFormat: void 0 !== element.data('flatpickr-alt-format') ? element.data('flatpickr-alt-format') : 'F j, Y',
            dateFormat: void 0 !== element.data('flatpickr-date-format') ? element.data('flatpickr-date-format') : 'Y-m-d',
            defaultDate: element.data('flatpickr-default-date') ? element.data('flatpickr-default-date') : null,
            wrap: void 0 !== element.data('flatpickr-wrap') ? element.data('flatpickr-wrap') : false,
            inline: void 0 !== element.data('flatpickr-inline') ? element.data('flatpickr-inline') : false,
            static: void 0 !== element.data('flatpickr-static') ? element.data('flatpickr-static') : false,
            enableTime: void 0 !== element.data('flatpickr-enable-time') ? element.data('flatpickr-enable-time') : false,
            noCalendar: void 0 !== element.data('flatpickr-no-calendar') ? element.data('flatpickr-no-calendar') : false,
            appendTo: void 0 !== element.data('flatpickr-append-to') ? document.querySelector(element.data('flatpickr-append-to')) : undefined,
            onChange: function onChange(selectedDates, dateStr) {
                if (options.wrap) {
                    element.find('[data-toggle]').text(dateStr);
                }
            }
        };
        element.flatpickr(options);
    });
}

function setupPriceInput(currency) {
    console.log(currency)
    if (typeof (currency) != 'undefined'){
        // Price format
        // console.log(currency)
        if(currency.swap_currency_symbol != '0') {
            var settings = {
                prefix: '',

                // centsSeparator: currency.thousand_separator,
                // thousandsSeparator: currency.decimal_separator,

                centsSeparator: currency.decimal_separator,
                thousandsSeparator: currency.thousand_separator ,

                suffix: currency.symbol
            }
        } else {
            console.log('eikhan teke')
            var settings = {
                prefix: currency.symbol,
                // centsSeparator: currency.thousand_separator,
                // thousandsSeparator: currency.decimal_separator,

                centsSeparator: currency.decimal_separator,
                thousandsSeparator: currency.thousand_separator ,

                suffix: '',
            }
        }
        $('.price_input').priceFormat(settings);
    }

}

function setupSelect2FooterListener() {
    // Custom footer for select2
    $(".select-with-footer").on("select2:open", function () {
        var checkExisted = $('.select2-results').find('.sel-footer');
        if (checkExisted.length === 0) {
            var footer = $(this).closest('.select-container').find('.select-footer').html();
            $(".select2-results").append(
                "<div class='select2-results__option border-top mt-1 sel-footer'>" + footer + "</div>"
            );
        }
    });
}

$(document).ready(function(){
    // Setup date picker
    setupDatePickerInput();

    // Setup price formatter
    // console.log(window.sharedData.company_currency)
    setupPriceInput(window.sharedData.company_currency);


    $('.form_with_price_input_submit').click(function() {
        var form = $(this).closest('form');
        var price_input = form.find('.price_input');
        price_input.val(price_input.unmask());
        form.submit();
    });

    // Sweet alert delete confirmation
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Delete!',
            focusConfirm: false,
            focusCancel: false,
        }).then((result) => {
            if (result.value) {
                window.location.href = url;
            }
        })
    });

    // Sweet alert delete confirmation
    $('.alert-confirm').on('click', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
            title: $(this).data('alert-title'),
            text: $(this).data('alert-text'),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#308AF3',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Okay!',
            focusConfirm: false,
            focusCancel: false,
        }).then((result) => {
            if (result.value) {
                window.location.href = url;
            }
        })
    });

    // SetupSelect2Listener
    setupSelect2FooterListener()
});
