<x-app-layout>
  <style>
    #main-nav {
      display: none;
    }
    .main-nav {
			display: none;
		}
    .component {
      display: none;
    }

    .active {
      display: block;
    }
  </style>
  <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top" style="display: none;"><i class="fas fa-arrow-up"></i></button>
  <div class="container-fluid" id="main-container">
    <div class="row">
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="col-lg-12 col-12 col-md-12 mx-auto mb-5">
        <div class="top-bar bg-light p-2">
          <div class="logo">
            <a href="{{ url('/') }}" class="home-link me-4 text-decoration-none text-dark">
              <i class="fas fa-arrow-left fa-lg pt-4"></i>
            </a>
            <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{asset('assets/images/logo.svg')}}" class="lazyload" width="200px" height="60px">
            </a>
            @auth
            <button class="border-0 bg-transparent float-end mt-3">
              <span>{{ Auth::user()->name }}</span>
            </button>
            @endauth
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 mx-auto">
            <h4 class="text-center heading-post text-uppercase">POST YOUR AD</h4>
          </div>
          <div class="row">
			  
            <input type="hidden" id="category_name" name="category_name" value="{{ session('category_name', old('category_name')) }}">
            <input type="hidden" id="sub_category_name" name="sub_category_name" value="{{ session('sub_category_name', old('sub_category_name')) }}">
				 
            <div class="col-md-10 col-12 mx-auto">
              <div class="row border border-1">
                <div class="col-md-12 col-12  mx-auto">
                  <h4 class="text-left choose text-uppercase py-2 ps-2">CHOOSE A CATEGORY</h4>
                </div>
              </div>
                <div class="row border border-1 mb-3">
                  <div class="col-md-4 col-12 border border-1 m-0 p-0">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          @foreach ($categories as $category)
                          <button class="border text-start btn2" id="{{ $category->category_name }}-tab" data-bs-toggle="pill" data-bs-target="#{{ $category->category_name }}" role="tab" aria-controls="{{ $category->category_name }}" aria-selected="true">
                              <img src="{{ asset('/' . $category->category_image) }}" height="25px" width="25px" alt="" class="me-2 lazyload">
                              {{ $category->category_name }} <i class="fa-solid fa-chevron-right float-end me-2"></i>
                          </button>
                          @endforeach
                      </div>
                  </div>
                  <div class="col-md-4 col-12 border border-1 m-0 p-0">
                      <div class="tab-content" id="v-pills-tabContent">
                          @foreach ($categories as $category)
                          <div class="tab-pane fade" id="{{ $category->category_name }}" role="tabpanel" aria-labelledby="{{ $category->category_name }}-tab">
                              <div class="nav flex-column nav-pills" id="v-pills-tab2" role="tablist" aria-orientation="vertical">
                                  @foreach ($category->subcategories as $subcategory)
                                  @if (count($subcategory->subCategoryNameTypes) > 0)
                                  <button class="border text-start btn2" id="{{ $subcategory->sub_category_name }}-tab" data-bs-toggle="pill" data-bs-target="#{{ $subcategory->sub_category_name }}" role="tab" aria-controls="{{ $subcategory->sub_category_name }}" aria-selected="false">
                                      {{ $subcategory->sub_category_name }} <i class="fa-solid fa-chevron-right float-end me-2"></i>
                                  </button>
                                  @else
                                  <a href="{{ route('post_ad_attributes', ['cat' => $category->category_name, 'sub_cat' => $subcategory->sub_category_name]) }}" class="text-decoration-none text-dark">
                                      <button class="border text-start btn2">
                                          {{ $subcategory->sub_category_name }}
                                      </button>
                                  </a>
                                  @endif
                                  @endforeach
                              </div>
                          </div>
                          @endforeach
                      </div>
                  </div>
                  <div class="col-md-4 col-12 border border-1 p-0 m-0">
                      <div class="tab-content" id="v-pills-tabContent3">
                          @foreach ($categories as $category)
                            @foreach ($category->subcategories as $subcategory)
                              <div class="tab-pane fade" id="{{ $subcategory->sub_category_name }}" role="tabpanel" aria-labelledby="{{ $subcategory->sub_category_name }}-tab">
                                  <div class="nav flex-column nav-pills" id="v-pills-tab3" role="tablist" aria-orientation="vertical">
                                      @foreach ($subcategory->subCategoryNameTypes as $subCategoryType)
                                      <a href="{{ route('post_ad_attributes', ['cat' => $category->category_name, 'sub_cat' => $subcategory->sub_category_name, 'sub_cat_type' => $subCategoryType->sub_category_name_type]) }}" class="text-decoration-none text-dark">
                                          <div class="border text-start btn2" id="{{ $subCategoryType->sub_category_name_type }}-tab" role="tab" aria-controls="{{ $subCategoryType->sub_category_name_type }}" aria-selected="false">
                                              {{ $subCategoryType->sub_category_name_type }}
                                          </div>
                                      </a>
                                      @endforeach
                                  </div>
                              </div>
                            @endforeach
                          @endforeach
                      </div>
                  </div>
              </div>
            </div>
        </div>
      </div>
      <footer id="footer" class="footer mt-5" style=" position: fixed;bottom: 0;width: 100%;background-color: #fff;z-index: 999;">
        <div class="container copyright text-center border-top pt-2 pb-2">
          <p class="mb-0">© 2024 <span>Copyright</span> <a href="{{ url('/') }}" class="link"><strong class="px-1 sitename">Ads Market</strong></a><span>All Rights Reserved</span></p>
        </div>
      </footer>
		</div>
	  </div>
   </div>
</x-app-layout>