<x-app-admin-layout>
  <style>
    .form-control:focus {
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
      <div class="card">
     <form class="mb-5 ms-4 mt-4" action="{{ route('admin.adscategory.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="category_name">Category Name</label>
        <input type="text" name="category_name" id="category_name" class="form-control w-25 mt-3" placeholder="Enter Category Name">
    </div>
    <div class="image-container mt-2" style="height: auto;">
        <div class="image-box" style="width:100px;">
            <!-- Image preview will be displayed here -->
        </div>
        <label id="upload-button" class="upload-button mt-1 " style="cursor: pointer; border: 1px solid black; padding: 4px; border-radius: 6px;"> Click Category Upload Image </label>
        <input type="file" name="category_image" id="image-upload" accept="image/*" style="display: none;">
    </div>
    <button type="submit" class=" mt-3 px-3 py-1" style="background-color:#545F8B !important;border:none !important;color:white;border-radius:4px;">Save</button>
</form>
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
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Image</th>
                    <th scope="col">Delete Category</th>
                    <th scope="col">Update Category</th>
                </tr>
            </thead>
            <tbody id="category-table-body">
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        <img src="{{ asset($category->category_image) }}" alt="{{ $category->category_name }}" style="max-width: 80px;text-align:center; justify-content:center; margin-left:auto;margin-right:auto; align-item:center; display: block;">
                    </td>
                    <td>
                    <button class="delete-category px-3 py-1" style="background-color:#545F8B !important;border:none !important;color:white;border-radius:4px; text-align:center; justify-content:center; margin-left:auto;margin-right:auto; align-item:center; display: block;" data-id="{{ $category->id }}">Delete</button>
                    </td>
                    <td>
                        <button class=" update-category px-3 py-1" style="background-color:#545F8B !important;border:none !important;color:white;border-radius:4px; text-align:center; justify-content:center; margin-left:auto;margin-right:auto; align-item:center; display: block;" data-id="{{ $category->id }}">Update</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            </div>
          </div>
        </div>
      </div>
     
  </main>
  <footer id="footer" class="footer pb-0 mt-4 fixed-bottom" style="background-color:#fdfcfc !important;">
    <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="/" class="link"> <strong class="px-1 sitename">Ads Market</strong></a><span>All Rights Reserved</span></p>
    </div>
  </footer>
</x-app-admin-layout>