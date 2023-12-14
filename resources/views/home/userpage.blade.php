<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>Greenwhich</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <style>
        /* .slider_bg_box {
    position: relative;
} */
        .header_section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust the last value (0.5) for transparency */
        }

        .header_section {
            background-image: url("home/images/slider-bg.jpg");

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            height: 700px;
            /* Set the desired height */
            width: 100%;
        }

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

        .lead {
            color: #aaa;
        }

        .wrapper {
            margin: 10vh
        }


        .card {
            border: none;
            transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
            overflow: hidden;
            border-radius: 20px;
            min-height: 450px;
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
                /* height: 100px !important; */
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

        .svg-link svg:after{
            content:attr(10);
            font-size:12px;
            background: red;
            border-radius:50%;
            padding:3px;
            position:relative;
            left:-8px;
            top:-10px;
            opacity:0.1;
        }

        @media (max-width: 767px) {}
    </style>
</head>

<body>
    
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->
        <!-- end slider section -->
    </div>
    <!-- why section -->
    {{-- @include('home.why') --}}

    <!-- end why section -->

    <!-- arrival section -->
    {{-- @include('home.arrival') --}}

    <!-- end arrival section -->

    <!-- product section -->
    @include('home.product')




    <!-- end client section -->
    <!-- footer start -->
    @include('home.footer')
    @include('home.cartModal')

    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By Greenwich Landmark Pictures Selling ebsite

        </p>
    </div>
    <!-- jQery -->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('popper/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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
        });
        var numberOfItems = "{{  json_encode(count($items)); }}";
        var cart_items_route = "{{ route('cartitems.get') }}";
    </script>

    @stack('cartScripts')

    
    <!-- custom js -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
