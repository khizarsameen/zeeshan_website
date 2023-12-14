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
    
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
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
    <div>
        <!-- header section strats -->
        @include('home.header2')
        <!-- end header section -->
        <!-- slider section -->
  
        <section style="background-color: #F5DEB3;">
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="custom-card">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column card1">
                        <?php $img = asset("product/$item->image_url"); ?>
                        <img src="{{ $img }}" alt="" srcset="" style="width: 100%;">
                        <span class="font-weight-bold">{{ $item->description }}</span>
                    </div>
                    <div class="col-md-6 card2">
                        <input type="hidden" name="item_id" id="item_id" value="{{ $item->id }}">
                        <div style="font-size: 26px">{{ $item->title }}</div>
                        <div>RS.{{ $item->price }}</div>
                        <hr style="border: 1px solid #212121;;">
                        <div>Quantity</div>
                        <div class="d-flex flex-row">
                            <div class="box1 shadow-lg"><a href="javascript:void(0)"><i class="fa fa-plus"></i></a></div>
                            <div class="box2 shadow-lg">1</div>
                            <div class="box3 shadow-lg"><a href="javascript:void(0)"><i class="fa fa-minus"></i></a></div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-block btn-warning shadow-lg" id="cartBtn">Add To Cart</button>
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-block btn-warning shadow-lg" id="buyNowBtn">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
        </section>

        @include('home.cartModal');
        
          



    </div>


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
        /* Set the width of the side navigation to 250px */
        

        /* Set the width of the side navigation to 0 */
        

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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


            $('#cartBtn').click(function() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.store') }}",
                    data: {
                        item_id: $('#item_id').val(),
                        qty: $('.box2').text(),
                    },
                    success: function(data) {
                        if (data.logged_in == true) {
                            $('.cartBody').empty();
                            var row = ``;
                            var total = 0;
                            var totQty = 0;
                            for(var val of data.cart_items) {
                                row += `<div class="cartRow">`;
                                row += `<span class="cart_id" style="display: none;">${val.id}</span>`;
                                row += `<span class="cartcol1">${val.title}</span><span class="cartcol2">
                                    <div class="d-flex flex-row">
                                        <div class="cart_box1 shadow-lg"><a href="javascript:void(0)"><i class="fa fa-plus"></i></a></div>
                                        <div class="cart_box2 shadow-lg">${val.qty}</div>
                                        <div class="cart_box3 shadow-lg"><a href="javascript:void(0)"><i class="fa fa-minus"></i></a></div>
                                    </div>
                                    
                                </span><span class="cartcol3">${val.amount}</span>`;
                                row += `</div>`;

                                total += val.amount;
                                totQty += val.qty;
                            }
                            $('.cart-item-count').text(totQty);
                            var sidenav = $('#shop_cart');
                            sidenav.on('transitionend', function(event) {
                                // $('.cartBody').append(row);
                                if (event.originalEvent.propertyName === 'width' && sidenav.width() === 600) {
                                    $(row)
                                    .appendTo('.cartBody')
                                    .hide().fadeIn(500);
    
                                    $('.cartFooter .totalAmount').text(total);
                                    sidenav.off('transitionend');
                                }
                                
                            });

                            sidenav.css('width', '600px');
                            // document.getElementById("mySidenav").style.width = "600px";


                            
                        } else {
                            Swal.fire({
                                title: "You have to sign in to place an order !",
                                // showDenyButton: true,
                                showCancelButton: true,
                                confirmButtonText: "Click here to login",
                                denyButtonText: `Cancel`
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    window.open('login', '_SELF');
                                } else if (result.isDenied) {
                                    Swal.fire("Changes are not saved", "", "info");
                                }
                            });

                        }
                    },
                    error: function(data) {
                        var subdata = JSON.parse(data.responseText);
                        jQuery.each(subdata.errors, function(key, value) {


                        });


                    }
                })
            });
            
            $('#buyNowBtn').click(function() {
                
                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.store') }}",
                    data: {
                        item_id: $('#item_id').val(),
                        qty: $('.box2').text(),
                    },
                    success: function(data) {
                        if (data.logged_in == true) {
                            var route = "{{ route('order.billing') }}";
                            window.open(route, '_SELF');


                            
                        } else {
                            Swal.fire({
                                title: "You have to sign in to place an order !",
                                // showDenyButton: true,
                                showCancelButton: true,
                                confirmButtonText: "Click here to login",
                                denyButtonText: `Cancel`
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    window.open('login', '_SELF');

                                } else if (result.isDenied) {
                                    Swal.fire("Changes are not saved", "", "info");
                                }
                            });

                        }
                    },
                    error: function(data) {
                        var subdata = JSON.parse(data.responseText);
                        jQuery.each(subdata.errors, function(key, value) {


                        });


                    }
                })
            });
        });

        

        var cart_items_route = "{{ route('cartitems.get') }}";

    </script>
    
    @stack('cartScripts')
    <script src="{{ asset('js/custom.js') }}"></script>


    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
