<footer id="footer" class="footer pb-0 mt-4 mb-0 main-nav" style="background-color: #f7f7f7 !important;">
    <div class="container footer-top pb-3">
        <div class="row gy-4">
            <!-- Logo Section -->
            <div class="col-lg-3 col-md-6 text-center text-md-start footer-about">
                <div class="footer-contact pt-3">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('assets/images/logo.svg') }}" class="lazyload" alt="Logo" style="max-width: 200px; height: auto;">
                    </a>
                </div>
            </div>

            <!-- Popular Categories -->
            <div class="col-lg-3 col-md-3 col-6 footer-links">
                <h4>Popular Categories</h4>
                <ul class="list-unstyled">
                    <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ url('/category/Mobiles') }}">Mobiles</a></li>
                    <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ url('/category/Vehicles') }}">Vehicles</a></li>
                    <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ url('/category/Property_for_sale') }}">Property For Sale</a></li>
                    <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ url('/category/Property_for_rent') }}">Property For Rent</a></li>
                    <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ url('/category/Bikes') }}">Bikes</a></li>
                    <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ url('category/Furniture_Home_Decor') }}">Furniture</a></li>
                    <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ url('category/Fashion_Beauty') }}">Fashion</a></li>
                </ul>
            </div>

            <!-- Useful Links -->
            <div class="col-lg-3 col-md-3 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul class="list-unstyled">
					 <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ url('/ads_for_bussiness') }}">Adsmarket for Businesses</a></li>
                    <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ url('/contact') }}">Contact us</a></li>
                    <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ route('term_services') }}">Terms of Service</a></li>
                    <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Social Media Links -->
            <div class="col-lg-3 col-md-12 text-center text-md-start">
                <h4>Follow Us</h4>
                <div class="social-links d-flex justify-content-center justify-content-md-start">
                    <a href="#" class="me-3"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="me-3"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="me-3"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center border-top pt-3 mb-0 pb-3">
        <p class="mb-0 pb-0">
            © 2024<span> Copyright</span> 
            <a href="{{ url('/') }}" class="link"><strong class="px-1 sitename">Ads Market</strong></a>
            <span>All Rights Reserved</span>
        </p>
    </div>
</footer>
