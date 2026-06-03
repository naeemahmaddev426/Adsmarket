<x-app-admin-layout>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item ">Select Category</li>
          <li class="breadcrumb-item active"><a href="admin/mobile">{{$category}}</a></li>
          <!-- <li class="float-end ms-auto">
            <div class="  w-100" id="input_full">
              <input id="search" type="text" class="form-control" placeholder=" Search category">
            </div>
          </li> -->
        </ol>

      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12 col-12">
          <div class="card recent-sales overflow-auto">
            <div class="filter">
              <a class="icon" href="" data-bs-toggle="dropdown"></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ ucfirst($category) }} Detail <span> | Today</span></h5>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                     <th>Bikes Category Details</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ads as $ad)
                  <tr>
                      <td>
                          <div class="card mb-3 pt-3 w-100 mx-auto ps-2 pb-2 pe-0" style="border:1px solid #D8DFE0; box-shadow:none !important;">
                              <div class="row g-0">
                                  <div class="col-md-2" style="padding: 0;">
                                      @if ($ad->images && $ad->images->isNotEmpty())
                                      <img src="{{ asset($ad->images->first()->image_path) }}" class="img-fluid lazyload" alt="Ad Image" style="height: 100px !important; width: 100px !important; object-fit: cover;">
                                      @else
                                      <img src="{{ asset('assets/images/empty-300x240.jpg') }}" class="img-fluid" alt="No Image Available" style="height: 100%; width: 100%; object-fit: cover;">
                                      @endif
                                  </div>
                                  <div class="col-md-10">
                                      <div class="card-body">
                                          <h5 class="d-flex">
                                              <span class="title-content fw-bold fs-6 text-truncate" title="{{ $ad->title }}">
                                                  {{ \Illuminate\Support\Str::limit($ad->title, 50, '...') }}
                                              </span>
                                              <span class="fs-6 text-secondary">-in {{ $ad->sub_category_name }}</span>
                                          </h5>
                                              <span class="title-content text-truncate" title="{{ $ad->description }}" style="font-size:14px">
                                                  {{ \Illuminate\Support\Str::limit($ad->description, 70, '...') }}
                                              </span>
                                              <br>
                                          <div class="float-start fw-bold mt-1">
                                              Rs {{ number_format($ad->price) }}
                                              <span class="badge ms-4 rounded {{ $ad->ad_status == 'active' ? 'active-border' : 'inactive-border' }}">
                                                  {{ $ad->ad_status }}
                                              </span>
                                          </div>
                                          <br>
                                          <div class="d-flex mt-3">
                                              <!-- Views stat -->
                                              <span class="d-flex text-center me-2">
                                                  <i class='bx bx-show-alt' style="background-color:#F2F4F5; color:#545f8b; font-size:28px; padding:2px"></i>
                                                  <div class="d-grid" style="height:30px">
                                                      <h6 class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $ad->totalViews ?? 0 }}</h6>
                                                      <span class="mt-0 text-center ps-2" style="font-size:12px">Views</span>
                                                  </div>
                                              </span>
                                              <span class="d-flex text-center me-2">
                                                  <i class='bx bxs-phone ' style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b; font-size:28px"></i>
                                                  <div class="d-grid" style="height:30px">
                                                      <p class="fw-bold mb-0 pb-0 m-0" style="font-size:12px">{{ $ad->totalPhoneViews ?? 0 }}</p>
                                                      <span class="mt-0 text-center ps-2" style="font-size:12px">Phone</span>
                                                  </div>
                                              </span>
                                              <span class=" text-center d-flex">
                                                  <div class=" d-grid" style="height:30px">
                                                      <p class="posted-detail text-start ps-1 " style="font-size:14px"><i class='bx bx-map' style="background-color:#F2F4F5; height:30px; width:30px;color:#545f8b;font-size:28px; padding:2px"></i> {{ $ad->location }}</p>
                                                  </div>
                                              </span>
                                          </div>
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
    </section>
  </main>
  <footer id="footer" class="footer pb-0 mt-4 fixed-bottom" style="background-color:#fdfcfc !important;">
    <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="index.html" class="link"> <strong
            class="px-1 sitename">Ads Market</strong></a><span>
          All Rights Reserved</span></p>
    </div>
  </footer>
</x-app-admin-layout>