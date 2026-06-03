<x-app-user-layout>
    <style>
        #main-nav {
            display: none;
        }

        .tabs ul {
            margin: 0 auto;
            padding: 0;
        }

        .tabs-nav li {
            float: left;
            width:fit-content;
            list-style: none;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 2px;
            padding-top: 2px;
            margin-left:5px;
            border: 1px solid #545f8b;
            border-radius: 16px;
        }
.mt-100{
    margin-top:60px;
    
}
        .tabs-nav li:first-child a {
            border-right: 0;
            border-top-left-radius: 6px;
        }

        .tabs-nav li:last-child a {
            border-top-right-radius: 6px;
            border-left: 0;
        }

        .tabs a {
            color: #000;
            display: block;
            padding: 5px 0;
            text-align: center;
            text-decoration: none;
            list-style: none;
            outline: none;
            font-size: 14px;
        }

        .tab-active a {
            color: #545f8b;
            font-weight:600;
           
            cursor: pointer;
        }

        .tabs-stage {

            border-radius: 0 0 6px 6px;
            border-top: 0;
            clear: both;
            padding: 24px 30px;
            position: relative;
            top: -1px;
        }

        .tabs .tabheading {
            font-size: 20px;
        }
        .title-content {
        overflow: hidden;
        text-overflow: ellipsis;
        width: fit-content;
        cursor: pointer;
    }
    .title-content:hover {
        white-space: normal;
    }
    .active-border {
        background-color:#5cb100;
        color: #fff;
    }
    .inactive-border {
        background-color:black;
        color: #fff;
    }
    .view{
        color: #fff !important; 
        background-color: #545f8b; 
        border: .2rem solid #545f8b; 
        text-decoration: none; 
        text-align: center;
        width:130px;
    }
    /* .view:hover{
        color: #fff !important; 
        background-color: #545f8b; 
        border: .2rem solid #545f8b !important; 
        text-decoration: none;
        text-align: center;
        width:130px;
    } */
    </style>
    <!-- ======= Header ======= -->

    <form action="{{ route('register') }}" method="post">
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Manage and View Your Ads</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">My Ads</li>
                        <li class="nav-item  float-end ms-auto mt-0">
                            <a href="{{ route('post_ad') }}" class="post" id="postAdLink"><i class="fa-solid fa-circle-plus me-2"></i>Post Ad</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs">
                            <ul class="tabs-nav row g-2 justify-content-center">
                                <li class="col-sm-6 col-md-4">
                                    <a href="#tab-1" class=" w-100">View all ({{ $viewAdsCount }})</a>
                                </li>
                                <li class="col-sm-6 col-md-4">
                                    <a href="#tab-2" class=" w-100">View Active Ads ({{ $activeAdsCount }})</a>
                                </li>
                                <li class="col-sm-6 col-md-4">
                                    <a href="#tab-3" class=" w-100">View Inactive Ads ({{ $inactiveAdsCount }})</a>
                                </li>
                                <li class="col-sm-6 col-md-4">
                                    <a href="#tab-4" class="w-100">View Pending Ads ({{ $notPostedAdsCount }})</a>
                                </li>
                            </ul>

                            <div class="tabs-stage">
                                <div class="tabcontent" id="tab-1">
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="card recent-sales overflow-auto">
                                                <div class="card-body">
                                                    <h5 class="card-title">All Ads</h5>
                                                    <table class="table table-borderless datatable" id="adsTable">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($ads as $ad)
                                                                @if ($ad->ad_status != 'disable')
                                                                    <tr>
                                                                        <div class="card mb-3 pt-3 w-100 mx-auto  pb-2 px-1" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                                                            <div class="row g-0">
                                                                                <div class="col-md-2 col-sm-12 mx-auto" >
                                                                                    @if ($ad->images && $ad->images->isNotEmpty())
                                                                                        <img src="{{ asset($ad->images->first()->image_path) }}" class="img-fluid lazyload" alt="Ad Image" style=" object-fit: cover; height:100px; width:100%;">
                                                                                    @else
                                                                                        <img src="{{ asset('assets/images/empty-300x240.jpg') }}" class="img-fluid" alt="No Image Available" style="height: 100%; width: 100%; object-fit: cover;">
                                                                                    @endif
                                                                                </div>
                                                                                <div class="col-md-8 col-sm-12 mx-auto ps-sm-2">
                                                                                    <h5 class="d-flex">
                                                                                        <span class="title-content fw-bold fs-6 text-truncate" title="{{ $ad->title }}">
                                                                                            {{ \Illuminate\Support\Str::limit($ad->title, 30, '...') }}
                                                                                        </span>
                                                                                        <span class="fs-6 text-secondary">-in {{ $ad->sub_category_name }}</span>
                                                                                    </h5>
                                                                                    <div class="float-start">
                                                                                        Rs {{ number_format($ad->price) }}
                                                                                        <span class="badge ms-4 rounded {{ $ad->ad_status == 'active' ? 'active-border' : 'inactive-border' }}">
                                                                                            {{ $ad->ad_status }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="d-flex mt-3 mb-2">
                                                                                        <!-- Views stat -->
                                                                                        <span class="d-flex text-center me-2">
                                                                                            <i class="fas fa-eye p-2" style="background-color:#F2F4F5; color:#545f8b;"></i>
                                                                                            <div class="d-grid" style="height:25px">
                                                                                                <h6 class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $ad->totalViews ?? 0 }}</h6>
                                                                                                <span class="mt-0 text-center ps-1" style="font-size:12px">Views</span>
                                                                                            </div>
                                                                                        </span>
                                                                                        <span class="d-flex text-center me-2">
                                                                                            <i class="fas fa-phone pt-2 ps-1 pe-1" style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;"></i>
                                                                                            <div class="d-grid" style="height:25px">
                                                                                                <p class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $ad->totalPhoneViews ?? 0 }}</p>
                                                                                                <span class="mt-0 text-center ps-1" style="font-size:12px">Phone</span>
                                                                                            </div>
                                                                                        </span>
                                                                                        <span class=" text-center d-flex me-1">
                                                                                            <div class=" d-flex" style="height:25px">
                                                                                                <p class="posted-detail mb-0 pb-0 m-0 " style="font-size:12px"><i class="fa-solid fa-location-dot fs-6 p-2 pe-2 "style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;"></i></p>
                                                                                                <span class="mt-0 text-center ps-1 mt-1" style="font-size:12px">{{ $ad->location }}</span>
                                                                                            </div>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2 col-sm-12 text-center text-md-end">
                                                                                   <br>
                                                                                    <a href="{{ route('edit_post_attributes', ['id' => encrypt($ad->id)]) }}" class="view mx-auto rounded mt-0">
                                                                                        Edit
                                                                                    </a>
                                                                                    <a href="{{ route('product.detail', ['id' => encrypt($ad->id)]) }}" class=" view mx-auto rounded mt-2">
                                                                                        View Ad
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tabcontent" id="tab-2">
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="card recent-sales overflow-auto">
                                                <div class="card-body">
                                                    <h5 class="card-title">Active Ads</h5>
                                                    <table class="table table-borderless datatable" id="adsTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Active Ads Details</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($ads->where('ad_status', 'active') as $ad)
                                                            <tr>
                                                                <td>
                                                                    <div class="card mb-3 pt-3 w-100 mx-auto  pb-2 px-2" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                                                        <div class="row g-0">
                                                                            <div class="col-md-2 col-sm-12 mx-auto" >
                                                                                @if ($ad->images && $ad->images->isNotEmpty())
                                                                                    <img src="{{ asset($ad->images->first()->image_path) }}" class="img-fluid lazyload" alt="Ad Image" style=" object-fit: cover;">
                                                                                @else
                                                                                    <img src="{{ asset('assets/images/empty-300x240.jpg') }}" class="img-fluid" alt="No Image Available" style="height: 100%; width: 100%; object-fit: cover;">
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8 col-sm-12 mx-auto ps-2">
                                                                                    <h5 class="d-flex">
                                                                                        <span class="title-content fw-bold fs-6 text-truncate" title="{{ $ad->title }}">
                                                                                            {{ \Illuminate\Support\Str::limit($ad->title, 30, '...') }}
                                                                                        </span>
                                                                                        <span class="fs-6 text-secondary">-in {{ $ad->sub_category_name }}</span>
                                                                                    </h5>
                                                                                    <div class="float-start">
                                                                                        Rs {{ number_format($ad->price) }}
                                                                                        <span class="badge ms-4 rounded {{ $ad->ad_status == 'active' ? 'active-border' : 'inactive-border' }}">
                                                                                            {{ $ad->ad_status }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="d-flex mt-3 mb-2">
                                                                                        <!-- Views stat -->
                                                                                        <span class="d-flex text-center me-2">
                                                                                            <i class="fas fa-eye p-2" style="background-color:#F2F4F5; color:#545f8b;"></i>
                                                                                            <div class="d-grid" style="height:30px">
                                                                                                <h6 class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $ad->totalViews ?? 0 }}</h6>
                                                                                                <span class="mt-0 text-center ps-2" style="font-size:12px">Views</span>
                                                                                            </div>
                                                                                        </span>
                                                                                        <span class="d-flex text-center me-2">
                                                                                            <i class="fas fa-phone pt-2 ps-1 pe-1" style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;"></i>
                                                                                            <div class="d-grid" style="height:30px">
                                                                                                <p class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $ad->totalPhoneViews ?? 0 }}</p>
                                                                                                <span class="mt-0 text-center ps-2" style="font-size:12px">Phone</span>
                                                                                            </div>
                                                                                        </span>
                                                                                        <span class=" text-center d-flex">
                                                                                            <div class=" d-grid" style="height:30px">
                                                                                            <p class="posted-detail text-start ps-1 " style="font-size:14px"><i class="fa-solid fa-location-dot fs-6 p-2 pe-3 "style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;"></i> </p>
                                                                                            <span class="mt-0 text-center ps-2" style="font-size:12px">{{ $ad->location }}</span>
                                                                                            </div>
                                                                                        </span>
                                                                                    </div>
                                                                                
                                                                            </div>
                                                                            <div class="col-md-2 col-sm-12 text-center text-md-end">
                                                                                <br>
                                                                                <a href="{{ route('edit_post_attributes', ['id' => encrypt($ad->id)]) }}" class="view mx-auto rounded mt-0">
                                                                                    Edit
                                                                                </a>
                                                                                <a href="{{ route('product.detail', ['id' => encrypt($ad->id)]) }}" class=" view mx-auto rounded mt-2">
                                                                                    View Ad
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabcontent" id="tab-3">
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="card recent-sales overflow-auto">
                                                <div class="card-body">
                                                    <h5 class="card-title">Inactive Ads</h5>
                                                    <table class="table table-borderless datatable" id="adsTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Inactive Ads Details</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($ads->where('ad_status', 'inactive') as $ad)
                                                            <tr>
                                                                <td>
                                                                    <div class="card mb-3 pt-3 w-100 mx-auto  pb-2 px-2" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                                                        <div class="row g-0">
                                                                            <div class="col-md-2 col-sm-12 mx-auto" >
                                                                                @if ($ad->images && $ad->images->isNotEmpty())
                                                                                    <img src="{{ asset($ad->images->first()->image_path) }}" class="img-fluid lazyload" alt="Ad Image" style=" object-fit: cover;">
                                                                                @else
                                                                                    <img src="{{ asset('assets/images/empty-300x240.jpg') }}" class="img-fluid" alt="No Image Available" style="height: 100%; width: 100%; object-fit: cover;">
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8 col-sm-12 mx-auto ps-2">
                                                                                <h5 class="d-flex">
                                                                                    <span class="title-content fw-bold fs-6 text-truncate" title="{{ $ad->title }}">
                                                                                        {{ \Illuminate\Support\Str::limit($ad->title, 30, '...') }}
                                                                                    </span>
                                                                                    <span class="fs-6 text-secondary">-in {{ $ad->sub_category_name }}</span>
                                                                                </h5>
                                                                                <div class="float-start">
                                                                                    Rs {{ number_format($ad->price) }}
                                                                                    <span class="badge ms-4 rounded {{ $ad->ad_status == 'active' ? 'active-border' : 'inactive-border' }}">
                                                                                        {{ $ad->ad_status }}
                                                                                    </span>
                                                                                </div>
                                                                                <br>
                                                                                <div class="d-flex mt-3 mb-2">
                                                                                    <!-- Views stat -->
                                                                                    <span class="d-flex text-center me-2">
                                                                                        <i class="fas fa-eye p-2" style="background-color:#F2F4F5; color:#545f8b;"></i>
                                                                                        <div class="d-grid" style="height:30px">
                                                                                            <h6 class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $ad->totalViews ?? 0 }}</h6>
                                                                                            <span class="mt-0 text-center ps-2" style="font-size:12px">Views</span>
                                                                                        </div>
                                                                                    </span>
                                                                                    <span class="d-flex text-center me-2">
                                                                                        <i class="fas fa-phone pt-2 ps-1 pe-1" style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;"></i>
                                                                                        <div class="d-grid" style="height:30px">
                                                                                            <p class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $ad->totalPhoneViews ?? 0 }}</p>
                                                                                            <span class="mt-0 text-center ps-2" style="font-size:12px">Phone</span>
                                                                                        </div>
                                                                                    </span>
                                                                                    <span class=" text-center d-flex">
                                                                                        <div class=" d-grid" style="height:30px">
                                                                                            <p class="posted-detail text-start ps-1 " style="font-size:14px"><i class="fa-solid fa-location-dot fs-6 p-2 pe-3 "style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;"></i> </p>
                                                                                            <span class="mt-0 text-center ps-2" style="font-size:12px">{{ $ad->location }}</span>
                                                                                        </div>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 col-sm-12 text-center text-md-end">
                                                                                <br>
                                                                                <a href="{{ route('edit_post_attributes', ['id' => encrypt($ad->id)]) }}" class="view mx-auto rounded mt-0">
                                                                                    Edit
                                                                                </a>
                                                                                <a href="{{ route('product.detail', ['id' => encrypt($ad->id)]) }}" class=" view mx-auto rounded mt-2">
                                                                                    View Ad
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabcontent" id="tab-4">
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="card recent-sales overflow-auto">
                                                <div class="card-body">
                                                    <h5 class="card-title">Not Posted Ads</h5>
                                                    <table class="table table-borderless datatable" id="adsTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Not Posted Ads Details</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($ads->where('ad_status', 'Not_posted') as $ad)
                                                            <tr>
                                                                <td>
                                                                    <div class="card mb-3 pt-3 w-100 mx-auto ps-2 pb-2 pe-0" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                                                        <div class="row g-0">
                                                                            <div class="col-md-2" style="padding: 0;">
                                                                                @if ($ad->images && $ad->images->isNotEmpty())
                                                                                <img src="{{ asset($ad->images->first()->image_path) }}" class="img-fluid lazyload" alt="Ad Image" style="height: 150px !important; width: 150px !important; object-fit: cover;">
                                                                                @else
                                                                                <img src="{{ asset('assets/images/empty-300x240.jpg') }}" class="img-fluid" alt="No Image Available" style="height: 100%; width: 100%; object-fit: cover;">
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="card-body">
                                                                                    <h5 class="d-flex">
                                                                                        <span class="title-content fw-bold fs-6 text-truncate" title="{{ $ad->title }}">
                                                                                            {{ \Illuminate\Support\Str::limit($ad->title, 30, '...') }}
                                                                                        </span>
                                                                                        <span class="fs-6 text-secondary">-in {{ $ad->sub_category_name }}</span>
                                                                                    </h5>
                                                                                    <div class="float-start">
                                                                                        Rs {{ number_format($ad->price) }}
                                                                                        <span class="badge ms-4 rounded {{ $ad->ad_status == 'active' ? 'active-border' : 'inactive-border' }}">
                                                                                            {{ $ad->ad_status }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="d-flex mt-3">
                                                                                        <!-- Views stat -->
                                                                                        <span class="d-flex text-center me-2">
                                                                                            <i class="fas fa-eye p-2" style="background-color:#F2F4F5; color:#545f8b;"></i>
                                                                                            <div class="d-grid" style="height:30px">
                                                                                                <h6 class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $ad->totalViews ?? 0 }}</h6>
                                                                                                <span class="mt-0 text-center ps-2" style="font-size:12px">Views</span>
                                                                                            </div>
                                                                                        </span>
                                                                                        <span class="d-flex text-center me-2">
                                                                                            <i class="fas fa-phone pt-2 ps-1 pe-1" style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;"></i>
                                                                                            <div class="d-grid" style="height:30px">
                                                                                                <p class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $ad->totalPhoneViews ?? 0 }}</p>
                                                                                                <span class="mt-0 text-center ps-2" style="font-size:12px">Phone</span>
                                                                                            </div>
                                                                                        </span>
                                                                                        <span class=" text-center d-flex">
                                                                                            <div class=" d-grid" style="height:30px">
                                                                                                <p class="posted-detail text-start ps-1 " style="font-size:14px"><i class="fa-solid fa-location-dot fs-6 p-2 pe-3 "style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;"></i> {{ $ad->location }}</p>
                                                                                            </div>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <div class="dropdown text-dark float-end me-2 mt-0">
                                                                                    <i class="fa-solid fa-ellipsis fs-5 text-secondary  mt-0 pt-0 " id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;"></i>
                                                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                                                                                        <li><a class="dropdown-item" style="box-shadow:none !important;" href="#">Remove Ad</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                                <br>
                                                                                <div class="mt-100"></div>
                                                                                <a href="{{ route('edit_post_attributes', ['id' => encrypt($ad->id)]) }}" class="float-end view me-3 my-auto rounded mt-0">
                                                                                    Edit
                                                                                </a>
                                                                                <a href="{{ route('product.detail', ['id' => encrypt($ad->id)]) }}" class="float-end view me-3 my-auto rounded mt-2">
                                                                                    View Ad
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>

        </main>
    </form>
    <footer id="footer" class="footer pb-0 mt-4 ">
        <div class="container-fluid copyright text-center  pt-2 mb-0 pb-2 ">
            <p class="pb-0 mb-0 me-5">© 2024<span> Copyright</span> <a href="{{ url('/') }}" class="link"> <strong
                        class="px-1 sitename">Ads Market</strong></a><span>All
                    Rights Reserved</span></p>
        </div>

    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


</x-app-user-layout>