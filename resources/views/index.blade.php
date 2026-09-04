<x-app-layout>
@section('title', 'AdsMarket — Buy & Sell Anything in Pakistan')
@section('meta_description', 'Find cars, mobiles, property, electronics and more on AdsMarket. Pakistan\'s trusted free classified ads platform.')

{{-- ═══════════════════════ HERO SECTION ═══════════════════════ --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <h1 class="mb-3">Find the Best <span style="color:var(--accent)">Deals</span> Near You</h1>
                <p class="mb-4">Buy, sell, and discover thousands of ads across Pakistan. Mobiles, cars, property, and more — all in one place.</p>

                {{-- Hero Search Box --}}
                <form class="hero-search-box" action="{{ route('top.search') }}" method="GET">
                    <input type="search" class="form-control flex-grow-1" name="q"
                           placeholder="Search for anything…" value="{{ request('q') }}">
                    <select class="form-select" name="category" style="max-width:160px">
                        <option value="">All Categories</option>
                        @isset($categories)
                            @foreach($categories as $cat)
                            <option value="{{ $cat->category_name }}" {{ request('category') == $cat->category_name ? 'selected' : '' }}>
                                {{ $cat->category_name }}
                            </option>
                            @endforeach
                        @endisset
                    </select>
                    <button type="submit">
                        <i class="bi bi-search me-1"></i>Search
                    </button>
                </form>

                {{-- Quick stats --}}
                <div class="d-flex gap-4 mt-4">
                    <div class="text-white">
                        <div class="fw-800" style="font-size:1.4rem;font-weight:800">50K+</div>
                        <div class="small" style="opacity:.75">Active Ads</div>
                    </div>
                    <div class="text-white">
                        <div class="fw-800" style="font-size:1.4rem;font-weight:800">20K+</div>
                        <div class="small" style="opacity:.75">Happy Users</div>
                    </div>
                    <div class="text-white">
                        <div class="fw-800" style="font-size:1.4rem;font-weight:800">100+</div>
                        <div class="small" style="opacity:.75">Cities</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-flex justify-content-end">
                <img src="{{ asset('assets/images/hero-illustration.svg') }}" alt="Ads Market" style="max-height:320px;filter:drop-shadow(0 20px 40px rgba(0,0,0,.25))" onerror="this.style.display='none'">
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════ BANNER SWIPER ═══════════════════════ --}}
{{-- @isset($homeBanners)
@if($homeBanners->count())
<div class="container mt-4">
    <div class="swiper home-banner-swiper rounded-3 overflow-hidden shadow-sm">
        <div class="swiper-wrapper">
            @foreach($homeBanners as $banner)
            <div class="swiper-slide">
                <img src="{{ asset('assets/images/' . $banner->path) }}" alt="Banner"
                     style="width:100%;height:220px;object-fit:cover">
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next" style="color:var(--accent)"></div>
        <div class="swiper-button-prev" style="color:var(--accent)"></div>
    </div>
</div>
@endif
@endisset --}}

