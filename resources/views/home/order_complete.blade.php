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
        
    </style>
</head>

<body>
        <!-- header section strats -->
        @include('home.header2')
        <!-- end header section -->
        <!-- slider section -->
        <section class="billing_section" style="height: 500px;">
            <div>
                Your Order has been completed, Order No : {{ $order_no }}
            </div>
    
    
        </section>


    <!-- end client section -->
    <!-- footer start -->
    @include('home.footer')

    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

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
