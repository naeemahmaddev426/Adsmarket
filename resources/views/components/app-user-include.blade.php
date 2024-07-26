<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class=" d-flex align-items-center">
        <img src="{{asset('user-panel/assets/img/logo.svg')}}" alt="">
       
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
     
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0 " href="{{ route('user.users_profile') }}" data-bs-toggle="dropdown">
            <img src="{{asset('user-panel/assets/img/Profile-Male-PNG.png')}}" alt="Profile" class="rounded-circle me-2 j">
            <span class="d-none d-md-block dropdown-toggle">
              @auth
                <span>{{ Auth::user()->name }}</span>
              @endauth
            </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('user.users_profile') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
           
              <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>

            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>