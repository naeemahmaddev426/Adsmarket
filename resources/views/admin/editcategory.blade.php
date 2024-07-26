<x-app-admin-layout>
  <style>
    .form-control:focus {
      border-color: #FFF !important;
      outline: 0 !important;
      box-shadow: 0 0 20px 0 rgba(255, 255, 255, 0.1) !important;
    }
    .fade-out {
        opacity: 0;
        transition: opacity 0.5s;
    }
  </style>
  <main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active"><a href="admin.adscategory">Ad Category</a></li>
        </ol>
      </nav>
    </div>
    <div class="container">
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
              <form action="{{ route('admin.adscategory.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $category->category_name }}">
            </div>
            <div class="form-group">
            <div class="image-container mt-2" style="height: auto;">
          <div class="image-box" style="width:100px;">
            <!-- Image preview will be displayed here -->
          </div>
            <label id="upload-button" class="upload-button mt-1 " style="cursor: pointer; border: 1px solid black; padding: 4px; border-radius: 4px;"> Click Upload Image </label>
            <input type="file" name="category_image" id="image-upload" accept="image/*" style="display: none;">
        </div>
                <img src="{{ asset($category->category_image) }}" alt="{{ $category->category_name }}" style="max-width: 100px;" class="mt-2">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            </div>
          </div>
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
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      
    </div>
  </main>
  <footer id="footer" class="footer pb-0 mt-4 fixed-bottom" style="background-color:#fdfcfc !important;">
    <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="/" class="link"> <strong class="px-1 sitename">Ads Market</strong></a><span>All Rights Reserved</span></p>
    </div>
  </footer>
</x-app-admin-layout>