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
    <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top" style="display: none;"><i class="fas fa-arrow-up"></i></button>
        <div id="preloader-container">
            <div id="preloader">A</div>
        </div>
    <div class="container-fluid" id="main-container">
        <div class="row">
            <div class="col-lg-10 col-12 col-md-12 mx-auto p-0 ">
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
                <div class="row mt-3">
                    <div class="col-md-8 col-sm-12 col-12 mx-auto">
                        <div class="numbering-of-product">
                            <h1 class="search-link-text">{{ $totalAds }} Results | {{ $category_name }}</h1>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-12 justify-content-center justify-content-lg-end  mt-2 float-end">
                        <div class="sort-control float-end">
                            <nav>
                                <div class="nav nav-tabs mb-3 border-0" id="nav-tab" role="tablist">
                                    <button class="button-nav border-0 rounded d-none" id="nav-auto-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-auto" aria-selected="true"><i class="fa-brands fa-windows"></i> Grid</button>
                                    <button class="button-nav border-0 ms-2 rounded d-none active" id="nav-job-tab" data-bs-toggle="tab" data-bs-target="#nav-job" type="button" role="tab"  aria-controls="nav-job" aria-selected="false"><i class="fa-solid fa-bars"></i> List</button>
                                </div>
                            </nav>
                            <div class="select-wrapper">
                                <form method="GET"
                                    action="{{ route('product.byCategory', ['category_name' => $category_name]) }}">
                                    <select id="sort-by-select" class="rounded" name="sort"
                                        onchange="this.form.submit()">
                                        <option value="">Sort by</option>
                                        <option value="low_to_high">Low to High</option>
                                        <option value="high_to_low">High to Low</option>
                                        <option value="recently_added">Recently Added</option>
                                        <!-- <option value="mostly_viewed">Mostly Viewed</option> -->
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="tab-content p-3 border bg-light border-0" id="nav-tabContent" style="background-color: #fff !important;">
                        <!-- <div class="tab-pane fade d-none" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @foreach($ads as $ad)
                                <a href="{{ route('product.detail', ['id' => $ad->id]) }}">
                                <div class="card" id="grid-card">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="row">
                                        @if($ad->images->isNotEmpty())
                                            <div class="col-md-2 col-12 order-sm-1">
                                                    <img src="{{ asset($ad->images->first()->image_path) }}" alt="Image" class="card-img-top">
                                            </div>
                                        @endif
                                        <div class="col-md-8 col-12 order-sm-2">
                                            <div class="card-body">
                                                <div class="text-section">
                                                    <h2 class="card-title">{{ $ad->title }}</h2>
                                                    <p class="description">{{ $ad->description }}</p>
                                                    <p class="price">{{ $ad->price }}</p>
                                                    <p class="location"><i class="fa-solid fa-location-dot"></i>{{ $ad->category_name}} <span> Location From {{ $ad->location }}</span></p>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                                </a>
                            @endforeach
                        </div> -->
                        <div class="tab-pane fade active show " id="nav-job" role="tabpanel" aria-labelledby="nav-job-tab">
                            <div class="row">
                            @foreach($ads as $ad)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="{{ route('product.detail', ['id' => encrypt($ad->id)]) }}" style="text-decoration: none; color: inherit;">
                                    <div class="card h-100" id="gallery-card">
                                        @if($ad->images->isNotEmpty())
                                            <img src="{{ asset($ad->images->first()->image_path) }}" class="card-img-top shadow-sm h-100 lazyload" alt="...">
                                        @endif
                                        <div class="card-body">
                                            <p class="price pt-2 pb-0 m-0" style="color:black; font-weight:500;">Rs {{ $ad->price }}</p>
                                            <p class="description">{{ Str::limit($ad->description, 150, '...') }}</p>
                                            <p class="location mt-2"><i class="fa-solid fa-location-dot"></i> {{ $ad->category_name }} Location From {{ $ad->location }}</p>
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
        <footer id="footer" class="footer pb-0 mt-4 mb-0" style="background-color:#fdfcfc !important;">
            <div class="container footer-top pb-0 mb-0">
                <div class="row gy-4 pb-3">
                    <div class="col-lg-5 col-md-6 footer-about">
                        <div class="footer-contact pt-3">
                            <p class="pb-0 mb-0"><strong>Phone:</strong> <a style="font-size: 12px; color:rgb(68, 68, 68); text-transform: none; font-weight:450" href="tel:0123456789">0123456789</a></p>
                            <p><strong>Email:</strong> <a style="font-size: 12px;color:rgb(68, 68, 68);  text-transform: none;font-weight:450" href="mailto:info.accommodation@gmail.com">info.accommodation@gmail.com</a> </p>
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
                <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="/" class="link"> <strong class="px-1 sitename">Ads Market</strong></a><span>All Rights Reserved</span></p>
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
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist"
                        style="margin-top: -20px !important;">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login"
                                role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register"
                                role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active m-0 p-0" id="pills-login" role="tabpanel"
                            aria-labelledby="tab-login">
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="loginEmail"
                                        placeholder="name@example.com">
                                    <label for="loginEmail">Email</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="loginPassword"
                                        placeholder="Password">
                                    <label for="loginPassword">Password</label>
                                </div>
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                        <div class="form-check mt-1" id="login_rig">
                                            <input class="form-check-input" type="checkbox" value="" id="loginCheck">
                                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                                        </div>
                                    </div>
                                    <div class="col mt-1">
                                        <a href="#!" class="link">Forgot password?</a>
                                    </div>
                                </div>
                                <button class="btn sign w-100 mx-auto"> <a href="user-panel/index.html"
                                        class="text-decoration-none text-white">Login </a></button>
                                <div class="text-center">
                                    <p class="mb-1">Not a member? <a id="tab-register" data-bs-toggle="pill"
                                            href="#pills-register" role="tab" aria-controls="pills-register"
                                            class="link">Register</a></p>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="registerName" placeholder="Name">
                                    <label for="registerName">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="registerEmail" placeholder="Email">
                                    <label for="registerEmail">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="registerPassword"
                                        placeholder="Password">
                                    <label for="registerPassword">Password</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" id="registerConfirmPassword"
                                        placeholder="Confirm Password">
                                    <label for="registerConfirmPassword">Confirm Password</label>
                                </div>
                                <div class="form-check d-flex justify-content-center mb-4" id="login_rig">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck"
                                        aria-describedby="registerCheckHelpText">
                                    <label class="form-check-label" for="registerCheck">I have read and agree to the
                                        terms </label>
                                </div>
                                <button type="submit" class="btn sign mx-auto w-100"
                                    data-mdb-ripple-init="">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>