<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    {{-- <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" /> --}}
    <link rel="shortcut icon" href="home/images/favicon.png" type="">
    <title>Greenwhich</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .box1,
        .box2 {
            border-top: 2px solid lightgrey !important;
            border-left: 2px solid lightgrey !important;
            border-bottom: 2px solid lightgrey !important;

            width: 30px !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;
            text-align: center;

        }

        .box3 {
            border: 2px solid lightgrey !important;
            width: 30px !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;

            text-align: center;
        }

        .box1 a,
        .box2 a,
        .box3 a {

            color: grey !important;
            text-decoration: none !important;
        }


        /* .slider_bg_box {
    position: relative;
} */
        .black-layer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust the alpha (fourth value) for transparency */
            z-index: 1;
        }

        .select-wrap {
            border: 1px solid lightgray;
            border-radius: 4px;
            margin-bottom: 10px;
            padding: 0 5px 5px;
            background-color: white;
        }

        .select-wrap label {
            font-size: 14px;
            text-transform: uppercase;
            color: #777;
            padding: 0px 0px 0px 15px;
            font-weight: bold;
        }

        select {
            background-color: white;
            border: 0px;
            outline: none !important;
        }

        .select-wrap .form-control {
            border: none !important;
        }

        
        .select-wrap .form-control:focus { 
            color: #495057;
            background-color: #fff;
            border-color: white;
            outline: 0;
            box-shadow: inset 0 0 0 rgba(0, 0, 0, 0);
        }
    </style>
</head>

<body>
        <!-- header section strats -->
        @include('home.header2')
        <!-- end header section -->
        <!-- slider section -->
        <section class="billing_section">
            <form id="billingForm">
                <input type="hidden" name="order_no" id="order_no">
                <input type="hidden" name="order_id" id="order_id">
                <div class="row">
                    <div class="col-md-5 d-flex flex-column offset-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="col-form-label font-weight-bold"
                                    style="font-size: 24px !important;">Contact</label>
                                <input type="text" name="contact" id="contact" placeholder="Email or Phone No"
                                    class="form-control">
                                    <div class="invalid-feedback contact">
    
                                    </div>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="col-form-label font-weight-bold"
                                    style="font-size: 24px !important;">Delivery</label>
                                    <div class="select-wrap" >
                                        <label class="mb-0">Country/Region</label>
                                        <select name="ship_region" id="ship_region" class="form-control">
                                            <option value="UK">United Kingdom</option>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback ship_region">
    
                                    </div>
                            </div>
                        </div>
        
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" name="ship_firstname" id="ship_firstname" class="form-control" placeholder="First Name">
                                <div class="invalid-feedback ship_firstname">
    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="ship_lastname" id="ship_lastname" class="form-control" placeholder="Last Name">
                                <div class="invalid-feedback ship_lastname">
    
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <input type="text" name="ship_address" id="ship_address" class="form-control" placeholder="Address">
                                <div class="invalid-feedback ship_address">
    
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" name="ship_city" id="ship_city" class="form-control" placeholder="City">
                                <div class="invalid-feedback ship_city">
    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="ship_postalcode" id="ship_postalcode" class="form-control" placeholder="Postal Code">
                                <div class="invalid-feedback ship_postalcode">
    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="ship_phone" id="ship_phone" class="form-control" placeholder="Phone">
                                <div class="invalid-feedback ship_phone">
    
                                </div>
                            </div>
                        </div>
        
                        <div class="row">
                                <label for="" class="col-form-label font-weight-bold col-md-12"
                                    style="font-size: 24px !important;">Payment Type</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pmnt_type1" name="pmnt_type" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="pmnt_type1">Cash On Delivery</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pmnt_type2" name="pmnt_type" class="custom-control-input">
                                    <label class="custom-control-label" for="pmnt_type2">Bank Deposit</label>
                                  </div>
                            </div>
        
                        </div>
                        <div class="row">
                                <label for="" class="col-form-label font-weight-bold col-md-12"
                                    style="font-size: 24px !important;">Billing Address</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="billing_type1" name="billing_type" value="1" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="billing_type1">Same as billing Address</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="billing_type2" name="billing_type" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="billing_type2">Use a different billing address</label>
                                  </div>
                            </div>
                        </div>
                        <div class="billingAddressContainer" style="display: none">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                        <div class="select-wrap" >
                                            <label class="mb-0">Country/Region</label>
                                            <select name="billing_region" id="billing_region" class="form-control">
                                                <option value="UK">United Kingdom</option>
                                            </select>
                                        </div>
                                        <div class="invalid-feedback billing_region">
    
                                        </div>
                                </div>
                            </div>
            
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <input type="text" name="billing_firstname" id="billing_firstname" class="form-control" placeholder="First Name">
                                    <div class="invalid-feedback billing_firstname">
    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="billing_lastname" id="billing_lastname" class="form-control" placeholder="Last Name">
                                    <div class="invalid-feedback billing_lastname">
    
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <input type="text" name="billing_address" id="billing_address" class="form-control" placeholder="Address">
                                    <div class="invalid-feedback billing_address">
    
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <input type="text" name="billing_city" id="billing_city" class="form-control" placeholder="City">
                                    <div class="invalid-feedback billing_city">
    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="billing_postalcode" id="billing_postalcode" class="form-control" placeholder="Postal Code">
                                    <div class="invalid-feedback billing_postalcode">
    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="billing_phone" id="billing_phone" class="form-control" placeholder="Phone">
                                    <div class="invalid-feedback billing_phone">
    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block" id="compOrder">Complete Order</button>
                            </div>
                        </div>
                        
        
                    </div>
                    <div class="col-md-4">
                        <table class="table table-sm" id="billCartTable" style="width: 100%;">
                            <thead style="border: none !important;">
                                <tr>
                                    <th style="width: 60%;">Item</th>
                                    <th style="width: 20%;">Qty</th>
                                    <th style="width: 20%;">ِAmount</th>
                                </tr>
                            </thead>
                            <tbody>
        
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="1" class="font-weight-bold">Total</td>
                                    <td class="totalCol font-weight-bold"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>
            
    
    
        </section>


    <!-- end client section -->
    <!-- footer start -->
    @include('home.footer')

    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By Greenwich Landmark Pictures Selling Website

        </p>
    </div>
    <!-- jQery -->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('popper/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- custom js -->
    <script>
        var billCartTable;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            billCartTable = $('#billCartTable').DataTable({

                serverSide: true,
                paging: false,
                searching: false,
                info: false,
                // scrollCollapse: true,
                scrollY: '400px',
                ajax: {
                    url: "{{ route('cart.index') }}",
                    dataFilter: function(data) {

                        var dt = JSON.parse(data);
                        $('.totalCol').text(dt.amount);
                        return data;
                    }
                },
                columns: [

                    {
                        data: 'title'
                    },
                    {
                        data: 'qty'
                    },
                    {
                        data: 'amount'
                    },

                ],
                initComplete: function() {
                    var btns = $('.dt-button');
                    btns.removeClass('dt-button');
                },
            });

            $('.box1 a').click(function() {
                var val = Number($('.box2').text());
                val += 1;
                $('.box2').text(val);
            });

            $('.box3 a').click(function() {
                var val = Number($('.box2').text());
                val -= 1;
                if (val > 0) {
                    $('.box2').text(val);
                }

            });

            $('#cartModal').on('shown.bs.modal', function($q) {
                setTimeout(function() {
                    $.fn.dataTable.tables({
                        visible: true,
                        api: true
                    }).columns.adjust();
                }, 350);
                cartTable.draw();
            })


            
        });

        $('#billingForm').submit(function(e) {
            e.preventDefault();

            
            
            $('#compOrder').hide();
            $('#billingForm input').removeClass('is-invalid');
            // $('.alert-danger.items').fadeOut(function() {
            //     $(this).html("");
            // });

            var fd = new FormData($('#billingForm')[0]);
            
            $.ajax({

                data: fd,
                url: "{{ route('orders.store')}}",
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: "json",
                success: function(data) {

                    $('#compOrder').show();
                    
                    $('#order_no').val(data.order_no);
                    $('#order_id').val(data.order_id);
                    var route = "{{ route('completeorder') }}"
                    window.open(`${route}?order_no=${data.order_no}`, '_SELF');
                    
                },
                error: function(data) {
                    $('#compOrder').show();
                    var subdata = JSON.parse(data.responseText);
                    if (data.status === 422) {
                        jQuery.each(subdata.errors, function(key, value) {
                            $(`#${key}`).addClass('is-invalid');
                            $(`.invalid-feedback.${key}`).text(value);
                            $(`.invalid-feedback.${key}`).show();

                        });
                    } else if (data.status === 500) {
                        var err = "";
                        jQuery.each(subdata.errors, function(key, value) {
                            err = err + value + "</br>";
                        });

                        Swal.fire({
                            icon: 'error',
                            html: err
                        });
                    } else {
                        $('.alert-danger.movie').html(subdata.message);
                        $('.alert-danger.movie').fadeIn();

                    }



                }
            })
        })

        $('input[name="billing_type"]').on('change', function() {
            if($(this).val() == 1) {
                $('.billingAddressContainer').fadeOut();
            } else {
                $('.billingAddressContainer').fadeIn();

            }
        });
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
