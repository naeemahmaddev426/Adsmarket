<x-app-admin-layout>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
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