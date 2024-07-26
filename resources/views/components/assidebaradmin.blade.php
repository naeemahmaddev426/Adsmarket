<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/index">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
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
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="my_ads.html">
                <i class="bi bi-menu-button-wide"></i><span>Select Category</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.category.mobiles') }}" data-category="Mobiles">
                        <span>Mobiles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.vehicles') }}" data-category="Vehicles">
                        <span>Vehicles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.property_sale') }}" data-category="Property_for_sale">
                        <span>Property for Sale</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.property_rent') }}" data-category="Property_for_rent">
                        <span>Property for Rent</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.bikes') }}" data-category="Bikes">
                        <span>Bikes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.furniture') }}" data-category="Furniture_Home_Decor">
                        <span>Furniture & Home Decor</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.fashion') }}" data-category="Fashion_Beauty">
                        <span>Fashion & Beauty</span>
                    </a>
                </li>
            </ul>

        </li>
       
    </ul>
</aside>