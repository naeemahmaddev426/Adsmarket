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
    overflow: hidden; /* Hide any overflow to only show one slide at a time */
}

.swiper-slide {
    display: flex;
    justify-content: center; /* Center the image horizontally */
    align-items: center; /* Center the image vertically */
}

.swiper-slide img {
    width: 100%; /* Ensure image fills the slide width */
    height: auto; /* Maintain image aspect ratio */
}
    </style>
    <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top"
        style="display: none;"><i class="fas fa-arrow-up"></i></button>
    <div id="preloader-container">
        <div id="preloader">A</div>
    </div>
    <div class="container-fluid" id="main-container">
        <div class="row">
            <div class="col-lg-10 col-12 col-md-12 mx-auto p-0 ">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12 mx-auto">
                            <div id="full-width-swiper" class="swiper-container shadow-sm" style="height: 200px;">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/images/image.png') }}" class="lazyload" alt="Ad Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/images/image (1).png') }}" class="lazyload" alt="Ad Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/images/image (2).png') }}" class="lazyload" alt="Ad Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/images/image (3).png') }}" class="lazyload" alt="Ad Image">
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

                <div class="row mt-5">
                    <div class="col-md-7 col-12 gx-3">
                        <div class="card p-4 border mb-3">
                            @if($ad->images->count() > 1)
                                <div class="swiper main-swiper pb-3 shadow-sm">
                                    <div class="swiper-wrapper">
                                        @foreach($ad->images as $image)
                                        <div class="swiper-slide">
                                            <div class="swiper-zoom-container">
                                                <img src="{{ asset($image->image_path) }}" class="img-fluid lazyload " style="max-height: 260px; width: auto;" />
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next main-swiper-button-next"></div>
                                    <div class="swiper-button-prev main-swiper-button-prev"></div>
                                </div>

                                <div thumbsSlider="" class="swiper thumbs-swiper mt-4 h-50">
                                    <div class="swiper-wrapper">
                                        @foreach($ad->images as $image)
                                        <div class="swiper-slide h-50">
                                            <img src="{{ asset($image->image_path) }}" class="img-thumbnail lazyload" style="max-width: 80px; height: auto" />
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            @else
                            @foreach($ad->images as $image)
                            <div class="d-flex justify-content-center my-3">
                                <img src="{{ asset($image->image_path) }}" class="img-fluid lazyload"
                                    style="max-height: 300px; width: auto;" />
                            </div>
                            @endforeach
                            @endif
                            <div class="text-left mb-3">
                                <h1 class=" p-0 mt-3 mb-0"
                                    style="color: #002f34; font-size: 32px;font-weight: 700;line-height: 3.992rem;">
                                    {{ $ad->price }}</h1>
                                <h1 class="detail p-0 m-0 text-uppercase fw-bold">{{ $ad->title }}</h1>
                                <p class="posted-detail mt-1" style="font-size:14px"><i
                                        class="fa-solid fa-location-dot fs-6 p-2 pe-3"
                                        style="fill: #002f34;margin-right: .1rem;"></i> {{ $ad->location }} <span
                                        class="float-end"> {{$ad->user->created_at->format('d/m/Y') }} </span></p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5 col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card p-3">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-12 text-center">
                                                <h3 class="contact_detail">Contact the Advertiser</h3>
                                                <p class="para_detail">You can reach the advertiser directly by phone
                                                    once you reveal the number.</p>
                                                <!-- Button to reveal phone number -->
                                                @if(auth()->check())
                                                <button id="phoneNumberButton" type="button"
                                                    class="border-0 rounded search2-button pt-2 pb-2"
                                                    style="padding-right: 15px !important;">
                                                    <i class="fa-solid fa-phone pe-3"
                                                        style="padding-left: 10px !important;"></i> Phone Number
                                                </button>
                                                <a id="showPhoneNumberButton" type="button"
                                                    class="border-0 rounded search2-button pt-2 pb-2"
                                                    style="padding-right: 15px !important; display: none; text-decoration:none; color:white;">
                                                    <i class="fa-solid fa-phone pe-3" style="padding-left: 7px !important;"></i> {{
                                                    auth()->user()->phone_no }}
                                                    </a>
                                                @else
                                                <button id="phoneNumberButton" type="button"
                                                    class="border-0 rounded search2-button pt-2 pb-2"
                                                    style="padding-right: 15px !important;">
                                                    <i class="fa-solid fa-phone pe-3"
                                                        style="padding-left: 10px !important;"></i> Phone Number
                                                </button>
                                                <button id="loginPromptButton" type="button"
                                                    class="border-0 rounded search2-button pt-2 pb-2"
                                                    style="padding-right: 15px !important; display: none;">
                                                    <i class="fa-solid fa-phone pe-3"
                                                        style="padding-left: 7px !important;"></i> Please login to view
                                                    phone number
                                                </button>
                                                @endif



                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12  mt-5 w-100">
                                    <img src="{{ asset('assets/images/ads.png') }}" class="card-img-top">

                                </div>
                            </div>
                        </div>
                        <!-- Other details and buttons -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 col-12">
                        <div class="card p-4 border mb-3">
                        <table>
                            <tbody>
                                <tr class="p-0 m-0">
                                    <td class="description-price">Price</td>
                                    <td class="price-final fw-normal">{{ $ad->price }}</td>
                                </tr>
                                <tr>
                                    <td class="description-price">Type of Ad</td>
                                    <td>{{ $ad->category_name }}</td>
                                </tr>
                                <tr>
                                    <td class="description-price">Type of Sub Ad</td>
                                    <td>{{ $ad->sub_category_name }}</td>
                                </tr>
                                @if(!empty($ad->sub_category_name) && !empty($ad->sub_category_name_type))
                                    <tr>
                                        <td class="description-price">Type of Sub Ad Type</td>
                                        <td>{{ $ad->sub_category_name_type }}</td>
                                    </tr>
                                @endif

                                @if($ad->category_name === 'Mobiles' && $ad->sub_category_name === 'Tablets')
                                        <tr>
                                            <td class="description-price">Brand</td>
                                            <td class="fs-6">{{ $ad->brand }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Mobiles' && 
                                        $ad->sub_category_name === 'Accessories' && 
                                        $ad->sub_category_name_type === 'Charging_Cables'
                                    )
                                        <tr>
                                            <td class="description-price">Type</td>
                                            <td class="fs-6">{{ $ad->type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Mobiles' && 
                                        $ad->sub_category_name === 'Accessories' && 
                                        $ad->sub_category_name_type === 'Converters'
                                    )
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Mobiles' && 
                                        $ad->sub_category_name === 'Accessories' && 
                                        $ad->sub_category_name_type === 'Chargers'
                                    )
                                        <tr>
                                            <td class="description-price">Device</td>
                                            <td class="fs-6">{{ $ad->device }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Type</td>
                                            <td class="fs-6">{{ $ad->type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Mobiles' && 
                                        $ad->sub_category_name === 'Accessories' && 
                                        $ad->sub_category_name_type === 'Screen'
                                    )
                                       
                                        <tr>
                                            <td class="description-price">Type</td>
                                            <td class="fs-6">{{ $ad->type }}</td>
                                        </tr>
                                       
                                    @elseif($ad->sub_category_name === 'Smart_watch')
                                        <tr>
                                            <td class="description-price">Brand</td>
                                            <td class="fs-6">{{ $ad->brand }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif($ad->sub_category_name === 'Mobiles_phones')
                                        <tr>
                                            <td class="description-price">Brand</td>
                                            <td class="fs-6">{{ $ad->brand }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Vehicles' && 
                                        $ad->sub_category_name === 'Car'
                                    )
                                        <tr>
                                            <td class="description-price">Make</td>
                                            <td class="fs-6">{{ $ad->make_car }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Vehicles' && 
                                        $ad->sub_category_name === 'Cars_on_Installments'
                                    )
                                        <tr>
                                            <td class="description-price">Make</td>
                                            <td class="fs-6">{{ $ad->make_car }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Vehicles' && 
                                        $ad->sub_category_name === 'Cars_Accessories'
                                    )
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Vehicles' && 
                                        $ad->sub_category_name === 'Spare_Parts'
                                    )
                                        <tr>
                                            <td class="description-price">Type</td>
                                            <td class="fs-6">{{ $ad->type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Vehicles' && 
                                        $ad->sub_category_name === 'Buses_Vans_Trucks'
                                    )
                                        <tr>
                                            <td class="description-price">Year</td>
                                            <td class="fs-6">{{ $ad->year_update }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">KMs'Driven</td>
                                            <td class="fs-6">{{ $ad->kms_driven_no }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Vehicles' && 
                                        $ad->sub_category_name === 'Rickshaw_Chingchi'
                                    )
                                        <tr>
                                            <td class="description-price">Year</td>
                                            <td class="fs-6">{{ $ad->year_update }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">KMs'Driven</td>
                                            <td class="fs-6">{{ $ad->kms_driven_no }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Vehicles' && 
                                        $ad->sub_category_name === 'Boats'
                                    )
                                        
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Vehicles' && 
                                        $ad->sub_category_name === 'Tractors_Trailers'
                                    )
                                        <tr>
                                            <td class="description-price">Year</td>
                                            <td class="fs-6">{{ $ad->year_update }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">KMs'Driven</td>
                                            <td class="fs-6">{{ $ad->kms_driven_no }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_sale' && 
                                        $ad->sub_category_name === 'Land_Plots'
                                    )
                                        <tr>
                                            <td class="description-price">Type</td>
                                            <td class="fs-6">{{ $ad->type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Feature</td>
                                            <td class="fs-6">{{ $ad->feature }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area Unit</td>
                                            <td class="fs-6">{{ $ad->area_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area </td>
                                            <td class="fs-6">{{ $ad->area_square }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_sale' && 
                                        $ad->sub_category_name === 'Houses'
                                    )
                                        <tr>
                                            <td class="description-price">Furnished</td>
                                            <td class="fs-6">{{ $ad->furnished }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bedrooms</td>
                                            <td class="fs-6">{{ $ad->pro_sale_house_bedroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bathrooms</td>
                                            <td class="fs-6">{{ $ad->pro_sale_house_bathroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Construction State </td>
                                            <td class="fs-6">{{ $ad->construction_state_new }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Feature</td>
                                            <td class="fs-6">{{ $ad->feature }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area Unit </td>
                                            <td class="fs-6">{{ $ad->area_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area </td>
                                            <td class="fs-6">{{ $ad->area_square }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_sale' && 
                                        $ad->sub_category_name === 'Apartments_Flats'
                                    )
                                        <tr>
                                            <td class="description-price">Furnished</td>
                                            <td class="fs-6">{{ $ad->furnished }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bedrooms</td>
                                            <td class="fs-6">{{ $ad->pro_sale_appart_bedroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bathrooms</td>
                                            <td class="fs-6">{{ $ad->pro_sale_appart_bathroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Floor Level</td>
                                            <td class="fs-6">{{ $ad->pro_sale_appart_floor_level }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Construction State </td>
                                            <td class="fs-6">{{ $ad->construction_state_new }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Feature</td>
                                            <td class="fs-6">{{ $ad->feature }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area Unit </td>
                                            <td class="fs-6">{{ $ad->area_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area </td>
                                            <td class="fs-6">{{ $ad->area_square }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_sale' && 
                                        $ad->sub_category_name === 'Shops_Offices_Commercial_Space'
                                    )
                                        <tr>
                                            <td class="description-price">Type</td>
                                            <td class="fs-6">{{ $ad->type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Floor Level</td>
                                            <td class="fs-6">{{ $ad->pro_sale_shope_floor_level }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Feature</td>
                                            <td class="fs-6">{{ $ad->feature }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area Unit</td>
                                            <td class="fs-6">{{ $ad->area_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area </td>
                                            <td class="fs-6">{{ $ad->area_square }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_sale' && 
                                        $ad->sub_category_name === 'Portions_Floors'
                                    )
                                        <tr>
                                            <td class="description-price">Furnished</td>
                                            <td class="fs-6">{{ $ad->furnished }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bedrooms</td>
                                            <td class="fs-6">{{ $ad->pro_sale_portion_bedroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bathrooms</td>
                                            <td class="fs-6">{{ $ad->pro_sale_portion_bathroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Feature</td>
                                            <td class="fs-6">{{ $ad->feature }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Floor Level </td>
                                            <td class="fs-6">{{ $ad->pro_sale_portion_floor_level }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area Unit </td>
                                            <td class="fs-6">{{ $ad->area_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area </td>
                                            <td class="fs-6">{{ $ad->area_square }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_sale' && 
                                        $ad->sub_category_name === 'Portions_Floors'
                                    )
                                        <tr>
                                            <td class="description-price">Furnished</td>
                                            <td class="fs-6">{{ $ad->furnished }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bedrooms</td>
                                            <td class="fs-6">{{ $ad->pro_sale_portion_bedroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bathrooms</td>
                                            <td class="fs-6">{{ $ad->pro_sale_portion_bathroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Feature</td>
                                            <td class="fs-6">{{ $ad->feature }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Floor Level </td>
                                            <td class="fs-6">{{ $ad->pro_sale_portion_floor_level }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area Unit </td>
                                            <td class="fs-6">{{ $ad->area_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area </td>
                                            <td class="fs-6">{{ $ad->area_square }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_rent' && 
                                        $ad->sub_category_name === 'Rent_Houses'
                                    )
                                        <tr>
                                            <td class="description-price">Furnished</td>
                                            <td class="fs-6">{{ $ad->furnished }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bedrooms</td>
                                            <td class="fs-6">{{ $ad->pro_rent_house_bedroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bathrooms</td>
                                            <td class="fs-6">{{ $ad->pro_rent_house_bathroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">No of storeys</td>
                                            <td class="fs-6">{{ $ad->no_storeys }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Contruction State </td>
                                            <td class="fs-6">{{ $ad->construction_state_new_rent_house }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Feature </td>
                                            <td class="fs-6">{{ $ad->feature }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area Unit</td>
                                            <td class="fs-6">{{ $ad->area_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area</td>
                                            <td class="fs-6">{{ $ad->area_square }}</td>
                                        </tr>
                                       
                                    @elseif(
                                        $ad->category_name === 'Property_for_rent' && 
                                        $ad->sub_category_name === 'Rent_Apartments_Flats'
                                    )
                                        <tr>
                                            <td class="description-price">Furnished</td>
                                            <td class="fs-6">{{ $ad->furnished }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bedrooms</td>
                                            <td class="fs-6">{{ $ad->pro_rent_appart_bedroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bathrooms</td>
                                            <td class="fs-6">{{ $ad->pro_rent_apart_bathroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Floor Level</td>
                                            <td class="fs-6">{{ $ad->pro_rent_appart_floor }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area unit </td>
                                            <td class="fs-6">{{ $ad->area_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area </td>
                                            <td class="fs-6">{{ $ad->area_square }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_rent' && 
                                        $ad->sub_category_name === 'Rent_Portions_Floors'
                                    )
                                        <tr>
                                            <td class="description-price">Furnished</td>
                                            <td class="fs-6">{{ $ad->furnished }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bedrooms</td>
                                            <td class="fs-6">{{ $ad->bedroom2 }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bathrooms</td>
                                            <td class="fs-6">{{ $ad->bathroom2 }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Floor Level</td>
                                            <td class="fs-6">{{ $ad->floor_level2 }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area unit </td>
                                            <td class="fs-6">{{ $ad->area_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area </td>
                                            <td class="fs-6">{{ $ad->area_square }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_rent' && 
                                        $ad->sub_category_name === 'Rent_Shops_Offices_Commercial_Space'
                                    )
                                        <tr>
                                            <td class="description-price">Type</td>
                                            <td class="fs-6">{{ $ad->type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Bathrooms</td>
                                            <td class="fs-6">{{ $ad->rent_shope_bathroom }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Feature</td>
                                            <td class="fs-6">{{ $ad->feature }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Floor Level</td>
                                            <td class="fs-6">{{ $ad->floor_level_shope_rent }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area unit </td>
                                            <td class="fs-6">{{ $ad->area_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="description-price">Area </td>
                                            <td class="fs-6">{{ $ad->area_square }}</td>
                                        </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_rent' && 
                                        $ad->sub_category_name === 'Rooms'
                                    )
                                    <tr>
                                        <td class="description-price">Furnished</td>
                                        <td class="fs-6">{{ $ad->furnished }}</td>
                                    </tr>
                                    <tr>
                                        <td class="description-price">Type</td>
                                        <td class="fs-6">{{ $ad->type }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_rent' && 
                                        $ad->sub_category_name === 'Roommates_Paying_Guests'
                                    )
                                    <tr>
                                        <td class="description-price">Furnished</td>
                                        <td class="fs-6">{{ $ad->furnished }}</td>
                                    </tr>
                                    <tr>
                                        <td class="description-price">Type</td>
                                        <td class="fs-6">{{ $ad->type }}</td>
                                    </tr>
                                       
                                    @elseif(
                                        $ad->category_name === 'Property_for_rent' && 
                                        $ad->sub_category_name === 'Vacation_Rentals_Guest_Houses'
                                    )
                                    <tr>
                                        <td class="description-price">Bedroom</td>
                                        <td class="fs-6">{{ $ad->bedroom_vacation_rent }}</td>
                                    </tr>
                                    <tr>
                                        <td class="description-price">Bathroom</td>
                                        <td class="fs-6">{{ $ad->bathroom_vacation_rent }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Property_for_rent' && 
                                        $ad->sub_category_name === 'Rent_Land_Plots'
                                    )
                                    <tr>
                                        <td class="description-price">Type</td>
                                        <td class="fs-6">{{ $ad->type }}</td>
                                    </tr>
                                    <tr>
                                        <td class="description-price">Feature</td>
                                        <td class="fs-6">{{ $ad->feature }}</td>
                                    </tr>
                                    <tr>
                                        <td class="description-price">Area Unit</td>
                                        <td class="fs-6">{{ $ad->area_unit }}</td>
                                    </tr>
                                    <tr>
                                        <td class="description-price">Area</td>
                                        <td class="fs-6">{{ $ad->area_square }}</td>
                                    </tr>
                                    @elseif($ad->category_name === 'Bikes' && 
                                        $ad->sub_category_name === 'Motorcycles' &&
                                        $ad->sub_category_name_type === 'Electric_Bikes')
                                  
                                      
                                            <tr>
                                                <td class="description-price">Make</td>
                                                <td class="fs-6">{{ $ad->make_bike }}</td>
                                            </tr>
                                            <tr>
                                                <td class="description-price">Year</td>
                                                <td class="fs-6">{{ $ad->year_update }}</td>
                                            </tr>
                                            <tr>
                                                <td class="description-price">Engine Type</td>
                                                <td class="fs-6">{{ $ad->engine_type }}</td>
                                            </tr>
                                            <tr>
                                                <td class="description-price">Engine Capacity</td>
                                                <td class="fs-6">{{ $ad->engine_capacity }}</td>
                                            </tr>
                                            <tr>
                                                <td class="description-price">KMs Driven</td>
                                                <td class="fs-6">{{ $ad->kms_driven_no }}</td>
                                            </tr>
                                            <tr>
                                                <td class="description-price">Ignition Type</td>
                                                <td class="fs-6">{{ $ad->ignition_type }}</td>
                                            </tr>
                                            <tr>
                                                <td class="description-price">Origin</td>
                                                <td class="fs-6">{{ $ad->origin }}</td>
                                            </tr>
                                            <tr>
                                                <td class="description-price">Condition</td>
                                                <td class="fs-6">{{ $ad->condition }}</td>
                                            </tr>
                                            <tr>
                                                <td class="description-price">Registration City</td>
                                                <td class="fs-6">{{ $ad->registration_city }}</td>
                                            </tr>
                                      
                                        @elseif($ad->category_name === 'Bikes' && 
                                            $ad->sub_category_name === 'Motorcycles' &&
                                            $ad->sub_category_name_type === 'Sports_Heavy_Bikes')
                                        <tr>
                                            <td class="description-price">Make</td>
                                            <td class="fs-6">{{ $ad->make_car }}</td>
                                        </tr>
                                        @elseif($ad->category_name === 'Bikes' && 
                                            $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                            $ad->sub_category_name_type === 'Air_Filters')
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                        @elseif($ad->category_name === 'Bikes' && 
                                            $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                            $ad->sub_category_name_type === 'Carburetors')
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                        @elseif($ad->category_name === 'Bikes' && 
                                            $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                            $ad->sub_category_name_type === 'Bearings')
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                        @elseif($ad->category_name === 'Bikes' && 
                                            $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                            $ad->sub_category_name_type === 'Side_Mirrors')
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                        @elseif($ad->category_name === 'Bikes' && 
                                            $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                            $ad->sub_category_name_type === 'Motorcycle_Batteries')
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                        @elseif($ad->category_name === 'Bikes' && 
                                            $ad->sub_category_name === 'Bike_Spare_Parts' &&
                                            $ad->sub_category_name_type === 'Switches')
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                        @elseif($ad->category_name === 'Bikes' && 
                                            $ad->sub_category_name === 'Bicycles' &&
                                            $ad->sub_category_name_type === 'Road_Bikes' 
                                            )
                                        <tr>
                                            <td class="description-price">Make</td>
                                            <td class="fs-6">{{ $ad->make_car }}</td>
                                        </tr>
                                        @elseif($ad->category_name === 'Bikes' && 
                                            $ad->sub_category_name === 'Bicycles' &&
                                            $ad->sub_category_name_type === 'Mountain_Bikes')
                                        <tr>
                                            <td class="description-price">Make</td>
                                            <td class="fs-6">{{ $ad->make_car }}</td>
                                        </tr>
                                        @elseif($ad->category_name === 'Bikes' && 
                                            $ad->sub_category_name === 'Bicycles' &&
                                            $ad->sub_category_name_type === 'Electric_Bicycles')
                                        <tr>
                                            <td class="description-price">Make</td>
                                            <td class="fs-6">{{ $ad->make_car }}</td>
                                        </tr>
                                        @elseif($ad->category_name === 'Furniture_Home_Decor' && 
                                            $ad->sub_category_name === 'Sofa_Chairs' &&
                                            $ad->sub_category_name_type === 'Sofas')
                                        <tr>
                                            <td class="description-price">Condition</td>
                                            <td class="fs-6">{{ $ad->condition }}</td>
                                        </tr>
                                        <tr>
                                        <td class="description-price">Type</td>
                                        <td class="fs-6">{{ $ad->type }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Furniture_Home_Decor' && 
                                        $ad->sub_category_name === 'Sofa_Chairs' &&
                                        $ad->sub_category_name_type === 'Sofa_Beds'
                                    )
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Furniture_Home_Decor' && 
                                        $ad->sub_category_name === 'Office_Furniture' &&
                                        $ad->sub_category_name_type === 'Office_Chairs'
                                    )
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    <tr>
                                        <td class="description-price">Type</td>
                                        <td class="fs-6">{{ $ad->type }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Furniture_Home_Decor' && 
                                        $ad->sub_category_name === 'Office_Furniture' &&
                                        $ad->sub_category_name_type === 'Office_Sofas'
                                    )
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Furniture_Home_Decor' && 
                                        $ad->sub_category_name === 'Office_Furniture' &&
                                        $ad->sub_category_name_type === 'Office_Tables'
                                    )
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Fashion_Beauty' && 
                                        $ad->sub_category_name === 'Fashion_Accessories' &&
                                        $ad->sub_category_name_type === 'Caps'
                                    )
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Fashion_Beauty' && 
                                        $ad->sub_category_name === 'Fashion_Accessories' &&
                                        $ad->sub_category_name_type === 'Scarves'
                                    )
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Fashion_Beauty' && 
                                        $ad->sub_category_name === 'Fashion_Accessories' &&
                                        $ad->sub_category_name_type === 'Gloves'
                                    )
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Fashion_Beauty' && 
                                        $ad->sub_category_name === 'Makeup' &&
                                        $ad->sub_category_name_type === 'Eyes'
                                    )
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Fashion_Beauty' && 
                                        $ad->sub_category_name === 'Makeup' &&
                                        $ad->sub_category_name_type === 'Brushes'
                                    )
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Fashion_Beauty' && 
                                        $ad->sub_category_name === 'Makeup' &&
                                        $ad->sub_category_name_type === 'Face'
                                    )
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
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
                                        $ad->sub_category_name === 'Wedding' &&
                                        $ad->sub_category_name_type === 'Bridals'
                                    )
                                    
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>
                                    @elseif(
                                        $ad->category_name === 'Fashion_Beauty' && 
                                        $ad->sub_category_name === 'Wedding' &&
                                        $ad->sub_category_name_type === 'Grooms'
                                    )
                                    
                                    <tr>
                                        <td class="description-price">Condition</td>
                                        <td class="fs-6">{{ $ad->condition }}</td>
                                    </tr>   
                                    @endif

                                    

                                <tr>
                                    <td class="description-price">Date</td>
                                    <td class="fs-6">{{ $ad->user->created_at->format('d/m/Y') }}</td>
                                </tr>
                            </tbody>
                        </table>



                            <div class="row">
                                <h6 class="">Description </h6>
                                <p class=" description-para ">{!! nl2br(e($ad->description)) !!}</p>
                            </div>
                            <div class="row ">
                                <div class="col-md-2 col-4">
                                    <span class="fw-bold">Ad Id</span>
                                    {{ $ad->id }}
                                </div>
                                <div class="col-md-3 col-5">
                                    <span class="fw-bold"> Last updated </span>
                                    {{ $ad->updated_at->format('d/m/Y') }}
                                </div>
                                <div class="col-4 col-md-3">
                                    <span class="fw-bold">Member since</span>
                                    {{ $ad->user->created_at->format('d/m/Y') }}
                                </div>
                                <div class="col-md-4 col-3">
                                    <span class="fw-bold">Visitors</span> <br>
                                    {{ $ad->user->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <footer id="footer" class="footer pb-0 mt-4 mb-0" style="background-color:#fdfcfc !important;">
                <div class="container footer-top pb-0 mb-0">
                    <div class="row gy-4 pb-3">
                        <div class="col-lg-5 col-md-6 footer-about">
                            <div class="footer-contact pt-3">
                                <p class="pb-0 mb-0"><strong>Phone:</strong> <a
                                        style="font-size: 12px; color:rgb(68, 68, 68); text-transform: none; font-weight:450"
                                        href="tel:0123456789">0123456789</a></p>
                                <p><strong>Email:</strong> <a
                                        style="font-size: 12px;color:rgb(68, 68, 68);  text-transform: none;font-weight:450"
                                        href="mailto:info.example@gmail.com">info.example@gmail.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 footer-links mb-0">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="/contact">Contact us</a>
                                </li>
                                <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="">Terms of service</a>
                                </li>
                                <li><i class="fa-solid fa-chevron-right link pe-1"></i><a href="">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <h4>Follow Us</h4>
                            <div class="social-links d-flex">
                                <a href=""><i class="fa-brands fa-twitter"></i></a>
                                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                                <a href=""><i class="fa-brands fa-instagram"></i></a>
                                <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
                    <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="/" class="link"> <strong
                                class="px-1 sitename">Ads Market</strong></a><span>All Rights Reserved</span></p>
                </div>

            </footer>
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
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist"
                        style="margin-top: -20px !important;">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login"
                                role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register"
                                role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active m-0 p-0" id="pills-login" role="tabpanel"
                            aria-labelledby="tab-login">
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="loginEmail"
                                        placeholder="name@example.com">
                                    <label for="loginEmail">Email</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="loginPassword"
                                        placeholder="Password">
                                    <label for="loginPassword">Password</label>
                                </div>
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                        <div class="form-check mt-1" id="login_rig">
                                            <input class="form-check-input" type="checkbox" value="" id="loginCheck">
                                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                                        </div>
                                    </div>
                                    <div class="col mt-1">
                                        <a href="#!" class="link">Forgot password?</a>
                                    </div>
                                </div>
                                <button class="btn sign w-100 mx-auto"> <a href="user-panel/index.html"
                                        class="text-decoration-none text-white">Login </a></button>
                                <div class="text-center">
                                    <p class="mb-1">Not a member? <a id="tab-register" data-bs-toggle="pill"
                                            href="#pills-register" role="tab" aria-controls="pills-register"
                                            class="link">Register</a></p>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="registerName" placeholder="Name">
                                    <label for="registerName">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="registerEmail" placeholder="Email">
                                    <label for="registerEmail">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="registerPassword"
                                        placeholder="Password">
                                    <label for="registerPassword">Password</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" id="registerConfirmPassword"
                                        placeholder="Confirm Password">
                                    <label for="registerConfirmPassword">Confirm Password</label>
                                </div>
                                <div class="form-check d-flex justify-content-center mb-4" id="login_rig">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck"
                                        aria-describedby="registerCheckHelpText">
                                    <label class="form-check-label" for="registerCheck">
                                        I have read and agree to the terms
                                    </label>
                                </div>
                                <button type="submit" class="btn sign mx-auto w-100"
                                    data-mdb-ripple-init="">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" id="login_register">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="fw-bold">Send a message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email Address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Phone Number</label>
                        </div>
                        <div class="form-floating mt-3">
                            <textarea class="form-control" rows="5" placeholder="Leave a comment here"
                                id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Message</label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="fileInput">Choose an Image:</label>
                            <input type="file" class="form-control border rounded-1" id="fileInput" style="width: 100%"
                                onchange="previewImage()">
                        </div>

                        <div id="imagePreview" class="mt-3"></div>

                        <button type="submit" class="btn sign w-100 mt-3 mx-auto" data-mdb-ripple-init="">Send
                            Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    </div>
    </div>
    </div>
</x-app-layout>