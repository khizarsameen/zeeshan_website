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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .card {
            border: none;
            transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
            overflow: hidden;
            overflow-y: hidden;
            border-radius: 20px;
            min-height: 470px;
            box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.2);

            @media (max-width: 768px) {
                min-height: 350px;
            }

            @media (max-width: 420px) {
                min-height: 300px;
            }

            &.card-has-bg {
                transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
                background-size: 120%;
                background-repeat: no-repeat;
                background-position: center center;

                &:before {
                    content: '';
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    background: inherit;
                    -webkit-filter: grayscale(1);
                    -moz-filter: grayscale(100%);
                    -ms-filter: grayscale(100%);
                    -o-filter: grayscale(100%);
                    filter: grayscale(100%);
                }

                &:hover {
                    transform: scale(0.98);
                    box-shadow: 0 0 5px -2px rgba(0, 0, 0, 0.3);
                    background-size: 130%;
                    transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);

                    .card-img-overlay {
                        transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                        background: rgb(255, 186, 33);
                        background: linear-gradient(0deg, rgba(255, 186, 33, 0.5) 0%, rgba(255, 186, 33, 1) 100%);
                    }
                }
            }

            .card-footer {
                background: none;
                border-top: none;
                height: 170px !important;

                .media {
                    img {
                        border: solid 3px rgba(255, 255, 255, 0.3);
                    }
                }
            }

            .card-title {
                font-weight: 800
            }

            .card-meta {
                color: rgba(0, 0, 0, 0.7);
                text-transform: uppercase;
                font-weight: 500;
                letter-spacing: 2px;
                overflow-y: hidden !important;
                /* height:150px !important; */
                display: inline-block;
            }
            .card-date {
                color: rgba(0, 0, 0, 0.7);
                text-transform: uppercase;
                font-weight: 500;
                letter-spacing: 2px;
            }

            .card-body {
                transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
                height: 300px !important;

            }

            &:hover {
                .card-body {
                    margin-top: 30px;
                    transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                }

                cursor: pointer;
                transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
            }

            .card-img-overlay {
                transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                background: rgb(255, 186, 33);
                background: linear-gradient(0deg, rgba(255, 186, 33, 0.3785889355742297) 0%, rgba(255, 186, 33, 1) 100%);
            }
        }
    </style>
</head>

<body>
    <div>

        <!-- header section strats -->
        @include('home.header2')
        <!-- end header section -->
        <!-- slider section -->
        <section class="allitems_section">
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="card-wrapper row justify-content-around pb-0">
    
                        @foreach ($items as $pd)
                            <?php $img = asset("product/$pd->image_url"); ?>
                            <div class="card text-dark card-has-bg click-col col-md-3 "
                                style="
                    background-image: url('<?php echo $img; ?>');
                  ">
                                <img class="card-img d-none" src="{{ $img }}"
                                    alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?" />
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">
                                            <a class="text-dark" herf="https://creativemanner.com">{{ $pd->title }}</a>
                                        </h4>
                                        <small class="card-meta mb-2 font-weight-bold">{{ $pd->description }}</small><br>
                                        <small class="card-date font-weight-bold"><svg xmlns="http://www.w3.org/2000/svg"
                                                height="16" width="16"
                                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                <path
                                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                            </svg> {{ date('F d, Y', strtotime($pd->updated_at)) }}</small>
                                    </div>
                                    <div class="card-footer">
                                        <div class="media mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 " height="26"
                                                width="24"
                                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                <path
                                                    d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                            </svg>
    
                                            <div class="media-body">
                                                <h4 class="my-0 text-dark d-block font-weight-bold">{{ intval($pd->price) }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="text-center mb-1">
                                            <a class="btn btn-warning font-weight-bold shadow-lg"
                                                href="{{ url('product_details', $pd->id) }}">Product Details</a>
                                            <button class="btn btn-warning font-weight-bold shadow-lg buyNowBtn" value="{{ $pd->id }}">Buy Now</button>
    
                                        </div>
                                        <div class="text-center mb-1">
                                            <button class="btn btn-warning font-weight-bold shadow-lg btn-block cartBtn" value="{{ $pd->id }}">Add To Cart</button>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
    
                    
            </div>
    
            {{ $items->links() }}
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
        var billCartTable;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            



        });
        // $('body').on('click', '.cartBtn', function() { 
        //     console.log($(this).val());

        // });


        $('.cartBtn').click(function() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.store') }}",
                    data: {
                        item_id: $(this).val(),
                        qty: 1,
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

            $('.buyNowBtn').click(function() {
                
                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.store') }}",
                    data: {
                        item_id: $(this).val(),
                        qty: 1,
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
        var cart_items_route = "{{ route('cartitems.get') }}";

    </script>
    @stack('cartScripts')
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
