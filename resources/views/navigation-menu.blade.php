<div>
  <style>
      
.modal-backdrop {
    display: none;
}
.badge {
    position: absolute;
    top: 0;
    right: 0;
    transform: translate(50%, -50%);
    font-size: 10px;
}

.fa-envelope {
    color: red;
}

/* .fa-envelope-open:hover{
    color: #fff;
    background-color: #545fb8 !important;
}
.dropdown-item:hover{
    color: #fff;
    height: 40px;
    padding-top:5px ;
    background-color: #545fb8 !important;
} */
.notification-item {
    color: #000; /* Default text color for the item */
    background-color: #fff; /* Default background color for read notifications */
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Unread notifications style */
.notification-item.unread {
    background-color: #545f8b; /* Background for unread notifications */
    color: #fff; /* Text color for unread notifications */
}

/* Hover styles for the li */
.notification-item:hover {
    background-color: #545fb8; /* Hover background color */
    cursor: pointer;
}

/* a tag inside the notification item */
.notification-item a {
    color: #000; /* Default link color */
    text-decoration: none;
    transition: color 0.3s ease;
}

/* Hover effect on li should affect the a tag */
.notification-item:hover a {
    color: #fff; /* Change link color on hover */
}

/* Notification image styles */
.notification-image {
    width: 35px;
    height: 35px;
    border-radius: 100%;
    object-fit: cover;
    background-color: #f0f0f0;
}

/* Notification text size */
.notification-text {
    font-size: 14px;
}

.dropdown-menu {
    max-height: 300px;
    overflow-y: auto;
    width: 100px;
}
	.dropdown-menu-end[data-bs-popper] {
    right: -142px !important;
}
/* Offcanvas custom styles */
.offcanvas-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.suggestion-box {
    padding: 7px;
    font-size: 14px;
    cursor: pointer;
}

.suggestion-box div:hover {
    background-color: #f0f0f0;
}

.btn-search {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 500;
}

.btn-primary, .btn-secondary {
    font-size: 14px;
    padding: 10px;
}

@media (max-width: 768px) {
    .navbar-brand img {
        width: 120px;
        height: auto;
    }

    #citySearchInput, #search {
        font-size: 12px;
    }

    .btn-primary {
        font-size: 12px;
    }
}  
.action {
  position: relative; /* Ensures the dropdown positions relative to the .action container */
}

.action .menu {
  position: absolute;
  top: 50px; /* Adjusted for better alignment */
  right: 0; /* Align dropdown to the right */
  padding: 10px 20px;
  background: #fff;
  width: 220px;
  border: 1px solid #ddd;
  border-radius: 15px;
  transition: 0.5s;
  visibility: hidden;
  opacity: 0;
  z-index: 10; /* Ensure dropdown appears above other elements */
}

.action .menu.active {
  visibility: visible;
  opacity: 1;
  top: 37px; /* Smooth animation for dropdown */
}

.action .profile {
  cursor: pointer;
}
.action .menu h3 {
  text-align: center;
  font-size: 18px;
  margin: 10px 0;
  font-weight: 500;
  color: #555;
}

.action .menu ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.action .menu ul li {
  padding: 10px 0;
  border-top: 1px solid rgba(0, 0, 0, 0.05);
  display: flex;
  align-items: center;
}

.action .menu ul li i {
  margin-right: 10px;
  color: #888;
  transition: 0.3s;
}

.action .menu ul li:hover i {
  color: #545fb8;
}

.action .menu ul li a {
  text-decoration: none;
  color: #555;
  font-weight: 500;
}

