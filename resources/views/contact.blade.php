<x-app-layout>
  <style>
    #full-width-swiper {
      position: relative;
      overflow: hidden;
      /* Hide any overflow to only show one slide at a time */
    }

    .swiper-slide {
      display: flex;
      justify-content: center;
      /* Center the image horizontally */
      align-items: center;
      /* Center the image vertically */
    }

    .swiper-slide img {
      width: 100%;
      /* Ensure image fills the slide width */
      height: auto;
      /* Maintain image aspect ratio */
    }
    
  </style>
  <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top"
    style="display: none;"><i class="fas fa-arrow-up"></i></button>
  <div id="preloader-container">
    <div id="preloader">A</div>
  </div>
  <div class="container-fluid" id="main-container">

    <div class="row">
      <div class="col-lg-9 col-12 col-md-12 mx-auto p-0 ">
        <div class="col-md-12 col-lg-12 mx-auto col-12 order-lg-2  order-md-1 order-sm-1 ">
          <div class="row">
            <div class="col-md-12 col-lg-12 col-12 mx-auto">
              <div id="full-width-swiper" class="swiper-container shadow-sm" style="height: 200px;">
              <div class="swiper-wrapper">
                  @foreach($contactBanners as $banner)
                      <div class="swiper-slide">
                          <img src="{{ asset('assets/images/' . $banner->path) }}" class="lazyload" alt="Contact Banner" style="width: 100%; height: auto;">
                      </div>
                  @endforeach
              </div>
                <!-- Pagination (hidden) -->
                <div class="swiper-pagination" style="display: none;"></div>
                <!-- Navigation Buttons -->
                <div class="swiper-button-next custom-swiper-button-next d-none"></div>
                <div class="swiper-button-prev custom-swiper-button-prev d-none"></div>
              </div>
            </div>
          </div>
          <div class=" mt-5">
            <div class="col-md-12  mx-auto ">
              <section id="contact" class="contact section">
                <div class="container section-title text-center">
                  <h2>Contact us</h2>
                  <p class="p-0 m-0">Get in touch with us for any assistance or inquiries</p>
                </div>
                @if(session('success'))
                <div class="alert alert-success mt-4">
                  {{ session('success') }}
                </div>
                @endif
                <div class="container">
                  <div class="row ">
                   
                    <div class="col-lg-10 mx-auto">
                      <form action="{{ route('contact.save') }}" method="post" class="php-email-form">
                        @csrf
                        <div class="row gy-4">
                          <div class="col-md-6">
                            <label for="name-field" class="pb-2">Your Name</label>
                            <input type="text" name="name" id="name-field" class="form-control rounded-1" required>
                          </div>
                          <div class="col-md-6">
                            <label for="email-field" class="pb-2">Your Email</label>
                            <input type="email" class="form-control rounded-1" name="email" id="email-field" required>
                          </div>
                          <div class="col-md-12 mt-0 pt-1">
                            <label for="subject-field" class="pb-2">Subject</label>
                            <input type="text" class="form-control rounded-1" name="subject" id="subject-field"
                              required>
                          </div>
                          <div class="col-md-12 mt-0 pt-1">
                            <label for="message-field" class="pb-2">Message</label>
                            <textarea class="form-control rounded-1" name="message" rows="10" id="message-field"
                              required></textarea>
                          </div>
                          <div class="col-md-12 text-center">
                            <button type="submit" class="search-button text-white px-3 py-2 rounded">Send Message</button>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
       
      </div>
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
                  <x-input id="password" type="password" name="password" class="form-control" placeholder="Password"
                    required />
                </div>
                <div class="input-group mb-2">
                  <x-input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                    placeholder="Confirm Password" required />
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


</x-app-layout>