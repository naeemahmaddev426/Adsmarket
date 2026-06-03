<x-app-user-layout>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">My Ads</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
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
    </section>

  </main>

  <!-- ======= Footer ======= -->

  <footer id="footer" class="footer pb-0 mt-4 fixed-bottom" style="background-color:#fdfcfc !important;">
    <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="{{ url('/') }}" class="link"> <strong
            class="px-1 sitename">Ads Market</strong></a><span>All
          Rights Reserved</span></p>

    </div>

  </footer>

</x-app-user-layout>