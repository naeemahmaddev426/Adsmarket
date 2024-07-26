<x-app-admin-layout>
  <style>
    .form-select{
      width: fit-content !important;
    }
  </style>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active"><a href="admin/index">Dashboard</a></li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="row">
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
              <form method="POST" action="{{ route('admin.updateAdStatus') }}">
                  @csrf
                  <input type="hidden" name="userId" value="{{ $user->id }}">
                  <button type="submit" class="float-end m-2 px-3 py-2" style="background-color:#545F8B !important;border:none !important;color:white;border-radius:4px;">Save Status</button>
                  <table class="table table-borderless datatable">
                      <thead>
                          <tr>
                              <th scope="col">Id</th>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                              <th scope="col">Price</th>
                              <th scope="col">Status</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach ($ads as $ad)
                          <tr>
                              <td>{{ $ad->id }}</td>
                              <td>{{ $ad->title }}</td>
                              <td>{!! nl2br(e($ad->description)) !!}</td>
                              <td>{{ $ad->price }}</td>
                              <td>
                                  <select name="ads[{{ $ad->id }}][status]" class="form-select">
                                      <option value="Active" {{ $ad->ad_status === 'Active' ? 'selected' : '' }}>Active</option>
                                      <option value="Inactive" {{ $ad->ad_status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                  </select>
                                  <input type="hidden" name="ads[{{ $ad->id }}][id]" value="{{ $ad->id }}">
                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer" class="footer pb-0 mt-4 fixed-bottom" style="background-color:#fdfcfc !important;">
    <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="/" class="link"> 
        <strong class="px-1 sitename">Ads Market</strong></a><span>All Rights Reserved</span></p>
    </div>
  </footer>
</x-app-admin-layout>