<div class="container py-5">

    {{-- ═══════════════════════ CATEGORIES ═══════════════════════ --}}
    <div class="section-heading">
        <h2><i class="bi bi-grid me-2 text-accent"></i>Browse Categories</h2>
        <a href="{{ route('index') }}">View all <i class="bi bi-arrow-right"></i></a>
    </div>
    <div class="row g-3 mb-5">
        @php
        $defaultCats = [
            ['name'=>'Vehicles',    'icon'=>'bi-car-front',     'color'=>'#1a3c5e', 'slug'=>'vehicles'],
            ['name'=>'Property',    'icon'=>'bi-building',      'color'=>'#2d8bba', 'slug'=>'property'],
            ['name'=>'Mobiles',     'icon'=>'bi-phone',         'color'=>'#f4810f', 'slug'=>'mobiles'],
            ['name'=>'Electronics', 'icon'=>'bi-laptop',        'color'=>'#38a169', 'slug'=>'electronics'],
            ['name'=>'Bikes',       'icon'=>'bi-bicycle',       'color'=>'#805ad5', 'slug'=>'bikes'],
            ['name'=>'Furniture',   'icon'=>'bi-lamp',          'color'=>'#d69e2e', 'slug'=>'furniture'],
            ['name'=>'Fashion',     'icon'=>'bi-bag',           'color'=>'#e53e3e', 'slug'=>'fashion'],
            ['name'=>'Services',    'icon'=>'bi-tools',         'color'=>'#2d8bba', 'slug'=>'services'],
        ];
        @endphp
        @isset($categories)
            @foreach($categories->take(8) as $cat)
            <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                <a href="{{ route('category.search', $cat->category_name) }}" class="cat-card">
                    <div class="cat-icon">
                        @if($cat->image_path)
                        <img src="{{ asset('assets/images/' . $cat->image_path) }}" alt="{{ $cat->category_name }}" style="width:32px;height:32px;object-fit:contain">
                        @else
                        <i class="bi bi-tag fs-4" style="color:var(--primary)"></i>
                        @endif
                    </div>
                    <div class="cat-name">{{ $cat->category_name }}</div>
                    @if(isset($cat->ads_count))
                    <div class="cat-count">{{ number_format($cat->ads_count) }} ads</div>
                    @endif
                </a>
            </div>
            @endforeach
        @else
            @foreach($defaultCats as $cat)
            <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                <a href="{{ route('category.search', $cat['slug']) }}" class="cat-card">
                    <div class="cat-icon">
                        <i class="bi {{ $cat['icon'] }} fs-4" style="color:{{ $cat['color'] }}"></i>
                    </div>
                    <div class="cat-name">{{ $cat['name'] }}</div>
                </a>
            </div>
            @endforeach
        @endisset
    </div>

    {{-- ═══════════════════════ FEATURED ADS ═══════════════════════ --}}
    @isset($featuredAds)
    @if($featuredAds->count())
    <div class="section-heading">
        <h2><i class="bi bi-star me-2 text-accent"></i>Featured Ads</h2>
        <a href="{{ route('top.search') }}">See all <i class="bi bi-arrow-right"></i></a>
    </div>
    <div class="row g-3 mb-5">
        @foreach($featuredAds->take(8) as $ad)
        @include('partials.ad-card', ['ad' => $ad, 'badge' => 'Featured'])
        @endforeach
    </div>
    @endif
    @endisset

    {{-- ═══════════════════════ LATEST ADS ═══════════════════════ --}}
    @isset($ads)
    <div class="section-heading">
        <h2><i class="bi bi-lightning me-2 text-accent"></i>Latest Ads</h2>
        <a href="{{ route('top.search') }}">See all <i class="bi bi-arrow-right"></i></a>
    </div>
    <div class="row g-3 mb-5">
        @forelse($ads->where('ad_status', 'active')->take(12) as $ad)
        @include('partials.ad-card', ['ad' => $ad])
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="bi bi-megaphone display-4 text-muted"></i>
                <p class="text-muted mt-3">No ads found. <a href="{{ route('post_ad') }}">Post the first one!</a></p>
            </div>
        </div>
        @endforelse
    </div>
    @endisset

    {{-- ═══════════════════════ CTA BANNER ═══════════════════════ --}}
    <div class="rounded-4 p-5 text-center text-white mb-2" style="background:linear-gradient(135deg,var(--primary) 0%,var(--secondary) 100%)">
        <h2 class="fw-800 mb-2" style="font-weight:800">Ready to sell something?</h2>
        <p class="mb-4" style="opacity:.85">Post your free ad in just 2 minutes and reach thousands of buyers.</p>
        <a href="{{ auth()->check() ? route('post_ad') : route('login') }}" class="btn btn-accent btn-lg px-5 fw-bold">
            <i class="bi bi-plus-lg me-2"></i>Post Free Ad Now
        </a>
    </div>

</div>

@push('scripts')
<script>
    // Home Banner Swiper
    new Swiper('.home-banner-swiper', {
        loop: true,
        autoplay: { delay: 4000, disableOnInteraction: false },
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    });
</script>
@endpush

</x-app-layout>
