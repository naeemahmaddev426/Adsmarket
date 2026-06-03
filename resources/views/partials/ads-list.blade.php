<div class="tab-content ps-4 mt-0 pt-0 border bg-light border-0" id="nav-tabContent" style="background-color: #fff !important;">
    <div class="tab-pane fade active show" id="nav-job" role="tabpanel" aria-labelledby="nav-job-tab">
        <div class="row">
            @foreach($ads as $index => $ad)
                @if(
                    $ad->ad_status == 'active' &&  // Only show ads with active status
                    (empty($category_name) || $ad->category_name == $category_name) &&
                    (empty($sub_category_name) || $ad->sub_category_name == $sub_category_name) &&
                    (empty($sub_category_name_type) || $ad->sub_category_name_type == $sub_category_name_type)
                    )
                    @if($ad->images->isNotEmpty())
                        <div class="col-lg-4 col-md-4 col-sm-12 mb-1 ad-item2 p-1" 
                            style="display: {{ $index < 22 ? 'block' : 'none' }};">
                            @if(Auth::check())
                                @if(Auth::user()->id == $ad->users_id)
                                    <a href="{{ route('product.detail', ['id' => encrypt($ad->id)]) }}" 
                                        id="ad-click" 
                                        data-ad-id="{{ $ad->id }}" 
                                        data-user-id="{{ Auth::user()->id }}" 
                                        style="text-decoration: none; color: inherit;">
                                @else
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('ad-view-form-{{ $ad->id }}').submit();" 
                                        style="text-decoration: none; color: inherit;">
                                @endif
                            @else
                                <a href="{{ route('product.detail', ['id' => encrypt($ad->id)]) }}" 
                                    style="text-decoration: none; color: inherit;">
                            @endif
                                <div class="card h-100" id="gallery-card" style="box-shadow:none !important; border: 1px solid #ddd;">
                                    <x-lazy-image 
                                        src="{{ asset($ad->images->first()->image_path ?? 'default_image_path.jpg') }}" 
                                        alt="Ad Image" 
                                        class="card-img-top border-bottom p-1 lazyload w-100" 
                                        style="height:160px !important ; border-top:none; border-left:none;border-right:none;" />
                                    <div class="card-body d-flex flex-column" style="height:100%;">
                                        <p class="price pt-1 pb-0 m-0" style="color:black; font-weight:600;">Rs {{ number_format($ad->price) }}</p>
                                        <p class="description text-uppercase" style="font-size:13px; color:#404040;  font-weight:500;">{{ Str::limit($ad->title, 60, '...') }}</p>
                                        <div class="mt-auto">
                                            <p class="location pb-0 mb-0" style="font-size:13px;">
                                                <i class="fa-solid fa-location-dot"></i> {{ $ad->location }}
                                            </p>
                                            <p class="location pb-0 mt-0" style="font-size:11px;">
                                                {{ $ad->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            {{-- Hidden form to track ad views (for non-owners) --}}
                            @if(Auth::check() && Auth::user()->id != $ad->users_id)
                                <form id="ad-view-form-{{ $ad->id }}" method="POST" action="{{ route('ad.view.store') }}" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                </form>
                            @endif
                        </div>
                    @endif    
                @endif
            @endforeach
        </div>
        @if($ads->count() > 22)
            <div class="text-center mt-3">
                <button id="load-more-btn" class="post">Load More</button>
            </div>
        @endif					
    </div>
</div>



