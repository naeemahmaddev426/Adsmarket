<x-app-layout>

    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            overflow: hidden;
        }

        .swiper-zoom-container {
            width: 100%;
            height: 100%;
        }


            
        #full-width-swiper {
            position: relative;
            overflow: hidden;
			 height: 200px;
		
            /* Hide any overflow to only show one slide at a time */
        }

    .swiper-slide img {
        width: 100%;
       
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

        
        /* Styling for the heart icon and checkbox */
.heart-checkbox {
    display: none; /* Hide the checkbox itself */
}

/* Default heart icon style */
.heart-icon {
    font-size: 18px;
    color: gray;
    cursor: pointer;
    transition: color 0.3s ease, background-color 0.3s ease;
    padding: 5px;
    border-radius: 50%;
    border: 1px solid gray;
    background-color: transparent;
}

/* When checkbox is checked, apply new styles */
.heart-checkbox:checked +.heart-icon {
    color: #545fb8;
    padding: 5px;
    border-radius: 50%;
    border: 1px solid #545fb8;
}

/* Optional: Add hover effect to heart icon */


    </style>
    <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top"
        style="display: none;"><i class="fas fa-arrow-up"></i></button>
    <div id="preloader-container">
        <div id="preloader">A</div>
    </div>
    <div class="container-fluid" id="main-container">
        <div class="row">
            <div class="col-lg-9 col-12 col-md-12 mx-auto p-xlg-0 p-lg-0 p-md-0 p-sm-1 ">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12 mx-auto" >
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
                <div class="row mt-2">
                    <div class="col-md-7 col-12 gx-3">
                        <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0 ;box-shadow:none !important;">
                            @if($ad->images->count() > 1)
                            <div class="swiper main-swiper pb-3 position-relative">
								<div class="swiper-wrapper">
									@foreach($ad->images as $image)
										<div class="swiper-slide">
											<div class="swiper-zoom-container">
												<x-lazy-image 
													src="{{ asset($image->image_path) }}" 
													alt="Ad Image" 
													class="img-fluid mx-auto" 
													style=" height:300px;  width: 100%; object-fit: cover;" 
												/>
											</div>
										</div>
									@endforeach
								</div>

								<!-- Navigation Buttons -->
								<div class="swiper-button-next main-swiper-button-next" style="right: 10px; position: absolute; top: 50%; transform: translateY(-50%); z-index: 10;"></div>
								<div class="swiper-button-prev main-swiper-button-prev" style="left: 10px; position: absolute; top: 50%; transform: translateY(-50%); z-index: 10;"></div>
							</div>

                            <div thumbsSlider="" class="swiper thumbs-swiper mt-4 h-50">
                                <div class="swiper-wrapper">
                                    @foreach($ad->images as $image)
                                    <div class="swiper-slide h-50">
                                    <x-lazy-image 
                                        src="{{ asset($image->image_path) }}" 
                                        alt="Ad Thumbnail" 
                                        class="img-thumbnail" 
                                        style="max-width: 80px; max-height: 65px;" 
                                    />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            @foreach($ad->images as $image)
                            <x-lazy-image 
                                src="{{ asset($image->image_path) }}" 
                                alt="Ad Image" 
                                class="img-fluid mx-auto" 
                                style="height: 440px; width: 100%;" 
                            />
                            @endforeach
                            @endif
                            <div class="text-left mb-3">
                                <h1 class="p-0 mt-3 mb-0" style="color: #002f34; font-size: 32px;font-weight: 700;line-height: 3.992rem;">
                                    {{  number_format($ad->price) }}
                                    @if (Auth::check() && Auth::user()->id == $ad->users_id)
                                        <a href="{{ route('edit_post_attributes', encrypt($ad->id)) }}" class="float-end text-decoration-none me-2">
                                        <i class="fas fa-edit float-end fs-6 mt-4 me-2" style="color:#545f8b;"></i>
                                    </a>
                                    @else
                                    <form id="likeForm_{{ $ad->id }}" class="d-inline">
                                        @csrf
                                        <label class="heart-toggle-label float-end">
                                            <input type="checkbox" 
                                                id="heartToggle_{{ $ad->id }}" 
                                                class="heart-checkbox" 
                                                {{ $userLiked ? 'checked' : '' }} 
                                                data-ad-id="{{ $ad->id }}" />
                                            <i class="fa-solid fa-heart heart-icon"></i>
                                        </label>
                                    </form>
                                    @endif
                                </h1>
                                <h1 class="detail p-0 m-0 text-uppercase fw-bold">{{ $ad->title }} </h1>
                                <p class="posted-detail mt-1" style="font-size:14px"><i class="fa-solid fa-location-dot fs-6 p-2 pe-3" style="fill: #002f34;margin-right: .1rem;"></i> {{ $ad->location }} <span class="float-end"> {{$ad->user->created_at->diffForHumans() }} </span></p>
                            </div>
                        </div>
                        <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0 ;box-shadow:none !important;">
							<div class="row">
                                   <h4 class="fw-bold fs-4">Details</h4>
                                  @if($ad->category_name === 'Mobiles' && $ad->sub_category_name === 'Tablets')
                                   <div class="row mb-2 gx-1 ">
                                        <!-- Brand Section -->
                                        <div class="col-12  col-md-6 d-flex ps-2 pt-1 pb-2 rounded" >
                                            <div class="col-6">
                                                <p class="mb-0">Brand</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->brand))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->brand }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Condition Section -->
                                        <div class="col-12 ms-5 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Mobiles' &&
                                    $ad->sub_category_name === 'Accessories' &&
                                    $ad->sub_category_name_type === 'Charging_Cables'
                                    )
                                   <div class="row mb-2 gx-1 ">
                                        <!-- Brand Section -->
                                        <div class="col-12  col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Condition Section -->
                                        <div class="col-12 ms-5 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Mobiles' &&
                                    $ad->sub_category_name === 'Accessories' &&
                                    $ad->sub_category_name_type === 'Converters'
                                    )
                                    <div class="row mb-2 ">
                                        <!-- Condition Section -->
                                        <div class="col-12 ms-1 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Mobiles' &&
                                    $ad->sub_category_name === 'Accessories' &&
                                    $ad->sub_category_name_type === 'Chargers'
                                    )
                                   <div class="row gx-1 ">
                                        <!-- Device Section -->
                                        <div class="col-12  col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Device</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->device))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->device }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Type Section -->
                                        <div class="col-12 ms-5 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded  ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <!-- Condition Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center ">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Mobiles' &&
                                    $ad->sub_category_name === 'Accessories' &&
                                    $ad->sub_category_name_type === 'Screen'
                                    )
                                    <div class="row ">
                                        <!-- Type Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center ">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->sub_category_name === 'Smart_watch')
                                   <div class="row mb-2 gx-1 ">
                                        <!-- Brand Section -->
                                        <div class="col-12  col-md-6 d-flex ps-2 pt-1 pb-2 rounded" >
                                            <div class="col-6">
                                                <p class="mb-0">Brand</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->brand))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->brand }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Condition Section -->
                                        <div class="col-12 ms-5 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->sub_category_name === 'Mobiles_phones')
                                    <div class="row mb-2 gx-1 ">
                                        <!-- Brand Section -->
                                        <div class="col-12  col-md-6 d-flex ps-2 pt-1 pb-2 rounded" >
                                            <div class="col-6">
                                                <p class="mb-0">Brand</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->brand))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->brand }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Vehicles' &&
                                    $ad->sub_category_name === 'Car'
                                    )
								    <!--Make Saction -->
                                    <div class="row mb-2 gx-1 ">
                                        <div class="col-12  col-md-6 d-flex ps-2 pt-1 pb-2 rounded" >
                                            <div class="col-6">
                                                <p class="mb-0">Make</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->make_car))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->make_car }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Vehicles' &&
                                    $ad->sub_category_name === 'Cars_on_Installments'
                                    )
                                    <div class="row mb-2 gx-1 ">
                                        <!-- Make Section -->
                                        <div class="col-12  col-md-6 d-flex ps-2 pt-1 pb-2 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Make</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->make_car))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->make_car }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Vehicles' &&
                                    $ad->sub_category_name === 'Cars_Accessories'
                                    )
                                   <div class="row mb-2 gx-1 ">
                                        <!-- Condition Section -->
                                        <div class="col-12  col-md-6 d-flex ps-2 pt-1 pb-2 rounded" >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Vehicles' &&
                                    $ad->sub_category_name === 'Spare_Parts'
                                    )
                                    <div class="row mb-2 gx-1 ">
                                        <!-- Type Section -->
                                        <div class="col-12  col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Condition Section -->
                                        <div class="col-12 ms-5 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Vehicles' &&
                                    $ad->sub_category_name === 'Buses_Vans_Trucks'
                                    )
                                    <div class="row gx-1 ">
                                        <!-- Year Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Year</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->year_update))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->year_update }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Kms Driven Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">KMs'Driven</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->kms_driven_no))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->kms_driven_no }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <!-- Condition Section -->
                                        <div class="col-12 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded  " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center ms-4">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Vehicles' &&
                                    $ad->sub_category_name === 'Rickshaw_Chingchi'
                                    )
                                   <div class="row gx-1 ">
                                        <!-- Year Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Year</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->year_update))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->year_update }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Kms Driven Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">KMs'Driven</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->kms_driven_no))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->kms_driven_no }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <!-- Condition Section -->
                                        <div class="col-12 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded  " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center ms-4">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Vehicles' &&
                                    $ad->sub_category_name === 'Boats'
                                    )

                                    <div class="row ">
                                        <!-- Condition Section -->
                                        <div class="col-12 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded  " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center ms-4">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Vehicles' &&
                                    $ad->sub_category_name === 'Tractors_Trailers'
                                    )
                                   <div class="row gx-1 ">
                                        <!-- Year Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Year</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->year_update))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->year_update }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Kms Driven Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">KMs'Driven</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->kms_driven_no))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->kms_driven_no }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <!-- Condition Section -->
                                        <div class="col-12 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded  " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center ms-4">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_sale' &&
                                    $ad->sub_category_name === 'Land_&_Plots'
                                    )
                                    <div class="row gx-1 ">
                                        <!-- Type Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Area unit Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Area unit</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->area_unit))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_unit }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <!-- Area Section -->
                                        <div class="col-12 col-md-6 d-flex  ps-2 pt-1 pb-2 rounded  " >
                                            <div class="col-6">
                                                <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_square))
                                                <h6 class="fs-6 fw-bold text-center ms-4">{{ $ad->area_square }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_sale' &&
                                    $ad->sub_category_name === 'Houses'
                                    )
                                    <div class="row gx-1 ">
                                        <!-- Furnished Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Furnished</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->furnished))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->furnished }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Contruction State</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->construction_state_new))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->construction_state_new }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Bedroom Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Bedrooms</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->pro_sale_house_bedroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_sale_house_bedroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Bathroom Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Bathrooms</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->pro_sale_house_bathroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_sale_house_bathroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Area Unit Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area Unit</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_unit))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_unit }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Area square Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->area_square))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_square }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_sale' &&
                                    $ad->sub_category_name === 'Apartments_&_Flats'
                                    )
                                    <div class="row gx-1 ">
                                        <!-- Furnished Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Furnished</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->furnished))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->furnished }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Contruction State</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->construction_state_new))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->construction_state_new }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Bedrooms Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Bedrooms</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->pro_sale_appart_bedroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_sale_appart_bedroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Bathroom Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Bathrooms</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->pro_sale_appart_bathroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_sale_appart_bathroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Floor Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Floor Level</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->pro_sale_appart_floor_level))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_sale_appart_floor_level }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area Unit</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_unit))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_unit }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1">
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->area_square))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_square }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_sale' &&
                                    $ad->sub_category_name === 'Shops_Offices_Commercial_Space'
                                    )
                                    <div class="row gx-1 ">
                                        <!-- Type Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Floor level Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Floor Level</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->pro_sale_shope_floor_level))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_sale_shope_floor_level }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Area Unit Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area unit</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_unit))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_unit }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_square))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_square }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_sale' &&
                                    $ad->sub_category_name === 'Portions_&_Floors'
                                    )
                                    <div class="row gx-1 ">
                                        <!-- Furnished Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Furnished</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->furnished))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->furnished }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Bedrooms</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->pro_sale_portion_bedroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_sale_portion_bedroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Bathroom Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Bathrooms</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->pro_sale_portion_bathroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_sale_portion_bathroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Floor Level Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Floor Level</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->pro_sale_portion_floor_level))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_sale_portion_floor_level }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Area unit Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area Unit</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_unit))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_unit }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Area square Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->area_square))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_square }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_rent' &&
                                    $ad->sub_category_name === 'Houses_for_Rent'
                                    )
                                      <div class="row gx-1 ">
                                        <!-- Furnished Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Furnished</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->furnished))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->furnished }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Contruction State</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->construction_state_new_rent_house))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->construction_state_new_rent_house }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- bedroom Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Bedrooms</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->pro_rent_house_bedroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_rent_house_bedroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Bathroom Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Bathrooms</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->pro_rent_house_bathroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_rent_house_bathroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Storey Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">No of storeys</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->no_storeys))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->no_storeys }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area Unit</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_unit))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_unit }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1">
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->area_square))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_square }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    @elseif(
                                    $ad->category_name === 'Property_for_rent' &&
                                    $ad->sub_category_name === 'Apartments_&_Flats_Rent'
                                    )
                                    <div class="row gx-1 ">
                                        <!-- Furnished Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Furnished</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->furnished))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->furnished }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Bedrooms</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->pro_rent_appart_bedroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_rent_appart_bedroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Bathroom Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Bathrooms</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->pro_rent_apart_bathroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_rent_apart_bathroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Floor Level Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Floor Level</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->pro_rent_appart_floor))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->pro_rent_appart_floor }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Brand Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area Unit</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_unit))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_unit }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Area Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->area_square))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_square }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_rent' &&
                                    $ad->sub_category_name === 'Portions_&_Floors_Rent'
                                    )
                                    <div class="row gx-1 ">
                                        <!-- Brand Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Furnished</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->furnished))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->furnished }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Bedrooms</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->bedroom2))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->bedroom2 }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Bathroom Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Bathrooms</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->bathroom2))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->bathroom2 }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Floor Level Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Floor Level</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->floor_level2))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->floor_level2 }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Area unit Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area Unit</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_unit))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_unit }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Area square Section -->
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->area_square))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_square }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_rent' &&
                                    $ad->sub_category_name === 'Shops_Offices_Commercial_Space_Rent'
                                    )
                                    <div class="row gx-1 ">
                                        <!-- Type Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded ms-auto " >
                                            <div class="col-6">
                                                <p class="mb-0">Bathrooms</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->rent_shope_bathroom))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->rent_shope_bathroom }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <!-- Floor level Section -->
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Floor Level</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->floor_level_shope_rent))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->floor_level_shope_rent }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area Unit</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_unit))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_unit }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <div class="col-12  col-md-6 d-flex  ps-2 pt-1 pb-2 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-6 ms-auto">
                                                @if(!empty($ad->area_square))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_square }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_rent' &&
                                    $ad->sub_category_name === 'Rooms'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Furnished</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->furnished))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->furnished }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_rent' &&
                                    $ad->sub_category_name === 'Roommates_Paying_Guests'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Furnished</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->furnished))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->furnished }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    @elseif(
                                    $ad->category_name === 'Property_for_rent' &&
                                    $ad->sub_category_name === 'Vacation_Rentals_Guest_Houses'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Bedrooms</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->bedroom_vacation_rent))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->bedroom_vacation_rent }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded ms-auto" >
                                            <div class="col-6">
                                                <p class="mb-0">Bathrooms</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->bathroom_vacation_rent))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->bathroom_vacation_rent }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Property_for_rent' &&
                                    $ad->sub_category_name === 'Land_&_Plots_Rent'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area unit</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_unit))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_unit }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->area_square))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->area_square }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Motorcycles' &&
                                    $ad->sub_category_name_type === 'Electric_Bikes')


                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Make</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->make_bike))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->make_bike }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Year</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->year_update))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->year_update }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Engine Type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->engine_type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->engine_type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Engine Capacity</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->engine_capacity))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->engine_capacity }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">KMs Driven</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->kms_driven_no))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->kms_driven_no }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Ignition type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->ignition_type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->ignition_type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Origin</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->origin))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->origin }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Registration City</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->registration_city))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->registration_city }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Motorcycles' &&
                                    $ad->sub_category_name_type === 'Sports_Heavy_Bikes')
                                   <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Make</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->make_bike2))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->make_bike2 }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Year</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->year_update))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->year_update }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Engine Type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->engine_type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->engine_type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Engine Capacity</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->engine_capacity))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->engine_capacity }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">KMs Driven</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->kms_driven_no))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->kms_driven_no }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Ignition type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->ignition_type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->ignition_type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Origin</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->origin))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->origin }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Registration City</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->registration_city))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->registration_city }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                    $ad->sub_category_name_type === 'Air_Filters')
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                    $ad->sub_category_name_type === 'Carburetors')
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                    $ad->sub_category_name_type === 'Bearings')
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                    $ad->sub_category_name_type === 'Side_Mirrors')
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                    $ad->sub_category_name_type === 'Motorcycle_Batteries')
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                    $ad->sub_category_name_type === 'Switches')
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Bicycles' &&
                                    $ad->sub_category_name_type === 'Road_Bikes'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Make</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->make_car))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->make_car }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Bicycles' &&
                                    $ad->sub_category_name_type === 'Mountain_Bikes')
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Make</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->make_car))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->make_car }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Bikes' &&
                                    $ad->sub_category_name === 'Bicycles' &&
                                    $ad->sub_category_name_type === 'Electric_Bicycles')
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Make</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->make_car))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->make_car }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($ad->category_name === 'Furniture_Home_Decor' &&
                                    $ad->sub_category_name === 'Sofa_Chairs' &&
                                    $ad->sub_category_name_type === 'Sofas')
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Furniture_Home_Decor' &&
                                    $ad->sub_category_name === 'Sofa_Chairs' &&
                                    $ad->sub_category_name_type === 'Sofa_Beds'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Furniture_Home_Decor' &&
                                    $ad->sub_category_name === 'Office_Furniture' &&
                                    $ad->sub_category_name_type === 'Office_Chairs'
                                    )
                                   <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Type</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->type))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->type }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Furniture_Home_Decor' &&
                                    $ad->sub_category_name === 'Office_Furniture' &&
                                    $ad->sub_category_name_type === 'Office_Sofas'
                                    )
                                   <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Furniture_Home_Decor' &&
                                    $ad->sub_category_name === 'Office_Furniture' &&
                                    $ad->sub_category_name_type === 'Office_Tables'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Fashion_Beauty' &&
                                    $ad->sub_category_name === 'Fashion_Accessories' &&
                                    $ad->sub_category_name_type === 'Caps'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Fashion_Beauty' &&
                                    $ad->sub_category_name === 'Fashion_Accessories' &&
                                    $ad->sub_category_name_type === 'Scarves'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Fashion_Beauty' &&
                                    $ad->sub_category_name === 'Fashion_Accessories' &&
                                    $ad->sub_category_name_type === 'Gloves'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Fashion_Beauty' &&
                                    $ad->sub_category_name === 'Makeup' &&
                                    $ad->sub_category_name_type === 'Eyes'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Fashion_Beauty' &&
                                    $ad->sub_category_name === 'Makeup' &&
                                    $ad->sub_category_name_type === 'Brushes'
                                    )
                                   <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Fashion_Beauty' &&
                                    $ad->sub_category_name === 'Makeup' &&
                                    $ad->sub_category_name_type === 'Face'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Fashion_Beauty' &&
                                    $ad->sub_category_name === 'Skin_Hair' &&
                                    $ad->sub_category_name_type === 'Hair_Care'
                                    )
                                    <tr>
                                        <td class="description-price">Product</td>
                                        <td class="fs-6">{{ $ad->product }}</td>
                                    </tr>
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    @elseif(
                                    $ad->category_name === 'Fashion_Beauty' &&
                                    $ad->sub_category_name === 'Skin_Hair' &&
                                    $ad->sub_category_name_type === 'Skin_Care'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Product</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->product))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->product }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Fashion_Beauty' &&
                                    $ad->sub_category_name === 'Wedding' &&
                                    $ad->sub_category_name_type === 'Bridals'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(
                                    $ad->category_name === 'Fashion_Beauty' &&
                                    $ad->sub_category_name === 'Wedding' &&
                                    $ad->sub_category_name_type === 'Grooms'
                                    )
                                    <div class="row gx-1 ">
                                        <div class="col-12 col-md-6 d-flex ps-2 pt-1 pb-1 rounded " >
                                            <div class="col-6">
                                                <p class="mb-0">Condition</p>
                                            </div>
                                            <div class="col-6">
                                                @if(!empty($ad->condition))
                                                <h6 class="fs-6 fw-bold text-center">{{ $ad->condition }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                     </div>
                                @endif
							</div>
                        </div>
						 @if($ad->category_name === 'Property_for_sale' && $ad->sub_category_name === 'Land_&_Plots')
                            @php
                                // Dynamically fetch and process the features
                                $features = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                    ->where('sub_category_name', 'Land_&_Plots')
                                    ->distinct()
                                    ->pluck('feature')
                                    ->filter(fn($feature) => !empty($feature))
                                    ->flatMap(fn($feature) => explode(',', $feature)) // Split features by comma
                                    ->map(fn($feature) => trim($feature))
                                    ->unique()
                                    ->values();
                            @endphp
                            <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                <h5 class="fw-bold fs-4">Feature</h5>
                                <div class="d-flex flex-wrap">
                                    @foreach($features as $index => $feature)
                                        <div class="d-flex flex-column w-25 {{ $index % 2 == 0 ? 'pr-2' : 'pl-2' }}">
                                            <p class="fs-6 pb-0 mb-0">{{ $feature }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @elseif($ad->category_name === 'Property_for_sale' && $ad->sub_category_name === 'Houses')
                                @php
                                    // Dynamically fetch and process the features
                                    $features = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                        ->where('sub_category_name', 'Houses')
                                        ->distinct()
                                        ->pluck('feature')
                                        ->filter(fn($feature) => !empty($feature))
                                        ->flatMap(fn($feature) => explode(',', $feature)) // Split features by comma
                                        ->map(fn($feature) => trim($feature))
                                        ->unique()
                                        ->values();
                                @endphp
                                <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                    <h5 class="fw-bold fs-4">Feature</h5>
                                    <div class="d-flex flex-wrap">
                                        @foreach($features as $index => $feature)
                                            <div class="d-flex flex-column w-50 {{ $index % 2 == 0 ? 'pr-2' : 'pl-2' }}">
                                                <p class="fs-6 pb-0 mb-0">{{ $feature }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($ad->category_name === 'Property_for_sale' && $ad->sub_category_name === 'Apartments_&_Flats')
                                @php
                                    // Dynamically fetch and process the features
                                    $features = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                        ->where('sub_category_name', 'Apartments_&_Flats')
                                        ->distinct()
                                        ->pluck('feature')
                                        ->filter(fn($feature) => !empty($feature))
                                        ->flatMap(fn($feature) => explode(',', $feature)) // Split features by comma
                                        ->map(fn($feature) => trim($feature))
                                        ->unique()
                                        ->values();
                                @endphp
                                <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                    <h5 class="fw-bold fs-4">Feature</h5>
                                    <div class="d-flex flex-wrap">
                                        @foreach($features as $index => $feature)
                                            <div class="d-flex flex-column w-50 {{ $index % 2 == 0 ? 'pr-2' : 'pl-2' }}">
                                                <p class="fs-6 pb-0 mb-0">{{ $feature }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($ad->category_name === 'Property_for_sale' && $ad->sub_category_name === 'Shops_Offices_Commercial_Space')
                                @php
                                    // Dynamically fetch and process the features
                                    $features = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                        ->where('sub_category_name', 'Shops_Offices_Commercial_Space')
                                        ->distinct()
                                        ->pluck('feature')
                                        ->filter(fn($feature) => !empty($feature))
                                        ->flatMap(fn($feature) => explode(',', $feature)) // Split features by comma
                                        ->map(fn($feature) => trim($feature))
                                        ->unique()
                                        ->values();
                                @endphp
                                <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                    <h5 class="fw-bold fs-4">Feature</h5>
                                    <div class="d-flex flex-wrap">
                                        @foreach($features as $index => $feature)
                                            <div class="d-flex flex-column w-50 {{ $index % 2 == 0 ? 'pr-2' : 'pl-2' }}">
                                                <p class="fs-6 pb-0 mb-0">{{ $feature }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($ad->category_name === 'Property_for_sale' && $ad->sub_category_name === 'Portions_&_Floors')
                                @php
                                    // Dynamically fetch and process the features
                                    $features = \App\Models\Ad::where('category_name', 'Property_for_sale')
                                        ->where('sub_category_name', 'Portions_&_Floors')
                                        ->distinct()
                                        ->pluck('feature')
                                        ->filter(fn($feature) => !empty($feature))
                                        ->flatMap(fn($feature) => explode(',', $feature)) // Split features by comma
                                        ->map(fn($feature) => trim($feature))
                                        ->unique()
                                        ->values();
                                @endphp
                                <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                    <h5 class="fw-bold fs-4">Feature</h5>
                                    <div class="d-flex flex-wrap">
                                        @foreach($features as $index => $feature)
                                            <div class="d-flex flex-column w-50 {{ $index % 2 == 0 ? 'pr-2' : 'pl-2' }}">
                                                <p class="fs-6 pb-0 mb-0">{{ $feature }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($ad->category_name === 'Property_for_rent' && $ad->sub_category_name === 'Houses_for_Rent')
                                @php
                                    // Dynamically fetch and process the features
                                    $features = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                        ->where('sub_category_name', 'Houses_for_Rent')
                                        ->distinct()
                                        ->pluck('feature')
                                        ->filter(fn($feature) => !empty($feature))
                                        ->flatMap(fn($feature) => explode(',', $feature)) // Split features by comma
                                        ->map(fn($feature) => trim($feature))
                                        ->unique()
                                        ->values();
                                @endphp
                                <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                    <h5 class="fw-bold fs-4">Feature</h5>
                                    <div class="d-flex flex-wrap">
                                        @foreach($features as $index => $feature)
                                            <div class="d-flex flex-column w-50 {{ $index % 2 == 0 ? 'pr-2' : 'pl-2' }}">
                                                <p class="fs-6 pb-0 mb-0">{{ $feature }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($ad->category_name === 'Property_for_rent' && $ad->sub_category_name === 'Apartments_&_Flats_Rent')
                                @php
                                    // Dynamically fetch and process the features
                                    $features = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                        ->where('sub_category_name', 'Apartments_&_Flats_Rent')
                                        ->distinct()
                                        ->pluck('feature')
                                        ->filter(fn($feature) => !empty($feature))
                                        ->flatMap(fn($feature) => explode(',', $feature)) // Split features by comma
                                        ->map(fn($feature) => trim($feature))
                                        ->unique()
                                        ->values();
                                @endphp
                                <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                    <h5 class="fw-bold fs-4">Feature</h5>
                                    <div class="d-flex flex-wrap">
                                        @foreach($features as $index => $feature)
                                            <div class="d-flex flex-column w-50 {{ $index % 2 == 0 ? 'pr-2' : 'pl-2' }}">
                                                <p class="fs-6 pb-0 mb-0">{{ $feature }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($ad->category_name === 'Property_for_rent' && $ad->sub_category_name === 'Portions_&_Floors_Rent')
                                @php
                                    // Dynamically fetch and process the features
                                    $features = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                        ->where('sub_category_name', 'Portions_&_Floors_Rent')
                                        ->distinct()
                                        ->pluck('feature')
                                        ->filter(fn($feature) => !empty($feature))
                                        ->flatMap(fn($feature) => explode(',', $feature)) // Split features by comma
                                        ->map(fn($feature) => trim($feature))
                                        ->unique()
                                        ->values();
                                @endphp
                                <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                    <h5 class="fw-bold fs-4">Feature</h5>
                                    <div class="d-flex flex-wrap">
                                        @foreach($features as $index => $feature)
                                            <div class="d-flex flex-column w-50 {{ $index % 2 == 0 ? 'pr-2' : 'pl-2' }}">
                                                <p class="fs-6 pb-0 mb-0">{{ $feature }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($ad->category_name === 'Property_for_rent' && $ad->sub_category_name === 'Shops_Offices_Commercial_Space_Rent')
                                @php
                                    // Dynamically fetch and process the features
                                    $features = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                        ->where('sub_category_name', 'Shops_Offices_Commercial_Space_Rent')
                                        ->distinct()
                                        ->pluck('feature')
                                        ->filter(fn($feature) => !empty($feature))
                                        ->flatMap(fn($feature) => explode(',', $feature)) // Split features by comma
                                        ->map(fn($feature) => trim($feature))
                                        ->unique()
                                        ->values();
                                @endphp
                                <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                    <h5 class="fw-bold fs-4">Feature</h5>
                                    <div class="d-flex flex-wrap">
                                        @foreach($features as $index => $feature)
                                            <div class="d-flex flex-column w-50 {{ $index % 2 == 0 ? 'pr-2' : 'pl-2' }}">
                                                <p class="fs-6 pb-0 mb-0">{{ $feature }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($ad->category_name === 'Property_for_rent' && $ad->sub_category_name === 'Land_&_Plots_Rent')
                                @php
                                    // Dynamically fetch and process the features
                                    $features = \App\Models\Ad::where('category_name', 'Property_for_rent')
                                        ->where('sub_category_name', 'Land_&_Plots_Rent')
                                        ->distinct()
                                        ->pluck('feature')
                                        ->filter(fn($feature) => !empty($feature))
                                        ->flatMap(fn($feature) => explode(',', $feature)) // Split features by comma
                                        ->map(fn($feature) => trim($feature))
                                        ->unique()
                                        ->values();
                                @endphp
                                <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                    <h5 class="fw-bold fs-4">Feature</h5>
                                    <div class="d-flex flex-wrap">
                                        @foreach($features as $index => $feature)
                                            <div class="d-flex flex-column w-50 {{ $index % 2 == 0 ? 'pr-2' : 'pl-2' }}">
                                                <p class="fs-6 pb-0 mb-0">{{ $feature }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                        @endif
                        <div class="card p-4 border mb-3" style="border:1px solid #D8DFE0 ;box-shadow:none !important;">
                            <h5 class="fw-bold fs-4 ">Description </h5>
                            <p class=" description-para ">{!! nl2br(e($ad->description)) !!}</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="row">
                            <div class="col-md-12">
                         <!-- Check if the user is authenticated -->
                                @auth
                                    <!-- Check if the authenticated user is NOT the owner of the ad -->
                                     @if (Auth::check() && Auth::user()->id == $ad->users_id)
                                        <div class="card" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12 text-center">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Views stat -->
                                                            <div class="stat-item me-auto d-flex">
                                                                <i class="fas fa-eye p-2" style="background-color:#F2F4F5; color:#545f8b;"></i>
                                                                <div class="righ d-grid" style="height:30px">
                                                                    <h6 class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $totalViews }}</h6>
                                                                    <span class="mt-0" style="font-size:12px">Views</span>
                                                                </div>
                                                            </div>

                                                            <!-- Phone views for the owner -->
                                                            <div class="stat-item mx-auto  d-flex">
                                                                <i class="fas fa-phone pt-2 ps-1 pe-1" style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;"></i>
                                                                <div class="righ d-grid" style="height:30px">
                                                                    <p class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $totalPhoneViews }}</p>
                                                                    <span class="mt-0" style="font-size:12px">Phone</span>
                                                                </div>
                                                            </div>
                                                            <div class="stat-item ms-auto  d-flex">
                                                                <div class="righ d-grid" style="height:30px">
                                                                   <p class="posted-detail text-start" style="font-size:14px"><i class="fa-solid fa-location-dot fs-6 p-2 pe-3 "style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;"></i> {{ $ad->location }}</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Second Card: Display this card only for the owner of the ad (authenticated user) -->
                                        <div class="card p-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12 text-center">
                                                        <div class="d-flex align-items-center mb-4">
                                                            <div class="profile-image">
                                                                <img src="{{ asset('assets/images/Profile-Male-PNG.png') }}" alt="Profile" 
                                                                    style="width: 60px; height: 60px; border-radius: 50%; background-color: #FFDD57;">
                                                            </div>
                                                            <div class="ms-3">
                                                                <!-- Display the ad owner's name -->
                                                                <span class="d-block text-start">{{ $ad->user ? $ad->user->name : 'Adsmarket' }}</span>
                                                                <span class="text-muted">Member since {{ $ad->user ? $ad->user->created_at->format('M Y') : 'N/A' }}</span>
                                                            </div>
                                                        </div>
                                                        <!-- Button to Show Phone Number -->
														<button id="phoneNumberButton" type="button" 
															class="border-0 text-white rounded search2-button w-100 pt-2 pb-2"
															style="padding-right: 15px !important; color:#545f8b;">
															<i class="fa-solid fa-phone pe-3" style="padding-left: 10px !important;"></i> Phone Number
														</button>

														<!-- Phone Number Display (Initially Hidden) -->
														<a id="showPhoneNumberButton" href="tel:{{ $ad->user->phone_no }}" 
															class="border-0 text-white rounded search2-button w-100 pt-2 pb-2"
															style="padding-right: 15px !important; display: none; text-decoration: none; color:#545f8b;">
															<i class="fa-solid fa-phone pe-3" style="padding-left: 7px !important;"></i> {{ $ad->user->phone_no }}
														</a>


                                                        <!-- Hidden form to submit data via AJAX -->
                                                        <form id="phoneForm" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endauth

                                <!-- For non-authenticated users -->
                                @guest
                                    <div class="card p-3" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-md-12 text-center">
                                                    <div class="d-flex align-items-center mb-4">
                                                        <div class="profile-image">
                                                            <img src="{{ asset('assets/images/Profile-Male-PNG.png') }}" alt="Profile" 
                                                                style="width: 60px; height: 60px; border-radius: 50%; background-color: #FFDD57;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <span class="d-block text-start">{{ $ad->user ? $ad->user->name : 'Adsmarket' }}</span>
                                                            <span class="text-muted">Member since {{ $ad->user ? $ad->user->created_at->format('M Y') : 'N/A' }}</span>
                                                        </div>
                                                    </div>
                                                    <button id="phoneNumberButton" type="button"
                                                        class="border-0 text-white rounded search2-button w-100 pt-2 pb-2"
                                                        style="padding-right: 15px !important;">
                                                        <i class="fa-solid fa-phone text-white pe-3"
                                                            style="padding-left: 10px !important; color: #fff"></i> Phone Number
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endguest
                                <div class="col-md-12  mt-5 w-100">
                                    <img src="{{ asset('assets/images/ads.png') }}" class="card-img-top">

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                
            </div>
            <div class="modal-body">
                Please login to view the phone number.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#545F8B">Close</button>
                <!-- <a href="{{ route('login') }}" class="btn btn-primary">Login</a> -->
            </div>
        </div>
    </div>
</div>
<!-- Modal Structure -->
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

@guest
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Login Required</h5>
            </div>
            <div class="modal-body">
                <p>Please log in to like this ad.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="post" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endguest
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