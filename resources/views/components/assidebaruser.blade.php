<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
      <!--<li class="nav-item text-center m-2 fs-5 p-2 rounded" style="background: #545F8B; color:#fff; font-size:15px !important;">
        <span>{{ Auth::user()->name }}</span>
      </li>-->
      <li class="nav-item">
        <a class="nav-link collapsed" href=" {{ url('/user/index') }}">
          <i class="bi bi-journal-text"></i>
          <span>My Ads</span>
        </a>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('user.users_profile') }}">
          <i class="bi bi-person"></i><span>My Profile Settings</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             <i class="bi bi-box-arrow-right"></i><span>Sign Out</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
          </form>
      </li>
    </ul>
  </aside>