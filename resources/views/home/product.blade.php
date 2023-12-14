<section class="product_section layout_padding">
    <div>
        <div class="heading_container heading_center">
            <h2 style="font-family: Arial, Helvetica, sans-serif;">
                Products
            </h2>
        </div>

        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                  
                    @foreach ($items as $pd)
                        <?php $img = asset("product/$pd->image_url"); ?>
                        <div class="card text-dark card-has-bg click-col swiper-slide"
                            style="
            background-image: url('<?php echo $img ?>');
          ">
                            <img class="card-img d-none" src="{{ $img }}"
                                alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?" />
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="card-body">
                                   <h4 class="card-title mt-0">
                                       <a class="text-dark" herf="https://creativemanner.com">{{ $pd->title }}</a>
                                   </h4>
                                    <small class="card-meta mb-2 font-weight-bold">{{ $pd->description }}</small><br>
                                    <small class="card-date font-weight-bold"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> {{ date('F d, Y', strtotime($pd->updated_at)) }}</small>
                                </div>
                                <div class="card-footer">
                                    <div class="media mb-1">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 " height="26" width="24" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                        {{-- <img class="mr-3 rounded-circle"
                                            src="https://assets.codepen.io/460692/internal/avatars/users/default.png?format=auto&version=1688931977&width=80&height=80"
                                            alt="Generic placeholder image" style="max-width: 50px" /> --}}
                                        <div class="media-body">
                                            <h4 class="my-0 text-dark d-block font-weight-bold">{{ intval($pd->price) }}</h4>
                                        </div>
                                    </div>
                                       <div class="text-center">
                                         <a class="btn btn-warning font-weight-bold shadow-lg" href="{{ url('product_details', $pd->id) }}">Product Details</a>
                                         <button class="btn btn-warning font-weight-bold shadow-lg buyNowBtn" value="{{ $pd->id }}" >Buy Now</button>
                                       </div>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="card mr-2 swiper-slide" style="width: 18rem; height: 25rem !important; background-color: #F4F6F9; box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.25);">
                  <div class="px-4 pt-2">
                     <img src="{{ $img }}" class="card-img-top" alt="..." style="height: 10rem !important;">

                  </div>
                  <div class="card-body">
                    <h5 class="card-title">{{ $pd->title }}</h5>
                    <p class="card-text">{{ $pd->description }}</p>
                    
                  </div>
                </div> --}}
                        {{-- <div class="box swiper-slide">
                  <div class="option_container">
                     <div class="options">
                        <a href="{{ url('product_details', $pd->id) }}" class="option1">
                        Product Details
                        </a>
                        <a href="" class="option2">
                        Buy Now
                        </a>
                     </div>
                  </div>
                  <div class="img-box">
                     <img src="{{ $img }}" alt="">
                  </div>
                  <div class="detail-box">
                     <h5>
                        {{ $pd->title }}
                     </h5>
                     <h6>
                        {{ $pd->price }}
                     </h6>
                  </div>
               </div> --}}
                        {{-- <div class="card swiper-slide">
                  <div class="image-content">
                      <span class="overlay"></span>

                      <div class="card-image">
                          <img src="images/profile1.jpg" alt="" class="card-img">
                      </div>
                  </div>

                  <div class="card-content">
                      <h2 class="name">David Dell</h2>
                      <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                      <button class="button">View More</button>
                  </div>
              </div> --}}
                    @endforeach

                </div>
            </div>
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>

        {{-- <div class="row">
          @foreach ($items as $pd)
            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="box">
                  <div class="option_container">
                     <div class="options">
                        <a href="" class="option1">
                        {{ $pd->title }}
                        </a>
                        <a href="" class="option2">
                        {{ $pd->price }}
                        </a>
                     </div>
                  </div>
                  <?php $img = asset("product/$pd->image_url"); ?>
                  <div class="img-box">
                     <img src="{{ $img }}" alt="">
                  </div>
                  <div class="detail-box">
                     <h5>
                        {{ $pd->title }}
                     </h5>
                     <h6>
                        {{ $pd->price }}
                     </h6>
                  </div>
               </div>
            </div>
             
          @endforeach
          
          
       </div> --}}

    </div>
</section>
