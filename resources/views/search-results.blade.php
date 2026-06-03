<x-app-layout>
    <style>
           
        #full-width-swiper {
            position: relative;
            overflow: hidden;
			 height: 200px;
        }

    .swiper-slide img {
        width: 100%;
        min-height: 200px;
        object-fit: cover;
    }

    /* Media Query for Mobile and Tablet */
    @media (max-width: 768px) {
        #full-width-swiper {
            height: 80px;
			margin-top:2px;/* Adjust height for smaller screens */
        }

        .swiper-slide img {
            min-height: 80px !important;  /* Make lazy-loaded image height match the swiper */
            object-fit: cover !important; /* Ensures image is fully covered without wrapping */
        }
    }
        

        .swiper-slide {
            display: flex;
            justify-content: center;
            /* Center the image horizontally */
            align-items: center;
            /* Center the image vertically */
        }

       
		 .category_name{
            color:#595454;
        }
        .subcategory_name{
            color:#595454;
        }
        .subcategory_name.acive{
            color:#595454;
        }
        .category_name.active{
            color:#000;
        }
        .category_name:hover{
            color:#000;
        }
        .subcategory_name:hover{
            color:#000;
        }
        ::selection {
        color: #fff;
        background: #17a2b8;
        }
        .price-input {
         width: 100%;
         display: flex;
         margin: 15px 0 30px;
        }

        .price-input .field {
         display: flex;
         width: 43%;
         height: 30px;
         align-items: center;
         }

        .field input {
        width: 100%;
        height: 100%;
        outline: none;
        /* padding-left:3px; */
        font-size: 14px;
        margin-left: 5px;
        border-radius: 5px;
        text-align: left;
        color:#585454;
        border: 1px solid #ddd ;
        /* background:#f8f8f8; */
        -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        }

        .price-input .separator {
         width: 20px;
         display: flex;
         font-size: 19px;
         align-items: center;
         justify-content: center;
         }

        .slider {
         height: 5px;
         position: relative;
         background: #ddd;
         border-radius: 5px;
         }

        .slider .progress {
         height: 100%;
         left: 6%;
         right: 6%;
         position: absolute;
         border-radius: 5px;
         background: #545F8B;
         }

        .range-input {
        position: relative;
        margin-bottom:5px;
        }

       .range-input input {
        position: absolute;
        width: 100%;
        height: 5px;
        top: -5px;
        background: none;
        pointer-events: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        }

       input[type="range"]::-webkit-slider-thumb {
        height: 17px;
        width: 17px;
        border-radius: 50%;
        background: #545F8B;
        pointer-events: auto;
        -webkit-appearance: none;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
        }

        input[type="range"]::-moz-range-thumb {
         height: 17px;
         width: 17px;
         border: none;
         border-radius: 50%;
         background: #545F8B;
         pointer-events: auto;
         -moz-appearance: none;
         box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
}
.form-group{
    margin-bottom:10px;
}
select option:hover {
    background-color: #545F8B !important;
}
/* Loader spinner animation */
/* Loader spinner animation */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loader {
    display: inline-block;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
}

.lazyloaded + .loader {
    display: none;
}

.lazyloading {
    opacity: 0; 
}

.lazyloaded {
    opacity: 1;
    transition: opacity 0.8s ease-in;
}

.dropdown-menu .dropdown-item {
    padding: 12px;
    font-size: 14px;
    color: #333;
	border-bottom:1px solid #ddd;
    transition: all 0.2s ease;
}

.dropdown-menu .dropdown-item:hover {
    background-color: #f0f0f0;
    color: #545fb8;
}
.custom-swiper-container {
    width: 100%;
    padding: 10px 0;
    position: relative;
}

.custom-swiper-wrapper {
    display: flex;
}

.custom-swiper-slide {
    flex: 0 0 auto;
    width: calc(33.333% - 10px); /* Adjust width for 3 slides per row */
    margin-right: 10px; /* Add spacing between slides */
}

.custom-swiper-slide:last-child {
    margin-right: 0; /* Remove margin for the last slide */
}

.custom-swiper-button-next,
.custom-swiper-button-prev {
    background-color: #000; /* Customize navigation button colors */
    border-radius: 50%;
    color: #fff;
    padding: 5px;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    z-index: 10;
}

.custom-swiper-button-next {
    right: 10px;
}

