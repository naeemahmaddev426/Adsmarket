<x-app-layout>
  <style>
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
  <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top"
    style="display: none;"><i class="fas fa-arrow-up"></i></button>
  <div id="preloader-container">
    <div id="preloader">A</div>
  </div>
  <div class="container-fluid" id="main-container">

    <div class="row">
      <div class="col-lg-10 col-12 col-md-12 mx-auto p-0 ">
        <div class="col-md-12 col-lg-12 mx-auto col-12 order-lg-2  order-md-1 order-sm-1 ">
          <div class="row">
              <div class="col-md-12 col-lg-12 col-12 mx-auto">
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
                  <div class="col-lg-5">
                    <div class="info-wrap">
                      <div class="info-item d-flex  ">

                        <i class="fa-solid fa-location-dot flex-shrink-0" style="padding-left: 3px;"></i>
                        <div>
                          <h3>Address</h3>
                          <p>Lahore bahria town clock tower</p>
                        </div>
                      </div>

                      <div class="info-item d-flex">
                        <i class="fa-solid fa-phone flex-shrink-0"></i>
                        <div>
                          <h3>Call us</h3>
                          <p><a style="font-size: 12px; color: #666; text-transform: none;" href="tel:0123456789">0123456789</a></p>
                        </div>
                      </div>

                      <div class="info-item d-flex">
                        <i class="fa-solid fa-envelope flex-shrink-0"></i>
                        <div>
                          <h3>Email us</h3>
                          <p><a style="font-size: 12px; color: #666; text-transform: none;" href="mailto:info.example@gmail.com">info.example@gmail.com</a>
                          </p>
                        </div>
                      </div>
                      <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    </div>
                  </div>
                  <div class="col-lg-7">
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
                                <input type="text" class="form-control rounded-1" name="subject" id="subject-field" required>
                            </div>
                            <div class="col-md-12 mt-0 pt-1">
                                <label for="message-field" class="pb-2">Message</label>
                                <textarea class="form-control rounded-1" name="message" rows="10" id="message-field" required></textarea>
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
      <footer id="footer" class="footer pb-0 mt-4 mb-0" style="background-color:#fdfcfc !important;">
        <div class="container footer-top pb-0 mb-0">
          <div class="row gy-4 pb-3">
            <div class="col-lg-5 col-md-6 footer-about">

              <div class="footer-contact pt-3">
                <p class="pb-0 mb-0"><strong>Phone:</strong> <a style="font-size: 12px; color:rgb(68, 68, 68); text-transform: none; font-weight:450" href="tel:0123456789">0123456789</a></p>
                <p><strong>Email:</strong> <a style="font-size: 12px;color:rgb(68, 68, 68);  text-transform: none;font-weight:450" href="mailto:info.example@gmail.com">info.example@gmail.com</a></p>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 footer-links mb-0">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="/contact">Contact us</a></li>
                <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="">Terms of service</a></li>
                <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="">Privacy Policy</a></li>
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
        <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
          <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="index.html" class="link"> <strong class="px-1 sitename">Ads Market</strong></a><span>All Rights Reserved</span></p>
        </div>
      </footer>
    </div>
  </div>

  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" id="login_register">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist" style="margin-top: -20px !important;">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade show active m-0 p-0" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-floating mb-3">
                  <x-input id="email" class="form-control" type="email" name="email" placeholder="name@example.com" />
                  <label for="loginEmail">Email</label>
                </div>
                <div class="form-floating">
                  <x-input id="password" class="form-control" type="password" name="password" placeholder="Password" />
                  <label for="loginPassword">Password</label>
                </div>
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <div class="form-check mt-1" id="login_rig">
                      <x-checkbox id="remember_me" name="remember" class="form-check-input" />
                      <label class="form-check-label" for="loginCheck"> Remember me </label>
                    </div>
                  </div>
                  <div class="col mt-1">
                    <a href="#!" class="link">Forgot password?</a>
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
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-floating mb-3">
                  <x-input id="name" type="text" name="name" class="form-control" placeholder="Name" />
                  <label for="name">Name</label>
                </div>

                <div class="form-floating mb-3">
                  <x-input id="email" type="email" class="form-control" name="email" placeholder="Email" />
                  <label for="email">Email</label>
                </div>

                <div class="input-group input-group-sm rounded border border-1 mb-3" style="height: 31px !important">
                  <span class="input-group-text border-0 pe-0 bg-transparent" id="inputGroup-sizing-sm">+92 |</span>
                  <x-input type="number" class="form-control border-0" name="phone_no" id="phone-no" />
                </div>

                <div class="form-floating mb-3">
                  <x-input id="password" type="password" name="password" class="form-control" placeholder="Password" />
                  <label for="password">Password</label>
                </div>

                <div class="form-floating mb-3">
                  <x-input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                    placeholder="Confirm Password" />
                  <label for="password_confirmation">Confirm Password</label>
                </div>

                <div class="form-floating mb-3">
                  <select name="role" class="form-control" id="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                  </select>

                </div>

                <div class="form-check d-flex justify-content-center mb-4" id="login_rig">
                  <x-checkbox name="terms" id="terms" class="form-check-input me-2" />
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
  </div>
  </div>
  </div>
</x-app-layout>