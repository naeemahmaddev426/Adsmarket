<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'AdsMarket'))</title>

    <!-- SEO -->
    <meta name="description" content="@yield('meta_description', 'AdsMarket — Buy and sell anything. Pakistan\'s trusted classified ads platform.')">
    <meta property="og:title"       content="@yield('og_title',       config('app.name'))" />
    <meta property="og:description" content="@yield('og_description', 'Pakistan\'s trusted classified ads platform')" />
    <meta property="og:image"       content="@yield('og_image',       asset('assets/images/og-banner.jpg'))" />
    <meta property="og:url"         content="{{ url()->current() }}" />
    <meta property="og:type"        content="website" />
    <meta name="twitter:card"       content="summary_large_image" />

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/logo.svg') }}">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- AdsMarket Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/adsmarket.css') }}">

    @livewireStyles
    @stack('styles')
</head>
<body>

    {{-- Flash / Banner Notifications --}}
    @if(session('success'))
    <div class="alert alert-success-custom d-flex align-items-center gap-2 m-0 rounded-0" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close btn-close-sm ms-auto" data-bs-dismiss="alert"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger-custom d-flex align-items-center gap-2 m-0 rounded-0" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <span>{{ session('error') }}</span>
        <button type="button" class="btn-close btn-close-sm ms-auto" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- ═══ NAVBAR ═══ --}}
    <nav class="navbar navbar-expand-lg navbar-main">
        <div class="container">
            {{-- Brand --}}
            <a class="navbar-brand" href="{{ route('index') }}">
                Ads<span>Market</span>
            </a>

            {{-- Mobile Toggle --}}
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <i class="bi bi-list text-white fs-4"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                {{-- Search --}}
                <form class="d-flex mx-auto navbar-search my-2 my-lg-0" style="width:340px" action="{{ route('top.search') }}" method="GET">
                    <input class="form-control" type="search" name="q" placeholder="Search ads…" value="{{ request('q') }}">
                    <button class="btn" type="submit"><i class="bi bi-search"></i></button>
                </form>

                {{-- Nav Links --}}
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">
                            <i class="bi bi-house me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-grid me-1"></i>Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('category.search', 'vehicles') }}"><i class="bi bi-car-front me-2 text-accent"></i>Vehicles</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.search', 'property') }}"><i class="bi bi-building me-2 text-accent"></i>Property</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.search', 'mobiles') }}"><i class="bi bi-phone me-2 text-accent"></i>Mobiles</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.search', 'electronics') }}"><i class="bi bi-laptop me-2 text-accent"></i>Electronics</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.search', 'bikes') }}"><i class="bi bi-bicycle me-2 text-accent"></i>Bikes</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.search', 'furniture') }}"><i class="bi bi-lamp me-2 text-accent"></i>Furniture</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.search', 'fashion') }}"><i class="bi bi-bag me-2 text-accent"></i>Fashion</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item fw-semibold" href="{{ route('index') }}"><i class="bi bi-grid-3x3-gap me-2"></i>All Categories</a></li>
                        </ul>
                    </li>

                    @auth
                        {{-- User Menu --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
                                @if(Auth::user()->profile_photo_path)
                                    <img src="{{ Auth::user()->profile_photo_url }}" class="rounded-circle" width="28" height="28" style="object-fit:cover" alt="">
                                @else
                                    <i class="bi bi-person-circle fs-5"></i>
                                @endif
                                {{ Str::limit(Auth::user()->name, 14) }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="px-3 py-2 border-bottom">
                                    <div class="fw-bold text-dark small">{{ Auth::user()->name }}</div>
                                    <div class="text-muted" style="font-size:.75rem">{{ Auth::user()->email }}</div>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="bi bi-person me-2"></i>My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('recently.viewed') }}"><i class="bi bi-clock-history me-2"></i>Recently Viewed</a></li>
                                @if(Auth::user()->role === 'admin')
                                <li><a class="dropdown-item text-primary-custom fw-semibold" href="{{ route('admin.index') }}"><i class="bi bi-shield-check me-2"></i>Admin Panel</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person me-1"></i>Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth

                    {{-- Post Ad CTA --}}
                    <li class="nav-item ms-lg-1">
                        <a class="nav-link btn-post-ad" href="{{ auth()->check() ? route('post_ad') : route('login') }}">
                            <i class="bi bi-plus-lg me-1"></i>Post Free Ad
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ═══ PAGE CONTENT ═══ --}}
    <main>
        {{ $slot }}
    </main>

    @stack('modals')

    {{-- ═══ FOOTER ═══ --}}
    <footer class="site-footer">
        <div class="container">
            <div class="row g-4">
                {{-- Brand --}}
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand">Ads<span>Market</span></div>
                    <p style="font-size:.875rem;opacity:.7;line-height:1.7">
                        Pakistan's trusted classified ads platform. Buy, sell, and explore thousands of listings in your city.
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="d-flex align-items-center justify-content-center rounded-circle text-white" style="width:36px;height:36px;background:rgba(255,255,255,.1)"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="d-flex align-items-center justify-content-center rounded-circle text-white" style="width:36px;height:36px;background:rgba(255,255,255,.1)"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="d-flex align-items-center justify-content-center rounded-circle text-white" style="width:36px;height:36px;background:rgba(255,255,255,.1)"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="d-flex align-items-center justify-content-center rounded-circle text-white" style="width:36px;height:36px;background:rgba(255,255,255,.1)"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                {{-- Popular Categories --}}
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Categories</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('category.search', 'vehicles') }}">Vehicles</a></li>
                        <li><a href="{{ route('category.search', 'property') }}">Property</a></li>
                        <li><a href="{{ route('category.search', 'mobiles') }}">Mobiles</a></li>
                        <li><a href="{{ route('category.search', 'electronics') }}">Electronics</a></li>
                        <li><a href="{{ route('category.search', 'furniture') }}">Furniture</a></li>
                    </ul>
                </div>

                {{-- Quick Links --}}
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        @auth
                        <li><a href="{{ route('profile.show') }}">My Profile</a></li>
                        @endauth
                        <li><a href="{{ route('post_ad') }}">Post Free Ad</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('recently.viewed') }}">Recently Viewed</a></li>
                    </ul>
                </div>

                {{-- Help --}}
                <div class="col-lg-4 col-md-6">
                    <h5>Help & Support</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('term_services') }}">Terms of Service</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('contact') }}">Contact Support</a></li>
                    </ul>
                    <div class="mt-3 p-3 rounded-3" style="background:rgba(255,255,255,.06)">
                        <div class="small fw-bold text-white mb-1"><i class="bi bi-headset me-2 text-accent"></i>Need Help?</div>
                        <a href="{{ route('contact') }}" class="btn btn-sm btn-accent mt-1">Contact Us</a>
                    </div>
                </div>
            </div>

            <hr class="footer-divider">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <p class="footer-bottom mb-0">&copy; {{ date('Y') }} AdsMarket. All rights reserved.</p>
                <p class="footer-bottom mb-0">Built with ❤️ in Pakistan</p>
            </div>
        </div>
    </footer>

    {{-- ═══ SCRIPTS ═══ --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @livewireScripts
    @stack('scripts')

    <script>
        // Auto-dismiss alerts after 5s
        setTimeout(() => {
            document.querySelectorAll('.alert[role="alert"]').forEach(el => {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(el);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>
