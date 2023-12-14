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
                <div style="font-size: 32px;">Welcome to Greenwich Landmark pictures selling website</div>
                <div>
                    At Greenwich Landmark pictures selling website, we celebrate the timeless beauty of Greenwich Landmarks through captivating
                    pictures that tell stories and capture the essence of this historic and picturesque region. Our passion
                    for preserving and sharing the visual legacy of Greenwich drives us to curate a collection that reflects
                    the rich cultural heritage and architectural marvels that define this iconic place.

                </div>
                <strong>
                    Our Mission <br>
                    Preserving History, One Image at a Time
                </strong>
                <br>
                <div>
                    Our mission is to connect art enthusiasts, history lovers, and Greenwich aficionados with stunning
                    visual representations of the landmarks that make this place truly special. We believe in the power of
                    images to evoke emotions, trigger memories, and create a sense of belonging.

                </div>


                <strong>
                    What Sets Us Apart <br>
                    Curated Excellence

                </strong>
                <div>
                    At At Greenwich Landmark pictures selling website, we stand out for our commitment to quality and uniqueness. Every photograph in
                    our collection undergoes a meticulous curation process, ensuring that only the most evocative and
                    exceptional images make it to your walls. We collaborate with talented local photographers who share our
                    passion for Greenwich, bringing you exclusive shots that capture the landmarks in their most captivating
                    moments.

                </div>

                <div style="font-size: 28px">
                    Ethical Practices

                </div>
                <div>
                    We believe in fair compensation for the artists who contribute to our collection. By purchasing from us,
                    you are not just acquiring a piece of art but also supporting the local talent and fostering the growth
                    of creative communities.

                </div>

                <strong>
                    Explore, Connect, Collect <br>
                    A Visual Journey Through Greenwich

                </strong>

                <div>
                    Immerse yourself in the beauty of Greenwich through our carefully curated galleries. Whether you are a
                    longtime resident, a visitor, or a Greenwich enthusiast from afar, our collection offers a unique
                    perspective on the landmarks that have shaped the history and culture of this remarkable place.

                </div>

                Contact Us
                Have a question, a special request, or just want to share your love for Greenwich landmarks? We'd love
                to hear from you! Reach out to us  and let's connect.

                Thank you for joining us on this visual journey through Greenwich.

                At Greenwich Landmark pictures selling website
            </div>

            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
        </section>






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
    </script>

</body>

</html>
