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
      width: 17%;
      margin-left: 10px;
      list-style: none;
      border: 1px solid #d8dfe0;
      border-radius: 16px;
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
      color: #545F8B;
      cursor: default;
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
  </style>
  <!-- ======= Header ======= -->


  <form action="{{ route('register') }}" method="post">
    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" /user/index">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="nav-item  float-end ms-auto mt-0">
              <a href="{{ route('post_ad') }}" class="post" id="postAdLink"><i
                  class="fa-solid fa-circle-plus me-2"></i>Post Ad</a>
            </li>
          </ol>
        </nav>
      </div>
      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">
            <div class="tabs">
                <ul class="tabs-nav">
                  <li><a href="#tab-1">View all ({{ $viewAdsCount }})</a></li>
                  <li><a href="#tab-2">View Active Ads ({{ $activeAdsCount }})</a></li>
                  <li><a href="#tab-3">View Inactive Ads ({{ $inactiveAdsCount }})</a></li>
                </ul>

                <div class="tabs-stage">
                    <div class="tabcontent" id="tab-1">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="card recent-sales overflow-auto">
                                    <div class="card-body">
                                        <h5 class="card-title">All Ads</h5>
                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Images</th>
                                                    <th scope="col">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ads as $ad)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $ad->title }}</td>
                                                    <td>{!! nl2br(e($ad->description)) !!}</td>
                                                    <td>
                                                        @foreach ($ad->images as $image)
                                                        <img src="{{ asset($image->image_path) }}" height="60px" width="60px" alt="Ad Image">
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $ad->price }}</td>
                                                </tr>
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
                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Images</th>
                                                    <th scope="col">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ads->where('ad_status', 'active') as $ad)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $ad->title }}</td>
                                                    <td>{!! nl2br(e($ad->description)) !!}</td>
                                                    <td>
                                                        @foreach ($ad->images as $image)
                                                        <img src="{{ asset($image->image_path) }}" height="60px" width="60px" alt="Ad Image">
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $ad->price }}</td>
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
                                        <table class="table table-borderless datatable">
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Title</th>
                                              <th scope="col">Description</th>
                                              <th scope="col">Images</th>
                                              <th scope="col">Price</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($ads->where('ad_status', 'Inactive') as $ad)
                                            <tr>
                                              <th scope="row">{{ $loop->iteration }}</th>
                                              <td>{{ $ad->title }}</td>
                                              <td>{!! nl2br(e($ad->description)) !!}</td>
                                              <td>
                                                @foreach ($ad->images as $image)
                                                <img src="{{ asset($image->image_path) }}" height="60px" width="60px" alt="Ad Image">
                                                @endforeach
                                              </td>
                                              <td>{{ $ad->price }}</td>
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
  <footer id="footer" class="footer pb-0 mt-4 fixed-bottom">
    <div class="container-fluid copyright text-center  pt-2 mb-0 pb-2 ">
      <p class="pb-0 mb-0 me-5">© 2024<span> Copyright</span> <a href="/" class="link"> <strong
            class="px-1 sitename">Ads Market</strong></a><span>All
          Rights Reserved</span></p>
    </div>

  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>


</x-app-user-layout>