.custom-swiper-button-prev {
    left: 10px;
}


    </style>
    @if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top"
        style="display: none;"><i class="fas fa-arrow-up"></i></button>
    <div id="preloader-container">
        <div id="preloader">A</div>
    </div>
   <div class="container-fluid" id="main-container">
        <div class="row">
            <div class="col-lg-9 col-12 col-md-12 mx-auto p-xlg-0 p-lg-0 p-md-0 p-sm-1">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12 mx-auto">
                        <div id="full-width-swiper" class="swiper-container shadow-sm" >
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <x-lazy-image src="{{ asset('assets/images/image.png') }}" class="lazyload" alt="Ad Image" style="width: 100%; min-height: 200px; object-fit:cover;" />
                                </div>
                            </div>
                            <!-- Pagination (hidden) -->
                            <div class="swiper-pagination" style="display: none;"></div>
                            <!-- Navigation Buttons -->
                            <div class="swiper-button-next custom-swiper-button-next d-none"></div>
                            <div class="swiper-button-prev custom-swiper-button-prev d-none"></div>
                        </div>
                    </div>
                </div>
                @php
                                // Attempt to get the first ad
                                $firstAd = $ads->first();
                                
                                // If there's no ad, use a default category name
                                $categoryName = $firstAd ? $firstAd->category_name : 'Default Category';  // Replace 'Default Category' with your fallback value
                                
                                // Get the count of ads
                                $count = $ads->count();
                                
                                // Check if sub_category_name and sub_category_name_type are provided in the request
                                $selectedSubCategoryName = request('sub_category_name');
                                $selectedSubCategoryNametype = request('sub_category_name_type');
                            @endphp
                <div class="row mt-1">
                    <div class="col-md-8 col-sm-12 col-12 mx-auto">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color: black;">Home</a></li>

                                @if(isset($categoryName))
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('category.search', ['category_name' => $categoryName]) }}" style="color: black;">{{ $categoryName }}</a>
                                    </li>
                                @endif

                                @if(isset($selectedSubCategoryName))
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('sub_category.search', ['category_name' => $categoryName, 'sub_category_name' => $selectedSubCategoryName]) }}" style="color: black;">{{ $selectedSubCategoryName }}</a>
                                    </li>
                                @endif

                                @if(isset($selectedSubCategoryNametype))
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('sub_category_type.search', ['category_name' => $categoryName, 'sub_category_name' => $selectedSubCategoryName, 'sub_category_name_type' => $selectedSubCategoryNametype]) }}" style="color: black;">{{ $selectedSubCategoryNametype }}</a>
                                    </li>
                                @endif
                            </ol>
                        </nav>

                        <div class="numbering-of-product">
                            @php
                                // Attempt to get the first ad
                                $firstAd = $ads->first();
                                
                                // If there's no ad, use a default category name
                                $categoryName = $firstAd ? $firstAd->category_name : 'Default Category';  // Replace 'Default Category' with your fallback value
                                
                                // Get the count of ads
                                $count = $ads->count();
                                
                                // Check if sub_category_name and sub_category_name_type are provided in the request
                                $selectedSubCategoryName = request('sub_category_name');
                                $selectedSubCategoryNametype = request('sub_category_name_type');
                            @endphp

                            @if($count > 0)
                                <h1 class="search-link-text">
                                    @if($selectedSubCategoryNametype)
                                        {{ $selectedSubCategoryNametype }}
                                    @elseif($selectedSubCategoryName)
                                        {{ $selectedSubCategoryName }}
                                    @else
                                        {{ $categoryName }}
                                    @endif
                                    in Pakistan 
                                
                                </h1>
                            @else
                                <h1 class="search-link-text">
                                    No ads found
                                </h1>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-4 col-sm-12 col-12 justify-content-center justify-content-lg-end mt-2 float-end">
                        <div class="sort-control float-end">
                            <nav>
                                <div class="nav nav-tabs mb-3 border-0" id="nav-tab" role="tablist">
                                    <button class="button-nav border-0 rounded d-none" id="nav-auto-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"
                                        aria-controls="nav-auto" aria-selected="true"><i class="fa-brands fa-windows"></i>
                                        Grid</button>
                                    <button class="button-nav border-0 ms-2 rounded d-none active" id="nav-job-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-job" type="button" role="tab"
                                        aria-controls="nav-job" aria-selected="false"><i class="fa-solid fa-bars"></i> List</button>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row mt-1 g-0">
                    <div class="col-md-4 col-sm-6 col-12 mt-md-3 mt-sm-1">
                        <form method="Get" id="filterads">        
                            <div class="col-12 col-md-12 col-sm-12">
                                <div class="card rounded" style="background-color:#F2F4F5; box-shadow: 0 0 0 0 !important;">
                                    <h2 class="ps-2 fw-bold pt-2 pb-2 mb-0" style="font-size:16px;">Categories</h2>
                                    <ul class="ps-4" style="font-size:14px; margin-left:5px; cursor:pointer; text-decoration:none; list-style: none;">
                                        @php
                                            $activeAds = $ads->where('ad_status', 'active');
                                        @endphp

                                        @if($activeAds->isNotEmpty())
                                            <li>
                                                <input type="radio" id="category_{{ str_replace('_', ' ', $activeAds->first()->category_name) }}" name="category_name" class="category-radio"
                                                    value="{{ $activeAds->first()->category_name }}" 
                                                    {{ request('category_name') && !request('sub_category_name') && !request('sub_category_name_type') ? 'checked' : (str_contains(request('query'), $activeAds->first()->category_name) ? 'checked' : '') }} 
                                                    hidden>
                                                <label for="category_{{ str_replace('_', ' ', $activeAds->first()->category_name) }}" 
                                                    class="category_name" 
                                                    style="{{ request('category_name') && !request('sub_category_name') && !request('sub_category_name_type') ? 'color:black; font-weight:600;' : (str_contains(request('query'), $activeAds->first()->category_name) ? 'color:black; font-weight:600;' : '') }}">
                                                    {{ str_replace('_', ' ', $activeAds->first()->category_name) }}
                                                </label>
                                            </li>

                                            @php
                                                $subCategoryCounts = $activeAds->groupBy('sub_category_name')->map(function ($group) {
                                                    return $group->count();
                                                });
                                            @endphp

                                            <ul class="ps-3" style="font-size:14px; cursor:pointer; text-decoration:none; list-style: none;">
                                                @foreach($subCategoryCounts as $subCategoryName => $count)
                                                    @php
                                                        $filteredAds = $activeAds->where('sub_category_name', $subCategoryName);
                                                        $adsByType = $filteredAds->groupBy('sub_category_name_type');
                                                    @endphp
                                                    @if($filteredAds->isNotEmpty())
                                                        <li class="ps-0 ms-0">
                                                            <input type="radio" id="sub_category_{{ str_replace('_', ' ', $subCategoryName) }}" name="sub_category_name" class="subcategory-radio"
                                                                value="{{ $subCategoryName }}" 
                                                                {{ request('sub_category_name') == $subCategoryName && !request('sub_category_name_type') ? 'checked' : (str_contains(request('query'), $subCategoryName) ? 'checked' : '') }} 
                                                                hidden>
                                                            <label for="sub_category_{{ str_replace('_', ' ', $subCategoryName) }}" 
                                                                class="subcategory_name" 
                                                                style="{{ request('sub_category_name') == $subCategoryName && !request('sub_category_name_type') ? 'color:black; font-weight:600;' : (str_contains(request('query'), $subCategoryName) ? 'color:black; font-weight:600;' : '') }}">
                                                                {{ str_replace('_', ' ', $subCategoryName) }} ({{ $count }})
                                                            </label>

                                                            @if($adsByType->isNotEmpty())
                                                                <ul class="ps-4" style="font-size:14px; margin-left:5px; cursor:pointer; text-decoration:none; list-style: none;">
                                                                    @foreach($adsByType as $type => $adsByTypeGroup)
                                                                        @if(!empty($type) && $adsByTypeGroup->isNotEmpty())
                                                                            <li>
                                                                                <input type="radio" id="sub_category_type_{{ str_replace('_', ' ', $type) }}" name="sub_category_name_type" class="subcategory-type-radio"
                                                                                    value="{{ $type }}" 
                                                                                    {{ request('sub_category_name_type') == $type ? 'checked' : (str_contains(request('query'), $type) ? 'checked' : '') }} 
                                                                                    hidden>
                                                                                <label for="sub_category_type_{{ str_replace('_', ' ', $type) }}" 
                                                                                    class="subcategory_type_name"
                                                                                    style="{{ request('sub_category_name_type') == $type ? 'color:black; font-weight:600;' : (str_contains(request('query'), $type) ? 'color:black; font-weight:600;' : '') }}">
                                                                                    {{ str_replace('_', ' ', $type) }} ({{ $adsByTypeGroup->count() }})
                                                                                </label>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            <li>No active ads found</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!-- Filters Section -->
                            <div class="col-12 col-md-12 col-sm-12">
                                        <div class="card mt-3 pb-2 rounded" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                            <h4 class="ps-3 pt-3 pb-2 mb-0 fs-6">Location</h4>
                                            <div class="dropdown-container w-100 pe-2 ps-3">
                                                <input type="text" id="citySearch2" class="form-control" placeholder="Select or search city" 
                                                    style="width: 100%; border: 1px solid #ced4da; border-radius: .25rem; padding: .5rem; background: #fff;">
                                                <input type="hidden" id="selectedCityInput" name="location">
                                                <ul class="dropdown-menu" id="cityDropdownMenu" style="width:290px; max-height: 200px; overflow-y: auto; display: none; padding: 0; border: 1px solid #ddd; overflow-x:hidden">
                                                    <!-- Dropdown content is dynamically populated -->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card mt-3 pb-2 rounded px-4" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                            <h4 class="fs-6 fw-bolded px-1 pt-3">Price</h4>
                                            <div class="price-input">
                                                <div class="field">
                                                    <span>Min</span>
                                                    <input type="number" name="price_min" class="input-min"  id="inputMin" placeholder="Min Price">
                                                </div>
                                                <div class="separator">-</div>
                                                <div class="field">
                                                    <span>Max</span>
                                                    <input type="number" name="price_max" class="input-max" id="inputMax" placeholder="Max Price">
                                                </div>
                                            </div>
                                        </div>
                                            @php
                                                // Define deliverable options
                                                $deliverables = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                ->where('sub_category_name', 'Tablets')
                                                                                ->distinct()
                                                                                ->whereNotNull('deliverable')
                                                                                ->where('deliverable', '!=', '')
                                                                                ->pluck('deliverable');
                                            @endphp
                                        @if($deliverables->isNotEmpty()) 
                                            <div class="card mt-3 pb-2 rounded px-4 deliverable1_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Is Deliverable</h4>
                                                @foreach($deliverables as $deliverable)
                                                        @php
                                                            $checked = is_array(request('deliverable')) && in_array($deliverable, request('deliverable'));
                                                        @endphp
                                                        <div class="form-group">
															<input type="checkbox" name="deliverable[]" class="deliverable-check" value="{{ $deliverable }}" style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;" {{ is_array(request('deliverable')) && in_array($deliverable, request('deliverable')) ? 'checked' : '' }} >
                                                            <label for="{{ strtolower(str_replace(' ', '-', $deliverable)) }}">{{ $deliverable }}</label>
                                                        </div>
                                                @endforeach
                                            </div>

                                        @endif
                                            @php
                                                                        // Fetch distinct brands and filter out empty/null values
                                                                        $brands = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                                                ->where('sub_category_name', 'Tablets')
                                                                                                                ->distinct()
                                                                                                                ->whereNotNull('brand')
                                                                                                                ->where('brand', '!=', '')
                                                                                                                ->pluck('brand');

                                                                        // Limit the number of brands to display initially
                                                                        $initialBrands = $brands->take(5);
                                                                        $extraBrands = $brands->skip(5);
                                            @endphp
                                        <!-- Brand -->
                                        @if($brands->isNotEmpty())
                                            <div class="card mt-3 pb-2 brand1_card rounded px-4" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Brand</h4>

                                                <!-- Initial Brands -->
                                                @foreach($initialBrands as $brand)
                                                    @php
                                                        $checked = is_array(request('brand')) && in_array($brand, request('brand'));
                                                    @endphp
                                                    <div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="brand[]" 
                                                                                            class="brand-check" 
                                                                                            value="{{ $brand }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('brand')) && in_array($brand, request('brand')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $brand)) }}">{{ $brand }}</label>
                                                    </div>
                                                @endforeach

                                                <!-- Extra Brands hidden by default -->
                                                <div class="more-brands" style="display: none;">
                                                    @foreach($extraBrands as $brand)
                                                        @php
                                                            $checked = is_array(request('brand')) && in_array($brand, request('brand'));
                                                        @endphp
                                                        <div class="form-group">
                                                           <input type="checkbox" 
                                                                                            
                                                                                            name="brand[]" 
                                                                                            class="brand-check" 
                                                                                            value="{{ $brand }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('brand')) && in_array($brand, request('brand')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $brand)) }}">{{ $brand }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Toggle link for "View More" -->
                                                @if($brands->count() > 5)
                                                    <a href="javascript:void(0);" id="toggleBrands" style="font-size:14px; color:#545F8B">
                                                        View More <i id="toggleIcon" class="fa-solid fa-chevron-down"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        @endif
                                        @php
                                            // Fetch distinct conditions based on your logic
                                            $conditions = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                        ->where('sub_category_name', 'Tablets')
                                                                        ->distinct()
                                                                        ->whereNotNull('condition')
                                                                        ->where('condition', '!=', '')
                                                                        ->pluck('condition');
                                        @endphp
                                        @if($conditions->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 condition1_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                    @foreach($conditions as $condition)
                                                    @php
                                                        $id = strtolower(str_replace(' ', '-', $condition));
                                                        $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                    @endphp
                                                    <div class="form-group">
                                                       
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                    </div>
                                                    @endforeach
                                            </div>
                                        @endif 
                                            @php
                                                // Define deliverable options
                                                $deliverables = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                ->where('sub_category_name', 'Accessories')
                                                                                ->where('sub_category_name_type', 'Chargers')
                                                                                ->distinct()
                                                                                ->whereNotNull('deliverable')
                                                                                ->where('deliverable', '!=', '')
                                                                                ->pluck('deliverable');
                                            @endphp
                                        @if($deliverables->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 deliverable3_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Is Deliverable</h4>
                                                @foreach($deliverables as $deliverable)
                                                        @php
                                                            $checked = is_array(request('deliverable')) && in_array($deliverable, request('deliverable'));
                                                        @endphp
                                                        <div class="form-group">
                                                            <input type="checkbox" 
                                                                                            
                                                                                            name="deliverable[]" 
                                                                                            class="deliverable-check" 
                                                                                            value="{{ $deliverable }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('deliverable')) && in_array($deliverable, request('deliverable')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $deliverable)) }}">{{ $deliverable }}</label>
                                                        </div>
                                                @endforeach
                                            </div>
                                        @endif    
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $devices = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                                            ->where('sub_category_name', 'Accessories')
                                                                                                            ->where('sub_category_name_type', 'Chargers')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('device')
                                                                                                            ->where('device', '!=', '')
                                                                                                            ->pluck('device');
                                                @endphp
                                        @if($devices->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 device1_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Device</h4>
                                                    @foreach($devices as $device)
                                                            @php
                                                                $checked = is_array(request('device')) && in_array($device, request('device'));
                                                            @endphp
                                                            <div class="form-group">
																<input type="checkbox" 
                                                                                            
                                                                                            name="device[]" 
                                                                                            class="device-check" 
                                                                                            value="{{ $device }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('device')) && in_array($device, request('device')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $device)) }}">{{ $device }}</label>
                                                            </div>
                                                    @endforeach
                                            </div>
                                        @endif
                                                @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                                ->where('sub_category_name', 'Accessories')
                                                                                                ->where('sub_category_name_type', 'Chargers')
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                        @if($types->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 type2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
                                                    @foreach($types as $type)
                                                            @php
                                                                $checked = is_array(request('type')) && in_array($type, request('type'));
                                                            @endphp
                                                            <div class="form-group">
																 <input type="checkbox" 
                                                                                            
                                                                                            name="type[]" 
                                                                                            class="type-check" 
                                                                                            value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
                                                            </div>
                                                    @endforeach 
                                            </div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                                            ->where('sub_category_name', 'Accessories')
                                                                                                            ->where('sub_category_name_type', 'Chargers')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 condition4_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                    @foreach($conditions as $condition)
                                                    @php
                                                        $id = strtolower(str_replace(' ', '-', $condition));
                                                        $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                    @endphp
                                                    <div class="form-group">
                                                        <input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                    </div>
                                                    @endforeach
                                            </div>
                                        @endif
                                        @php
                                                // Define deliverable options
                                                $deliverables = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                ->where('sub_category_name', 'Accessories')
                                                                                ->where('sub_category_name_type', 'Charging_Cables')
                                                                                ->distinct()
                                                                                ->whereNotNull('deliverable')
                                                                                ->where('deliverable', '!=', '')
                                                                                ->pluck('deliverable');
                                            @endphp
                                            @if($deliverables->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 deliverable2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Is Deliverable</h4>
                                                    @foreach($deliverables as $deliverable)
                                                        @php
                                                            $checked = is_array(request('deliverable')) && in_array($deliverable, request('deliverable'));
                                                        @endphp
                                                        <div class="form-group">
                                                            <input type="checkbox" 
                                                                                            
                                                                                            name="deliverable[]" 
                                                                                            class="deliverable-check" 
                                                                                            value="{{ $deliverable }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('deliverable')) && in_array($deliverable, request('deliverable')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $deliverable)) }}">{{ $deliverable }}</label>
                                                        </div>
                                                @endforeach
                                                </div>
                                           @endif
                                                @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                                ->where('sub_category_name', 'Accessories')
                                                                                                ->where('sub_category_name_type', 'Charging_Cables')
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                        @if($types->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 type1_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
                                                    @foreach($types as $type)
                                                            @php
                                                                $checked = is_array(request('type')) && in_array($type, request('type'));
                                                            @endphp
                                                            <div class="form-group">
																 <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
                                                            </div>
                                                    @endforeach 
                                            </div>
                                        @endif
                                            @php
                                                // Fetch conditions based on category_name, sub_category_name, and sub_category_name_type
                                                $conditions = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                            ->where('sub_category_name', 'Accessories')
                                                                            ->where('sub_category_name_type', 'Charging_Cables')
                                                                            ->distinct()
                                                                            ->whereNotNull('condition')
                                                                            ->where('condition', '!=', '')
                                                                            ->pluck('condition');
                                            @endphp
                                            @if($conditions->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 condition2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                    @foreach($conditions as $condition)
                                                    @php
                                                        $id = strtolower(str_replace(' ', '-', $condition));
                                                        $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                    @endphp
                                                    <div class="form-group">
                                                       <input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                            @php
                                                // Define deliverable options
                                                $deliverables = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                ->where('sub_category_name', 'Accessories')
                                                                                ->where('sub_category_name_type', 'Converters')
                                                                                ->distinct()
                                                                                ->whereNotNull('deliverable')
                                                                                ->where('deliverable', '!=', '')
                                                                                ->pluck('deliverable');
                                            @endphp
                                        @if($deliverables->isNotEmpty())    
                                        <div class="card mt-3 pb-2 rounded px-4 deliverable4_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                            <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Is Deliverable</h4>
                                            @foreach($deliverables as $deliverable)
                                                    @php
                                                        $checked = is_array(request('deliverable')) && in_array($deliverable, request('deliverable'));
                                                    @endphp
                                                    <div class="form-group">
                                                       <input type="checkbox" 
                                                                                            
                                                                                            name="deliverable[]" 
                                                                                            class="deliverable-check" 
                                                                                            value="{{ $deliverable }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('deliverable')) && in_array($deliverable, request('deliverable')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $deliverable)) }}">{{ $deliverable }}</label>
                                                    </div>
                                            @endforeach
                                        </div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                                            ->where('sub_category_name', 'Accessories')
                                                                                                            ->where('sub_category_name_type', 'Converters')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 condition3_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                    @foreach($conditions as $condition)
                                                    @php
                                                        $id = strtolower(str_replace(' ', '-', $condition));
                                                        $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                    @endphp
                                                    <div class="form-group">
                                                        <input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                    </div>
                                                    @endforeach
                                            </div>
                                        @endif
                                        @php
                                                // Define deliverable options
                                                $deliverables = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                ->where('sub_category_name', 'Accessories')
                                                                                ->where('sub_category_name_type', 'Screen')
                                                                                ->distinct()
                                                                                ->whereNotNull('deliverable')
                                                                                ->where('deliverable', '!=', '')
                                                                                ->pluck('deliverable');
                                            @endphp
                                        @if($deliverables->isNotEmpty())
                                        <div class="card mt-3 pb-2 rounded px-4 deliverable5_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                            <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Is Deliverable</h4>
                                            @foreach($deliverables as $deliverable)
                                                    @php
                                                        $checked = is_array(request('deliverable')) && in_array($deliverable, request('deliverable'));
                                                    @endphp
                                                    <div class="form-group">
                                                       <input type="checkbox" 
                                                                                            
                                                                                            name="deliverable[]" 
                                                                                            class="deliverable-check" 
                                                                                            value="{{ $deliverable }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('deliverable')) && in_array($deliverable, request('deliverable')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $deliverable)) }}">{{ $deliverable }}</label>
                                                    </div>
                                            @endforeach
                                        </div>
                                        @endif
                                                @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                                ->where('sub_category_name', 'Accessories')
                                                                                                ->where('sub_category_name_type', 'Screen')
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                        @if($types->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 type3_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
                                                    @foreach($types as $type)
                                                            @php
                                                                $checked = is_array(request('type')) && in_array($type, request('type'));
                                                            @endphp
                                                            <div class="form-group">
                                                                 <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
                                                            </div>
                                                    @endforeach 
                                            </div>
                                        @endif
                                            @php
                                                // Define deliverable options
                                                $deliverables = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                ->where('sub_category_name', 'Mobiles_phones')
                                                                                ->distinct()
                                                                                ->whereNotNull('deliverable')
                                                                                ->where('deliverable', '!=', '')
                                                                                ->pluck('deliverable');
                                            @endphp
                                        @if($deliverables->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 deliverable7_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Is Deliverable</h4>
                                                @foreach($deliverables as $deliverable)
                                                        @php
                                                            $checked = is_array(request('deliverable')) && in_array($deliverable, request('deliverable'));
                                                        @endphp
                                                        <div class="form-group">
                                                           <input type="checkbox" 
                                                                                            
                                                                                            name="deliverable[]" 
                                                                                            class="deliverable-check" 
                                                                                            value="{{ $deliverable }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('deliverable')) && in_array($deliverable, request('deliverable')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $deliverable)) }}">{{ $deliverable }}</label>
                                                        </div>
                                                @endforeach
                                            </div>
                                        @endif
                                            @php
                                                                        // Fetch distinct brands and filter out empty/null values
                                                                        $brands = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                                                ->where('sub_category_name', 'Mobiles_phones')
                                                                                                                ->distinct()
                                                                                                                ->whereNotNull('brand')
                                                                                                                ->where('brand', '!=', '')
                                                                                                                ->pluck('brand');

                                                                        // Limit the number of brands to display initially
                                                                        $initialBrands = $brands->take(5);
                                                                        $extraBrands = $brands->skip(5);
                                            @endphp
                                        <!-- Brand -->
                                        @if($brands->isNotEmpty())
                                            <div class="card mt-3 pb-2 brand3_card rounded px-4" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Brand</h4>

                                                    <!-- Initial Brands -->
                                                    @foreach($initialBrands as $brand)
                                                        @php
                                                            $checked = is_array(request('brand')) && in_array($brand, request('brand'));
                                                        @endphp
                                                        <div class="form-group">
                                                            <input type="checkbox" 
                                                                                            
                                                                                            name="brand[]" 
                                                                                            class="brand-check" 
                                                                                            value="{{ $brand }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('brand')) && in_array($brand, request('brand')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $brand)) }}">{{ $brand }}</label>
                                                        </div>
                                                    @endforeach

                                                    <!-- Extra Brands hidden by default -->
                                                    <div class="more-brands" style="display: none;">
                                                        @foreach($extraBrands as $brand)
                                                            @php
                                                                $checked = is_array(request('brand')) && in_array($brand, request('brand'));
                                                            @endphp
                                                            <div class="form-group">
                                                               <input type="checkbox" 
                                                                                            
                                                                                            name="brand[]" 
                                                                                            class="brand-check" 
                                                                                            value="{{ $brand }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('brand')) && in_array($brand, request('brand')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $brand)) }}">{{ $brand }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!-- Toggle link for "View More" -->
                                                    @if($brands->count() > 5)
                                                        <a href="javascript:void(0);" id="toggleBrands" style="font-size:14px; color:#545F8B">
                                                            View More <i id="toggleIcon" class="fa-solid fa-chevron-down"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                        @endif
                                            @php
                                                // Define deliverable options
                                                $deliverables = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                ->where('sub_category_name', 'Smart_watch')
                                                                                ->distinct()
                                                                                ->whereNotNull('deliverable')
                                                                                ->where('deliverable', '!=', '')
                                                                                ->pluck('deliverable');
                                            @endphp
                                        @if($deliverables->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 deliverable6_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Is Deliverable</h4>
                                                @foreach($deliverables as $deliverable)
                                                        @php
                                                            $checked = is_array(request('deliverable')) && in_array($deliverable, request('deliverable'));
                                                        @endphp
                                                        <div class="form-group">
                                                            <input type="checkbox" 
                                                                                            
                                                                                            name="deliverable[]" 
                                                                                            class="deliverable-check" 
                                                                                            value="{{ $deliverable }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('deliverable')) && in_array($deliverable, request('deliverable')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $deliverable)) }}">{{ $deliverable }}</label>
                                                        </div>
                                                @endforeach
                                            </div>
                                        @endif
                                            @php
                                                                        // Fetch distinct brands and filter out empty/null values
                                                                        $brands = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                                                ->where('sub_category_name', 'Smart_watch')
                                                                                                                ->distinct()
                                                                                                                ->whereNotNull('brand')
                                                                                                                ->where('brand', '!=', '')
                                                                                                                ->pluck('brand');

                                                                        // Limit the number of brands to display initially
                                                                        $initialBrands = $brands->take(5);
                                                                        $extraBrands = $brands->skip(5);
                                            @endphp
                                        <!-- Brand -->
                                        @if($brands->isNotEmpty())
                                            <div class="card mt-3 pb-2 brand2_card rounded px-4" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Brand</h4>

                                                <!-- Initial Brands -->
                                                @foreach($initialBrands as $brand)
                                                    @php
                                                        $checked = is_array(request('brand')) && in_array($brand, request('brand'));
                                                    @endphp
                                                    <div class="form-group">
                                                       <input type="checkbox" 
                                                                                            
                                                                                            name="brand[]" 
                                                                                            class="brand-check" 
                                                                                            value="{{ $brand }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('brand')) && in_array($brand, request('brand')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $brand)) }}">{{ $brand }}</label>
                                                    </div>
                                                @endforeach

                                                <!-- Extra Brands hidden by default -->
                                                <div class="more-brands" style="display: none;">
                                                    @foreach($extraBrands as $brand)
                                                        @php
                                                            $checked = is_array(request('brand')) && in_array($brand, request('brand'));
                                                        @endphp
                                                        <div class="form-group">
                                                            <input type="checkbox" 
                                                                                            
                                                                                            name="brand[]" 
                                                                                            class="brand-check" 
                                                                                            value="{{ $brand }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('brand')) && in_array($brand, request('brand')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $brand)) }}">{{ $brand }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Toggle link for "View More" -->
                                                @if($brands->count() > 5)
                                                    <a href="javascript:void(0);" id="toggleBrands" style="font-size:14px; color:#545F8B">
                                                        View More <i id="toggleIcon" class="fa-solid fa-chevron-down"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Mobiles')
                                                                                                            ->where('sub_category_name', 'Smart_watch')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 condition5_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                    @foreach($conditions as $condition)
                                                    @php
                                                        $id = strtolower(str_replace(' ', '-', $condition));
                                                        $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                    @endphp
                                                    <div class="form-group">
                                                        <input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                    </div>
                                                    @endforeach
                                            </div>
                                        @endif
                                                @php
                                                                // Fetch distinct car names from the ads table using the make_car column, excluding empty or null values
                                                                $carNames = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                                            ->where('sub_category_name', 'Car')
                                                                                            
                                                                                            ->distinct()
                                                                                            ->whereNotNull('make_car')
                                                                                            ->where('make_car', '!=', '')
                                                                                            ->pluck('make_car');
                                                @endphp
                                        @if($carNames->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 make_car1_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Make</h4>
                                                    @foreach($carNames->take(4) as $carName)
                                                        @php
                                                            $checked = is_array(request('carName')) && in_array($carName, request('carName'));
                                                        @endphp
                                                        <div class="form-group">
															 <input type="checkbox"           
																		name="make_car[]" 
																		class="hide-checkbox" 
																		value="{{ $carName }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('carName')) && in_array($carName, request('carName')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $carName)) }}">{{ $carName }}</label>
                                                        </div>
                                                    @endforeach

                                                    @if($carNames->count() > 4)
                                                        <div class="more-car-names" style="display: none;">
                                                            @foreach($carNames->slice(4) as $carName)
                                                                @php
                                                                    $checked = is_array(request('carName')) && in_array($carName, request('carName'));
                                                                @endphp
                                                                <div class="form-group">
                                                                    <input type="checkbox"           
																		name="make_car[]" 
																		class="hide-checkbox" 
																		value="{{ $carName }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('carName')) && in_array($carName, request('carName')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $carName)) }}">{{ $carName }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <!-- Show More/Less link with Font Awesome icons -->
                                                        <a href="javascript:void(0);" id="toggleCarNames" style="font-size:14px; color:#545F8B">
                                                            View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
                                                        </a>
                                                    @endif
                                            </div>
                                        @endif
                                                @php
                                                                // Fetch distinct car names from the ads table using the make_car column, excluding empty or null values
                                                                $carNames = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                                            ->where('sub_category_name', 'Cars_on_Installments')
                                                                                            
                                                                                            ->distinct()
                                                                                            ->whereNotNull('make_car')
                                                                                            ->where('make_car', '!=', '')
                                                                                            ->pluck('make_car');
                                                @endphp
                                        @if($carNames->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 make_car2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Make</h4>
                                                    @foreach($carNames->take(4) as $carName)
                                                        @php
                                                            $checked = is_array(request('carName')) && in_array($carName, request('carName'));
                                                        @endphp
                                                        <div class="form-group">
                                                            <input type="checkbox"           
																		name="make_car[]" 
																		class="hide-checkbox" 
																		value="{{ $carName }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('carName')) && in_array($carName, request('carName')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $carName)) }}">{{ $carName }}</label>
                                                        </div>
                                                    @endforeach

                                                    @if($carNames->count() > 4)
                                                        <div class="more-car-names" style="display: none;">
                                                            @foreach($carNames->slice(4) as $carName)
                                                                @php
                                                                    $checked = is_array(request('carName')) && in_array($carName, request('carName'));
                                                                @endphp
                                                                <div class="form-group">
                                                                    <input type="checkbox"           
																		name="make_car[]" 
																		class="hide-checkbox" 
																		value="{{ $carName }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('carName')) && in_array($carName, request('carName')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $carName)) }}">{{ $carName }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <!-- Show More/Less link with Font Awesome icons -->
                                                        <a href="javascript:void(0);" id="toggleCarNames" style="font-size:14px; color:#545F8B">
                                                            View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
                                                        </a>
                                                    @endif
                                            </div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                                                            ->where('sub_category_name', 'Cars_Accessories')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 condition6_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                    @foreach($conditions as $condition)
                                                    @php
                                                        $id = strtolower(str_replace(' ', '-', $condition));
                                                        $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                    @endphp
                                                    <div class="form-group">
                                                       <input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                    </div>
                                                    @endforeach
                                            </div>
                                        @endif
                                        @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                                                ->where('sub_category_name', 'Spare_Parts')
                                                                                                
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                        @if($types->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 type4_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
                                                    @foreach($types as $type)
                                                            @php
                                                                $checked = is_array(request('type')) && in_array($type, request('type'));
                                                            @endphp
                                                            <div class="form-group">
                                                            <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
																<input type="checkbox"           
																		name="make_car[]" 
																		class="hide-checkbox" 
																		value="{{ $carName }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('carName')) && in_array($carName, request('carName')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $carName)) }}">{{ $carName }}</label>
                                                            </div>
                                                    @endforeach 
                                            </div>
                                        @endif 
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                                                            ->where('sub_category_name', 'Spare_Parts')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
                                            <div class="card mt-3 pb-2 rounded px-4 condition7_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                    @foreach($conditions as $condition)
                                                    @php
                                                        $id = strtolower(str_replace(' ', '-', $condition));
                                                        $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                    @endphp
                                                    <div class="form-group">
                                                       <input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                    </div>
                                                    @endforeach
                                            </div>
                                        @endif
                                            @php
                                                // Fetch the min and max year from the ads table where category_name is 'Vehicles' and sub_category_name is 'Buses_Vans_Trucks'
                                                $minYear = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                        ->where('sub_category_name', 'Buses_Vans_Trucks')
                                                                        ->whereNotNull('Year_update')
                                                                        ->where('Year_update', '!=', '')
                                                                        ->min('Year_update');

                                                $maxYear = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                        ->where('sub_category_name', 'Buses_Vans_Trucks')
                                                                        ->whereNotNull('Year_update')
                                                                        ->where('Year_update', '!=', '')
                                                                        ->max('Year_update');

                                                // Retrieve the user-selected min and max year from the request, or use the defaults
                                                $selectedMinYear = request('min_year', $minYear); // Default to $minYear if not set
                                                $selectedMaxYear = request('max_year', $maxYear); // Default to $maxYear if not set
                                            @endphp
                                            <div class="card mt-3 pb-2 rounded year1_card px-4" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bolded px-1 pt-3">Year</h4>
                                                    <div class="price-input">
                                                        <div class="field">
                                                            <span>Min</span>
                                                            <input type="number" name="min_year" class="input-min" 
                                                                value="{{ $selectedMinYear }}" id="inputYearMin" placeholder="Min Year">
                                                        </div>
                                                        <div class="separator">-</div>
                                                        <div class="field">
                                                            <span>Max</span>
                                                            <input type="number" name="max_year" class="input-max" 
                                                                value="{{ $selectedMaxYear }}" id="inputYearMax" placeholder="Max Year">
                                                        </div>
                                                    </div>
                                            </div> 
                                            @php
                                                // Fetch distinct kms driven from the ads table
                                                $kmsDriven = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                        ->where('sub_category_name', 'Buses_Vans_Trucks')
                                                                        ->distinct()
                                                                        ->whereNotNull('kms_driven_no')
                                                                        ->where('kms_driven_no', '!=', '')
                                                                        ->pluck('kms_driven_no');
                                            @endphp
                                            <div class="card mt-3 pb-2 rounded px-4 kms_driven1_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bolded px-1 pt-3">KM's Driven</h4>
                                                <div class="price-input">
                                                    <div class="field">
                                                        <span>Min</span>
                                                        <input type="number" name="kms_driven_no_min" class="input-min" value="{{ request('kms_driven_no_min') ?? $kmsDriven->min() }}" id="inputKmsMin" placeholder="Min Kms">
                                                    </div>
                                                    <div class="separator">-</div>
                                                    <div class="field">
                                                        <span>Max</span>
                                                        <input type="number" name="kms_driven_no_max" class="input-max" value="{{ request('kms_driven_no_max') ?? $kmsDriven->max() }}" id="inputKmsMax" placeholder="Max Kms">
                                                    </div>
                                                </div>
                                            </div>
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                                                            ->where('sub_category_name', 'Buses_Vans_Trucks')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                            @if($conditions->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 condition8_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                        @foreach($conditions as $condition)
                                                        @php
                                                            $id = strtolower(str_replace(' ', '-', $condition));
                                                            $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                        @endphp
                                                        <div class="form-group">
                                                            <input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                        </div>
                                                        @endforeach
                                                </div>
                                            @endif
                                            @php
                                                // Fetch the min and max year from the ads table where category_name is 'Vehicles' and sub_category_name is 'Buses_Vans_Trucks'
                                                $minYear = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                        ->where('sub_category_name', 'Rickshaw_Chingchi')
                                                                        ->whereNotNull('Year_update')
                                                                        ->where('Year_update', '!=', '')
                                                                        ->min('Year_update');

                                                $maxYear = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                        ->where('sub_category_name', 'Rickshaw_Chingchi')
                                                                        ->whereNotNull('Year_update')
                                                                        ->where('Year_update', '!=', '')
                                                                        ->max('Year_update');

                                                // Retrieve the user-selected min and max year from the request, or use the defaults
                                                $selectedMinYear = request('min_year', $minYear); // Default to $minYear if not set
                                                $selectedMaxYear = request('max_year', $maxYear); // Default to $maxYear if not set
                                            @endphp
                                            <div class="card mt-3 pb-2 rounded year2_card px-4" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bolded px-1 pt-3">Year</h4>
                                                    <div class="price-input">
                                                        <div class="field">
                                                            <span>Min</span>
                                                            <input type="number" name="min_year" class="input-min" 
                                                                value="{{ $selectedMinYear }}" id="inputYearMin" placeholder="Min Year">
                                                        </div>
                                                        <div class="separator">-</div>
                                                        <div class="field">
                                                            <span>Max</span>
                                                            <input type="number" name="max_year" class="input-max" 
                                                                value="{{ $selectedMaxYear }}" id="inputYearMax" placeholder="Max Year">
                                                        </div>
                                                    </div>
                                            </div>
                                            @php
                                                // Fetch distinct kms driven from the ads table
                                                $kmsDriven = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                        ->where('sub_category_name', 'Rickshaw_Chingchi')
                                                                        ->distinct()
                                                                        ->whereNotNull('kms_driven_no')
                                                                        ->where('kms_driven_no', '!=', '')
                                                                        ->pluck('kms_driven_no');
                                            @endphp
                                            <div class="card mt-3 pb-2 rounded px-4 kms_driven2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bolded px-1 pt-3">KM's Driven</h4>
                                                <div class="price-input">
                                                    <div class="field">
                                                        <span>Min</span>
                                                        <input type="number" name="kms_driven_no_min" class="input-min" value="{{ request('kms_driven_no_min') ?? $kmsDriven->min() }}" id="inputKmsMin" placeholder="Min Kms">
                                                    </div>
                                                    <div class="separator">-</div>
                                                    <div class="field">
                                                        <span>Max</span>
                                                        <input type="number" name="kms_driven_no_max" class="input-max" value="{{ request('kms_driven_no_max') ?? $kmsDriven->max() }}" id="inputKmsMax" placeholder="Max Kms">
                                                    </div>
                                                </div>
                                            </div>
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                                                            ->where('sub_category_name', 'Rickshaw_Chingchi')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                            @if($conditions->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 condition9_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                        @foreach($conditions as $condition)
                                                        @php
                                                            $id = strtolower(str_replace(' ', '-', $condition));
                                                            $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                        @endphp
                                                        <div class="form-group">
                                                            <input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                        </div>
                                                        @endforeach
                                                </div>
                                            @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                                                            ->where('sub_category_name', 'Boats')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                            @if($conditions->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 condition10_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                        @foreach($conditions as $condition)
                                                        @php
                                                            $id = strtolower(str_replace(' ', '-', $condition));
                                                            $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                        @endphp
                                                        <div class="form-group">
                                                            <input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                        </div>
                                                        @endforeach
                                                </div>
                                            @endif
                                            @php
                                                // Fetch the min and max year from the ads table where category_name is 'Vehicles' and sub_category_name is 'Buses_Vans_Trucks'
                                                $minYear = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                        ->where('sub_category_name', 'Tractors_Trailers')
                                                                        
                                                                        ->whereNotNull('Year_update')
                                                                        ->where('Year_update', '!=', '')
                                                                        ->min('Year_update');

                                                $maxYear = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                        ->where('sub_category_name', 'Tractors_Trailers')
                                                                    
                                                                        ->whereNotNull('Year_update')
                                                                        ->where('Year_update', '!=', '')
                                                                        ->max('Year_update');

                                                // Retrieve the user-selected min and max year from the request, or use the defaults
                                                $selectedMinYear = request('min_year', $minYear); // Default to $minYear if not set
                                                $selectedMaxYear = request('max_year', $maxYear); // Default to $maxYear if not set
                                            @endphp
                                            <div class="card mt-3 pb-2 rounded year5_card px-4" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                    <h4 class="fs-6 fw-bolded px-1 pt-3">Year</h4>
                                                    <div class="price-input">
                                                        <div class="field">
                                                            <span>Min</span>
                                                            <input type="number" name="min_year" class="input-min" 
                                                                value="{{ $selectedMinYear }}" id="inputYearMin" placeholder="Min Year">
                                                        </div>
                                                        <div class="separator">-</div>
                                                        <div class="field">
                                                            <span>Max</span>
                                                            <input type="number" name="max_year" class="input-max" 
                                                                value="{{ $selectedMaxYear }}" id="inputYearMax" placeholder="Max Year">
                                                        </div>
                                                    </div>
                                            </div>
                                            @php
                                                // Fetch distinct kms driven from the ads table
                                                $kmsDriven = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                        ->where('sub_category_name', 'Tractors_Trailers')
                                                                        ->distinct()
                                                                        ->whereNotNull('kms_driven_no')
                                                                        ->where('kms_driven_no', '!=', '')
                                                                        ->pluck('kms_driven_no');
                                            @endphp
                                            <div class="card mt-3 pb-2 rounded px-4 kms_drive5_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bolded px-1 pt-3">KM's Driven</h4>
                                                <div class="price-input">
                                                    <div class="field">
                                                        <span>Min</span>
                                                        <input type="number" name="kms_driven_no_min" class="input-min" value="{{ request('kms_driven_no_min') ?? $kmsDriven->min() }}" id="inputKmsMin" placeholder="Min Kms">
                                                    </div>
                                                    <div class="separator">-</div>
                                                    <div class="field">
                                                        <span>Max</span>
                                                        <input type="number" name="kms_driven_no_max" class="input-max" value="{{ request('kms_driven_no_max') ?? $kmsDriven->max() }}" id="inputKmsMax" placeholder="Max Kms">
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Vehicles')
                                                                                                            ->where('sub_category_name', 'Tractors_Trailers')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                            @if($conditions->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 condition36_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
                                                        @foreach($conditions as $condition)
                                                        @php
                                                            $id = strtolower(str_replace(' ', '-', $condition));
                                                            $checked = is_array(request('condition')) && in_array($condition, request('condition'));
                                                        @endphp
                                                        <div class="form-group">
                                                            <input type="checkbox"                  
                                                                name="condition[]" 
                                                                class="condition-check" 
                                                                value="{{ $condition }}" 
                                                                style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                            <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
                                                        </div>
                                                        @endforeach
                                                </div>
                                            @endif
                                                @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                ->where('sub_category_name', 'Land_&_Plots')
                                                                                    
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                            @if($types->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 type5_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
                                                        @foreach($types as $type)
                                                                @php
                                                                    $checked = is_array(request('type')) && in_array($type, request('type'));
                                                                @endphp
                                                                <div class="form-group">
                                                                <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
                                                                </div>
                                                        @endforeach 
                                                </div>
                                            @endif
                                                @php
													// Fetch distinct features from the database
													$features = \App\Models\Ad::where('category_name', 'Property_for_sale')
														->where('sub_category_name', 'Land_&_Plots')
														->distinct()
														->pluck('feature')
														->flatMap(fn($feature) => explode(',', $feature))
														->map(fn($feature) => trim($feature))
														->filter(fn($feature) => !empty($feature)) // Filter out empty or invalid features
														->unique()
														->values();

													// Define how many features to show initially
													$initialCount = 6;
												@endphp

												@if($features->isNotEmpty())
													<div class="card mt-3 rounded px-4 feature1_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
														<h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>
														<div class="features-list">
															@foreach($features->take($initialCount) as $feature)
																@php
																	$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																	$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
																@endphp
																<div class="form-group">
																	<input type="checkbox"
																		id="{{ $featureFormatted }}"
																		name="feature[]" 
																		class="feature" 
																		value="{{ $feature }}" 
																		style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																		{{ $checked ? 'checked' : '' }} >
																	<label for="{{ $featureFormatted }}">{{ $feature }}</label>
																</div>
															@endforeach
														</div>

														@if($features->count() > $initialCount)
															<div class="more-features" style="display: none;">
																@foreach($features->skip($initialCount) as $feature)
																	@php
																		$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																		$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
																	@endphp
																	<div class="form-group">
																		<input type="checkbox"
																			id="{{ $featureFormatted }}"
																			name="feature[]" 
																			class="feature" 
																			value="{{ $feature }}" 
																			style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																			{{ $checked ? 'checked' : '' }} >
																		<label for="{{ $featureFormatted }}">{{ $feature }}</label>
																	</div>
																@endforeach
															</div>
															<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
																View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
															</a>
														@endif
													</div>
												@endif

                                                    @php
                                                                                            // Fetch types based on category_name and sub_category_name
                                                                                            $areaUnits = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                            ->where('sub_category_name', 'Land_&_Plots')
                                                                                                        
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('area_unit')
                                                                                                            ->where('area_unit', '!=', '')
                                                                                                            ->pluck('area_unit');
                                                    @endphp
                                            @if($areaUnits->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 area_unit1_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Area Unit</h4>        
                                                        <ul style="list-style:none; margin-left:0; padding-left:10px; margin-top:0; padding-top:0;">
                                                            @foreach($areaUnits as $unit)
                                                                <li>
                                                                    <input type="radio" 
                                                                        id="area_unit_{{ $unit }}" 
                                                                        name="area_unit[]" 
                                                                        value="{{ $unit }}" 
                                                                        class="area-unit-radio" 
                                                                        {{ request('area_unit') == $unit ? 'checked' : '' }} 
                                                                        style="display:none;">
                                                                    <label for="area_unit_{{ $unit }}" 
                                                                        class="area-unit-label" 
                                                                        style="text-decoration:none; color:{{ request('area_unit') == $unit ? '#000' : '#666' }}; font-weight:{{ request('area_unit') == $unit ? 'bold' : 'normal' }}; cursor:pointer;">
                                                                        {{ $unit }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                </div>
                                            @endif
                                                    @php
                                                                                // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                                $areas = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                            ->where('sub_category_name', 'Land_&_Plots')
                                                                                                            
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('area_square')
                                                                                                            ->where('area_square', '!=', '')
                                                                                                            ->pluck('area_square')
                                                                                                            ->sort();
                                                    @endphp
                                            @if($areas->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 area1_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                        <h4 class="fs-6 fw-bold px-1 pt-3">Area</h4>
                                                            <div class="form-group">
                                                                <select name="area_square[]" class="form-control" id="areaSelect" style="font-size:14px !important; color:#585454">
                                                                    <option value="" style="border:none !important; border-radius:4px; font-size:12px">Select Area</option>
                                                                    @foreach ($areas as $area)
                                                                        <option value="{{ $area }}" {{ request('area_square') == $area ? 'selected' : '' }}>
                                                                            {{ $area }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                </div>
                                            @endif
                                                @php
                                                                                            // Fetch types based on category_name and sub_category_name
                                                                                            $furnisheds = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                                            ->where('sub_category_name', 'Houses')
                                                                                                                            ->distinct()
                                                                                                                            ->whereNotNull('furnished')
                                                                                                                            ->where('furnished', '!=', '')
                                                                                                                            ->pluck('furnished');
                                                @endphp
                                            @if($furnisheds->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 furnished1_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Furnished</h4>
                                                        @foreach($furnisheds as $furnished)
                                                            @php
                                                                $id = strtolower(str_replace(' ', '-', $furnished));
                                                                $checked = is_array(request('furnished')) && in_array($furnished, request('furnished'));
                                                            @endphp
                                                            <div class="form-group">
																<input type="checkbox"           
																		name="furnished[]" 
																		class="furnished-check" 
																		value="{{ $furnished }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('furnished')) && in_array($furnished, request('furnished')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $furnished)) }}">{{ $furnished }}</label>
                                                            </div>
                                                            
                                                        @endforeach
                                                </div>
                                            @endif
                                                @php
                                                                            // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                            $bedrooms = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                        ->where('sub_category_name', 'Houses')
                                                                                                        
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('pro_sale_house_bedroom')
                                                                                                        ->where('pro_sale_house_bedroom', '!=', '')
                                                                                                        ->pluck('pro_sale_house_bedroom')
                                                                                                        ->sort();
                                                @endphp
                                            @if($bedrooms->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 pro_sale_house_bedroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                    <h4 class="fs-6 fw-bold px-1 pt-3">Bedrooms</h4>
                                                        <div class="form-group">
                                                            <select name="pro_sale_house_bedroom[]" class="form-control" id="bedroomSelect" style="font-size:14px !important; color:#585454">
                                                                <option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px;font-size:12px">Select Bedrooms</option>
                                                                @foreach ($bedrooms as $bedroom)
                                                                    <option value="{{ $bedroom }}"  {{ request('pro_sale_house_bedroom') == $bedroom ? 'selected' : '' }}>
                                                                            {{ $bedroom }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                            @endif
                                            
                                                @php
                                                                            // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                            $bathrooms = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                        ->where('sub_category_name', 'Houses')
                                                                                                        
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('pro_sale_house_bathroom')
                                                                                                        ->where('pro_sale_house_bathroom', '!=', '')
                                                                                                        ->pluck('pro_sale_house_bathroom')
                                                                                                        ->sort();
                                                @endphp
                                            @if($bathrooms->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 pro_sale_house_bathroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                    <h4 class="fs-6 fw-bold px-1 pt-3">Bathrooms</h4>
                                                        <div class="form-group">
                                                            <select name="pro_sale_house_bathroom[]" id="bathroomSelect" class="form-control " style="font-size:14px !important; color:#585454">
                                                                <option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px;font-size:12px">Select Bathrooms</option>
                                                                    @foreach ($bathrooms as $bathroom)
                                                                                                    <option value="{{ $bathroom }}"  {{ request('pro_sale_house_bathroom') == $bathroom ? 'selected' : '' }}>
                                                                                                        {{ $bathroom }}
                                                                                                    </option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                            @endif
                                            @php
                                                                // Fetch distinct values of construction_state_new_rent_house
                                                                $construction_state_news = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                    ->where('sub_category_name', 'Houses')
                                                                    ->distinct()
                                                                    ->whereNotNull('construction_state_new')
                                                                    ->where('construction_state_new', '!=', '')
                                                                    ->pluck('construction_state_new');
                                            @endphp
                                            @if($construction_state_news->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 construction_state_new" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                                            <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Construction State</h4>
                                                                                @foreach($construction_state_news as $construction_state_new)
                                                                                    <div class="form-group">
                                                                                        <input type="checkbox" 
                                                                                            id="{{ strtolower(str_replace(' ', '-', $construction_state_new)) }}" 
                                                                                            name="construction_state_new[]" 
                                                                                            value="{{ $construction_state_new }}" 
                                                                                            {{ is_array(request('construction_state_new')) && in_array($construction_state_new, request('construction_state_new')) ? 'checked' : '' }}>
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $construction_state_new)) }}">
                                                                                            {{ $construction_state_new }}
                                                                                        </label>
                                                                                    </div>
                                                                                @endforeach
                                                </div>
                                            @endif
                                            @php
                                                // Fetch distinct features from the database
                                                $features = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                    ->where('sub_category_name', 'Houses')
                                                ->distinct()
												->pluck('feature')
												->flatMap(fn($feature) => explode(',', $feature))
												->map(fn($feature) => trim($feature))
												->filter(fn($feature) => !empty($feature)) // Filter out empty or invalid features
												->unique()
												->values();

                                                // Define how many features to show initially
                                                $initialCount = 6;
                                            @endphp
                                           @if($features->isNotEmpty())
													<div class="card mt-3 rounded px-4 feature2_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
														<h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>
														<div class="features-list">
															@foreach($features->take($initialCount) as $feature)
																@php
																	$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																	$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
																@endphp
																<div class="form-group">
																	<input type="checkbox"
																		id="{{ $featureFormatted }}"
																		name="feature[]" 
																		class="feature" 
																		value="{{ $feature }}" 
																		style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																		{{ $checked ? 'checked' : '' }} >
																	<label for="{{ $featureFormatted }}">{{ $feature }}</label>
																</div>
															@endforeach
														</div>

														@if($features->count() > $initialCount)
															<div class="more-features" style="display: none;">
																@foreach($features->skip($initialCount) as $feature)
																	@php
																		$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																		$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
																	@endphp
																	<div class="form-group">
																		<input type="checkbox"
																			id="{{ $featureFormatted }}"
																			name="feature[]" 
																			class="feature" 
																			value="{{ $feature }}" 
																			style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																			{{ $checked ? 'checked' : '' }} >
																		<label for="{{ $featureFormatted }}">{{ $feature }}</label>
																	</div>
																@endforeach
															</div>
															<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
																View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
															</a>
														@endif
													</div>
												@endif
                                                @php
                                                                                        // Fetch types based on category_name and sub_category_name
                                                                                        $areaUnits = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                        ->where('sub_category_name', 'Houses')
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_unit')
                                                                                                        ->where('area_unit', '!=', '')
                                                                                                        ->pluck('area_unit');
                                                @endphp
                                            @if($areaUnits->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 area_unit2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Area Unit</h4>        
                                                        <ul style="list-style:none; margin-left:0; padding-left:10px; margin-top:0; padding-top:0;">
                                                            @foreach($areaUnits as $unit)
                                                                <li>
                                                                    <input type="radio" 
                                                                        id="area_unit_{{ $unit }}" 
                                                                        name="area_unit[]" 
                                                                        value="{{ $unit }}" 
                                                                        class="area-unit-radio" 
                                                                        {{ request('area_unit') == $unit ? 'checked' : '' }} 
                                                                        style="display:none;">
                                                                    <label for="area_unit_{{ $unit }}" 
                                                                        class="area-unit-label" 
                                                                        style="text-decoration:none; color:{{ request('area_unit') == $unit ? '#000' : '#666' }}; font-weight:{{ request('area_unit') == $unit ? 'bold' : 'normal' }}; cursor:pointer;">
                                                                        {{ $unit }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                </div>
                                            @endif
                                                @php
                                                                            // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                            $areas = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                        ->where('sub_category_name', 'Houses')
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_square')
                                                                                                        ->where('area_square', '!=', '')
                                                                                                        ->pluck('area_square')
                                                                                                        ->sort();
                                                @endphp
                                            @if($areas->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 area2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                        <h4 class="fs-6 fw-bold px-1 pt-3">Area</h4>
                                                            <div class="form-group">
                                                                <select name="area_square[]" class="form-control" id="areaSelect" style="font-size:14px !important; color:#585454">
                                                                    <option value="" style="border:none !important; border-radius:4px; font-size:12px">Select Area</option>
                                                                    @foreach ($areas as $area)
                                                                        <option value="{{ $area }}" {{ request('area_square') == $area ? 'selected' : '' }}>
                                                                            {{ $area }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                </div>
                                            @endif
                                                @php
                                                                                            // Fetch types based on category_name and sub_category_name
                                                                                            $furnisheds = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                                            ->where('sub_category_name', 'Apartments_&_Flats')
                                                                                                                            ->distinct()
                                                                                                                            ->whereNotNull('furnished')
                                                                                                                            ->where('furnished', '!=', '')
                                                                                                                            ->pluck('furnished');
                                                @endphp
                                            @if($furnisheds->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 furnished2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Furnished</h4>
                                                        @foreach($furnisheds as $furnished)
                                                            @php
                                                                $id = strtolower(str_replace(' ', '-', $furnished));
                                                                $checked = is_array(request('furnished')) && in_array($furnished, request('furnished'));
                                                            @endphp
                                                            <div class="form-group">
																<input type="checkbox"           
																		name="furnished[]" 
																		class="furnished-check" 
																		value="{{ $furnished }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('furnished')) && in_array($furnished, request('furnished')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $furnished)) }}">{{ $furnished }}</label>
                                                            </div>
                                                        
                                                        @endforeach
                                                </div>
                                            @endif
                                            @php
                                                // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                        $bedrooms = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                    ->where('sub_category_name', 'Apartments_&_Flats')
                                                                                                    
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('pro_sale_appart_bedroom')
                                                                                                    ->where('pro_sale_appart_bedroom', '!=', '')
                                                                                                    ->pluck('pro_sale_appart_bedroom')
                                                                                                    ->sort();
                                            @endphp
                                            @if($bedrooms->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 pro_sale_appart_bedroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                        <h4 class="fs-6 fw-bold px-1 pt-3">Bedrooms</h4>
                                                        <div class="form-group">
                                                            <select name="pro_sale_appart_bedroom[]" class="form-control" id="bedroomSelect">
                                                                <option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bedrooms</option>
                                                                @foreach ($bedrooms as $bedroom)
                                                                                                    <option value="{{ $bedroom }}"  {{ request('pro_sale_appart_bedroom') == $bedroom ? 'selected' : '' }}>
                                                                                                        {{ $bedroom }}
                                                                                                    </option>
                                                                                                @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                            @endif
                                            @php
                                                // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                        $bathrooms = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                    ->where('sub_category_name', 'Apartments_&_Flats')
                                                                                                    
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('pro_sale_appart_bathroom')
                                                                                                    ->where('pro_sale_appart_bathroom', '!=', '')
                                                                                                    ->pluck('pro_sale_appart_bathroom')
                                                                                                    ->sort();
                                            @endphp
                                            @if($bathrooms->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 pro_sale_appart_bathroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                        <h4 class="fs-6 fw-bold px-1 pt-3">Bathroom</h4>
                                                        <div class="form-group">
                                                            <select name="pro_sale_appart_bathroom[]" class="form-control" id="bathroomSelect">
                                                                <option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bathrooms</option>
                                                                @foreach ($bathrooms as $bathroom)
                                                                                                    <option value="{{ $bathroom }}"  {{ request('pro_sale_appart_bathroom') == $bathroom ? 'selected' : '' }}>
                                                                                                        {{ $bathroom }}
                                                                                                    </option>
                                                                                                @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                            @endif

								             @php
												// Fetch distinct features from the database
												$features = \App\Models\Ad::where('category_name', 'Property_for_sale')
													->where('sub_category_name', 'Apartments_&_Flats')
													->distinct()
													->pluck('feature')
													->flatMap(fn($feature) => explode(',', $feature))
													->map(fn($feature) => trim($feature))
													->filter(fn($feature) => !empty($feature)) // Filter out empty or invalid features
													->unique()
													->values();

												// Define how many features to show initially
												$initialCount = 6;
											@endphp

											@if($features->isNotEmpty())
												<div class="card mt-3 rounded px-4 feature3_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>
													<div class="features-list">
														@foreach($features->take($initialCount) as $feature)
															@php
																$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
															@endphp
															<div class="form-group">
																<input type="checkbox"
																	id="{{ $featureFormatted }}"
																	name="feature[]" 
																	class="feature" 
																	value="{{ $feature }}" 
																	style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																	{{ $checked ? 'checked' : '' }} >
																<label for="{{ $featureFormatted }}">{{ $feature }}</label>
															</div>
														@endforeach
													</div>

													@if($features->count() > $initialCount)
														<div class="more-features" style="display: none;">
															@foreach($features->skip($initialCount) as $feature)
																@php
																	$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																	$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
																@endphp
																<div class="form-group">
																	<input type="checkbox"
																		id="{{ $featureFormatted }}"
																		name="feature[]" 
																		class="feature" 
																		value="{{ $feature }}" 
																		style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																		{{ $checked ? 'checked' : '' }} >
																	<label for="{{ $featureFormatted }}">{{ $feature }}</label>
																</div>
															@endforeach
														</div>
														<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
															View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
														</a>
													@endif
												</div>
											@endif

                                                @php
                                                                                        // Fetch types based on category_name and sub_category_name
                                                                                        $areaUnits = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                        ->where('sub_category_name', 'Apartments_&_Flats')
                                                                                                    
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_unit')
                                                                                                        ->where('area_unit', '!=', '')
                                                                                                        ->pluck('area_unit');
                                                @endphp
                                            @if($areaUnits->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 area_unit3_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Area Unit</h4>        
                                                        <ul style="list-style:none; margin-left:0; padding-left:10px; margin-top:0; padding-top:0;">
                                                            @foreach($areaUnits as $unit)
                                                                <li>
                                                                    <input type="radio" 
                                                                        id="area_unit_{{ $unit }}" 
                                                                        name="area_unit[]" 
                                                                        value="{{ $unit }}" 
                                                                        class="area-unit-radio" 
                                                                        {{ request('area_unit') == $unit ? 'checked' : '' }} 
                                                                        style="display:none;">
                                                                    <label for="area_unit_{{ $unit }}" 
                                                                        class="area-unit-label" 
                                                                        style="text-decoration:none; color:{{ request('area_unit') == $unit ? '#000' : '#666' }}; font-weight:{{ request('area_unit') == $unit ? 'bold' : 'normal' }}; cursor:pointer;">
                                                                        {{ $unit }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                </div>
                                            @endif
                                                    @php
                                                                                // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                                $areas = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                            ->where('sub_category_name', 'Apartments_&_Flats')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('area_square')
                                                                                                            ->where('area_square', '!=', '')
                                                                                                            ->pluck('area_square')
                                                                                                            ->sort();
                                                    @endphp
                                            @if($areas->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 area3_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                        <h4 class="fs-6 fw-bold px-1 pt-3">Area</h4>
                                                            <div class="form-group">
                                                                <select name="area_square[]" class="form-control" id="areaSelect" style="font-size:14px !important; color:#585454">
                                                                    <option value="" style="border:none !important; border-radius:4px; font-size:12px">Select Area</option>
                                                                    @foreach ($areas as $area)
                                                                        <option value="{{ $area }}" {{ request('area_square') == $area ? 'selected' : '' }}>
                                                                            {{ $area }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                </div>
                                            @endif
                                                @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                ->where('sub_category_name', 'Shops_Offices_Commercial_Space')
                                                                                    
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                            @if($types->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 type12_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
                                                        @foreach($types as $type)
                                                                @php
                                                                    $checked = is_array(request('type')) && in_array($type, request('type'));
                                                                @endphp
                                                                <div class="form-group">
                                                                <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
                                                                </div>
                                                        @endforeach 
                                                </div>
                                            @endif
                                            @php
                                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                        $floors = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                    ->where('sub_category_name', 'Shops_Offices_Commercial_Space')
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('pro_sale_shope_floor_level')
                                                                                                    ->where('pro_sale_shope_floor_level', '!=', '')
                                                                                                    ->pluck('pro_sale_shope_floor_level')
                                                                                                    ->sort();
                                            @endphp
                                        @if($floors->isNotEmpty())
                                            <div class="card mt-3 rounded px-4 pro_sale_shope_floor_level_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                <h4 class="fs-6 fw-bold px-1 pt-3">Floor Level</h4>
                                                <div class="form-group">
                                                    <select name="pro_sale_shope_floor_level" class="form-control " id="floorSelect" >
                                                        <option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Floor level</option>
                                                            @foreach ($floors as $floor)
                                                                <option value="{{ $floor }}"  {{ request('pro_sale_shope_floor_level') == $floor ? 'selected' : '' }}>
                                                                    {{ $floor }}
                                                                </option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                            @php
                                                // Fetch distinct features from the database
                                                $features = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                    ->where('sub_category_name', 'Shops_Offices_Commercial_Space')
                                                ->distinct()
												->pluck('feature')
												->flatMap(fn($feature) => explode(',', $feature))
												->map(fn($feature) => trim($feature))
												->filter(fn($feature) => !empty($feature)) // Filter out empty or invalid features
												->unique()
												->values();

                                                // Define how many features to show initially
                                                $initialCount = 6;
                                            @endphp
                                            @if($features->isNotEmpty())
												<div class="card mt-3 rounded px-4 feature4_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>
													<div class="features-list">
														@foreach($features->take($initialCount) as $feature)
															@php
																$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
															@endphp
															<div class="form-group">
																<input type="checkbox"
																	id="{{ $featureFormatted }}"
																	name="feature[]" 
																	class="feature" 
																	value="{{ $feature }}" 
																	style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																	{{ $checked ? 'checked' : '' }} >
																<label for="{{ $featureFormatted }}">{{ $feature }}</label>
															</div>
														@endforeach
													</div>

													@if($features->count() > $initialCount)
														<div class="more-features" style="display: none;">
															@foreach($features->skip($initialCount) as $feature)
																@php
																	$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																	$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
																@endphp
																<div class="form-group">
																	<input type="checkbox"
																		id="{{ $featureFormatted }}"
																		name="feature[]" 
																		class="feature" 
																		value="{{ $feature }}" 
																		style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																		{{ $checked ? 'checked' : '' }} >
																	<label for="{{ $featureFormatted }}">{{ $feature }}</label>
																</div>
															@endforeach
														</div>
														<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
															View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
														</a>
													@endif
												</div>
											@endif
                                                @php
                                                                                        // Fetch types based on category_name and sub_category_name
                                                                                        $areaUnits = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                        ->where('sub_category_name', 'Shops_Offices_Commercial_Space')
                                                                                                    
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_unit')
                                                                                                        ->where('area_unit', '!=', '')
                                                                                                        ->pluck('area_unit');
                                                @endphp
                                            @if($areaUnits->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 area_unit4_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Area Unit</h4>        
                                                        <ul style="list-style:none; margin-left:0; padding-left:10px; margin-top:0; padding-top:0;">
                                                            @foreach($areaUnits as $unit)
                                                                <li>
                                                                    <input type="radio" 
                                                                        id="area_unit_{{ $unit }}" 
                                                                        name="area_unit[]" 
                                                                        value="{{ $unit }}" 
                                                                        class="area-unit-radio" 
                                                                        {{ request('area_unit') == $unit ? 'checked' : '' }} 
                                                                        style="display:none;">
                                                                    <label for="area_unit_{{ $unit }}" 
                                                                        class="area-unit-label" 
                                                                        style="text-decoration:none; color:{{ request('area_unit') == $unit ? '#000' : '#666' }}; font-weight:{{ request('area_unit') == $unit ? 'bold' : 'normal' }}; cursor:pointer;">
                                                                        {{ $unit }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                </div>
                                            @endif
                                                    @php
                                                                                // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                                $areas = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                            ->where('sub_category_name', 'Shops_Offices_Commercial_Space')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('area_square')
                                                                                                            ->where('area_square', '!=', '')
                                                                                                            ->pluck('area_square')
                                                                                                            ->sort();
                                                    @endphp
                                            @if($areas->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 area4_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                        <h4 class="fs-6 fw-bold px-1 pt-3">Area</h4>
                                                            <div class="form-group">
                                                                <select name="area_square[]" class="form-control" id="areaSelect" style="font-size:14px !important; color:#585454">
                                                                    <option value="" style="border:none !important; border-radius:4px; font-size:12px">Select Area</option>
                                                                    @foreach ($areas as $area)
                                                                        <option value="{{ $area }}" {{ request('area_square') == $area ? 'selected' : '' }}>
                                                                            {{ $area }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                </div>
                                            @endif
                                                @php
                                                                                            // Fetch types based on category_name and sub_category_name
                                                                                            $furnisheds = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                                            ->where('sub_category_name', 'Portions_&_Floors')
                                                                                                                            ->distinct()
                                                                                                                            ->whereNotNull('furnished')
                                                                                                                            ->where('furnished', '!=', '')
                                                                                                                            ->pluck('furnished');
                                                @endphp
                                            @if($furnisheds->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 furnished3_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Furnished</h4>
                                                        @foreach($furnisheds as $furnished)
                                                            <div class="form-group">
																<input type="checkbox"           
																		name="furnished[]" 
																		class="furnished-check" 
																		value="{{ $furnished }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('furnished')) && in_array($furnished, request('furnished')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $furnished)) }}">{{ $furnished }}</label>
                                                            </div>
                                                        @endforeach
                                                </div>
                                            @endif
                                            @php
                                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                        $bedrooms = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                    ->where('sub_category_name', 'Portions_&_Floors')
                                                                                                    
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('pro_sale_portion_bedroom')
                                                                                                    ->where('pro_sale_portion_bedroom', '!=', '')
                                                                                                    ->pluck('pro_sale_portion_bedroom')
                                                                                                    ->sort();
                                            @endphp
                                            @if($bedrooms->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 pro_sale_portion_bedroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                    <h4 class="fs-6 fw-bold px-1 pt-3">Bedrooms</h4>
                                                        <div class="form-group">
                                                            <select name="pro_sale_portion_bedroom[]" class="form-control " id="bedroomSelect" >
                                                                <option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bedroom</option>
                                                                    @foreach ($bedrooms as $bedroom)
                                                                        <option value="{{ $bedroom }}"  {{ request('pro_sale_portion_bedroom') == $bedroom ? 'selected' : '' }}>
                                                                                                    {{ $bedroom }}
                                                                                                </option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                            @endif
                                                @php
                                                                            // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                            $bathrooms = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                        ->where('sub_category_name', 'Portions_&_Floors')
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('pro_sale_portion_bathroom')
                                                                                                        ->where('pro_sale_portion_bathroom', '!=', '')
                                                                                                        ->pluck('pro_sale_portion_bathroom')
                                                                                                        ->sort();
                                                @endphp
                                            @if($bathrooms->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 pro_sale_portion_bathroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                    <h4 class="fs-6 fw-bold px-1 pt-3">Bathrooms</h4>
                                                    <div class="form-group">
                                                        <select name="pro_sale_portion_bathroom[]" class="form-control " id="bathroomSelect">
                                                            <option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select bathroom</option>
                                                            @foreach ($bathrooms as $bathroom)
                                                                                                <option value="{{ $bedroom }}"  {{ request('pro_sale_portion_bathroom') == $bathroom ? 'selected' : '' }}>
                                                                                                    {{ $bathroom }}
                                                                                                </option>
                                                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            @php
                                                // Fetch distinct features from the database
                                                $features = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                    ->where('sub_category_name', 'Portions_&_Floors')
                                                    ->distinct()
													->pluck('feature')
													->flatMap(fn($feature) => explode(',', $feature))
													->map(fn($feature) => trim($feature))
													->filter(fn($feature) => !empty($feature)) // Filter out empty or invalid features
													->unique()
													->values();

												// Define how many features to show initially
												$initialCount = 6;
											@endphp

											@if($features->isNotEmpty())
												<div class="card mt-3 rounded px-4 feature5_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>
													<div class="features-list">
														@foreach($features->take($initialCount) as $feature)
															@php
																$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
															@endphp
															<div class="form-group">
																<input type="checkbox"
																	id="{{ $featureFormatted }}"
																	name="feature[]" 
																	class="feature" 
																	value="{{ $feature }}" 
																	style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																	{{ $checked ? 'checked' : '' }} >
																<label for="{{ $featureFormatted }}">{{ $feature }}</label>
															</div>
														@endforeach
													</div>

													@if($features->count() > $initialCount)
														<div class="more-features" style="display: none;">
															@foreach($features->skip($initialCount) as $feature)
																@php
																	$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																	$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
																@endphp
																<div class="form-group">
																	<input type="checkbox"
																		id="{{ $featureFormatted }}"
																		name="feature[]" 
																		class="feature" 
																		value="{{ $feature }}" 
																		style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																		{{ $checked ? 'checked' : '' }} >
																	<label for="{{ $featureFormatted }}">{{ $feature }}</label>
																</div>
															@endforeach
														</div>
														<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
															View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
														</a>
													@endif
												</div>
											@endif
                                            @php
                                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                        $floors = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                    ->where('sub_category_name', 'Portions_&_Floors')
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('pro_sale_portion_floor_level')
                                                                                                    ->where('pro_sale_portion_floor_level', '!=', '')
                                                                                                    ->pluck('pro_sale_portion_floor_level')
                                                                                                    ->sort();
                                            @endphp
                                            @if($floors->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 pro_sale_portion_floor_level_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                    <h4 class="fs-6 fw-bold px-1 pt-3">Floor Level</h4>
                                                    <div class="form-group">
                                                        <select name="pro_sale_portion_floor_level[]" class="form-control "  id="floorSelect">
                                                            <option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Floor Level</option>
                                                            @foreach ($floors as $floor)
                                                                    <option value="{{ $floor }}"  {{ request('pro_sale_portion_bathroom') == $floor ? 'selected' : '' }}>
                                                                                                    {{ $floors }}
                                                                    </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            @php
                                                                                        // Fetch types based on category_name and sub_category_name
                                                                                        $areaUnits = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                        ->where('sub_category_name', 'Portions_&_Floors')
                                                                                                        
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_unit')
                                                                                                        ->where('area_unit', '!=', '')
                                                                                                        ->pluck('area_unit');
                                                @endphp
                                            @if($areaUnits->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 area_unit5_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Area Unit</h4>        
                                                        <ul style="list-style:none; margin-left:0; padding-left:10px; margin-top:0; padding-top:0;">
                                                            @foreach($areaUnits as $unit)
                                                                <li>
                                                                    <input type="radio" 
                                                                        id="area_unit_{{ $unit }}" 
                                                                        name="area_unit[]" 
                                                                        value="{{ $unit }}" 
                                                                        class="area-unit-radio" 
                                                                        {{ request('area_unit') == $unit ? 'checked' : '' }} 
                                                                        style="display:none;">
                                                                    <label for="area_unit_{{ $unit }}" 
                                                                        class="area-unit-label" 
                                                                        style="text-decoration:none; color:{{ request('area_unit') == $unit ? '#000' : '#666' }}; font-weight:{{ request('area_unit') == $unit ? 'bold' : 'normal' }}; cursor:pointer;">
                                                                        {{ $unit }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                </div>
                                            @endif
                                                    @php
                                                                                // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                                $areas =  \App\Models\Ad::where('category_name', 'Property_for_sale')
                                                                                                            ->where('sub_category_name', 'Portions_&_Floors')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('area_square')
                                                                                                            ->where('area_square', '!=', '')
                                                                                                            ->pluck('area_square')
                                                                                                            ->sort();
                                                    @endphp
                                            @if($areas->isNotEmpty())
                                                <div class="card mt-3 rounded px-4 area5_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                        <h4 class="fs-6 fw-bold px-1 pt-3">Area</h4>
                                                            <div class="form-group">
                                                                <select name="area_square[]" class="form-control" id="areaSelect" style="font-size:14px !important; color:#585454">
                                                                    <option value="" style="border:none !important; border-radius:4px; font-size:12px">Select Area</option>
                                                                    @foreach ($areas as $area)
                                                                        <option value="{{ $area }}" {{ request('area_square') == $area ? 'selected' : '' }}>
                                                                            {{ $area }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                </div>
                                            @endif
                                                @php
                                                                                            // Fetch types based on category_name and sub_category_name
                                                                                            $furnisheds = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                                            ->where('sub_category_name', 'Houses_for_Rent')
                                                                                                                            ->distinct()
                                                                                                                            ->whereNotNull('furnished')
                                                                                                                            ->where('furnished', '!=', '')
                                                                                                                            ->pluck('furnished');
                                                @endphp
                                            @if($furnisheds->isNotEmpty())
                                                <div class="card mt-3 pb-2 rounded px-4 furnished4_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                        <h4 class="fs-6 fw-bold px-1 py-4 mb-0">Furnished</h4>
                                                        @foreach($furnisheds as $furnished)
                                                            <div class="form-group">
                                                                <input type="checkbox" 
                                                                                        id="{{ strtolower(str_replace(' ', '-', $furnished)) }}" 
                                                                                        name="furnished[]" 
                                                                                        class="furnished-check" 
                                                                                        value="{{ $furnished }}" 
                                                                                        {{ is_array(request('furnished')) && in_array($furnished, request('furnished')) ? 'checked' : '' }}>
                                                                                    <label for="{{ strtolower(str_replace(' ', '-', $furnished)) }}">{{ $furnished }}</label>
                                                            </div>
                                                            
                                                        @endforeach
                                                </div>
                                            @endif
								            @php
                                                                // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                $bedrooms = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Houses_for_Rent')
                                                                                                        
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('pro_rent_house_bedroom')
                                                                                                        ->where('pro_rent_house_bedroom', '!=', '')
                                                                                                        ->pluck('pro_rent_house_bedroom')
                                                                                                        ->sort();
                                            @endphp
                                        @if($bedrooms->isNotEmpty())
                                        <div class="card mt-3 rounded px-4 pro_rent_house_bedroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                                    <h4 class="fs-6 fw-bold px-1 pt-3">Bedrooms</h4>
                                                                    <div class="form-group">
                                                                        <select name="pro_rent_house_bedroom[]" class="form-control " id="bedroomSelect">
                                                                            <option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bedroom</option>
                                                                            @foreach ($bedrooms as $bedroom)
                                                                                <option value="{{ $bedroom }}"  {{ request('pro_rent_house_bedroom') == $bedroom ? 'selected' : '' }}>
                                                                                    {{ $bedroom }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                        </div>
                                        @endif
                                            @php
                                                                // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                $bathrooms = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Houses_for_Rent')
                                                                                                        
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('pro_rent_house_bedroom')
                                                                                                        ->where('pro_rent_house_bathroom', '!=', '')
                                                                                                        ->pluck('pro_rent_house_bathroom')
                                                                                                        ->sort();
                                            @endphp
                                        @if($bathrooms->isNotEmpty())
											<div class="card mt-3 rounded px-4 pro_rent_house_bathroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bold px-1 pt-3">Bathrooms</h4>
												<div class="form-group">
													<select name="pro_rent_house_bathroom[]" class="form-control " id="bathroomSelect">
														<option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bathroom</option>
														@foreach ($bathrooms as $bathroom)
															<option value="{{ $bathroom }}"  {{ request('pro_rent_house_bathroom') == $bathroom ? 'selected' : '' }}>
																{{ $bathroom }}
															</option>
														@endforeach
													</select>
												</div>
											</div>
                                        @endif
								            @php
                                                                    $no_storeys = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                ->where('sub_category_name', 'Houses_for_Rent')                
                                                                                                ->distinct()
                                                                                                ->whereNotNull('no_storeys')
                                                                                                ->where('no_storeys', '!=', '')
                                                                                                ->pluck('no_storeys');
                                            @endphp
                                        @if($no_storeys->isNotEmpty())
											<div class="card mt-3 rounded px-4 no_storeys_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
												<h4 class="fs-6 fw-bold px-1 pt-3">No of Storeys</h4>
												@foreach($no_storeys as $no_storey)
													<div class="form-group">
													@php
														$id = strtolower(str_replace(' ', '-', $no_storey));
														$checked = is_array(request('no_storeys')) && in_array($no_storey, request('no_storeys'));
													@endphp
													<input type="checkbox" 
														   id="{{ strtolower(str_replace(' ', '-', $no_storey)) }}" 
														   name="no_storeys[]" 
														   class="storey-checkbox"
														   value="{{ $no_storey }}" 
														   {{ is_array(request('no_storeys')) && in_array($no_storey, request('no_storeys')) ? 'checked' : '' }}>
                                                                        <label for="{{ strtolower(str_replace(' ', '-', $no_storey)) }}">{{ $no_storey }}</label>
													</div>
												@endforeach
											</div>
                                        @endif
								            @php
                                                // Fetch distinct features from the database
                                                $features = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                    ->where('sub_category_name', 'Houses_for_Rent')
                                                    
                                                    ->distinct()
													->pluck('feature')
													->flatMap(fn($feature) => explode(',', $feature))
													->map(fn($feature) => trim($feature))
													->filter(fn($feature) => !empty($feature)) // Filter out empty or invalid features
													->unique()
													->values();

													// Define how many features to show initially
													$initialCount = 6;
													@endphp

													@if($features->isNotEmpty())
													<div class="card mt-3 rounded px-4 feature6_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
														<h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>
														<div class="features-list">
															@foreach($features->take($initialCount) as $feature)
															@php
															$featureFormatted = strtolower(str_replace(' ', '_', $feature));
															$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
															@endphp
															<div class="form-group">
																<input type="checkbox"
																	   id="{{ $featureFormatted }}"
																	   name="feature[]" 
																	   class="feature" 
																	   value="{{ $feature }}" 
																	   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																	   {{ $checked ? 'checked' : '' }} >
																<label for="{{ $featureFormatted }}">{{ $feature }}</label>
															</div>
															@endforeach
														</div>

														@if($features->count() > $initialCount)
														<div class="more-features" style="display: none;">
															@foreach($features->skip($initialCount) as $feature)
															@php
															$featureFormatted = strtolower(str_replace(' ', '_', $feature));
															$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
															@endphp
															<div class="form-group">
																<input type="checkbox"
																	   id="{{ $featureFormatted }}"
																	   name="feature[]" 
																	   class="feature" 
																	   value="{{ $feature }}" 
																	   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																	   {{ $checked ? 'checked' : '' }} >
																<label for="{{ $featureFormatted }}">{{ $feature }}</label>
															</div>
															@endforeach
														</div>
														<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
															View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
														</a>
														@endif
													</div>
													@endif
                                            @php
                                                                // Fetch distinct values of construction_state_new_rent_house
                                                                $construction_state_new_rent_houses = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                    ->where('sub_category_name', 'Houses_for_Rent')
                                                                    ->distinct()
                                                                    ->whereNotNull('construction_state_new_rent_house')
                                                                    ->where('construction_state_new_rent_house', '!=', '')
                                                                    ->pluck('construction_state_new_rent_house');
                                            @endphp
                                        @if($construction_state_new_rent_houses->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 construction_state_new_rent_house_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
																		<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Construction State</h4>
																			@foreach($construction_state_new_rent_houses as $construction_state_new_rent_house)
																				<div class="form-group">
																					<input type="checkbox" 
																						id="{{ strtolower(str_replace(' ', '-', $construction_state_new_rent_house)) }}" 
																						name="construction_state_new_rent_house[]" 
																						value="{{ $construction_state_new_rent_house }}" 
																						{{ is_array(request('construction_state_new_rent_house')) && in_array($construction_state_new_rent_house, request('construction_state_new_rent_house')) ? 'checked' : '' }}>
																					<label for="{{ strtolower(str_replace(' ', '-', $construction_state_new_rent_house)) }}">
																						{{ $construction_state_new_rent_house }}
																					</label>
																				</div>
																			@endforeach
											</div>
                                        @endif
								                @php
                                                                                        // Fetch types based on category_name and sub_category_name
                                                                                        $areaUnits = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Houses_for_Rent')
                                                                                                    
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_unit')
                                                                                                        ->where('area_unit', '!=', '')
                                                                                                        ->pluck('area_unit');
                                                @endphp
                                        @if($areaUnits->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 area_unit6_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Area Unit</h4>        
													<ul style="list-style:none; margin-left:0; padding-left:10px; margin-top:0; padding-top:0;">
														@foreach($areaUnits as $unit)
															<li>
																<input type="radio" 
																	id="area_unit_{{ $unit }}" 
																	name="area_unit[]" 
																	value="{{ $unit }}" 
																	class="area-unit-radio" 
																	{{ request('area_unit') == $unit ? 'checked' : '' }} 
																	style="display:none;">
																<label for="area_unit_{{ $unit }}" 
																	class="area-unit-label" 
																	style="text-decoration:none; color:{{ request('area_unit') == $unit ? '#000' : '#666' }}; font-weight:{{ request('area_unit') == $unit ? 'bold' : 'normal' }}; cursor:pointer;">
																	{{ $unit }}
																</label>
															</li>
														@endforeach
													</ul>
											</div>
                                        @endif
                                                @php
                                                                            // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                            $areas = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Houses_for_Rent')
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_square')
                                                                                                        ->where('area_square', '!=', '')
                                                                                                        ->pluck('area_square')
                                                                                                        ->sort();
                                                @endphp
                                        @if($areas->isNotEmpty())
											<div class="card mt-3 rounded px-4 area6_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Area</h4>
														<div class="form-group">
															<select name="area_square[]" class="form-control" id="areaSelect" style="font-size:14px !important; color:#585454">
																<option value="" style="border:none !important; border-radius:4px; font-size:12px">Select Area</option>
																@foreach ($areas as $area)
																	<option value="{{ $area }}" {{ request('area_square') == $area ? 'selected' : '' }}>
																		{{ $area }}
																	</option>
																@endforeach
															</select>
														</div>
											</div>
                                        @endif
								              @php
                                                                                            // Fetch types based on category_name and sub_category_name
                                                                                            $furnisheds = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                                            ->where('sub_category_name', 'Apartments_&_Flats_Rent')
                                                                                                                            ->distinct()
                                                                                                                            ->whereNotNull('furnished')
                                                                                                                            ->where('furnished', '!=', '')
                                                                                                                            ->pluck('furnished');
                                                @endphp
                                        @if($furnisheds->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 furnished5_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Furnished</h4>
													@foreach($furnisheds as $furnished)
														<div class="form-group">
															<input type="checkbox" 
                                                                                        id="{{ strtolower(str_replace(' ', '-', $furnished)) }}" 
                                                                                        name="furnished[]" 
                                                                                        class="furnished-check" 
                                                                                        value="{{ $furnished }}" 
                                                                                        {{ is_array(request('furnished')) && in_array($furnished, request('furnished')) ? 'checked' : '' }}>
                                                                                    <label for="{{ strtolower(str_replace(' ', '-', $furnished)) }}">{{ $furnished }}</label>
														</div>

													@endforeach
											</div>
                                        @endif
								        @php
                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                        $bedrooms = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                    ->where('sub_category_name', 'Apartments_&_Flats_Rent')
                                                                                                    
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('pro_rent_appart_bedroom')
                                                                                                    ->where('pro_rent_appart_bedroom', '!=', '')
                                                                                                    ->pluck('pro_rent_appart_bedroom')
                                                                                                    ->sort();
                                            @endphp
                                        @if($bedrooms->isNotEmpty())
                                        <div class="card mt-3 rounded px-4 pro_rent_appart_bedroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
                                                                    <h4 class="fs-6 fw-bold px-1 pt-3">Bedrooms</h4>
                                                                    <div class="form-group">
                                                                        <select name="pro_rent_appart_bedroom[]" class="form-control " id="bedroomSelect">
                                                                            <option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bedrooms</option>
                                                                            @foreach ($bedrooms as $bedroom)
                                                                                <option value="{{ $bedroom }}"  {{ request('pro_rent_appart_bedroom') == $bedroom ? 'selected' : '' }}>
                                                                                    {{ $bedroom }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                        </div>
                                        @endif
                                            @php
                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                        $bathrooms = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                    ->where('sub_category_name', 'Apartments_&_Flats_Rent')
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('pro_rent_apart_bathroom')
                                                                                                    ->where('pro_rent_apart_bathroom', '!=', '')
                                                                                                    ->pluck('pro_rent_apart_bathroom')
                                                                                                    ->sort();
                                            @endphp
                                        @if($bathrooms->isNotEmpty())
											<div class="card mt-3 rounded px-4 pro_rent_apart_bathroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
																		<h4 class="fs-6 fw-bold px-1 pt-3">Bathrooms</h4>
																		<div class="form-group">
																			<select name="pro_rent_apart_bathroom[]" class="form-control " id="bathroomSelect">
																				<option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bathrooms</option>
																				@foreach ($bathrooms as $bathroom)
																					<option value="{{ $bathroom }}"  {{ request('pro_rent_apart_bathroom') == $bathroom ? 'selected' : '' }}>
																						{{ $bathroom }}
																					</option>
																				@endforeach
																			</select>
																		</div>
											</div>
                                        @endif
								           @php
                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                        $floors = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                    ->where('sub_category_name', 'Apartments_&_Flats_Rent')
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('pro_rent_appart_floor')
                                                                                                    ->where('pro_rent_appart_floor', '!=', '')
                                                                                                    ->pluck('pro_rent_appart_floor')
                                                                                                    ->sort();
                                            @endphp
                                        @if($floors->isNotEmpty())
											<div class="card mt-3 rounded px-4 pro_rent_appart_floor_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
																		<h4 class="fs-6 fw-bold px-1 pt-3">Floor Level</h4>
																		<div class="form-group">
																			<select name="pro_rent_appart_floor[]" class="form-control " id="floorSelect">
																				<option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Floor Level</option>
																				@foreach ($floors as $floor)
																					<option value="{{ $floor }}"  {{ request('pro_rent_appart_floor') == $floor ? 'selected' : '' }}>
																						{{ $floor }}
																					</option>
																				@endforeach
																			</select>
																		</div>
											</div>
                                        @endif
								             @php
                                                // Fetch distinct features from the database
                                                $features = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                    ->where('sub_category_name', 'Apartments_&_Flats_Rent')
                                                    ->distinct()
													->pluck('feature')
													->flatMap(fn($feature) => explode(',', $feature))
													->map(fn($feature) => trim($feature))
													->filter(fn($feature) => !empty($feature)) // Filter out empty or invalid features
													->unique()
													->values();

												// Define how many features to show initially
												$initialCount = 6;
											@endphp

											@if($features->isNotEmpty())
												<div class="card mt-3 rounded px-4 feature7_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>
													<div class="features-list">
														@foreach($features->take($initialCount) as $feature)
															@php
																$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
															@endphp
															<div class="form-group">
																<input type="checkbox"
																	id="{{ $featureFormatted }}"
																	name="feature[]" 
																	class="feature" 
																	value="{{ $feature }}" 
																	style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																	{{ $checked ? 'checked' : '' }} >
																<label for="{{ $featureFormatted }}">{{ $feature }}</label>
															</div>
														@endforeach
													</div>

													@if($features->count() > $initialCount)
														<div class="more-features" style="display: none;">
															@foreach($features->skip($initialCount) as $feature)
																@php
																	$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																	$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
																@endphp
																<div class="form-group">
																	<input type="checkbox"
																		id="{{ $featureFormatted }}"
																		name="feature[]" 
																		class="feature" 
																		value="{{ $feature }}" 
																		style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																		{{ $checked ? 'checked' : '' }} >
																	<label for="{{ $featureFormatted }}">{{ $feature }}</label>
																</div>
															@endforeach
														</div>
														<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
															View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
														</a>
													@endif
												</div>
											@endif
								                 @php
                                                                                        // Fetch types based on category_name and sub_category_name
                                                                                        $areaUnits = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Apartments_&_Flats_Rent')
                                                                                                        
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_unit')
                                                                                                        ->where('area_unit', '!=', '')
                                                                                                        ->pluck('area_unit');
                                                @endphp
                                        @if($areaUnits->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 area_unit7_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Area Unit</h4>        
													<ul style="list-style:none; margin-left:0; padding-left:10px; margin-top:0; padding-top:0;">
														@foreach($areaUnits as $unit)
															<li>
																<input type="radio" 
																	id="area_unit_{{ $unit }}" 
																	name="area_unit[]" 
																	value="{{ $unit }}" 
																	class="area-unit-radio" 
																	{{ request('area_unit') == $unit ? 'checked' : '' }} 
																	style="display:none;">
																<label for="area_unit_{{ $unit }}" 
																	class="area-unit-label" 
																	style="text-decoration:none; color:{{ request('area_unit') == $unit ? '#000' : '#666' }}; font-weight:{{ request('area_unit') == $unit ? 'bold' : 'normal' }}; cursor:pointer;">
																	{{ $unit }}
																</label>
															</li>
														@endforeach
													</ul>
											</div>
                                        @endif
                                                @php
                                                                            // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                            $areas = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Apartments_&_Flats_Rent')
                                                                                                    
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_square')
                                                                                                        ->where('area_square', '!=', '')
                                                                                                        ->pluck('area_square')
                                                                                                        ->sort();
                                                @endphp
                                        @if($areas->isNotEmpty())
											<div class="card mt-3 rounded px-4 area7_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Area</h4>
														<div class="form-group">
															<select name="area_square[]" class="form-control" id="areaSelect" style="font-size:14px !important; color:#585454">
																<option value="" style="border:none !important; border-radius:4px; font-size:12px">Select Area</option>
																@foreach ($areas as $area)
																	<option value="{{ $area }}" {{ request('area_square') == $area ? 'selected' : '' }}>
																		{{ $area }}
																	</option>
																@endforeach
															</select>
														</div>
											</div>
                                        @endif
								                 @php
                                                                                            // Fetch types based on category_name and sub_category_name
                                                                                            $furnisheds = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                                            ->where('sub_category_name', 'Portions_&_Floors_Rent')
                                                                                                                            ->distinct()
                                                                                                                            ->whereNotNull('furnished')
                                                                                                                            ->where('furnished', '!=', '')
                                                                                                                            ->pluck('furnished');
                                                @endphp
                                        @if($furnisheds->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 furnished6_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Furnished</h4>
													@foreach($furnisheds as $furnished)
														<div class="form-group">
															 <input type="checkbox"           
																		name="furnished[]" 
																		class="furnished-check" 
																		value="{{ $furnished }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('furnished')) && in_array($furnished, request('furnished')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $furnished)) }}">{{ $furnished }}</label>
														</div>

													@endforeach
											</div>
                                        @endif
								           @php
                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                        $bedrooms = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                    ->where('sub_category_name', 'Portions_&_Floors_Rent')
                                                                                                
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('bedroom2')
                                                                                                    ->where('bedroom2', '!=', '')
                                                                                                    ->pluck('bedroom2')
                                                                                                    ->sort();
                                            @endphp
                                        @if($bedrooms->isNotEmpty())
											<div class="card mt-3 rounded px-4 bedroom2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
																		<h4 class="fs-6 fw-bold px-1 pt-3">Bedrooms</h4>
																		<div class="form-group">
																			<select name="bedroom2[]" class="form-control " id="bedroomSelect">
																				<option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bedrooms</option>
																				@foreach ($bedrooms as $bedroom)
																					<option value="{{ $bedroom }}"  {{ request('bedroom2') == $bedroom ? 'selected' : '' }}>
																						{{ $bedroom }}
																					</option>
																				@endforeach
																			</select>
																		</div>
											</div>
                                        @endif
								            @php
                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                        $bathrooms = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                    ->where('sub_category_name', 'Portions_&_Floors_Rent')
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('bathroom2')
                                                                                                    ->where('bathroom2', '!=', '')
                                                                                                    ->pluck('bathroom2')
                                                                                                    ->sort();
                                            @endphp
                                    @if($bathrooms->isNotEmpty())
										<div class="card mt-3 rounded px-4 bathroom2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
																		<h4 class="fs-6 fw-bold px-1 pt-3">Bathrooms</h4>
																		<div class="form-group">
																			<select name="bathroom2[]" class="form-control " id="bathroomSelect">
																				<option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bedrooms</option>
																				@foreach ($bathrooms as $bathroom)
																					<option value="{{ $bathroom }}"  {{ request('bathroom2') == $bathroom ? 'selected' : '' }}>
																						{{ $bathroom }}
																					</option>
																				@endforeach
																			</select>
																		</div>
										</div>
                                    @endif
								            @php
                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                        $floors = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                    ->where('sub_category_name', 'Portions_&_Floors_Rent')
                                                                                                    ->distinct()
                                                                                                    ->whereNotNull('floor_level2')
                                                                                                    ->where('floor_level2', '!=', '')
                                                                                                    ->pluck('floor_level2')
                                                                                                    ->sort();
                                            @endphp
                                    @if($floors->isNotEmpty())
										<div class="card mt-3 rounded px-4 floor_level2_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bold px-1 pt-3">Floor Level</h4>
													<div class="form-group">
																			<select name="floor_level2[]" class="form-control " id="floorSelect">
																				<option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Floor Level</option>
																				@foreach ($floors as $floor)
																					<option value="{{ $floor }}" {{ request('floor_level2') == $floor ? 'selected' : '' }}>
																						{{ $floor }}
																					</option>
																				@endforeach
																			</select>
													</div>
										</div>
                                    @endif
								           @php
                                                // Fetch distinct features from the database
                                                $features = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                    ->where('sub_category_name', 'Portions_&_Floors_Rent')
                                                    
                                                    ->distinct()
													->pluck('feature')
													->flatMap(fn($feature) => explode(',', $feature))
													->map(fn($feature) => trim($feature))
													->filter(fn($feature) => !empty($feature)) // Filter out empty or invalid features
													->unique()
													->values();

												// Define how many features to show initially
												$initialCount = 6;
											@endphp

											@if($features->isNotEmpty())
												<div class="card mt-3 rounded px-4 feature8_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>
													<div class="features-list">
														@foreach($features->take($initialCount) as $feature)
															@php
																$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
															@endphp
															<div class="form-group">
																<input type="checkbox"
																	id="{{ $featureFormatted }}"
																	name="feature[]" 
																	class="feature" 
																	value="{{ $feature }}" 
																	style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																	{{ $checked ? 'checked' : '' }} >
																<label for="{{ $featureFormatted }}">{{ $feature }}</label>
															</div>
														@endforeach
													</div>

													@if($features->count() > $initialCount)
														<div class="more-features" style="display: none;">
															@foreach($features->skip($initialCount) as $feature)
																@php
																	$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																	$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
																@endphp
																<div class="form-group">
																	<input type="checkbox"
																		id="{{ $featureFormatted }}"
																		name="feature[]" 
																		class="feature" 
																		value="{{ $feature }}" 
																		style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																		{{ $checked ? 'checked' : '' }} >
																	<label for="{{ $featureFormatted }}">{{ $feature }}</label>
																</div>
															@endforeach
														</div>
														<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
															View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
														</a>
													@endif
												</div>
											@endif
								              @php
                                                                                        // Fetch types based on category_name and sub_category_name
                                                                                        $areaUnits = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Portions_&_Floors_Rent')
                                                                                                        
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_unit')
                                                                                                        ->where('area_unit', '!=', '')
                                                                                                        ->pluck('area_unit');
                                                @endphp
                                        @if($areaUnits->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 area_unit8_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Area Unit</h4>        
													<ul style="list-style:none; margin-left:0; padding-left:10px; margin-top:0; padding-top:0;">
														@foreach($areaUnits as $unit)
															<li>
																<input type="radio" 
																	id="area_unit_{{ $unit }}" 
																	name="area_unit[]" 
																	value="{{ $unit }}" 
																	class="area-unit-radio" 
																	{{ request('area_unit') == $unit ? 'checked' : '' }} 
																	style="display:none;">
																<label for="area_unit_{{ $unit }}" 
																	class="area-unit-label" 
																	style="text-decoration:none; color:{{ request('area_unit') == $unit ? '#000' : '#666' }}; font-weight:{{ request('area_unit') == $unit ? 'bold' : 'normal' }}; cursor:pointer;">
																	{{ $unit }}
																</label>
															</li>
														@endforeach
													</ul>
											</div>
                                        @endif
                                                @php
                                                                            // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                            $areas = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Portions_&_Floors_Rent')
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_square')
                                                                                                        ->where('area_square', '!=', '')
                                                                                                        ->pluck('area_square')
                                                                                                        ->sort();
                                                @endphp
                                        @if($areas->isNotEmpty())
											<div class="card mt-3 rounded px-4 area8_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Area</h4>
														<div class="form-group">
															<select name="area_square[]" class="form-control" id="areaSelect" style="font-size:14px !important; color:#585454">
																<option value="" style="border:none !important; border-radius:4px; font-size:12px">Select Area</option>
																@foreach ($areas as $area)
																	<option value="{{ $area }}" {{ request('area_square') == $area ? 'selected' : '' }}>
																		{{ $area }}
																	</option>
																@endforeach
															</select>
														</div>
											</div>
                                        @endif
								              @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                ->where('sub_category_name', 'Shops_Offices_Commercial_Space_Rent')
                                                                                    
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                        @if($types->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 type13_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
													@foreach($types as $type)
															@php
																$checked = is_array(request('type')) && in_array($type, request('type'));
															@endphp
															<div class="form-group">
                                                            <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
															</div>
													@endforeach 
											</div>
                                        @endif
								           @php
                                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                        $bathrooms = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                                    ->where('sub_category_name', 'Shops_Offices_Commercial_Space_Rent')
                                                                                                                    ->distinct()
                                                                                                                    ->whereNotNull('rent_shope_bathroom')
                                                                                                                    ->where('rent_shope_bathroom', '!=', '')
                                                                                                                    ->pluck('rent_shope_bathroom')
                                                                                                                    ->sort();
                                            @endphp
                                    @if($bathrooms->isNotEmpty())
										<div class="card mt-3 rounded px-4 rent_shope_bathroom_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
											<h4 class="fs-6 fw-bold px-1 pt-3">Bathrooms</h4>
											<div class="form-group">
												<select name="rent_shope_bathroom[]" class="form-control " id="bedroomSelect">
													<option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bathroom</option>
													@foreach ($bathrooms as $bathroom)
														<option value="{{ $bathroom }}" {{ request('rent_shope_bathroom') == $bathroom ? 'selected' : '' }}>
															{{ $bathroom }}
														</option>
													@endforeach
												</select>
											</div>
										</div>
                                    @endif
                                            @php
                                                                        $floors = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                                    ->where('sub_category_name', 'Shops_Offices_Commercial_Space_Rent')
                                                                                                                    ->distinct()
                                                                                                                    ->whereNotNull('floor_level_shope_rent')
                                                                                                                    ->where('floor_level_shope_rent', '!=', '')
                                                                                                                    ->pluck('floor_level_shope_rent')
                                                                                                                    ->sort();
                                            @endphp
                                    @if($floors->isNotEmpty())
										<div class="card mt-3 rounded px-4 floor_level_shope_rent_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
											<h4 class="fs-6 fw-bold px-1 pt-3">Floor Level</h4>
											<div class="form-group">
												<select name="floor_level_shope_rent[]" class="form-control " id="FloorSelect">
													<option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Floor Level</option>
													@foreach ($floors as $floor)
														<option value="{{ $floor }}" {{ request('floor_level_shope_rent') == $floor ? 'selected' : '' }}>
															{{ $floor }}
														</option>
													@endforeach
												</select>
											</div>
										</div>
                                    @endif
								            @php
                                                // Fetch distinct features from the database
                                                $features = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                    ->where('sub_category_name', 'Shops_Offices_Commercial_Space_Rent')
                                                    
                                                    ->distinct()
													->pluck('feature')
													->flatMap(fn($feature) => explode(',', $feature))
													->map(fn($feature) => trim($feature))
													->filter(fn($feature) => !empty($feature)) // Filter out empty or invalid features
													->unique()
													->values();

													// Define how many features to show initially
													$initialCount = 6;
													@endphp

													@if($features->isNotEmpty())
													<div class="card mt-3 rounded px-4 feature9_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
														<h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>
														<div class="features-list">
															@foreach($features->take($initialCount) as $feature)
															@php
															$featureFormatted = strtolower(str_replace(' ', '_', $feature));
															$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
															@endphp
															<div class="form-group">
																<input type="checkbox"
																	   id="{{ $featureFormatted }}"
																	   name="feature[]" 
																	   class="feature" 
																	   value="{{ $feature }}" 
																	   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																	   {{ $checked ? 'checked' : '' }} >
																<label for="{{ $featureFormatted }}">{{ $feature }}</label>
															</div>
															@endforeach
														</div>

														@if($features->count() > $initialCount)
														<div class="more-features" style="display: none;">
															@foreach($features->skip($initialCount) as $feature)
															@php
															$featureFormatted = strtolower(str_replace(' ', '_', $feature));
															$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
															@endphp
															<div class="form-group">
																<input type="checkbox"
																	   id="{{ $featureFormatted }}"
																	   name="feature[]" 
																	   class="feature" 
																	   value="{{ $feature }}" 
																	   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																	   {{ $checked ? 'checked' : '' }} >
																<label for="{{ $featureFormatted }}">{{ $feature }}</label>
															</div>
															@endforeach
														</div>
														<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
															View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
														</a>
														@endif
													</div>
													@endif
								               @php
                                                                                        // Fetch types based on category_name and sub_category_name
                                                                                        $areaUnits = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Shops_Offices_Commercial_Space_Rent')
                                                                                                        
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_unit')
                                                                                                        ->where('area_unit', '!=', '')
                                                                                                        ->pluck('area_unit');
                                                @endphp
                                        @if($areaUnits->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 area_unit9_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Area Unit</h4>        
													<ul style="list-style:none; margin-left:0; padding-left:10px; margin-top:0; padding-top:0;">
														@foreach($areaUnits as $unit)
															<li>
																<input type="radio" 
																	id="area_unit_{{ $unit }}" 
																	name="area_unit[]" 
																	value="{{ $unit }}" 
																	class="area-unit-radio" 
																	{{ request('area_unit') == $unit ? 'checked' : '' }} 
																	style="display:none;">
																<label for="area_unit_{{ $unit }}" 
																	class="area-unit-label" 
																	style="text-decoration:none; color:{{ request('area_unit') == $unit ? '#000' : '#666' }}; font-weight:{{ request('area_unit') == $unit ? 'bold' : 'normal' }}; cursor:pointer;">
																	{{ $unit }}
																</label>
															</li>
														@endforeach
													</ul>
											</div>
                                        @endif
                                                @php
                                                                            // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                            $areas = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Shops_Offices_Commercial_Space_Rent')
                                                                                                    
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_square')
                                                                                                        ->where('area_square', '!=', '')
                                                                                                        ->pluck('area_square')
                                                                                                        ->sort();
                                                @endphp
                                        @if($areas->isNotEmpty())
											<div class="card mt-3 rounded px-4 area9_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Area</h4>
														<div class="form-group">
															<select name="area_square[]" class="form-control" id="areaSelect" style="font-size:14px !important; color:#585454">
																<option value="" style="border:none !important; border-radius:4px; font-size:12px">Select Area</option>
																@foreach ($areas as $area)
																	<option value="{{ $area }}" {{ request('area_square') == $area ? 'selected' : '' }}>
																		{{ $area }}
																	</option>
																@endforeach
															</select>
														</div>
											</div>
                                        @endif
								               @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                ->where('sub_category_name', 'Rooms')
                                                                                            
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                        @if($types->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 type6_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
													@foreach($types as $type)
															@php
																$checked = is_array(request('type')) && in_array($type, request('type'));
															@endphp
															<div class="form-group">
                                                            <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
															</div>
													@endforeach 
											</div>
                                        @endif
								               @php
                                                                                            // Fetch types based on category_name and sub_category_name
                                                                                            $furnisheds = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                                            ->where('sub_category_name', 'Rooms')
                                                                                                                            ->distinct()
                                                                                                                            ->whereNotNull('furnished')
                                                                                                                            ->where('furnished', '!=', '')
                                                                                                                            ->pluck('furnished');
                                                @endphp
                                        @if($furnisheds->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 furnished7_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Furnished</h4>
													@foreach($furnisheds as $furnished)
														<div class="form-group">
															<input type="checkbox" 
																id="{{ strtolower(str_replace(' ', '-', $furnished)) }}" 
																name="furnished[]" 
																class="furnished-check" 
																value="{{ $furnished }}" 
																{{ is_array(request('furnished')) && in_array($furnished, request('furnished')) ? 'checked' : '' }}>
															<label for="{{ strtolower(str_replace(' ', '-', $furnished)) }}">{{ $furnished }}</label>
														</div>
													@endforeach
											</div>
                                        @endif
								               @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                ->where('sub_category_name', 'Roommates_Paying_Guests')
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                        @if($types->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 type7_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
													@foreach($types as $type)
															@php
																$checked = is_array(request('type')) && in_array($type, request('type'));
															@endphp
															<div class="form-group">
                                                            <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
															</div>
													@endforeach 
											</div>
                                        @endif
								              @php
                                                                                            // Fetch types based on category_name and sub_category_name
                                                                                            $furnisheds = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                                            ->where('sub_category_name', 'Roommates_Paying_Guests')
                                                                                                                            ->distinct()
                                                                                                                            ->whereNotNull('furnished')
                                                                                                                            ->where('furnished', '!=', '')
                                                                                                                            ->pluck('furnished');
                                                @endphp
                                        @if($furnisheds->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 furnished8_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Furnished</h4>
													@foreach($furnisheds as $furnished)
														<div class="form-group">
															<input type="checkbox" 
																id="{{ strtolower(str_replace(' ', '-', $furnished)) }}" 
																name="furnished[]" 
																class="furnished-check" 
																value="{{ $furnished }}" 
																{{ is_array(request('furnished')) && in_array($furnished, request('furnished')) ? 'checked' : '' }}>
															<label for="{{ strtolower(str_replace(' ', '-', $furnished)) }}">{{ $furnished }}</label>
														</div>
													@endforeach
											</div>
                                        @endif
								            @php
                                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                    $bedrooms = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                        ->where('sub_category_name', 'Vacation_Rentals_Guest_Houses')
                                                                        ->distinct()
                                                                        ->whereNotNull('bedroom_vacation_rent')
                                                                        ->where('bedroom_vacation_rent', '!=', '')
                                                                        ->pluck('bedroom_vacation_rent')
                                                                        ->sort();
                                            
                                            @endphp
                                    @if($bedrooms->isNotEmpty())
										<div class="card mt-3 rounded px-4 bedroom_vacation_rent_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
											<h4 class="fs-6 fw-bold px-1 pt-3">Bedrooms</h4>
											<div class="form-group">
												<select name="bedroom_vacation_rent[]" class="form-control " id="bedroomSelect">
													<option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bedroom</option>
													@foreach ($bedrooms as $bedroom)
														<option value="{{ $bedroom }}" {{ request('bedroom_vacation_rent') == $bedroom ? 'selected' : '' }}>
															{{ $bedroom }}
														</option>
													@endforeach
												</select>
											</div>
										</div>					
                                    @endif
                                            @php
                                                                        // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                        $bathrooms = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                                    ->where('sub_category_name', 'Vacation_Rentals_Guest_Houses')
                                                                                                                    ->distinct()
                                                                                                                    ->whereNotNull('bathroom_vacation_rent')
                                                                                                                    ->where('bathroom_vacation_rent', '!=', '')
                                                                                                                    ->pluck('bathroom_vacation_rent')
                                                                                                                    ->sort();
                                            @endphp
                                    @if($bathrooms->isNotEmpty())
										<div class="card mt-3 rounded px-4 bathroom_vacation_rent_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">                                      
											<h4 class="fs-6 fw-bold px-1 pt-3">Bathrooms</h4>
											<div class="form-group">
												<select name="bathroom_vacation_rent[]" class="form-control " id="bathroomSelect">
													<option value="" style="background-color:#545F8B !important; border:none !important; color:white; border-radius:4px; font-size:12px">Select Bathroom</option>
													@foreach ($bathrooms as $bathroom)
														<option value="{{ $bathroom }}" {{ request('bathroom_vacation_rent') == $bathroom ? 'selected' : '' }}>
															{{ $bathroom }}
														</option>
													@endforeach
												</select>
											</div>
										</div>
                                    @endif
								              @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                ->where('sub_category_name', 'Land_&_Plots_Rent')
                                                                                            
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                        @if($types->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 type8_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
													@foreach($types as $type)
															@php
																$checked = is_array(request('type')) && in_array($type, request('type'));
															@endphp
															<div class="form-group">
                                                            <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
															</div>
													@endforeach 
											</div>
                                        @endif
								           @php
                                                // Fetch distinct features from the database
                                                $features = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                    ->where('sub_category_name', 'Land_&_Plots_Rent')
                                                    
                                                    ->distinct()
													->pluck('feature')
													->flatMap(fn($feature) => explode(',', $feature))
													->map(fn($feature) => trim($feature))
													->filter(fn($feature) => !empty($feature)) // Filter out empty or invalid features
													->unique()
													->values();

												// Define how many features to show initially
												$initialCount = 6;
											@endphp

											@if($features->isNotEmpty())
												<div class="card mt-3 rounded px-4 feature10_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>
													<div class="features-list">
														@foreach($features->take($initialCount) as $feature)
															@php
																$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
															@endphp
															<div class="form-group">
																<input type="checkbox"
																	id="{{ $featureFormatted }}"
																	name="feature[]" 
																	class="feature" 
																	value="{{ $feature }}" 
																	style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																	{{ $checked ? 'checked' : '' }} >
																<label for="{{ $featureFormatted }}">{{ $feature }}</label>
															</div>
														@endforeach
													</div>

													@if($features->count() > $initialCount)
														<div class="more-features" style="display: none;">
															@foreach($features->skip($initialCount) as $feature)
																@php
																	$featureFormatted = strtolower(str_replace(' ', '_', $feature));
																	$checked = is_array(request('feature')) && in_array($feature, request('feature')) ? true : false;
																@endphp
																<div class="form-group">
																	<input type="checkbox"
																		id="{{ $featureFormatted }}"
																		name="feature[]" 
																		class="feature" 
																		value="{{ $feature }}" 
																		style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
																		{{ $checked ? 'checked' : '' }} >
																	<label for="{{ $featureFormatted }}">{{ $feature }}</label>
																</div>
															@endforeach
														</div>
														<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
															View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
														</a>
													@endif
												</div>
											@endif
								              @php
                                                                                        // Fetch types based on category_name and sub_category_name
                                                                                        $areaUnits = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Land_&_Plots_Rent')
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_unit')
                                                                                                        ->where('area_unit', '!=', '')
                                                                                                        ->pluck('area_unit');
                                                @endphp
                                        @if($areaUnits->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 area_unit10_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Area Unit</h4>        
													<ul style="list-style:none; margin-left:0; padding-left:10px; margin-top:0; padding-top:0;">
														@foreach($areaUnits as $unit)
															<li>
																<input type="radio" 
																	id="area_unit_{{ $unit }}" 
																	name="area_unit[]" 
																	value="{{ $unit }}" 
																	class="area-unit-radio" 
																	{{ request('area_unit') == $unit ? 'checked' : '' }} 
																	style="display:none;">
																<label for="area_unit_{{ $unit }}" 
																	class="area-unit-label" 
																	style="text-decoration:none; color:{{ request('area_unit') == $unit ? '#000' : '#666' }}; font-weight:{{ request('area_unit') == $unit ? 'bold' : 'normal' }}; cursor:pointer;">
																	{{ $unit }}
																</label>
															</li>
														@endforeach
													</ul>
											</div>
                                        @endif
                                                @php
                                                                            // Fetch distinct bedroom values based on category_name and sub_category_name
                                                                            $areas = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                                                                                        ->where('sub_category_name', 'Land_&_Plots_Rent')
                                                                                                        
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('area_square')
                                                                                                        ->where('area_square', '!=', '')
                                                                                                        ->pluck('area_square')
                                                                                                        ->sort();
                                                @endphp
                                        @if($areas->isNotEmpty())
											<div class="card mt-3 rounded px-4 area10_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd;">
													<h4 class="fs-6 fw-bold px-1 pt-3">Area</h4>
														<div class="form-group">
															<select name="area_square[]" class="form-control" id="areaSelect" style="font-size:14px !important; color:#585454">
																<option value="" style="border:none !important; border-radius:4px; font-size:12px">Select Area</option>
																@foreach ($areas as $area)
																	<option value="{{ $area }}" {{ request('area_square') == $area ? 'selected' : '' }}>
																		{{ $area }}
																	</option>
																@endforeach
															</select>
														</div>
											</div>
                                        @endif
								              @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Motorcycles')
                                                                                                            ->where('sub_category_name_type', 'Electric_Bikes')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition11_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
								            @php
                                                // Fetch the min and max year from the ads table where category_name is 'Vehicles' and sub_category_name is 'Buses_Vans_Trucks'
                                                $minYear = \App\Models\Ad::where('category_name', 'Bikes')
                                                                        ->where('sub_category_name', 'Motorcycles')
                                                                        ->where('sub_category_name_type', 'Electric_Bikes')
                                                                        ->whereNotNull('Year_update')
                                                                        ->where('Year_update', '!=', '')
                                                                        ->min('Year_update');

                                                $maxYear = \App\Models\Ad::where('category_name', 'Bikes')
                                                                        ->where('sub_category_name', 'Motorcycles')
                                                                        ->where('sub_category_name_type', 'Electric_Bikes')
                                                                        ->whereNotNull('Year_update')
                                                                        ->where('Year_update', '!=', '')
                                                                        ->max('Year_update');

                                                // Retrieve the user-selected min and max year from the request, or use the defaults
                                                $selectedMinYear = request('min_year', $minYear); // Default to $minYear if not set
                                                $selectedMaxYear = request('max_year', $maxYear); // Default to $maxYear if not set
                                            @endphp

                                        <div class="card mt-3 pb-2 rounded year3_card px-4" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
                                                <h4 class="fs-6 fw-bolded px-1 pt-3">Year</h4>
                                                <div class="price-input">
                                                    <div class="field">
                                                        <span>Min</span>
                                                        <input type="number" name="min_year" class="input-min" 
                                                            value="{{ $selectedMinYear }}" id="inputYearMin" placeholder="Min Year">
                                                    </div>
                                                    <div class="separator">-</div>
                                                    <div class="field">
                                                        <span>Max</span>
                                                        <input type="number" name="max_year" class="input-max" 
                                                            value="{{ $selectedMaxYear }}" id="inputYearMax" placeholder="Max Year">
                                                    </div>
                                                </div>
                                        </div>
								            @php
                                                                // Fetch distinct make_bike values based on category_name and sub_category_name
                                                                $make_bikes = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                            ->where('sub_category_name', 'Motorcycles')
                                                                                            ->where('sub_category_name_type', 'Electric_Bikes')
                                                                                            ->distinct()
                                                                                            ->whereNotNull('make_bike')
                                                                                            ->where('make_bike', '!=', '')
                                                                                            ->pluck('make_bike');
                                            @endphp

                                    @if($make_bikes->isNotEmpty())
										<div class="card mt-3 rounded px-4 make_bike1_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bold px-1 pt-3">Make</h4>
													@foreach($make_bikes as $make_bike)
															@php
																$id = strtolower(str_replace(' ', '-', $make_bike));
																$checked = is_array(request('make_bike')) && in_array($make_bike, request('make_bike'));
															@endphp
														<div class="form-group">
															<input type="checkbox" id="{{ strtolower(str_replace(' ', '-', $make_bike)) }}" 
                                                                        name="make_bike[]" 
                                                                        value="{{ $make_bike }}"
                                                                        class="makebike-checkbox"
                                                                        {{ is_array(request('make_bike')) && in_array($make_bike, request('make_bike')) ? 'checked' : '' }}>
                                                                    <label for="{{ strtolower(str_replace(' ', '-', $make_bike)) }}">{{ $make_bike }}</label>
														</div>
													@endforeach
										</div>
                                    @endif
								            @php
                                                                // Fetch distinct engine_type values based on category_name and sub_category_name
                                                                $engine_types = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                            ->where('sub_category_name', 'Motorcycles')
                                                                                            ->where('sub_category_name_type', 'Electric_Bikes')
                                                                                            ->distinct()
                                                                                            ->whereNotNull('engine_type')
                                                                                            ->where('engine_type', '!=', '')
                                                                                            ->pluck('engine_type');
                                            @endphp
                                    @if($engine_types->isNotEmpty())
										<div class="card mt-3 rounded px-4 engine_type1_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bolded px-1 pt-3">Engine Type</h4>

													@foreach($engine_types as $engine_type)
														@php
															$id = strtolower(str_replace(' ', '-', $engine_type));
															$checked = is_array(request('engine_type')) && in_array($engine_type, request('engine_type'));
														@endphp
														<div class="form-group">
															<input type="checkbox" id="{{ strtolower(str_replace(' ', '_', $engine_type)) }}" 
                                                                        name="engine_type[]" 
                                                                        value="{{ $engine_type }}"
                                                                        class="enginetype"
                                                                        {{ is_array(request('engine_type')) && in_array($engine_type, request('engine_type')) ? 'checked' : '' }}>
                                                                    <label for="{{ strtolower(str_replace(' ', '_', $engine_type)) }}">{{ $engine_type }}</label>
														</div>
													@endforeach
										</div>
                                    @endif
								            @php
                                                                    // Fetch distinct engine_type values based on category_name and sub_category_name
                                                                    $engine_capacitys = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                ->where('sub_category_name', 'Motorcycles')
                                                                                                ->where('sub_category_name_type', 'Electric_Bikes')
                                                                                                ->distinct()
                                                                                                ->whereNotNull('engine_capacity')
                                                                                                ->where('engine_capacity', '!=', '')
                                                                                                ->pluck('engine_capacity');
                                            @endphp
                                    @if($engine_capacitys->isNotEmpty())
										<div class="card mt-3 rounded px-4 engine_capacity1_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bolded px-1 pt-3">Engine Capacity</h4>
												@foreach($engine_capacitys as $engine_capacity)
														@php
															$id = strtolower(str_replace(' ', '-', $engine_capacity));
															$checked = is_array(request('engine_capacity')) && in_array($engine_capacity, request('engine_capacity'));
														@endphp
														<div class="form-group">
															<input type="checkbox" id="{{ strtolower(str_replace(' ', '_', $engine_capacity)) }}" 
                                                                            name="engine_capacity[]" 
                                                                            value="{{ $engine_capacity }}"
                                                                            class="enginecapacity"
                                                                            {{ is_array(request('engine_capacity')) && in_array($engine_capacity, request('engine_capacity')) ? 'checked' : '' }}>
                                                                        <label for="{{ strtolower(str_replace(' ', '_', $engine_capacity)) }}">{{ $engine_capacity }}</label>
														</div>
												@endforeach
										</div>
                                    @endif
								           @php
                                                                    // Fetch distinct engine_type values based on category_name and sub_category_name
                                                                    $ignition_types = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                ->where('sub_category_name', 'Motorcycles')
                                                                                                ->where('sub_category_name_type', 'Electric_Bikes')
                                                                                                ->distinct()
                                                                                                ->whereNotNull('ignition_type')
                                                                                                ->where('ignition_type', '!=', '')
                                                                                                ->pluck('ignition_type');
                                            @endphp
                                    @if($ignition_types->isNotEmpty())
										<div class="card mt-3 rounded px-4 ignition_type1_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bold px-1 pt-3">Ignition Type</h4>

												@foreach($ignition_types as $ignition_type)
														@php
															$id = strtolower(str_replace(' ', '-', $ignition_type));
															$checked = is_array(request('ignition_type')) && in_array($ignition_type, request('ignition_type'));
														@endphp
														<div class="form-group">
															<input type="checkbox" 
                                                                            id="ignitiontype-{{ strtolower(str_replace(' ', '_', $ignition_type)) }}" 
                                                                            class="ignitiontype-checkbox"
                                                                            name="ignition_type[]" 
                                                                            value="{{ $ignition_type }}"
                                                                            {{ is_array(request('ignition_type')) && in_array($ignition_type, request('ignition_type')) ? 'checked' : '' }}>
                                                                        <label for="ignitiontype-{{ strtolower(str_replace(' ', '_', $ignition_type)) }}">{{ $ignition_type }}</label>
														</div>
												@endforeach
										</div>
                                    @endif
								            @php
                                                                            // Fetch distinct engine_type values based on category_name and sub_category_name
                                                                            $origins = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                        ->where('sub_category_name', 'Motorcycles')
                                                                                                        ->where('sub_category_name_type', 'Electric_Bikes')
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('origin')
                                                                                                        ->where('origin', '!=', '')
                                                                                                        ->pluck('origin');
                                            @endphp
                                    @if($origins->isNotEmpty())
										<div class="card mt-3 rounded px-4 origin1_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
											<h4 class="fs-6 fw-bolded px-1 pt-3">Origin</h4>
											@foreach($origins as $origin)
													@php
														$id = strtolower(str_replace(' ', '-', $origin));
														$checked = is_array(request('origin')) && in_array($origin, request('origin'));
													@endphp
													<div class="form-group">
														<input type="checkbox" id="{{ strtolower(str_replace(' ', '_', $origin)) }}" 
                                                                                    name="origin[]"
                                                                                    value="{{ $origin }}"
                                                                                    class="origin-checked"
                                                                                    {{ is_array(request('origin')) && in_array($origin, request('origin')) ? 'checked' : '' }}>
                                                                                <label for="{{ strtolower(str_replace(' ', '_', $origin)) }}">{{ $origin }}</label>
													</div>
											@endforeach
										</div>
                                    @endif
								            @php
                                                // Fetch distinct registration cities from the database
                                                $registration_cities = \App\Models\Ad::where('category_name', 'Bikes')
                                                                        ->where('sub_category_name', 'Motorcycles')
                                                                        ->where('sub_category_name_type', 'Electric_Bikes')
                                                                        ->whereNotNull('registration_city')
                                                                        ->pluck('registration_city')
                                                                        ->flatMap(fn($city) => explode(',', $city))
                                                                        ->map(fn($city) => trim($city))
                                                                        ->unique()
                                                                        ->values();
                                                // Define how many registration cities to show initially
                                                $initialCount = 5;
                                            @endphp
                                    @if($registration_cities->isNotEmpty())
										<div class="card mt-3 pb-2 rounded px-4 registration1_city_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
												<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Registration City</h4>
												<div class="features-list">
													@foreach($registration_cities->take($initialCount) as $city)
															@php
																$cityFormatted = strtolower(str_replace(' ', '-', $city));
																$checked = is_array(request('registration_city')) && in_array($city, request('registration_city'));
															@endphp
														<div class="form-group">
															 <input type="checkbox" 
																	id="{{ $cityFormatted }}" 
																	name="registration_city[]" 
																	class="registration" 
																	value="{{ $city }}" 
																	{{ $checked }}>
                                                                    <label for="{{ $cityFormatted }}">{{ $city }}</label>
														</div>
													@endforeach
												</div>
													@if($registration_cities->count() > $initialCount)
														<div class="more-features" style="display: none;">
															@foreach($registration_cities->skip($initialCount) as $city)
																	@php
																		$cityFormatted = strtolower(str_replace(' ', '-', $city));
																		$checked = is_array(request('registration_city')) && in_array($city, request('registration_city'));
																	@endphp
																<div class="form-group">
																	<input type="checkbox" 
																	id="{{ $cityFormatted }}" 
																	name="registration_city[]" 
																	class="registration" 
																	value="{{ $city }}" 
																	{{ $checked }}>
                                                                    <label for="{{ $cityFormatted }}">{{ $city }}</label>
																</div>
															@endforeach
														</div>
															<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
																					View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
															</a>
													@endif
										</div>
                                    @endif
								               @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Motorcycles')
                                                                                                            ->where('sub_category_name_type', 'Sports_Heavy_Bikes')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition12_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
								             @php
                                                // Fetch the min and max year from the ads table where category_name is 'Vehicles' and sub_category_name is 'Buses_Vans_Trucks'
                                                $minYear = \App\Models\Ad::where('category_name', 'Bikes')
                                                                        ->where('sub_category_name', 'Motorcycles')
                                                                        ->where('sub_category_name_type', 'Sports_Heavy_Bikes')
                                                                        ->whereNotNull('Year_update')
                                                                        ->where('Year_update', '!=', '')
                                                                        ->min('Year_update');

                                                $maxYear = \App\Models\Ad::where('category_name', 'Bikes')
                                                                        ->where('sub_category_name', 'Motorcycles')
                                                                        ->where('sub_category_name', 'Sports_Heavy_Bikes')
                                                                        ->whereNotNull('Year_update')
                                                                        ->where('Year_update', '!=', '')
                                                                        ->max('Year_update');

                                                // Retrieve the user-selected min and max year from the request, or use the defaults
                                                $selectedMinYear = request('min_year', $minYear); // Default to $minYear if not set
                                                $selectedMaxYear = request('max_year', $maxYear); // Default to $maxYear if not set
                                            @endphp

											<div class="card mt-3 pb-2 rounded year4_card px-4" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bolded px-1 pt-3">Year</h4>
													<div class="price-input">
														<div class="field">
															<span>Min</span>
															<input type="number" name="min_year" class="input-min" 
																value="{{ $selectedMinYear }}" id="inputYearMin" placeholder="Min Year">
														</div>
														<div class="separator">-</div>
														<div class="field">
															<span>Max</span>
															<input type="number" name="max_year" class="input-max" 
																value="{{ $selectedMaxYear }}" id="inputYearMax" placeholder="Max Year">
														</div>
													</div>
											</div>
								          @php
                                                                // Fetch distinct make_bike values based on category_name and sub_category_name
                                                                $make_bikes = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                            ->where('sub_category_name', 'Motorcycles')
                                                                                            ->where('sub_category_name_type', 'Sports_Heavy_Bikes')
                                                                                            ->distinct()
                                                                                            ->whereNotNull('make_bike')
                                                                                            ->where('make_bike', '!=', '')
                                                                                            ->pluck('make_bike');
                                            @endphp

                                    @if($make_bikes->isNotEmpty())
										<div class="card mt-3 rounded px-4 make_bike2_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
											<h4 class="fs-6 fw-bold px-1 pt-3">Make</h4>
											@foreach($make_bikes as $make_bike)
													@php
														$id = strtolower(str_replace(' ', '-', $make_bike));
														$checked = is_array(request('make_bike')) && in_array($make_bike, request('make_bike'));
													@endphp
												<div class="form-group">
													<input type="checkbox" id="{{ strtolower(str_replace(' ', '-', $make_bike)) }}" 
                                                                        name="make_bike[]" 
                                                                        value="{{ $make_bike }}"
                                                                        class="makebike-checkbox"
                                                                        {{ is_array(request('make_bike')) && in_array($make_bike, request('make_bike')) ? 'checked' : '' }}>
                                                                    <label for="{{ strtolower(str_replace(' ', '-', $make_bike)) }}">{{ $make_bike }}</label>
												</div>
											@endforeach
										</div>
                                    @endif
								           @php
                                                                // Fetch distinct engine_type values based on category_name and sub_category_name
                                                                $engine_types = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                            ->where('sub_category_name', 'Motorcycles')
                                                                                            ->where('sub_category_name_type', 'Sports_Heavy_Bikes')
                                                                                            ->distinct()
                                                                                            ->whereNotNull('engine_type')
                                                                                            ->where('engine_type', '!=', '')
                                                                                            ->pluck('engine_type');
                                            @endphp
                                    @if($engine_types->isNotEmpty())
										<div class="card mt-3 rounded px-4 engine_type2_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bolded px-1 pt-3">Engine Type</h4>

													@foreach($engine_types as $engine_type)
														@php
															$id = strtolower(str_replace(' ', '-', $engine_type));
															$checked = is_array(request('engine_type')) && in_array($engine_type, request('engine_type'));
														@endphp
														<div class="form-group">
															<input type="checkbox" id="{{ strtolower(str_replace(' ', '_', $engine_type)) }}" 
                                                                        name="engine_type[]" 
                                                                        value="{{ $engine_type }}"
                                                                        class="enginetype"
                                                                        {{ is_array(request('engine_type')) && in_array($engine_type, request('engine_type')) ? 'checked' : '' }}>
                                                                    <label for="{{ strtolower(str_replace(' ', '_', $engine_type)) }}">{{ $engine_type }}</label>
														</div>
													@endforeach
										</div>
                                    @endif
								            @php
                                                                    // Fetch distinct engine_type values based on category_name and sub_category_name
                                                                    $engine_capacitys = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                ->where('sub_category_name', 'Motorcycles')
                                                                                                ->where('sub_category_name_type', 'Sports_Heavy_Bikes')
                                                                                                ->distinct()
                                                                                                ->whereNotNull('engine_capacity')
                                                                                                ->where('engine_capacity', '!=', '')
                                                                                                ->pluck('engine_capacity');
                                            @endphp
                                    @if($engine_capacitys->isNotEmpty())
										<div class="card mt-3 rounded px-4 engine_capacity2_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bolded px-1 pt-3">Engine Capacity</h4>
												@foreach($engine_capacitys as $engine_capacity)
														@php
															$id = strtolower(str_replace(' ', '-', $engine_capacity));
															$checked = is_array(request('engine_capacity')) && in_array($engine_capacity, request('engine_capacity'));
														@endphp
														<div class="form-group">
															<input type="checkbox" id="{{ strtolower(str_replace(' ', '_', $engine_capacity)) }}" 
                                                                            name="engine_capacity[]" 
                                                                            value="{{ $engine_capacity }}"
                                                                            class="enginecapacity"
                                                                            {{ is_array(request('engine_capacity')) && in_array($engine_capacity, request('engine_capacity')) ? 'checked' : '' }}>
                                                                        <label for="{{ strtolower(str_replace(' ', '_', $engine_capacity)) }}">{{ $engine_capacity }}</label>
														</div>
												@endforeach
										</div>
                                    @endif
                                            
                                            @php
                                                                    // Fetch distinct engine_type values based on category_name and sub_category_name
                                                                    $ignition_types = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                ->where('sub_category_name', 'Motorcycles')
                                                                                                ->where('sub_category_name_type', 'Sports_Heavy_Bikes')
                                                                                                ->distinct()
                                                                                                ->whereNotNull('ignition_type')
                                                                                                ->where('ignition_type', '!=', '')
                                                                                                ->pluck('ignition_type');
                                            @endphp
                                    @if($ignition_types->isNotEmpty())
										<div class="card mt-3 rounded px-4 ignition_type2_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bold px-1 pt-3">Ignition Type</h4>

												@foreach($ignition_types as $ignition_type)
														@php
															$id = strtolower(str_replace(' ', '-', $ignition_type));
															$checked = is_array(request('ignition_type')) && in_array($ignition_type, request('ignition_type'));
														@endphp
														<div class="form-group">
															<input type="checkbox" 
                                                                            id="ignitiontype-{{ strtolower(str_replace(' ', '_', $ignition_type)) }}" 
                                                                            class="ignitiontype-checkbox"
                                                                            name="ignition_type[]" 
                                                                            value="{{ $ignition_type }}"
                                                                            {{ is_array(request('ignition_type')) && in_array($ignition_type, request('ignition_type')) ? 'checked' : '' }}>
                                                                        <label for="ignitiontype-{{ strtolower(str_replace(' ', '_', $ignition_type)) }}">{{ $ignition_type }}</label>
														</div>
												@endforeach
										</div>
                                    @endif
                                                                                        
                                            @php
                                                                            // Fetch distinct engine_type values based on category_name and sub_category_name
                                                                            $origins = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                        ->where('sub_category_name', 'Motorcycles')
                                                                                                        ->where('sub_category_name_type', 'Sports_Heavy_Bikes')
                                                                                                        ->distinct()
                                                                                                        ->whereNotNull('origin')
                                                                                                        ->where('origin', '!=', '')
                                                                                                        ->pluck('origin');
                                            @endphp
                                    @if($origins->isNotEmpty())
										<div class="card mt-3 rounded px-4 origin2_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bolded px-1 pt-3">Origin</h4>

												@foreach($origins as $origin)
													@php
														$id = strtolower(str_replace(' ', '-', $origin));
														$checked = is_array(request('origin')) && in_array($origin, request('origin'));
													@endphp
													<div class="form-group">
														<input type="checkbox" id="{{ strtolower(str_replace(' ', '_', $origin)) }}" 
                                                                                    name="origin[]"
                                                                                    value="{{ $origin }}"
                                                                                    class="origin-checked"
                                                                                    {{ is_array(request('origin')) && in_array($origin, request('origin')) ? 'checked' : '' }}>
                                                                                <label for="{{ strtolower(str_replace(' ', '_', $origin)) }}">{{ $origin }}</label>
													</div>
												@endforeach
										</div>
                                    @endif
                                            @php
                                                                    // Fetch distinct registration cities from the database
                                                                    $registration_cities = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                            ->where('sub_category_name', 'Motorcycles')
                                                                                            ->where('sub_category_name_type', 'Sports_Heavy_Bikes')
                                                                                            ->whereNotNull('registration_city')
                                                                                            ->pluck('registration_city')
                                                                                            ->flatMap(fn($city) => explode(',', $city))
                                                                                            ->map(fn($city) => trim($city))
                                                                                            ->unique()
                                                                                            ->values();

                                                                    // Define how many registration cities to show initially
                                                                    $initialCount = 5;
                                            @endphp
                                    @if($registration_cities->isNotEmpty())
										<div class="card mt-3 pb-2 rounded px-4 registration2_city_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
												<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Registration City</h4>

												<div class="features-list">
													@foreach($registration_cities->take($initialCount) as $city)
																	@php
																		$cityFormatted = strtolower(str_replace(' ', '-', $city));
																		$checked = is_array(request('registration_city')) && in_array($city, request('registration_city'));
																	@endphp
																<div class="form-group">
																	 <input type="checkbox" id="{{ $cityFormatted }}" name="registration_city[]" class="registration" value="{{ $city }}" {{ $checked }}>
                                                                        <label for="{{ $cityFormatted }}">{{ $city }}</label>
																</div>
													@endforeach
												</div>
													@if($registration_cities->count() > $initialCount)
														<div class="more-features" style="display: none;">
															@foreach($registration_cities->skip($initialCount) as $city)
																	@php
																		$cityFormatted = strtolower(str_replace(' ', '-', $city));
																		$checked = is_array(request('registration_city')) && in_array($city, request('registration_city'));
																	@endphp
																<div class="form-group">
																	 <input type="checkbox" id="{{ $cityFormatted }}" name="registration_city[]" class="registration" value="{{ $city }}" {{ $checked }}>
                                                                        <label for="{{ $cityFormatted }}">{{ $city }}</label>
																</div>
															@endforeach
														</div>
															<a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B">
																					View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
															</a>
													@endif
										</div>
                                    @endif
								               @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Bike_Spare_Parts')
                                                                                                            ->where('sub_category_name_type', 'Air_Filters')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition13_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
								                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Bike_Spare_Parts')
                                                                                                            ->where('sub_category_name_type', 'Carburetors')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition14_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Bike_Spare_Parts')
                                                                                                            ->where('sub_category_name_type', 'Bearings')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition15_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Bike_Spare_Parts')
                                                                                                            ->where('sub_category_name_type', 'Side_Mirrors')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition16_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Bike_Spare_Parts')
                                                                                                            ->where('sub_category_name_type', 'Motorcycle_Batteries')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition17_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Bike_Spare_Parts')
                                                                                                            ->where('sub_category_name_type', 'Switches')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition18_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Bicycles')
                                                                                                            ->where('sub_category_name_type', 'Road_Bikes')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition19_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Bicycles')
                                                                                                            ->where('sub_category_name_type', 'Mountain_Bikes')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition20_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                                            ->where('sub_category_name', 'Bicycles')
                                                                                                            ->where('sub_category_name_type', 'Electric_Bicycles')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition21_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
								          @php
                                                                // Fetch distinct make_bike values based on category_name and sub_category_name
                                                                $make_bikes = \App\Models\Ad::where('category_name', 'Bikes')
                                                                                            ->where('sub_category_name', 'Bicycles')
                                                                                            ->where('sub_category_name_type', 'Electric_Bicycles')
                                                                                            ->distinct()
                                                                                            ->whereNotNull('make_bike')
                                                                                            ->where('make_bike', '!=', '')
                                                                                            ->pluck('make_bike');
                                            @endphp

                                    @if($make_bikes->isNotEmpty())
										<div class="card mt-3 rounded px-4 make_bike5_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bold px-1 pt-3">Make</h4>

													@foreach($make_bikes as $make_bike)
														@php
															$id = strtolower(str_replace(' ', '-', $make_bike));
															$checked = is_array(request('make_bike')) && in_array($make_bike, request('make_bike'));
														@endphp
														<div class="form-group">
															<input type="checkbox" 
                                                                                            
                                                                                            name="make_bike[]" 
                                                                                            class="makebike-check" 
                                                                                            value="{{ $make_bike }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('make_bike')) && in_array($make_bike, request('make_bike')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $make_bike)) }}">{{ $make_bike }}</label>
														</div>
													@endforeach
										</div>
                                    @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Furniture_Home_Decor')
                                                                                                            ->where('sub_category_name', 'Sofa_Chairs')
                                                                                                            ->where('sub_category_name_type', 'Sofas')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition22_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
								              @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Furniture_Home_Decor')
                                                                                                ->where('sub_category_name', 'Sofa_Chairs')
                                                                                                ->where('sub_category_name_type', 'Sofas')
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                        @if($types->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 type9_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
													@foreach($types as $type)
															@php
																$checked = is_array(request('type')) && in_array($type, request('type'));
															@endphp
															<div class="form-group">
                                                            <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
															</div>
													@endforeach 
											</div>
                                        @endif
								                @php
                                                                                            $conditions = \App\Models\Ad::where('category_name', 'Furniture_Home_Decor')
                                                                                                            ->where('sub_category_name', 'Sofa_Chairs')
                                                                                                            ->where('sub_category_name_type', 'Sofa_Beds')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition23_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
								               @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Furniture_Home_Decor')
                                                                                                            ->where('sub_category_name', 'Office_Furniture')
                                                                                                            ->where('sub_category_name_type', 'Office_Chairs')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition24_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
								               @php
                                                                        // Fetch types based on category_name and sub_category_name
                                                                        $types = \App\Models\Ad::where('category_name', 'Furniture_Home_Decor')
                                                                                                ->where('sub_category_name', 'Office_Furniture')
                                                                                                ->where('sub_category_name_type', 'Office_Chairs')
                                                                                                ->distinct()
                                                                                                ->whereNotNull('type')
                                                                                                ->where('type', '!=', '')
                                                                                                ->pluck('type');
                                                @endphp
                                        @if($types->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 type11_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0"> Type</h4>     
													@foreach($types as $type)
															@php
																$checked = is_array(request('type')) && in_array($type, request('type'));
															@endphp
															<div class="form-group">
                                                            <input type="checkbox"           
																		name="type[]" 
																		class="type-check" 
																		value="{{ $type }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $type)) }}">{{ $type }}</label>
															</div>

													@endforeach 
											</div>
                                        @endif
								              @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Furniture_Home_Decor')
                                                                                                            ->where('sub_category_name', 'Office_Furniture')
                                                                                                            ->where('sub_category_name_type', 'Office_Sofas')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition25_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Furniture_Home_Decor')
                                                                                                            ->where('sub_category_name', 'Office_Furniture')
                                                                                                            ->where('sub_category_name_type', 'Office_Tables')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition26_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                                            ->where('sub_category_name', 'Fashion_Accessories')
                                                                                                            ->where('sub_category_name_type', 'Caps')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition27_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                                            ->where('sub_category_name', 'Fashion_Accessories')
                                                                                                            ->where('sub_category_name_type', 'Scarves')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition28_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                                            ->where('sub_category_name', 'Fashion_Accessories')
                                                                                                            ->where('sub_category_name_type', 'Gloves')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition37_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                                            ->where('sub_category_name', 'Makeup')
                                                                                                            ->where('sub_category_name_type', 'Eyes')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition29_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                                            ->where('sub_category_name', 'Makeup')
                                                                                                            ->where('sub_category_name_type', 'Brushes')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition30_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                                            ->where('sub_category_name', 'Makeup')
                                                                                                            ->where('sub_category_name_type', 'Face')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition31_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                                            ->where('sub_category_name', 'Skin_Hair')
                                                                                                            ->where('sub_category_name_type', 'Hair_Care')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition32_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
								            @php
                                                                    // Fetch distinct products from the database
                                                                    $products = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                            ->where('sub_category_name', 'Skin_Hair')
                                                                                            ->where('sub_category_name_type', 'Hair_Care')
                                                                                            ->distinct()
                                                                                            ->pluck('product')
                                                                                            ->flatMap(fn($product) => explode(',', $product))
                                                                                            ->map(fn($product) => trim($product))
                                                                                            ->unique()
                                                                                            ->values();

                                                                    // Define how many products to show initially
                                                                    $initialCount = 6;
                                            @endphp
                                    @if($products->isNotEmpty())
										<div class="card mt-3 rounded px-4 product1_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bolded px-1 pt-3">Product</h4>
													<div class="features-list">
														@foreach($products->take($initialCount) as $product)
															@php
																$productFormatted = strtolower(str_replace(' ', '_', $product));
																$checked = is_array(request('product')) && in_array($product, request('product'));
															@endphp
															<div class="form-group">
																<input type="checkbox" id="{{ $productFormatted }}" name="product[]" class="product" value="{{ $product }}" {{ $checked }}>
                                                        <label for="{{ $productFormatted }}">{{ $product }}</label>
															</div>
														@endforeach
													</div>
													@if($products->count() > $initialCount)
														<div class="more-products" style="display: none;">
															@foreach($products->skip($initialCount) as $product)
																@php
																	$productFormatted = strtolower(str_replace(' ', '_', $product));
																	$checked = is_array(request('product')) && in_array($product, request('product'));
																@endphp
																<div class="form-group">
																	<input type="checkbox" id="{{ $productFormatted }}" name="product[]" class="product" value="{{ $product }}" {{ $checked }}>
                                                        <label for="{{ $productFormatted }}">{{ $product }}</label>
																</div>
															@endforeach
														</div>
														<a href="javascript:void(0);" id="toggleProducts" style="font-size:14px; color:#545F8B">
																	View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
														</a>
													@endif
										</div>
                                    @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                                            ->where('sub_category_name', 'Skin_Hair')
                                                                                                            ->where('sub_category_name_type', 'Skin_Care')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition33_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
								            @php
                                                                    // Fetch distinct products from the database
                                                                    $products = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                            ->where('sub_category_name', 'Skin_Hair')
                                                                                            ->where('sub_category_name_type', 'Skin_Care')
                                                                                            ->distinct()
                                                                                            ->pluck('product')
                                                                                            ->flatMap(fn($product) => explode(',', $product))
                                                                                            ->map(fn($product) => trim($product))
                                                                                            ->unique()
                                                                                            ->values();

                                                                    // Define how many products to show initially
                                                                    $initialCount = 6;
                                            @endphp
                                    @if($products->isNotEmpty())
										<div class="card mt-3 rounded px-4 product2_card" style="box-shadow:0 0 0 0 !important; border:1px solid #ddd;">
												<h4 class="fs-6 fw-bolded px-1 pt-3">Product</h4>
													<div class="features-list">
														@foreach($products->take($initialCount) as $product)
															@php
																$productFormatted = strtolower(str_replace(' ', '_', $product));
																$checked = is_array(request('product')) && in_array($product, request('product'));
															@endphp
															<div class="form-group">
																<input type="checkbox" id="{{ $productFormatted }}" name="product[]" class="product" value="{{ $product }}" {{ $checked }}>
                                                        <label for="{{ $productFormatted }}">{{ $product }}</label>
															</div>
														@endforeach
													</div>
													@if($products->count() > $initialCount)
														<div class="more-products" style="display: none;">
															@foreach($products->skip($initialCount) as $product)
																@php
																	$productFormatted = strtolower(str_replace(' ', '_', $product));
																	$checked = is_array(request('product')) && in_array($product, request('product'));
																@endphp
																<div class="form-group">
																	<input type="checkbox" id="{{ $productFormatted }}" name="product[]" class="product" value="{{ $product }}" {{ $checked }}>
                                                        <label for="{{ $productFormatted }}">{{ $product }}</label>
																</div>
															@endforeach
														</div>
														<a href="javascript:void(0);" id="toggleProducts" style="font-size:14px; color:#545F8B">
																	View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
														</a>
											          @endif
													 </div>

                                               @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                                            ->where('sub_category_name', 'Wedding')
                                                                                                            ->where('sub_category_name_type', 'Bridals')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition34_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                                @php
                                                                            // Fetch types based on category_name and sub_category_name
                                                                            $conditions = \App\Models\Ad::where('category_name', 'Fashion_Beauty')
                                                                                                            ->where('sub_category_name', 'Wedding')
                                                                                                            ->where('sub_category_name_type', 'Grooms')
                                                                                                            ->distinct()
                                                                                                            ->whereNotNull('condition')
                                                                                                            ->where('condition', '!=', '')
                                                                                                            ->pluck('condition');
                                                @endphp
                                        @if($conditions->isNotEmpty())
											<div class="card mt-3 pb-2 rounded px-4 condition35_card" style="box-shadow: 0 0 0 0 !important; border:1px solid #ddd">
													<h4 class="fs-6 fw-bold px-1 py-4 mb-0">Condition</h4>
													@foreach($conditions as $condition)
													@php
														$id = strtolower(str_replace(' ', '-', $condition));
														$checked = is_array(request('condition')) && in_array($condition, request('condition'));
													@endphp
													<div class="form-group">
														<input type="checkbox" 
                                                                                            
                                                                                            name="condition[]" 
                                                                                            class="condition-check" 
                                                                                            value="{{ $condition }}" 
																   style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px;"
                                                                                            {{ is_array(request('condition')) && in_array($condition, request('condition')) ? 'checked' : '' }} >
                                                                                        <label for="{{ strtolower(str_replace(' ', '-', $condition)) }}">{{ $condition }}</label>
													</div>
													@endforeach
											</div>
                                        @endif
                                    
                            </div>
                        </form>   
                    </div>
                    <div class="col-md-8 col-10 mx-auto mt-sm-2">
                        <div class="row mt-2 ">
                            <div class="select-wrapper float-end ms-auto mb-0 pb-0" style="width:190px !important">
                                <div class="position-relative">
                                    <select id="sort-by-select" class="rounded p-2">
                                        <option value="recently_added">Recently Added</option>
                                        <option value="highest">Highest price</option>
                                        <option value="lowest">Lowest price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="right_bar">
                            <div class="row">
                                @if($ads->isNotEmpty())
                                    @include('partials.ads-list', ['ads' => $ads])
                                    @else
                                    <div class="text-center">
                                        <i class="fa-solid fa-magnifying-glass fa-5x"></i>
                                        <h5 class="mt-3">Oops... we didn't find anything that matches this search</h5>
                                        <p>Try to search for something more general, change the filters or check for spelling mistakes</p>
                                    </div>
                                @endif
                            </div>
                        </div> 
                        <div class="recently_viewed mt-4 ps-2">
                            <p class="fs-6  fst-normal mb-0">Recently Viewed Ads</p>
                            <hr class="mt-0 p-0" style="margin-bottom:3px">
                            <div class="row ">
                                @forelse($recentlyview as $view) 
                                    @if($view->ad) 
                                        <div class="col-md-4 mb-3">
                                            <a href="{{ route('product.detail', ['id' => encrypt($view->ad->id)]) }}" style="text-decoration: none; color: inherit;">
                                                <div class="card h-100" id="gallery-card" style="box-shadow:none !important; border: 1px solid #ddd;">
                                                    @if($view->ad->images->isNotEmpty()) <!-- Check if ad has images -->
                                                        <x-lazy-image src="{{ asset($view->ad->images->first()->image_path) }}" class="card-img-top shadow-sm lazyload" alt="" class="card-img-top border-bottom p-1 lazyload w-100" 
                                                        style="height:160px !important ; border-top:none; border-left:none;border-right:none;" />
                                                    @else
                                                        <img src="{{ asset('default-image.jpg') }}" class="card-img-top shadow-sm h-100 lazyload" alt="Default Image">
                                                    @endif
                                                    <div class="card-body d-flex flex-column" style="height:100%;">
                                                        <p class="price pt-1 pb-0 m-0" style="color:black; font-weight:500;">
                                                            Rs {{ number_format($view->ad->price) }}
                                                        </p>
                                                        <p class="description" style="font-size:13px">
                                                            {{ Str::limit($view->ad->title, 50, '...') }}
                                                        </p>
                                                        <div class="mt-auto">
                                                            <p class="location pb-0 mb-0" style="font-size:13px;">
                                                                <i class="fa-solid fa-location-dot"></i> {{ $view->ad->location }}
                                                            </p>
                                                            <p class="location pb-0 mt-0" style="font-size:11px;">
                                                              {{ $view->ad->created_at->diffForHumans() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @empty
                                    <p class="text-muted text-center">No recently viewed ads to display.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" id="login_register">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist" style="margin-top: -20px !important;">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
                aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
                aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active m-0 p-0" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                  <x-input id="email" class="form-control" type="email" name="email" placeholder="name@example.com" />
                </div>
                <div class="input-group">
                  <x-input id="password" class="form-control" type="password" name="password" placeholder="Password" />
                </div>
                <div class="row mb-2">
                  <div class="col d-flex justify-content-center">
                    <div class="form-check " id="login_rig">
                      <x-checkbox id="remember_me" name="remember" class="form-check-input" />
                      <label class="form-check-label" for="loginCheck"> Remember me </label>
                    </div>
                  </div>
                  <div class="col mt-1">
                    <a href="#!" class="link" style="font-size:12px;float:right; padding-top:3px">Forgot password?</a>
                  </div>
                </div>

                <x-button class="btn sign w-100 mx-auto">
                  {{ __('Log in') }}
                </x-button>

                <div class="text-center">
                  <p class="mb-1">Not a member? <a id="tab-register" data-bs-toggle="pill" href="#pills-register"
                      role="tab" aria-controls="pills-register" class="link">Register</a></p>
                </div>
              </form>
            </div>

            <div class="tab-pane fade m-0 p-0" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-2">
                        <x-input type="text" name="name" class="form-control" placeholder="Name" required />
                    </div>
                    <div class="input-group mb-2">
                        <x-input type="email" class="form-control" name="email" placeholder="Email" required />
                    </div>
                    <div class="input-group rounded border border-1 mb-2">
                        <span class="input-group-text border-0 pe-0 bg-transparent" id="inputGroup-sizing-sm">+92 |</span>
                        <x-input type="number" class="form-control border-0" name="phone_no" id="phone-no" required />
                    </div>
                    <div class="input-group mb-2">
                        <x-input id="password" type="password" name="password" class="form-control" placeholder="Password" required />
                    </div>
                    <div class="input-group mb-2">
                        <x-input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required />
                    </div>
                    <div class="input-group mb-2">
                        <select name="role" class="form-control" id="role">
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-check d-flex justify-content-center mb-2" id="login_rig">
                        <x-checkbox name="terms" id="terms" class="form-check-input me-2" required />
                        <label class="form-check-label" for="terms">
                            I have read and agree to the terms
                        </label>
                    </div>
                    <x-button class="btn sign w-100 mx-auto">
                        {{ __('Register') }}
                    </x-button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
	 <script>
    let cities1 = [];

// Fetch cities when modal opens for the first time
document.getElementById('cityModal').addEventListener('shown.bs.modal', () => {
    if (cities1.length === 0) { // Only fetch if cities have not been loaded
        fetch('/cities.json')
            .then(response => response.json())
            .then(data => {
                cities1 = data;
                populateCityList1(cities1); // Populate the list
            })
            .catch(error => console.error('Error fetching location data:', error));
    }
});

// Populate the list based on fetched data and search query
function populateCityList1(cities, searchQuery = '') {
    const cityList1 = document.getElementById('cityList1');
    cityList1.innerHTML = ''; // Clear existing list

    const filteredCities = cities.filter(city => city.name.toLowerCase().includes(searchQuery.toLowerCase()));

    filteredCities.forEach(city => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item list-group-item-action';
        listItem.textContent = city.name;
        listItem.style.cursor = 'pointer';

        listItem.addEventListener('click', () => {
            document.getElementById('selectedCity1').textContent = city.name;
            document.getElementById('selectedlocation').value = city.name;
            const modal = bootstrap.Modal.getInstance(document.getElementById('cityModal'));
            modal.hide();
        });

        cityList1.appendChild(listItem);
    });
}

// Update list as user types in the search field
document.getElementById('citySearch1').addEventListener('input', function () {
    const searchQuery = this.value;
    populateCityList1(cities1, searchQuery);
});
</script>


</x-app-layout>