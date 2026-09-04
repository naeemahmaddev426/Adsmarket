<x-app-layout>
@section('title', 'Search Results — AdsMarket')

{{-- Breadcrumb --}}
<div class="breadcrumb-bar">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                @if(request('category'))
                <li class="breadcrumb-item"><a href="{{ route('category.search', request('category')) }}">{{ request('category') }}</a></li>
                @endif
                <li class="breadcrumb-item active">Search Results</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-4">
    <div class="row g-4">

        {{-- ── FILTER SIDEBAR ── --}}
        <div class="col-lg-3 d-none d-lg-block">
            <div class="filter-sidebar">
                <form action="{{ route('top.search') }}" method="GET" id="filterForm">

                    <div class="filter-heading">
                        <i class="bi bi-funnel me-2"></i>Filters
                    </div>

                    {{-- Search --}}
                    <div class="mb-3">
                        <label class="form-label">Keyword</label>
                        <input type="text" name="q" class="form-control form-control-sm"
                               value="{{ request('q') }}" placeholder="What are you looking for?">
                    </div>

                    {{-- Category --}}
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            @isset($categories)
                                @foreach($categories as $cat)
                                <option value="{{ $cat->category_name }}"
                                    {{ request('category') == $cat->category_name ? 'selected' : '' }}>
                                    {{ $cat->category_name }}
                                </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    {{-- Location --}}
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" name="city" class="form-control form-control-sm"
                               value="{{ request('city') }}" placeholder="e.g. Karachi">
                    </div>

                    {{-- Price Range --}}
                    <div class="mb-3">
                        <label class="form-label">Price Range (Rs)</label>
                        <div class="d-flex gap-2">
                            <input type="number" name="min_price" class="form-control form-control-sm"
                                   value="{{ request('min_price') }}" placeholder="Min">
                            <input type="number" name="max_price" class="form-control form-control-sm"
                                   value="{{ request('max_price') }}" placeholder="Max">
                        </div>
                    </div>

                    {{-- Condition --}}
                    <div class="mb-4">
                        <label class="form-label">Condition</label>
                        @foreach(['New', 'Used', 'Open Box'] as $cond)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="condition[]"
                                   id="cond_{{ $cond }}" value="{{ $cond }}"
                                   {{ in_array($cond, request('condition', [])) ? 'checked' : '' }}>
                            <label class="form-check-label small" for="cond_{{ $cond }}">{{ $cond }}</label>
                        </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary-custom w-100 btn-sm fw-bold">
                        <i class="bi bi-search me-1"></i>Apply Filters
                    </button>

                    @if(request()->hasAny(['q','category','city','min_price','max_price','condition']))
                    <a href="{{ route('top.search') }}" class="btn btn-outline-secondary w-100 btn-sm mt-2">
                        <i class="bi bi-x-circle me-1"></i>Clear Filters
                    </a>
                    @endif
                </form>
            </div>
        </div>

        {{-- ── RESULTS ── --}}
        <div class="col-lg-9">

            {{-- Results header --}}
            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                <div>
                    @if(request('q'))
                    <h5 class="mb-0 fw-bold text-primary-custom">
                        Results for "<span class="text-accent">{{ request('q') }}</span>"
                    </h5>
                    @elseif(request('category'))
                    <h5 class="mb-0 fw-bold text-primary-custom">{{ request('category') }}</h5>
                    @else
                    <h5 class="mb-0 fw-bold text-primary-custom">All Ads</h5>
                    @endif

                    @isset($ads)
                    <span class="text-muted small">{{ $ads->total() ?? count($ads) }} ads found</span>
                    @endisset
                </div>

                {{-- Sort --}}
                <div class="d-flex align-items-center gap-2">
                    <span class="small text-muted">Sort:</span>
                    <select class="form-select form-select-sm" style="width:auto" onchange="sortAds(this.value)">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price ↑</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price ↓</option>
                    </select>
                </div>
            </div>

            {{-- Mobile filter toggle --}}
            <div class="d-lg-none mb-3">
                <button class="btn btn-outline-primary-custom btn-sm" data-bs-toggle="offcanvas" data-bs-target="#mobileFilters">
                    <i class="bi bi-funnel me-1"></i>Filters
                </button>
            </div>

            {{-- Ad Cards Grid --}}
            <div class="row g-3">
                @isset($ads)
                    @forelse($ads as $ad)
                        @if($ad->ad_status === 'active')
                        @include('partials.ad-card', ['ad' => $ad])
                        @endif
                    @empty
                    <div class="col-12">
                        <div class="text-center py-5 bg-white rounded-3 border">
                            <i class="bi bi-search display-4 text-muted mb-3 d-block"></i>
                            <h5 class="text-muted">No ads found</h5>
                            <p class="text-muted small">Try different keywords or remove filters</p>
                            <a href="{{ route('post_ad') }}" class="btn btn-accent mt-2">
                                <i class="bi bi-plus me-1"></i>Post an Ad
                            </a>
                        </div>
                    </div>
                    @endforelse
                @endisset
            </div>

            {{-- Pagination --}}
            @isset($ads)
            @if(method_exists($ads, 'links'))
            <div class="d-flex justify-content-center mt-5">
                {{ $ads->appends(request()->query())->links() }}
            </div>
            @endif
            @endisset
        </div>
    </div>
</div>

{{-- Mobile Filter Offcanvas --}}
<div class="offcanvas offcanvas-start" id="mobileFilters">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title fw-bold"><i class="bi bi-funnel me-2"></i>Filters</h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('top.search') }}" method="GET">
            <div class="mb-3">
                <label class="form-label">Keyword</label>
                <input type="text" name="q" class="form-control" value="{{ request('q') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    @isset($categories)
                        @foreach($categories as $cat)
                        <option value="{{ $cat->category_name }}" {{ request('category') == $cat->category_name ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" value="{{ request('city') }}">
            </div>
            <button type="submit" class="btn btn-primary-custom w-100 fw-bold">Apply Filters</button>
            <a href="{{ route('top.search') }}" class="btn btn-outline-secondary w-100 mt-2">Clear</a>
        </form>
    </div>
</div>

@push('scripts')
<script>
function sortAds(value) {
    const url = new URL(window.location.href);
    url.searchParams.set('sort', value);
    window.location.href = url.toString();
}
</script>
@endpush

</x-app-layout>
