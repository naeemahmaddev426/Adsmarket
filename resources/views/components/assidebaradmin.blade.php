<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/contact_user_detail') }}">
            <i class='bx bxs-contact'></i>
                <span>Contact Detail</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="adscategory">
            <i class="bi bi-plus" style="font-size:18px !important;"></i>
                <span> Ad Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="adssubcategory">
            <i class="bi bi-plus" style="font-size:18px !important;"></i>
                <span> Ad sub Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="adsubscategorytype">
            <i class="bi bi-plus" style="font-size:18px !important;"></i>
                <span> Ad sub Category type</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="">
                <i class="bi bi-menu-button-wide"></i><span>Select Category</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.category.mobiles') }}" data-category="Mobiles">
                    <i class="bi bi-phone" style="font-size:18px !important;"></i>
                        <span>Mobiles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.vehicles') }}" data-category="Vehicles">
                    <i class="bi bi-car-front" style="font-size:18px !important;"></i>
                        <span>Vehicles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.property_sale') }}" data-category="Property_for_sale">
                    <i class="bi bi-house" style="font-size:18px !important;"></i>
                        <span>Property for Sale</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.property_rent') }}" data-category="Property_for_rent">
                    <i class="bi bi-key" style="font-size:18px !important;"></i>
                        <span>Property for Rent</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.bikes') }}" data-category="Bikes">
                    <i class="bi bi-bicycle" style="font-size:18px !important;"></i>
                        <span>Bikes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.furniture') }}" data-category="Furniture_Home_Decor">
                    <i class="bi bi-flower3" style="font-size:18px !important;"></i>
                        <span>Furniture & Home Decor</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.fashion') }}" data-category="Fashion_Beauty">
                    <i class="bi bi-bag " style="font-size:18px !important;"></i>
                        <span>Fashion & Beauty</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Select Banner</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav2" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <!-- Home -->
                <li>
                    <a href="{{ route('admin.home_banner') }}">
                        <i class="bi bi-house-door" style="font-size:18px !important;"></i>
                        <span>Home_banner</span>
                    </a>
                </li>

                <!-- Product -->
                <li>
                    <a href="{{ route('admin.product_banner') }}">
                        <i class="bi bi-car-front" style="font-size:18px !important;"></i>
                        <span>product_banner</span>
                    </a>
                </li>

                <!-- Product Detail -->
                <li>
                    <a href="{{ route('admin.product_detail_banner') }}">
                        <i class="bi bi-house" style="font-size:18px !important;"></i>
                        <span>product_detail_banner</span>
                    </a>
                </li>

                <!-- Contact -->
                <li>
                    <a href="{{ route('admin.contact_banner') }}">
                        <i class="bi bi-telephone" style="font-size:18px !important;"></i>
                        <span>Contact_banner</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/admin_profile') }}">
            <i class="bi bi-person" style="font-size:18px !important;"></i>
                <span> My profile</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link collapsed dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> <span>Sign Out</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</aside>