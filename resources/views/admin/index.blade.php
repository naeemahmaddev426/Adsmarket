<x-app-admin-layout>
  <style>
    .form-control:focus {
      border-color: dark !important;
      box-shadow: none !important;
    }
  </style>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('admin.index')}}">Dashboard</a></li>
          <!-- <li class="float-end ms-auto">
            <div class="w-100" id="input_full">
              <input id="search" type="text" class="form-control" placeholder=" Search User">
            </div>
          </li> -->
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"></a>
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
                  <h5 class="card-title">Total Active <span>| Ads</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $totalActiveAds }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card revenue-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"></a>
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
                  <h5 class="card-title">Total Inactive <span>| Ads</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                   <i class="bi bi-x-circle"></i>
                    </div>
                    <div class="ps-3">
                    <h6>{{ $totalInactiveAds }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"></a>
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
                  <h5 class="card-title"> Not Posted <span>| Ads</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bx-repost' ></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $totalnonepostedAds }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card revenue-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"></a>
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
                  <h5 class="card-title">Total Disable <span>| Ads</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bx-block' style="color:#545fb8 !important"></i>
                    </div>
                    <div class="ps-3">
                    <h6>{{ $totaldisableAds }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-12">
          <div class="card recent-sales overflow-auto">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"></a>
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
              <h5 class="card-title">Recent User Detail <span> | Today</span></h5>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Active Ad</th>
                    <th scope="col">Inactive Ad</th>
                    <th scope="col">Not Posted Ad</th>
                    <th scope="col">Disable Ad</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($users as $index => $user)
                    @if (!(Auth::user()->role === 'admin' && $user->id === Auth::user()->id))
                        <tr>
                            <th scope="row" class="ps-3"><a href="" class="id-link">{{ $index + 1 }}</a></th>
                            <td><a href="{{ route('admin.user_ads', ['userId' => $user->id]) }}">{{ $user->name }}</a></td>
                            <td class="ps-4">{{ $user->activeAdsCount }}</td>
                            <td class="ps-5">{{ $user->inactiveAdsCount }}</td>
                            <td class="ps-5">{{ $user->not_postedAdsCount }}</td>
                            <td class="ps-5">{{ $user->disableAdsCount }}</td>
                        </tr>
                    @endif
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
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="{{ url('/') }}" class="link"> <strong class="px-1 sitename">Ads Market</strong></a><span> All Rights Reserved</span></p>
    </div>
  </footer>
</x-app-admin-layout>