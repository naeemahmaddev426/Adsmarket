<x-app-layout>
    <style>
        #main-nav {
          display: none;
        }
        .main-nav {
            display: none;
        }
        /* .select {
            position:relative;
            font:normal 11px/22px Arial, Sans-Serif;
            color:black;
            border:1px solid #ccc;
            width:75%;
        }
        .styledSelect {
            position:absolute;
            top:3px;
            right:0;
            bottom:0;
            left:0;
            font-size:13px;
            background-color:white;
            padding:0 10px;
            
        }
        .styledSelect:after {
            content:"";
            width:0;
            height:0;
            border:5px solid transparent;
            border-color:black transparent transparent transparent;
            position:absolute;
            top:9px;
            right:6px;
        }
        .styledSelect:active, .styledSelect.active {
            background-color:#eee;
        }
        .options {
            display:none;
            position:absolute;
            top:100%;
            right:0;
            left:0;
            z-index:999;
            margin:0 0;
            padding:0 0;
            list-style:none;
            border:1px solid #ccc;
            background-color:white;
            -webkit-box-shadow:0 1px 2px rgba(0, 0, 0, 0.2);
            -moz-box-shadow:0 1px 2px rgba(0, 0, 0, 0.2);
            box-shadow:0 1px 2px rgba(0, 0, 0, 0.2);
        }
        .options li {
            font-size:13px;
            margin:0 0;
            padding:4px 10px;
        }
        .options li:hover {
            background-color:#545f8b;
            color:white;
        } */
        .custom-hidden {
      display: none;
    }

    /* Wrapper for custom select styling */
    .custom-select {
      position: relative;
      width: 75%;
      font-family: Arial, sans-serif;
    }

    /* Styled dropdown box */
    .custom-styled {
      background: #fff;
      color: #000;
      border:1px solid #ddd;
      padding: 10px;
      border-radius:4px;
      cursor: pointer;
    }

    .custom-styled.active {
      background: #fff;
      color:#000;
    }

    /* Styled options list */
    .custom-options {
      list-style: none;
      margin: 0;
      padding: 0;
      background: #fff;
      border: 1px solid #ccc;
      display: none;
      position: absolute;
      z-index: 99;
      width: 100%;
    }
    .custom-styled::after {
    content: "▼"; /* Unicode for the chevron-down symbol */
    font-size: 12px;
    color: #000;
    position: absolute;
    right: 10px; /* Distance from the right edge */
    top: 50%;
    transform: translateY(-50%); /* Vertically center the icon */
    pointer-events: none; /* Prevent clicks on the icon */
    }

    .custom-styled.active::after {
    content: "▲"; /* Unicode for the chevron-up symbol when active */
    }
    .custom-options li {
      padding: 10px;
      cursor: pointer;
      color: #333;
    }

    .custom-options li:hover {
      background: #545f8b;
      color: #fff;
    }
        .form-group {
        display: block;
        margin-bottom: 15px;
        }

        .form-group input {
        padding: 0;
        height: initial;
        width: initial;
        margin-bottom: 0;
        display: none;
        cursor: pointer;
        }

        .form-group label {
        position: relative;
        cursor: pointer;
        }

        .form-group label:before {
        content:'';
        -webkit-appearance: none;
        background-color: transparent;
        border: 1px solid #545f8b;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
        padding: 10px;
        display: inline-block;
        position: relative;
        vertical-align: middle;
        cursor: pointer;
        margin-right: 10px;
        }

        .form-group input:checked + label:after {
        content: '';
        display: block;
        position: absolute;
        top: 3px;
        left: 9px;
        width: 6px;
        height: 14px;
        border: solid #545f8b;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
        }
    </style>
    <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top"
    style="display: none;"><i class="fas fa-arrow-up"></i></button>
    <div class="row">
        <div class="col-md-6 card pb-4 mb-5 p-0 " id="main-card-post">
            <div class="header-top w-100 " style="height:60px !important">
                <div class="text-center" style="padding-top:10px;">
                   <h2 class="text-light">Adsmarket For Business</h2>
                </div>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="px-4">
                <div class="position-relative">
                    <!-- Text with AOS animation -->
                    <div class="position-absolute mt-2 ms-3 h-100 d-flex justify-content-end align-items-center pe-3">
                        <h1 data-aos="fade-right" data-aos-duration="1000" class="text-uppercase text-white fw-bold text-end" 
                            style="z-index: 2; font-size: 1.8rem; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);">
                            THE RIGHT PARTNER<br>FOR YOUR BUSINESS
                        </h1>
                    </div>
                    <!-- Background Image with AOS animation -->
                    <img src="{{ asset('assets/images/ads_for_business.jpg') }}" data-aos="fade-left" data-aos-duration="1000"  class="w-100 mt-3" alt="Ads for Business">
                </div>
                <div class="text-start mt-2 mb-4">
                    <h3>Grow Your Business with Adsmarket!</h3>
                    <p class="lh-base">Help your business reach its maximum potential by partnering with Adsmarket. Promote your products & services to thousands of buyers across the region.<br> Please fill out the details below:</p>
                </div>
                <form method="POST" action="{{ route('ads-business') }}" enctype="multipart/form-data" id="imageForm">
                    @csrf
                    @auth
                    <input type="hidden" name="users_id" value="{{ Auth::id() }}">
                    @endauth
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control w-75" id="name" placeholder="Enter Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_no" class="form-label fw-bold">Mobile Number</label>
                        <input type="text" name="phone_no" class="form-control w-75" id="mobile_number" placeholder="03XXXXXXXXX" maxlength="11" required>
                    </div>
                    <div class="mb-3 d-grid">
                        <label for="category" class="form-label fw-bold">Category</label>
                        <select class="custom-select-element w-75" name="category_name">
                            <option value="">Select an option&hellip;</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="interests" class="form-label fw-bolder">Interested in</label>
                        <div class="form-group">
                            <input type="checkbox" name="interests[]" value="more_ads" id="more_ads">
                            <label for="more_ads">More Ads</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="interests[]" value="other_upgrades" id="other_upgrades">
                            <label for="other_upgrades">Other Business Upgrades</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="interests[]" value="display_banners" id="display_banners">
                            <label for="display_banners">Advertising (Display Banners)</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="post">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>