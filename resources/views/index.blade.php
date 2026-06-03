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
      overflow: hidden;
      height: 200px;
    }

    .main_swipe img {
      width: 100%;
      min-height: 200px;
      object-fit: cover;
    }

    .swiper-slide {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      width: 100%;
      /* Ensure image fills the slide width */
      height: auto;
      /* Maintain image aspect ratio */
    }

    @media (max-width: 768px) {
      #full-width-swiper {
        height: 80px;
        margin-top: 2px;
        /* Adjust height for smaller screens */
      }

      .main_swipe img {
        min-height: 80px !important;
        /* Make lazy-loaded image height match the swiper */
        object-fit: cover !important;
        /* Ensures image is fully covered without wrapping */
      }
    }

    .login-with-google-btn {
      transition: background-color 0.3s, box-shadow 0.3s;
      margin-left: auto;
      margin-right: auto;
      padding: 12px 16px 12px 42px;
      border: none;
      border-radius: 3px;
      box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);

      color: #757575;
      font-size: 14px;
      font-weight: 500;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;

      background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
      background-color: white;
      background-repeat: no-repeat;
      background-position: 12px 11px;

      &:hover {
        box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25);
      }

      &:focus {
        outline: none;
        box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25),
          0 0 0 3px #c8dafc;
      }


    }
  </style>
  <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top"
    style="display: none;"><i class="fas fa-arrow-up"></i></button>
  <div id="preloader-container">
    <div id="preloader">A</div>
  </div>
  <div class="container-fluid" id="main-container">
    <div class="row">
      <div class="col-lg-9 col-12 col-md-12 mx-auto p-xlg-0 p-lg-0 p-md-0 py-sm-1 ">
        <div class="row mt-1">

          <div class="col-md-12 col-lg-12 mx-auto col-12 order-lg-2  order-md-1 order-sm-1 ">
            <div class="row">
              <div class="col-md-12 col-lg-12 col-12 mx-auto ">
                <!-- Swiper Container -->
                <div id="full-width-swiper" class="swiper-container shadow-sm">
                  <div class="swiper-wrapper">
                    @foreach($homeBanners as $banner)
                    <div class="swiper-slide main_swipe">
                      <img src="{{ asset('assets/images/' . $banner->path) }}" class="lazyload" alt="Banner Image"
                        style="width: 100%; min-height: 200px; object-fit: cover;" />
                    </div>
                    @endforeach
                  </div>
                  <div class="swiper-pagination" style="display: none;"></div>

                  <div class="swiper-button-next custom-swiper-button-next d-none"></div>
                  <div class="swiper-button-prev custom-swiper-button-prev d-none"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-12 mx-auto border-bottom pb-4 " style="height: 20px;">
                <p class="float-start spot mt-1 mb-2 ">All Categories</p>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-6 mx-auto col-12 p-0 m-0 "
                style="height: 80px; overflow-x: hidden;position: relative;">
                <div id="category-swiper" class="swiper-container">
                  <div class="swiper-wrapper" style="display: flex;">
                    @foreach($images as $image)
                    @php
                    // Check if the category has related ads in the `ads` table
                    $hasAds = $ads->where('category_name', $image->category_name)->isNotEmpty();
                    @endphp
                    <div class="swiper-slide col-2" style="width: 60px !important;">
                      @if($hasAds)
                      <a href="{{ route('category.search', ['category_name' => $image->category_name]) }}">
                        @else
                        <a href="#" data-bs-toggle="modal" data-bs-target="#invalidCategoryModal">
                          @endif
                          <div class="mt-2" style="width: 60px; height: 60px;">
                            <x-lazy-image src="{{ asset($image->category_image) }}" alt="Category Image"
                              class="card-img-top swiper-img border-0" style="height: 60px; width: 60px;" />
                          </div>
                        </a>
					   </a>
                    </div>
                    @endforeach
                  </div>
                  <div class="swiper-button-prev category-swiper-button-prev "></div>
                  <div class="swiper-button-next category-swiper-button-next "></div>
                </div>
              </div>
            </div>
            <div class="row g-0 ">
              <div class="col-md-12 border h6-color pt-1">
                <h6 class="h6 ps-2">More than {{ $totalAds }} ads throughout the pakistan</h6>
              </div>
              <div class="col-md-12 m-0 p-0" id="product-card">
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-2 g-0">
                 @foreach ($orderedCategories as $category)
                    <div class="col mb-1 mt-2 g-2">
                      <a href="{{ route('category.search', ['category_name' => $category->category_name]) }}" class="card-link">
                        <div class="card h-100 shadow-sm" style="border: 1px solid #545F8B;">
                          <div class="card-body">
                            <h5 class="card-title text-dark card-text">
                              {{ str_replace('_', ' ', $category->category_name) }} ({{ $category->count }})
                            </h5>
                            <ul class="text2 list-unstyled">
                              @foreach ($category->subcategories as $subcategory)
                                <li>
                                  <a href="{{ route('sub_category.search', ['category_name' => $category->category_name, 'sub_category_name' => $subcategory->sub_category_name]) }}"
                                    class="text2 text-dark">
                                    {{ str_replace('_', ' ', $subcategory->sub_category_name) }} ({{ $subcategory->count }})
                                  </a>
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
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered " id="login_register">
      <div class="modal-content">
        <div class="modal-header border-0 p-1">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <a href="{{ route('auth.google') }}" class="login-with-google-btn mb-5 mt-0 d-flex align-items-center">
            Sign in with Google
          </a>

          <ul class="nav nav-pills nav-justified mb-3 mt-2" id="ex1" role="tablist"
            style="margin-top: -20px !important;">
            <li class="nav-item " role="presentation">
              <a class="nav-link active py-2" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
                aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link py-2" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
                aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
          </ul>

          <div class="tab-content p-2">
            <div class="tab-pane fade show active m-0 p-0" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                  <x-input id="email" class="form-control" type="email" name="email" placeholder="name@example.com" />
                </div>
                <div class="input-group">
                  <x-input id="password" class="form-control" type="password" name="password" placeholder="Password" />
                </div>
                <div class="row mb-2 mt-2">
                  <div class="col d-flex justify-content-center">
                    <div class="form-check " id="login_rig">
                      <x-checkbox id="remember_me" name="remember" class="form-check-input" />
                      <label class="form-check-label" for="loginCheck"> Remember me </label>
                    </div>
                  </div>
                  <div class="col">
                    <a href="#!" class="link" style="font-size:12px;float:right; padding-top:3px">Forgot password?</a>
                  </div>
                </div>

                <x-button class="btn sign w-100 mx-auto">
                  {{ __('Log in') }}
                </x-button>

                <div class="text-center mt-2">
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
                  <x-input id="password" type="password" name="password" class="form-control" placeholder="Password"
                    required />
                </div>
                <div class="input-group mb-2">
                  <x-input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                    placeholder="Confirm Password" required />
                </div>
                <div class="input-group mb-2 d-none">
                  <select name="role" class="form-control" id="role">
                    <option value="user">User</option>
                  </select>
                </div>
                <div class="form-check" id="login_rig">
                  <x-checkbox name="terms" id="terms" class="form-check-input me-2" />
                  <label class="form-check-label pb-2" for="terms">
                    I have read and agree to the terms
                  </label>
                </div>
                <x-button class="btn sign  w-100 mx-auto">
                  {{ __('Register') }}
                </x-button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Modal Structure -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          You need to be logged in to post an ad. Please log in or register.
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn sign" data-bs-dismiss="modal">Close</button>
          <a href="{{ route('login') }}" class=" btn sign">Login</a> -->
        </div>
      </div>
    </div>
  </div>
 <div class="modal fade" id="invalidCategoryModal" tabindex="-1" aria-labelledby="invalidCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title m-auto" id="invalidCategoryModalLabel">Invalid Category ads</h5>
          <button type="button" class="btn-close p-0 m-0" style="color:#545f8b !important " data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center">
              <i class="fa-solid fa-magnifying-glass fa-5x" style="color:#545f8b "></i>
              <h5 class="mt-3">Oops... we didn't find anything that matches this related Category of his ads</h5>
              <p>Try to select for something more general, change the Category other .</p>
          </div>
        </div>

      </div>
    </div>
  </div>

</x-app-layout>