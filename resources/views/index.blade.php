<x-app-layout>
  <style>
    .card-body {
      padding: 15px;
    }

    .text2 {
      font-size: 13px;
    }

    .card {
      margin-bottom: 20px;
    }
  
    .section {
            margin: 0 auto;
            padding-block: 5rem;
        }

        #full-width-swiper {
    position: relative;
    overflow: hidden; /* Hide any overflow to only show one slide at a time */
}

.swiper-slide {
    display: flex;
    justify-content: center; /* Center the image horizontally */
    align-items: center; /* Center the image vertically */
}

.swiper-slide img {
    width: 100%; /* Ensure image fills the slide width */
    height: auto; /* Maintain image aspect ratio */
}

    </style>
        
  </style>
 
  <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top"
    style="display: none;"><i class="fas fa-arrow-up"></i></button>
  <div id="preloader-container">
    <div id="preloader">A</div>
  </div>
  <div class="container-fluid" id="main-container">
    <div class="row">
      <div class="col-lg-10 col-12 col-md-12 mx-auto p-0 ">
        <!-- @if(session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif -->
        <div class="row mt-1">

          <div class="col-md-12 col-lg-12 mx-auto col-12 order-lg-2  order-md-1 order-sm-1 ">
            <div class="row">
              <div class="col-md-12 col-lg-12 col-12 mx-auto">
                  <!-- Swiper Container -->
                  <div id="full-width-swiper" class="swiper-container shadow-sm" style="height: 200px;">
                      <div class="swiper-wrapper">
                          <div class="swiper-slide">
                              <img src="{{ asset('assets/images/image.png') }}" class="lazyload" alt="Ad Image">
                          </div>
                          <div class="swiper-slide">
                              <img src="{{ asset('assets/images/image (1).png') }}" class="lazyload" alt="Ad Image">
                          </div>
                          <div class="swiper-slide">
                              <img src="{{ asset('assets/images/image (2).png') }}" class="lazyload" alt="Ad Image">
                          </div>
                          <div class="swiper-slide">
                              <img src="{{ asset('assets/images/image (3).png') }}" class="lazyload" alt="Ad Image">
                          </div>
                      </div>
                      <!-- Pagination (hidden) -->
                      <div class="swiper-pagination" style="display: none;"></div>
                      <!-- Navigation Buttons -->
                      <div class="swiper-button-next custom-swiper-button-next d-none"></div>
                      <div class="swiper-button-prev custom-swiper-button-prev d-none"></div>
                  </div>




              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-12 mx-auto border-bottom pb-4 " style="height: 20px;">
                <a href="" class="float-start spot mt-1 mb-2 ">All Categories</a>

              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-6 mx-auto col-12 p-0 m-0 "
                style="height: 80px; overflow-x: hidden;position: relative;">
                <div id="category-swiper" class="swiper-container">
                    <div class="swiper-wrapper" style="display: flex;">
                        @foreach($images as $image)
                        <div class="swiper-slide col-2" style="width: 60px !important;">
                            <a href="{{ route('product.byCategory', ['category_name' => $image->category_name]) }}">
                                <div class="mt-2" style="width: 60px; height: 60px;">
                                    <img src="{{ asset($image->category_image) }}" class="card-img-top swiper-img lazyload" alt="..."
                                        style="height: 60px; width: 60px;">
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev category-swiper-button-prev"></div>
                    <div class="swiper-button-next category-swiper-button-next"></div>
                </div>


              </div>
            </div>
            <div class="row">
              <div class="col-md-12 border h6-color pt-1">
                <h6 class="h6">More than {{ $totalAds }} ads throughout the World</h6>
              </div>
              <div class="col-md-12 col-12 m-0 p-0" id="product-card">
                <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 mt-2">
                @foreach ($orderedCategories as $category)
                      <div class="col-md-3 mb-4 mt-3">
                          <a href="{{ route('product.byCategory', ['category_name' => $category->category_name]) }}" class="card-link">
                              <div class="card h-100 shadow-sm">
                                  <div class="card-body">
                                      <h5 class="card-title text-dark card-text">{{ $category->category_name }} ({{ $category->count }})</h5>
                                      <ul class="text2 list-unstyled">
                                          @foreach ($category->subcategories as $subcategory)
                                              <li>
                                                  <a href="{{ route('product.subcategory', ['category_name' => $category->category_name, 'sub_category_name' => $subcategory->sub_category_name]) }}" class="text2 text-dark">{{ $subcategory->sub_category_name }} ({{ $subcategory->count }})</a>
                                              </li>
                                          @endforeach
                                      </ul>
                                  </div>
                              </div>
                          </a>
                      </div>
                  @endforeach
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
      <footer id="footer" class="footer pb-0 mt-4 mb-0" style="background-color: #fdfcfc !important;">
        <div class="container footer-top pb-0 mb-0">
          <div class="row gy-4 pb-3">
            <div class="col-lg-5 col-md-6 footer-about">
              <div class="footer-contact pt-3">
                <p class="pb-0 mb-0"><strong>Phone:</strong> <a href="tel:0123456789"
                    style="font-size: 12px; color: rgb(68, 68, 68); text-transform: none; font-weight: 450;">0123456789</a>
                </p>
                <p><strong>Email:</strong> <a href="mailto:info.example@gmail.com"
                    style="font-size: 12px; color: rgb(68, 68, 68); text-transform: none; font-weight: 450;">info.example@gmail.com</a>
                </p>
              </div>
            </div>

            <div class="col-lg-3 col-md-3 footer-links mb-0">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="/contact">Contact us</a></li>
                <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="#">Terms of service</a></li>
                <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="#">Privacy Policy</a></li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-12">
              <h4>Follow Us</h4>
              <div class="social-links d-flex">
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
              </div>
            </div>

          </div>
        </div>

        <div class="container copyright text-center border-top pt-2 mb-0 pb-2">
          <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="/" class="link"><strong class="px-1 sitename">Ads
                Market</strong></a><span>All Rights Reserved</span></p>
        </div>
      </footer>
    </div>
  </div>

  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" id="login_register">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist" style="margin-top: -20px !important;">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
                aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
                aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active m-0 p-0" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                  <x-input id="email" class="form-control" type="email" name="email" placeholder="name@example.com" />
                </div>
                <div class="input-group">
                  <x-input id="password" class="form-control" type="password" name="password" placeholder="Password" />
                </div>
                <div class="row mb-2">
                  <div class="col d-flex justify-content-center">
                    <div class="form-check " id="login_rig">
                      <x-checkbox id="remember_me" name="remember" class="form-check-input" />
                      <label class="form-check-label" for="loginCheck"> Remember me </label>
                    </div>
                  </div>
                  <div class="col mt-1">
                    <a href="#!" class="link" style="font-size:12px;float:right; padding-top:3px">Forgot password?</a>
                  </div>
                </div>

                <x-button class="btn sign w-100 mx-auto">
                  {{ __('Log in') }}
                </x-button>

                <div class="text-center">
                  <p class="mb-1">Not a member? <a id="tab-register" data-bs-toggle="pill" href="#pills-register"
                      role="tab" aria-controls="pills-register" class="link">Register</a></p>
                </div>
              </form>
            </div>

            <div class="tab-pane fade m-0 p-0" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group mb-2">
                    <x-input type="text" name="name" class="form-control" placeholder="Name" required />
                </div>
                <div class="input-group mb-2">
                    <x-input type="email" class="form-control" name="email" placeholder="Email" required />
                </div>
                <div class="input-group rounded border border-1 mb-2">
                    <span class="input-group-text border-0 pe-0 bg-transparent" id="inputGroup-sizing-sm">+92 |</span>
                    <x-input type="number" class="form-control border-0" name="phone_no" id="phone-no" required />
                </div>
                <div class="input-group mb-2">
                    <x-input id="password" type="password" name="password" class="form-control" placeholder="Password" required />
                </div>
                <div class="input-group mb-2">
                    <x-input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required />
                </div>
                <div class="input-group mb-2">
                    <select name="role" class="form-control" id="role">
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="form-check d-flex justify-content-center mb-2" id="login_rig">
                    <x-checkbox name="terms" id="terms" class="form-check-input me-2" required />
                    <label class="form-check-label" for="terms">
                        I have read and agree to the terms
                    </label>
                </div>
                <x-button class="btn sign w-100 mx-auto">
                    {{ __('Register') }}
                </x-button>
            </form>




            </div>


          </div>
        </div>

      </div>
    </div>
  </div>
</x-app-layout>