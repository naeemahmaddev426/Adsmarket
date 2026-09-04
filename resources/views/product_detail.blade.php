<x-app-layout>
@section('title', ($ad->title ?? 'Ad Detail') . ' — AdsMarket')
@section('og_title',       $ad->title ?? 'Ad Detail')
@section('og_description', Str::limit($ad->description ?? '', 160))

<div class="breadcrumb-bar">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                @if($ad->category_name)
                <li class="breadcrumb-item">
                    <a href="{{ route('category.search', $ad->category_name) }}">{{ $ad->category_name }}</a>
                </li>
                @endif
                @if($ad->sub_category_name)
                <li class="breadcrumb-item d-none d-md-block text-muted">{{ $ad->sub_category_name }}</li>
                @endif
                <li class="breadcrumb-item active text-truncate" style="max-width:200px">{{ $ad->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-4">
    <div class="row g-4">

        {{-- ── LEFT: Gallery + Details ── --}}
        <div class="col-lg-8">

            {{-- Image Gallery --}}
            <div class="bg-white rounded-3 border overflow-hidden mb-4">
                @if(isset($ad->adsImages) && $ad->adsImages->count())
                <div class="swiper detail-gallery-swiper">
                    <div class="swiper-wrapper">
                        @foreach($ad->adsImages as $img)
                        <div class="swiper-slide">
                            <img src="{{ asset('uploads/' . $img->image_path) }}"
                                 alt="{{ $ad->title }}"
                                 style="width:100%;height:420px;object-fit:contain;background:#f5f7fa">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                {{-- Thumbnails --}}
                @if($ad->adsImages->count() > 1)
                <div class="p-3 d-flex gap-2 overflow-auto">
                    @foreach($ad->adsImages as $idx => $img)
                    <img src="{{ asset('uploads/' . $img->image_path) }}"
                         alt="Thumb {{ $idx + 1 }}"
                         class="thumb-img rounded"
                         style="width:70px;height:55px;object-fit:cover;cursor:pointer;border:2px solid var(--border);flex-shrink:0"
                         onclick="goToSlide({{ $idx }})">
                    @endforeach
                </div>
                @endif
                @else
                <div class="d-flex align-items-center justify-content-center"
                     style="height:300px;background:var(--light-bg)">
                    <i class="bi bi-image text-muted" style="font-size:3rem"></i>
                </div>
                @endif
            </div>

            {{-- Ad Details Card --}}
            <div class="bg-white rounded-3 border p-4 mb-4">

                <div class="d-flex align-items-start justify-content-between mb-2 gap-2">
                    <h1 class="detail-title mb-0" style="font-size:1.4rem">{{ $ad->title }}</h1>
                    @auth
                    <div class="d-flex gap-2 flex-shrink-0">
                        @if(auth()->id() === $ad->user_id)
                        <a href="{{ route('edit_post_attributes', $ad->id) }}" class="btn btn-sm btn-outline-primary-custom">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        @endif
                    </div>
                    @endauth
                </div>

                <div class="detail-price mb-3">
                    @if($ad->price && $ad->price > 0)
                        Rs {{ number_format($ad->price) }}
                    @else
                        <span class="text-muted fs-5 fw-normal">Contact for price</span>
                    @endif
                </div>

                {{-- Meta info --}}
                <div class="row g-0 border rounded-2 overflow-hidden mb-4">
                    @if($ad->category_name)
                    <div class="col-6 col-md-3 p-3 border-end border-bottom">
                        <div class="text-muted small mb-1">Category</div>
                        <div class="fw-semibold small">{{ $ad->category_name }}</div>
                    </div>
                    @endif
                    @if($ad->sub_category_name)
                    <div class="col-6 col-md-3 p-3 border-end border-bottom">
                        <div class="text-muted small mb-1">Sub-Category</div>
                        <div class="fw-semibold small">{{ $ad->sub_category_name }}</div>
                    </div>
                    @endif
                    @if($ad->city)
                    <div class="col-6 col-md-3 p-3 border-end border-bottom">
                        <div class="text-muted small mb-1"><i class="bi bi-geo-alt me-1"></i>Location</div>
                        <div class="fw-semibold small">{{ $ad->city }}@if($ad->area), {{ $ad->area }}@endif</div>
                    </div>
                    @endif
                    @if($ad->condition)
                    <div class="col-6 col-md-3 p-3 border-bottom">
                        <div class="text-muted small mb-1">Condition</div>
                        <div class="fw-semibold small">{{ $ad->condition }}</div>
                    </div>
                    @endif
                    @if($ad->created_at)
                    <div class="col-6 col-md-3 p-3 border-end">
                        <div class="text-muted small mb-1"><i class="bi bi-clock me-1"></i>Posted</div>
                        <div class="fw-semibold small">{{ $ad->created_at->diffForHumans() }}</div>
                    </div>
                    @endif
                    <div class="col-6 col-md-3 p-3 border-end">
                        <div class="text-muted small mb-1">Ad ID</div>
                        <div class="fw-semibold small">#{{ $ad->id }}</div>
                    </div>
                    @if(isset($ad->ad_status))
                    <div class="col-6 col-md-3 p-3">
                        <div class="text-muted small mb-1">Status</div>
                        <span class="{{ $ad->ad_status === 'active' ? 'badge-success-custom' : 'badge-accent' }}">
                            {{ ucfirst($ad->ad_status) }}
                        </span>
                    </div>
                    @endif
                </div>

                {{-- Description --}}
                @if($ad->description)
                <div>
                    <h6 class="fw-bold text-primary-custom mb-2">Description</h6>
                    <div class="text-muted" style="line-height:1.8;font-size:.9rem;white-space:pre-line">{{ $ad->description }}</div>
                </div>
                @endif

                {{-- Extra attributes dynamically --}}
                @if(isset($adAttributes) && count($adAttributes) > 0)
                <div class="mt-4">
                    <h6 class="fw-bold text-primary-custom mb-3">Specifications</h6>
                    <div class="row g-2">
                        @foreach($adAttributes as $key => $value)
                        @if($value)
                        <div class="col-6 col-md-4">
                            <div class="bg-light rounded p-2">
                                <div class="text-muted" style="font-size:.72rem;text-transform:uppercase;letter-spacing:.5px">{{ str_replace('_', ' ', $key) }}</div>
                                <div class="fw-semibold small">{{ $value }}</div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Share --}}
            <div class="bg-white rounded-3 border p-3 mb-4 d-flex align-items-center gap-3 flex-wrap">
                <span class="fw-semibold small text-muted">Share this ad:</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                   target="_blank" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-facebook me-1"></i>Facebook
                </a>
                <a href="https://wa.me/?text={{ urlencode($ad->title . ' - ' . url()->current()) }}"
                   target="_blank" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-whatsapp me-1"></i>WhatsApp
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($ad->title) }}"
                   target="_blank" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-twitter-x me-1"></i>Twitter
                </a>
            </div>
        </div>

        {{-- ── RIGHT: Seller + Related ── --}}
        <div class="col-lg-4">

            {{-- Seller Card --}}
            <div class="seller-card mb-4">
                <h6 class="fw-bold text-primary-custom mb-3">Seller Information</h6>
                @if($ad->user)
                <div class="d-flex align-items-center gap-3 mb-3">
                    @if($ad->user->profile_photo_path)
                    <img src="{{ $ad->user->profile_photo_url }}" class="seller-avatar" alt="{{ $ad->user->name }}">
                    @else
                    <div class="seller-avatar d-flex align-items-center justify-content-center text-white fw-bold"
                         style="background:var(--primary);font-size:1.2rem">
                        {{ strtoupper(substr($ad->user->name, 0, 1)) }}
                    </div>
                    @endif
                    <div>
                        <div class="fw-bold text-dark">{{ $ad->user->name }}</div>
                        <div class="text-muted small">Member since {{ $ad->user->created_at->format('M Y') }}</div>
                    </div>
                </div>
                @endif

                <div class="d-grid gap-2">
                    @if($ad->user?->phone_no)
                    <a href="tel:{{ $ad->user->phone_no }}" class="btn btn-primary-custom fw-bold">
                        <i class="bi bi-telephone me-2"></i>Call Seller
                    </a>
                    <a href="https://wa.me/92{{ ltrim($ad->user->phone_no, '0') }}"
                       target="_blank" class="btn btn-accent fw-bold">
                        <i class="bi bi-whatsapp me-2"></i>WhatsApp
                    </a>
                    @else
                    @auth
                    <button class="btn btn-primary-custom fw-bold" data-bs-toggle="modal" data-bs-target="#contactModal">
                        <i class="bi bi-chat-dots me-2"></i>Contact Seller
                    </button>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary-custom fw-bold">
                        <i class="bi bi-person me-2"></i>Login to Contact
                    </a>
                    @endauth
                    @endif
                </div>

                @if($ad->city)
                <div class="mt-3 pt-3 border-top d-flex align-items-center gap-2 text-muted small">
                    <i class="bi bi-geo-alt-fill" style="color:var(--accent)"></i>
                    <span>{{ $ad->city }}@if($ad->area), {{ $ad->area }}@endif</span>
                </div>
                @endif
            </div>

            {{-- Safety Tips --}}
            <div class="bg-white rounded-3 border p-4 mb-4">
                <h6 class="fw-bold text-primary-custom mb-3">
                    <i class="bi bi-shield-check me-2 text-success"></i>Safety Tips
                </h6>
                <ul class="list-unstyled mb-0">
                    @foreach(['Meet in a safe, public place','Inspect the item before buying','Do not pay in advance','Verify seller identity'] as $tip)
                    <li class="d-flex align-items-start gap-2 mb-2">
                        <i class="bi bi-check-circle-fill mt-1 flex-shrink-0" style="color:var(--success);font-size:.8rem"></i>
                        <span class="small text-muted">{{ $tip }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Related Ads --}}
            @isset($relatedAds)
            @if(count($relatedAds))
            <div>
                <h6 class="fw-bold text-primary-custom mb-3">Related Ads</h6>
                <div class="d-flex flex-column gap-3">
                    @foreach($relatedAds->take(4) as $relAd)
                    <a href="{{ route('product.detail', $relAd->id) }}" class="bg-white border rounded-3 p-2 d-flex gap-3 text-decoration-none ad-card">
                        @if($relAd->adsImages?->first())
                        <img src="{{ asset('uploads/' . $relAd->adsImages->first()->image_path) }}"
                             alt="{{ $relAd->title }}"
                             style="width:70px;height:60px;object-fit:cover;border-radius:8px;flex-shrink:0">
                        @else
                        <div class="d-flex align-items-center justify-content-center rounded"
                             style="width:70px;height:60px;background:var(--light-bg);flex-shrink:0">
                            <i class="bi bi-image text-muted"></i>
                        </div>
                        @endif
                        <div class="overflow-hidden">
                            <div class="fw-semibold small text-dark text-truncate">{{ $relAd->title }}</div>
                            <div class="small fw-bold" style="color:var(--accent)">
                                {{ $relAd->price ? 'Rs ' . number_format($relAd->price) : 'Contact' }}
                            </div>
                            <div class="text-muted" style="font-size:.72rem">{{ $relAd->city }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
            @endisset
        </div>
    </div>
</div>

{{-- Contact Modal --}}
<div class="modal fade" id="contactModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-3 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h6 class="modal-title fw-bold">Contact Seller</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted small">Send a message about: <strong>{{ $ad->title }}</strong></p>
                <form>
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Write your message…"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary-custom w-100 fw-bold">
                        <i class="bi bi-send me-2"></i>Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
var detailSwiper = new Swiper('.detail-gallery-swiper', {
    loop: {{ isset($ad->adsImages) && $ad->adsImages->count() > 1 ? 'true' : 'false' }},
    pagination: { el: '.swiper-pagination', clickable: true },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    zoom: true,
});

function goToSlide(index) {
    if (detailSwiper) detailSwiper.slideTo(index);
    // Highlight active thumb
    document.querySelectorAll('.thumb-img').forEach((el, i) => {
        el.style.borderColor = i === index ? 'var(--accent)' : 'var(--border)';
    });
}
</script>
@endpush

</x-app-layout>
