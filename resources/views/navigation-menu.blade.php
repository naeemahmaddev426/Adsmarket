<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="col-lg-10 col-12 col-md-12 mx-auto p-0 " id="main-nav">
    <div class="header-top">
          <div class="inner-header float-end rounded mt-2 d-none d-lg-flex align-items-center justify-content-between">
            <!-- Check if the user is not authenticated -->
            @guest
              <a data-bs-toggle="modal" href="#exampleModalToggle">
                <button class="border-right bg-transparent">
                  <span><i class="fa fa-circle-user me-2"></i>Login / Register</span>
                  <span style="margin-left: 7px;">|</span>
                </button>
              </a>
            @endguest

            @auth
              <div class="dropdown">
                <button class="border-right bg-transparent dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                  <span><i class="fa fa-circle-user me-2"></i>{{ Auth::user()->name }}</span>
                  
                </button>
                <ul class="dropdown-menu" aria-labelledby="userMenu">
                  <li><a class="dropdown-item" href="{{ route('user.index') }}">Dashboard</a></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                </ul>
              </div>
              
            @endauth
            <span style="color:white;">|</span>
            <a href="/contact">
              <button class="bg-transparent border-0">
                <span>Contact us</span>
              </button>
            </a>
          </div>
       
          <button class="bg-transparent btn d-lg-none float-end me-2" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fas fa-bars text-white"></i>
          </button>
        </div>
        <div class="top-nav">
          <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="col-md-3 col-3">
              <a class="navbar-brand" href="/">
                <img src="{{asset('assets/images/logo.svg')}}" class="lazyload" width="200px" height="60px">
              </a>
            </div>
          <div class="col-md-7 ms-2 col-12 mx-auto">
          <div class="s131">
            <form>
              <div class="inner-form w-100">
               
                <div class="input-field second-wrap">
                  <input type="text" id="default" list="languages" placeholder="Location " class="border-0">
                  <datalist id="languages">
                    <option class="text-dark">Lahore</option>
                    <option class="text-dark">Karachi</option>
                    <option class="text-dark">Islamabad</option>
                    <option class="text-dark">Faisalabad</option>
                    <option class="text-dark">Abbottabad</option>
                    <option class="text-dark">Ahmadpur East</option>
                  </datalist>
              </div>
                <div class="input-field first-wrap" id="input_full">
                  <input id="search" type="text" placeholder="Find cars, mobile phones... ">
              </div>
              <div class="input-field third-wrap">
                  <button class="btn-search" type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                  </button>
              </div>
              </div>
            </form>
          </div>
          </div>
            <div class="col-md-2 col-2 float-end ms-auto">
              <ul class="nav justify-content-center ">
                
              <li class="nav-item">
              <a href="{{ route('post_ad') }}" class="post" id="postAdLink"><i class="fa-solid fa-circle-plus me-2"></i>Post Ad</a>

              </li>
                
              </ul>
            </div>
          </nav>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="inner-header d-flex me-0 pb-3">
              <div class="col">
                  <a href="#" id="loginRegisterBtn" class="d-block d-lg-none">
                     
                      @guest
              <a data-bs-toggle="modal" href="#exampleModalToggle">
                <button class="border-right bg-transparent">
                  <span><i class="fa fa-circle-user me-2"></i>Login / Register</span>
                  <span style="margin-left: 7px;">|</span>
                </button>
              </a>
              @endguest

              <!-- Check if the user is authenticated -->
              @auth
              <button class="border-right bg-transparent">
                <span><i class="fa fa-circle-user me-2"></i>{{ Auth::user()->name }}</span>
                <span style="margin-left: 7px;">|</span>
              </button>
              @endauth
                     
                  </a>
              </div>
              <div class="col">
                  <a href="contact.html" class="d-block d-lg-none">
                      <button class="bg-transparent border-0">
                      <a href="/contact"><button class="bg-transparent border-0"><span>Contact us</span></button></a>
                      </button>
                  </a>
              </div>
          </div>
          <div class="offcanvas-header">
              <div class="col-lg-2 col-10 me-2">
                  <nav>
                    <a class="navbar-brand" href="/">
                      <img src="{{asset('assets/images/logo.svg')}}" width="200px" height="60px">
                    </a>
                  </nav>
              </div>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
              <ul class="nav d-inline-block">
              <li class="nav-item">
              <a href="{{ route('post_ad') }}" class="post" id="postAdLink"><i class="fa-solid fa-circle-plus me-2"></i>Post Ad</a>
              </li>
              </ul>
              <div class="row">
                  <div class="col-lg-12 col-12 mx-auto">
                      <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                          <div class="s131">
                              <form method="post">
                                  <div class="inner-form">
                                      <div class="input-field second-wrap">
                                          <input type="text" id="default" list="languages" placeholder="Location" class="border-0">
                                          <datalist id="languages">
                                              <option class="text-dark">Lahore</option>
                                              <option class="text-dark">Karachi</option>
                                              <option class="text-dark">Islamabad</option>
                                              <option class="text-dark">Faisalabad</option>
                                              <option class="text-dark">Abbottabad</option>
                                              <option class="text-dark">Ahmadpur East</option>
                                          </datalist>
                                      </div>
                                      <div class="input-field first-wrap">
                                          <input id="search" type="text" placeholder="Find any">
                                      </div>
                                      <div class="input-field third-wrap">
                                          <button class="btn-search" type="button">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                          </button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
</div>
</nav>

