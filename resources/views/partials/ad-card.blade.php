<div class="col-6 col-sm-6 col-md-4 col-lg-3">
    <a href="{{ route('product.detail', $ad->id) }}" class="ad-card d-block text-decoration-none h-100">
        <div class="card-img-wrap">
            @php
                $firstImage = null;
                if ($ad->images && $ad->images->count()) {
                    $firstImage = $ad->images->first();
                } elseif ($ad->image_path) {
                    $firstImage = $ad;
                }
            @endphp
            @if($firstImage && isset($firstImage->image_path))
                <img src="{{ asset('uploads/' . $firstImage->image_path) }}"
                     alt="{{ $ad->title }}" loading="lazy">
            @else
                <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                    <i class="bi bi-image text-muted" style="font-size:2rem"></i>
                </div>
            @endif

            @if(isset($badge))
            <span class="card-badge">{{ $badge }}</span>
            @endif
        </div>
        <div class="card-body">
            <div class="card-title">{{ $ad->title }}</div>
            <div class="card-price">
                @if($ad->price && $ad->price > 0)
                    Rs {{ number_format($ad->price) }}
                @else
                    <span class="text-muted fw-normal" style="font-size:.9rem">Contact for price</span>
                @endif
            </div>
            <div class="card-meta">
                @if($ad->city)
                <span><i class="bi bi-geo-alt"></i> {{ $ad->city }}</span>
                @endif
                @if($ad->category_name)
                <span><i class="bi bi-tag"></i> {{ $ad->category_name }}</span>
                @endif
                @if($ad->created_at)
                <span class="ms-auto"><i class="bi bi-clock"></i> {{ $ad->created_at->diffForHumans() }}</span>
                @endif
            </div>
        </div>
    </a>
</div>