.action .menu ul li:hover a {
  color: #545fb8;
}
  </style>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="col-lg-9 col-12 col-md-12 mx-auto " id="main-nav">
            <div class="header-top">
                <div class="inner-header float-end rounded mt-2 d-none d-lg-flex align-items-center justify-content-between">
                    <!-- Check if the user is not authenticated -->
                    @guest
                    <a data-bs-toggle="modal" href="#exampleModalToggle">
                        <button class="border-right bg-transparent">
                            <span><i class="fa fa-circle-user me-2"></i>Login / Register</span>
                        </button>
                    </a>
                    @endguest

                    @auth
                    <div class="action">
                        <div class="profile text-white"  style="font-size:14px !important" onclick="menuToggle();">
                            <i class="fa fa-circle-user me-2 "></i>{{ Auth::user()->name }}
                            <i class="fas fa-chevron-down ms-2 me-1"></i>
                        </div>
                        <div class="menu">
                            <div class="d-flex pb-3">
                                <img src="{{ asset('assets/images/1_avatar.png') }}" alt="User Avatar" width="45" height="45" style="border-radius: 50%;">
                                <div class="text-left mt-2" style="line-height: 1; margin-left:10px">
                                    <span class=" mt-1" style="font-size: 14px; color: #555;">Hello</span>
                                    <p class="mb-2 mt-1 fw-bolder" style="font-size: 16px;color:#333 !important;">{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-gauge"></i>
                                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.index') : route('user.index') }}">
                                      Dashboard
                                    </a>
                                </li>
                                <li>
                                    <i class="fas fa-sign-out-alt"></i>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                      Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                       @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endauth

                    <span style="color:white;">|</span>
                    <a href="{{ url('/contact') }}">
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
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset('assets/images/logo.svg')}}" class="lazyload" width="200px" height="60px">
                        </a>
                    </div>
                    <div class="col-md-7  col-12 ">
                      <div class="s131">
                              <form id="searchForm" action="{{ route('top.search') }}" method="GET">
                                <div class="inner-form">
                                    <div class="input-field" style="position: relative;">
                                        <input type="text" id="citySearchInput" class="form-control border-0" 
                                            placeholder="Select a City" name="location" autocomplete="off" 
                                            value="{{ request('location') }}" style="font-size:14px;">
                                        <i class="fa-solid fa-chevron-down float-end me-1" style="margin-top:-17px"></i>
                                       
                                        <div id="citySuggestions" class="suggestion-box" 
                                            style="display: none; position: absolute; top: 30px; left: 0; right: 0; 
                                            max-height: 200px; overflow-y: auto; border: 1px solid #ced4da; 
                                            background: #fff; z-index: 1000;"></div>
                                    </div>
                                   <div class="input-field first-wrap" id="input_full">
                                        <input id="search" type="text" placeholder="Find Cars, Phone, etc..." name="query" style="font-size:14px;"  value="{{ request('query') }}">
                                        <div id="category-dropdown" class="dropdown-menu w-25 mt-2" style="display: none; border: 1px solid #ccc; max-height: 300px; overflow-y: auto; position: absolute; background: #fff; z-index: 1000;">
                                            <!-- Dynamic content will be inserted here -->
                                        </div>
                                    </div>
                                    <div class="input-field third-wrap rounded" style="background-color:#545f8b; color:white;">
                                        <button class="btn-search" style="color:white;" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="color:white;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                          </div>
                    </div>
                   @php
                      $ad = App\Models\Ad::where('users_id', Auth::id())->first();
                   @endphp
                   
                    @if (Auth::check() && Auth::user()->role === 'user')
                        <div class="dropdown">
                            <a href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bell ms-3 mt-1 rounded-circle p-1 fs-6" style="color:#545f8b; border: 1px solid #545f8b"></i>
                            </a>
                            @if (Auth::user()->unreadNotifications->count() > 0)
                                <span class="badge bg-danger rounded-circle position-absolute" style="top: 0; right: 0; transform: translate(50%, -50%); font-size:10px;">
                                    {{ Auth::user()->unreadNotifications->count() }}
                                </span>
                            @endif

                            <ul class="dropdown-menu dropdown-menu-end mt-2 mx-auto pb-0" aria-labelledby="notificationDropdown" style="width: 280px; max-height: 300px; overflow-y: auto;">
                                <h6 class="text-center pt-2">Notifications</h6>
                                <hr class="p-0 m-0">

                                @foreach (Auth::user()->notifications as $notification)
                                    @php
                                        $adId = $notification->data['ad_id'] ?? null;
                                        $adRoute = $adId ? route('product.detail', ['id' => encrypt($adId)]) : null;
                                    @endphp

                                    <li class="notification-item d-flex align-items-center p-2 {{ $notification->read_at ? 'read' : 'unread' }}" 
                                        data-id="{{ $notification->id }}" style="border-bottom:1px solid #ddd;">
                                        
                                        <!-- Notification image -->
                                        <img src="{{ asset('assets/images/1720135995_Profile-Male-PNG.png') }}" alt="Notification Image" class="notification-image me-2">
                                        
                                        <!-- Notification content -->
                                        <div class="flex-grow-1">
                                            @if ($adRoute)
                                                <a href="{{ $adRoute }}" class="text-decoration-none">
                                                    <span class="notification-text">{{ $notification->data['message'] }}</span><br>
                                                    <p style="font-size:11px !important">{{ $notification->created_at->diffForHumans() }}</p>
                                                </a>
                                            @else
                                                <span class="notification-text">{{ $notification->data['message'] }}</span><br>
                                                <p style="font-size:11px !important">{{ $notification->created_at->diffForHumans() }}</p>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach

                                @if (Auth::user()->notifications->isEmpty())
                                    <li><span class="dropdown-item">No notifications</span></li>
                                @endif
                            </ul>
                        </div>

                    @endif
                    <div class="col-md-2 col-2">
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                @auth
                                    @if (Auth::user()->role !== 'admin')
                                        <a href="{{ url('/post_ad') }}" class="post" id="postAdLink">
                                            <i class="fa-solid fa-circle-plus me-2"></i>
                                            Post Ad
                                        </a>
                                    @endif
                                @else
                                    <a href="javascript:void(0);" class="post disabled-link" id="postAdLink">
                                        <i class="fa-solid fa-circle-plus me-2"></i>Post Ad
                                    </a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </nav>

     <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width:100% !important;height:255px !important; border:1px solid #545fb8;border-radius:16px;">
        <div class="inner-header d-flex me-0 pb-3">
            <div class="col">
				<div id="loginRegisterBtn" class="d-block d-lg-none">
					 @guest
						<a data-bs-toggle="modal" href="#exampleModalToggle" class="btn btn-link text-decoration-none">
							<i class="fa fa-circle-user me-2"></i>Login / Register
						</a>
					@endguest

					@auth
						<div class="dropdown">
							<button class="btn text-decoration-none dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-circle-user me-2"></i>{{ Auth::user()->name }}
							</button>
							<ul class="dropdown-menu" aria-labelledby="userMenu">
								<li>
									<a class="dropdown-item" href="{{ Auth::user()->role === 'admin' ? route('admin.index') : route('user.index') }}">
										Dashboard
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
				</div>
			</div>
            <div class="col">
                <a href="{{ url('/contact') }}" class="d-block d-lg-none">
                    <button class="bg-transparent border-0">
                        <span>Contact us</span>
                    </button>
                </a>
            </div>
			@if (Auth::check() && Auth::user()->role !== 'admin')
                <div class="dropdown float-end ms-auto me-1">
                    <a href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bell ms-3 me-1 rounded-circle p-1 float-end" style="color:#fff; border: 1px solid #fff; font-size:12px;"></i>
                    </a>
                    @if (Auth::user()->unreadNotifications->count() > 0)
                        <span class="badge bg-danger rounded-circle position-absolute" style="top: 0; right: 0; transform: translate(50%, -50%); font-size:10px;">
                            {{ Auth::user()->unreadNotifications->count() }}
                        </span>
                    @endif
                    <ul class="dropdown-menu dropdown-menu-end mt-2 mx-auto pb-0 " aria-labelledby="notificationDropdown" style="width: 280px; max-height: 300px; overflow-y: auto;">
                        <h6 class="text-center pt-2 ">Notification</h6>
                        <hr class="p-0 mt-0 m-0">
                        @foreach (Auth::user()->notifications as $notification)
                            <li class="notification-item d-flex align-items-center p-2  {{ $notification->read_at ? 'read' : 'unread' }}" 
                                data-id="{{ $notification->id }}" style="border-bottom:1px solid #ddd;">
                                <!-- Left side: Notification image/logo -->
                                <img src="{{ asset('assets/images/1720135995_Profile-Male-PNG.png') }}" alt="Notification Image" class="notification-image me-2">
                                <div class="flex-grow-1">
                                    <span class="notification-text">{{ $notification->data['message'] }}</span><br>
                                    <p class="" style="font-size:11px !important">{{ $notification->created_at->diffForHumans() }}</p>
                                </div>
                            </li>
                        @endforeach
                        @if (Auth::user()->notifications->isEmpty())
                            <li><span class="dropdown-item">No notifications</span></li>
                        @endif
                    </ul>
                </div>
            @endif
            @auth
                @if (Auth::user()->role !== 'admin')
                    <a href="{{ url('/post_ad') }}" class="text-light p-1 " style="font-size:13px !important" id="postAdLink">
                        <i class="fa-solid fa-circle-plus me-2"></i>Post Ad
                    </a>
                @endif
            @else
                <a href="javascript:void(0);" class="text-light p-1 " style="font-size:13px !important" id="postAdLink">
                    <i class="fa-solid fa-circle-plus me-2"></i>Post Ad
                </a>
            @endauth
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
           
            <div class="row">
                <div class="col-lg-12 col-12 mx-auto">
                    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                        <div class="s131 p-0">
                            <form id="searchForm" action="{{ route('top.search') }}" method="GET">
                                <div class="inner-form">
                                    <!-- Searchable City Input -->
                                    <div class="input-field" style="position: relative;">
                                        <input type="text" id="citySearchInput" class="form-control border-0" placeholder="Select a City" name="location" autocomplete="off" value="{{ request('location') }}" style="font-size:14px;">
                                        <div id="citySuggestions" class="suggestion-box" style="display: none; position: absolute; top: 30px; left: 0; right: 0; max-height: 200px; overflow-y: auto; border: 1px solid #ced4da; background: #fff; z-index: 1000;"></div>
                                    </div>

                                    <!-- Search Query -->
                                    <div class="input-field first-wrap" id="input_full">
                                        <input id="search" type="text" placeholder="Find Cars, Phone, etc..." name="query" value="{{ request('query') }}" style="font-size:14px;">
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="input-field third-wrap rounded" style="background-color:#545f8b; color:white;">
                                        <button class="btn-search" style="color:white;" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="color:white;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
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

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" id="login_register">
            <div class="modal-content">
                <div class="modal-header border-0 mb-0 pb-0">
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-2 pt-0 mx-auto" style="width:293px !important">
					<a href="{{ route('auth.google') }}" 
					   class="login-with-google-btn form-control d-flex align-items-center justify-content-center mx-auto mb-5 mt-0 box-shadow " 
					   style="font-size:12px; background-color: #ffffff; border-radius: 5px; text-decoration: none; font-weight: 500; border:1px solid #545fb8;color:#757575; width:65% !important">
						 Sign in with Google
					</a>

                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist"
                        style="margin-top: -30px !important;">
                        <li class="nav-item py-2" role="presentation">
                            <a class="nav-link active ms-0 py-2" id="tab-login" data-bs-toggle="pill" href="#pills-login"
                                role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item py-2" role="presentation">
                            <a class="nav-link ms-0 py-2" id="tab-register" data-bs-toggle="pill" href="#pills-register"
                                role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active m-0 p-0" id="pills-login" role="tabpanel"
                            aria-labelledby="tab-login">
							<x-validation-errors class="mb-4 text-danger" />
                            <form method="POST" action="{{ route('login') }}" id="loginForm">
                                @csrf
                                <div class="input-group mb-3">
                                    <x-input id="email" class="form-control" type="email" name="email" placeholder="name@example.com" required />
                                </div>
                                <div class="input-group mb-1">
                                    <x-input id="login_password" class="form-control" type="password" name="password" placeholder="Password" required minlength="8" />
                                    <button type="button" id="toggleLoginPassword" style="border-left: none; background-color:white; color:black;border:1px solid #ced4da">
                                        <i class="fas fa-eye" id="toggleLoginIcon" style="color:#545f8b !important; font-size:12px"></i>
                                    </button>
                                </div>
                                <div class="row mb-2">
                                    <div class="col d-flex justify-content-center">
                                        <div class="form-check d-flex ps-0 pe-2 pt-2" id="login_rig">
                                            <x-checkbox id="remember_me" name="remember" class="form-check-input" />
                                            <label class="form-check-label ms-1" for="remember_me">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col mt-1">
                                        <a href="#!" class="link" style="font-size:12px;float:right; padding-top:3px">Forgot password?</a>
                                    </div>
                                </div>
                                <x-button class="btn sign w-100 mx-auto" style="font-size:14px !important" id="loginButton">
                                    {{ __('Log in') }}
                                </x-button>
                                <div class="text-center">
                                    <p class="mb-1">Not a member? <a id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
                                            aria-controls="pills-register" class="link">Register</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade m-0 p-0" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                            <x-validation-errors class="mb-4 text-danger" />
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="input-group mb-2">
                                    <x-input type="text" name="name" class="form-control shadow-none" placeholder="Name" required />
                                </div>
                                <div class="input-group mb-2">
                                    <x-input type="email" class="form-control shadow-none" name="email" placeholder="Email"
                                    required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
                                </div>
                                <div class="input-group rounded border border-1 mb-2">
                                    <span class="input-group-text border-0 pe-0 bg-transparent"
                                        id="inputGroup-sizing-sm">+92 |</span>
                                    <x-input type="number" class="form-control border-0" name="phone_no" id="phone-no"
                                        required />
                                </div>
                                <div class="input-group mb-2">
                                    <x-input id="register_password" class="form-control shadow-none" type="password" name="password" placeholder="Password" required minlength="8" />
                                    <button type="button" id="toggleRegisterPassword" style="border-left: none; background-color:white; color:black;border:1px solid #ced4da">
                                        <i class="fas fa-eye" id="toggleRegisterIcon" style="color:#545f8b !important; font-size:12px"></i>
                                    </button>
                                </div>
                                <div class="input-group mb-2">
                                    <x-input id="password_confirmation" type="password" class="form-control shadow-none"
                                    name="password_confirmation" placeholder="Confirm Password" required minlength="8"  />
                                    <button type="button" id="toggleconfirmRegister" style="border-left: none; background-color:white; color:black;border:1px solid #ced4da">
                                        <i class="fas fa-eye" id="toggleconfirmRegisterIcon" style="color:#545f8b !important; font-size:12px"></i>
                                    </button>
                                </div>
                                <div class="input-group mb-2 d-none">
                                    <select name="role" class="form-control" id="role">
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <div class="form-check d-flex  mb-2" id="login_rig">
                                    <x-checkbox name="terms" id="terms" class="form-check-input me-2" required />
                                    <label class="form-check-label" for="terms">
                                        I have read and agree to the terms and conditions
                                    </label>
                                </div>
                                <div id="rememberError" class="text-danger mb-2" style="display: none;">
                                    Please check "Terms and conditions check" before Registration .
                                </div>
                                <x-button class="btn sign w-100 mx-auto" id="signupButton">
                                    {{ __('Register') }}
                                </x-button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
 <div class="modal fade" id="cityModal" tabindex="-1" aria-labelledby="cityModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 160px;">
        <div class="modal-content" style="width: 100%; height: 314px; margin-top: 110px; margin-left: -170px;">
            <div class="modal-header" style="padding: 4px;">
                <input type="text" id="citySearch1" class="form-control" placeholder="Search city" style="margin: 0; height:30px">
                <button type="button" class="btn-close" style="font-size: 12px;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 68vh; overflow-y: auto; padding: 3px;">
                <ul id="cityList1" class="list-group w-100" style="overflow-x: hidden; font-size: 12px;">
                    <!-- City list dynamically populated here -->
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModal2" tabindex="-1" aria-labelledby="loginModal2Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
        
      </div>
      <div class="modal-body">
        You need to be logged in to post an ad. Please log in or register.
      </div>
      <div class="modal-footer">
        <button type="button" class="post" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

