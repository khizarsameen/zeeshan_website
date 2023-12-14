<header class="header_section" style="margin-bottom: 0px; padding-bottom: 0px;">
    <div style="position: relative;">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="main-logo" href="/" style="color: white !important;">ROYAL COLLEGE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav" style="display: flex">
                <li class="nav-item active">
                   <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
               {{-- <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li> --}}
                <li class="nav-item "  >
                   <a class="nav-link" href="{{ route('allitems.get') }}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('aboutus') }}">About Us</a>
                </li>
            </ul>

             <ul class="navbar-nav" style="margin-left: auto">

                <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                 </form>
                 
                
                @if (Route::has('login'))
                    @auth
                     <li class="nav-item">
                        <a class="nav-link svg-link cart-icon" href="javascript:void(0)">
                           <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path fill="#ffffff" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                           <span class="cart-item-count" style="font-size: 14px">{{ $cart_item_count }}</span>
                        </a>
                     </li>
                        <li class="nav-item">
                              <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                           </form>
                        </li>
                    @else
                        <li class="nav-item " >
                            <a class="mr-1 nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth

                @endif
                
                
                
             </ul>
          </div>
       </nav>
       <div id="customCarousel1" class="carousel slide w-100" style="padding-top: 200px;" data-ride="carousel">
          <div class="carousel-inner">
             <div class="carousel-item active ">
                <div class="container ">
                   <div class="row">
                      <div class="col-md-7 col-lg-6 ">
                         <div class="detail-box swiper-slide" >
                            <h1>
                               <span>
                               Sale 20% Off
                               </span>
                               <br>
                               On Everything
                            </h1>
                            <p >
                              Capture the essence of Greenwich's landmarks with our exclusive photo collection. From the Royal Observatory to the iconic Cutty Sark, explore the beauty of this historic borough. Bring a piece of Greenwich into your home today.
                            </p>
                            {{-- <div class="btn-box">
                               <a href="" class="btn1">
                               Shop Now
                               </a>
                            </div> --}}
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="carousel-item ">
                <div class="container ">
                   <div class="row">
                      <div class="col-md-7 col-lg-6 ">
                         <div class="detail-box">
                            <h1>
                               <span>
                               Sale 20% Off
                               </span>
                               <br>
                               On Everything
                            </h1>
                            <p>
                              Capture the essence of Greenwich's landmarks with our exclusive photo collection. From the Royal Observatory to the iconic Cutty Sark, explore the beauty of this historic borough. Bring a piece of Greenwich into your home today.
                            </p>
                            <div class="btn-box">
                               <a href="" class="btn1">
                               Shop Now
                               </a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="carousel-item">
                <div class="container ">
                   <div class="row">
                      <div class="col-md-7 col-lg-6 ">
                         <div class="detail-box">
                            <h1>
                               <span>
                               Sale 20% Off
                               </span>
                               <br>
                               On Everything
                            </h1>
                            <p>
                              Capture the essence of Greenwich's landmarks with our exclusive photo collection. From the Royal Observatory to the iconic Cutty Sark, explore the beauty of this historic borough. Bring a piece of Greenwich into your home today.
                            </p>
                            <div class="btn-box">
                               <a href="" class="btn1">
                               Shop Now
                               </a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="container">
             <ol class="carousel-indicators">
                <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel1" data-slide-to="1"></li>
                <li data-target="#customCarousel1" data-slide-to="2"></li>
             </ol>
          </div>
       </div>
       
    </div>

 </header>