<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — {{ config('app.name', 'AdsMarket') }}</title>

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

    <!-- AdsMarket Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/adsmarket.css') }}">

    @livewireStyles
    @stack('styles')

    <style>
        body { font-family: 'Inter', sans-serif; }

        /* Sidebar toggle for mobile */
        .admin-sidebar { transform: translateX(0); }
        @media(max-width:991.98px) {
            .admin-sidebar { transform: translateX(-100%); position: fixed; width: 260px !important; }
            .admin-sidebar.open { transform: translateX(0); }
            .admin-content { margin-left: 0 !important; }
        }
    </style>
</head>
<body class="bg-light">

    {{-- ═══ ADMIN SIDEBAR ═══ --}}
    <aside class="admin-sidebar" id="adminSidebar">
        <a href="{{ route('admin.index') }}" class="sidebar-brand d-flex align-items-center gap-2">
            <i class="bi bi-lightning-charge-fill text-warning"></i>
            Ads<span>Market</span>
        </a>

        <div class="py-2 overflow-auto flex-grow-1" style="max-height:calc(100vh - 70px)">
            <div class="nav-section-title">Main</div>
            <nav class="nav flex-column">
                <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <a class="nav-link {{ request()->routeIs('admin.user_data') ? 'active' : '' }}" href="{{ route('admin.user_data') }}">
                    <i class="bi bi-people"></i> Users
                </a>
            </nav>

            <div class="nav-section-title mt-2">Ads Management</div>
            <nav class="nav flex-column">
                <a class="nav-link {{ request()->routeIs('admin.user_ads') ? 'active' : '' }}" href="{{ route('admin.user_ads') }}">
                    <i class="bi bi-megaphone"></i> All Ads
                </a>
                <a class="nav-link {{ request()->routeIs('admin.adscategory') ? 'active' : '' }}" href="{{ route('admin.adscategory') }}">
                    <i class="bi bi-grid-3x3-gap"></i> Categories
                </a>
                <a class="nav-link {{ request()->routeIs('admin.adssubcategory') ? 'active' : '' }}" href="{{ route('admin.adssubcategory') }}">
                    <i class="bi bi-diagram-3"></i> Sub-Categories
                </a>
                <a class="nav-link {{ request()->routeIs('admin.adsubscategorytype') ? 'active' : '' }}" href="{{ route('admin.adsubscategorytype') }}">
                    <i class="bi bi-tags"></i> Sub-Category Types
                </a>
            </nav>

            <div class="nav-section-title mt-2">Ad Listings</div>
            <nav class="nav flex-column">
                <a class="nav-link {{ request()->routeIs('admin.category.mobiles') ? 'active' : '' }}" href="{{ route('admin.category.mobiles') }}">
                    <i class="bi bi-phone"></i> Mobiles
                </a>
                <a class="nav-link {{ request()->routeIs('admin.category.vehicles') ? 'active' : '' }}" href="{{ route('admin.category.vehicles') }}">
                    <i class="bi bi-car-front"></i> Vehicles
                </a>
                <a class="nav-link {{ request()->routeIs('admin.category.bikes') ? 'active' : '' }}" href="{{ route('admin.category.bikes') }}">
                    <i class="bi bi-bicycle"></i> Bikes
                </a>
                <a class="nav-link {{ request()->routeIs('admin.category.property_sale') ? 'active' : '' }}" href="{{ route('admin.category.property_sale') }}">
                    <i class="bi bi-building"></i> Property Sale
                </a>
                <a class="nav-link {{ request()->routeIs('admin.category.property_rent') ? 'active' : '' }}" href="{{ route('admin.category.property_rent') }}">
                    <i class="bi bi-house-door"></i> Property Rent
                </a>
                <a class="nav-link {{ request()->routeIs('admin.category.furniture') ? 'active' : '' }}" href="{{ route('admin.category.furniture') }}">
                    <i class="bi bi-lamp"></i> Furniture
                </a>
                <a class="nav-link {{ request()->routeIs('admin.category.fashion') ? 'active' : '' }}" href="{{ route('admin.category.fashion') }}">
                    <i class="bi bi-bag"></i> Fashion
                </a>
            </nav>

            <div class="nav-section-title mt-2">Banners</div>
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('admin.home_banner') }}">
                    <i class="bi bi-image"></i> Home Banner
                </a>
                <a class="nav-link" href="{{ route('admin.product_banner') }}">
                    <i class="bi bi-images"></i> Product Banner
                </a>
                <a class="nav-link" href="{{ route('admin.contact_banner') }}">
                    <i class="bi bi-envelope-paper"></i> Contact Banner
                </a>
            </nav>

            <div class="nav-section-title mt-2">System</div>
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('admin.admin_profile') }}">
                    <i class="bi bi-person-gear"></i> Profile
                </a>
                <a class="nav-link" href="{{ route('index') }}" target="_blank">
                    <i class="bi bi-box-arrow-up-right"></i> View Site
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link border-0 w-100 text-start" style="background:none">
                        <i class="bi bi-box-arrow-left"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
    </aside>

    {{-- ═══ ADMIN CONTENT AREA ═══ --}}
    <div class="admin-content">

        {{-- Topbar --}}
        <div class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm d-lg-none" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
            </div>
            <div class="d-flex align-items-center gap-3">
                {{-- Notifications --}}
                @if(auth()->user() && method_exists(auth()->user(), 'unreadNotifications'))
                <div class="dropdown">
                    <a href="#" class="position-relative text-secondary" data-bs-toggle="dropdown">
                        <i class="bi bi-bell fs-5"></i>
                        @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                              style="background:var(--accent);font-size:.65rem">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow" style="width:320px">
                        <div class="px-3 py-2 border-bottom fw-bold small">Notifications</div>
                        @forelse(auth()->user()->unreadNotifications->take(5) as $note)
                        <a href="#" class="dropdown-item notification-item unread py-2" data-id="{{ $note->id }}">
                            <div class="small fw-semibold text-dark">{{ $note->data['message'] ?? 'New notification' }}</div>
                            <div class="text-muted" style="font-size:.75rem">{{ $note->created_at->diffForHumans() }}</div>
                        </a>
                        @empty
                        <div class="text-center text-muted py-3 small">No new notifications</div>
                        @endforelse
                    </div>
                </div>
                @endif

                {{-- Admin user --}}
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center gap-2 text-decoration-none" data-bs-toggle="dropdown">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                             style="width:36px;height:36px;background:var(--accent);font-size:.9rem">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="d-none d-md-block">
                            <div class="fw-semibold" style="font-size:.85rem;line-height:1.2">{{ auth()->user()->name ?? 'Admin' }}</div>
                            <div class="text-muted" style="font-size:.72rem">Administrator</div>
                        </div>
                        <i class="bi bi-chevron-down small text-muted"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('admin.admin_profile') }}"><i class="bi bi-person me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('index') }}" target="_blank"><i class="bi bi-globe me-2"></i>View Site</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Flash Messages --}}
        <div class="px-4 pt-3">
            @if(session('success'))
            <div class="alert alert-success-custom d-flex align-items-center gap-2" role="alert">
                <i class="bi bi-check-circle-fill"></i>
                <span>{{ session('success') }}</span>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger-custom d-flex align-items-center gap-2" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <span>{{ session('error') }}</span>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
            @endif
        </div>

        {{-- Page Content --}}
        <div class="p-4">
            {{ $slot }}
        </div>
    </div>

    @stack('modals')

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @livewireScripts
    @stack('scripts')

    <script>
        // Mobile sidebar toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const adminSidebar  = document.getElementById('adminSidebar');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => adminSidebar.classList.toggle('open'));
        }

        // Auto-dismiss alerts
        setTimeout(() => {
            document.querySelectorAll('.alert[role="alert"]').forEach(el => {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(el);
                bsAlert.close();
            });
        }, 5000);

        // Mark notifications as read
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.notification-item.unread').forEach(item => {
                item.addEventListener('click', async (e) => {
                    e.preventDefault();
                    const id = item.dataset.id;
                    try {
                        const res = await fetch(`/notifications/mark-read/${id}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            }
                        });
                        if (res.ok) {
                            item.classList.remove('unread');
                            item.classList.add('read');
                            const badge = document.querySelector('.badge');
                            if (badge) {
                                const c = parseInt(badge.textContent) - 1;
                                c > 0 ? badge.textContent = c : badge.remove();
                            }
                        }
                    } catch(err) { console.error(err); }
                });
            });
        });
    </script>
</body>
</html>
