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
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.adsubscategorytype') }}">Ad Sub Category name type</a></li>
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
            <form class="mb-5 ms-4 mt-4" action="{{ route('admin.adsubscategorytype.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category_id">Category Name</label>
                    <select name="category_id" id="category_id" class="form-control w-25 mt-3">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_category_id">Sub Category Name</label>
                    <select name="sub_category_id" id="sub_category_id" class="form-control w-25 mt-3">
                        @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" data-category-id="{{ $subcategory->category_id }}">{{ $subcategory->sub_category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="sub_category_name_type">Sub Category Name Type</label>
                    <input type="text" name="sub_category_name_type" id="sub_category_name_type" class="form-control w-25 mt-3 p-2" placeholder="Sub-Category-name-type">
                </div>
                <button type="submit" class="mt-3 px-3 py-1" style="background-color:#545F8B !important;border:none !important;color:white;border-radius:4px;">Save</button>
            </form>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recent Sub Categories <span> | Today</span></h5>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sub Category Name</th>
                                    <th>Subcategory Name Type</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategoryTypes as $subCategoryType)
                                <tr>
                                    <td>{{ $subCategoryType->id }}</td>
                                    <td>{{ optional($subCategoryType->subCategory)->sub_category_name }}</td>
                                    <td>{{ $subCategoryType->sub_category_name_type }}</td>
                                    <td>
                                        <form action="{{ route('admin.adsubscategorytype.delete', $subCategoryType->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-category px-3 py-1" style="background-color:#545F8B !important;border:none !important;color:white;border-radius:4px;">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.editadsubscategorytype', $subCategoryType->id) }}" class="update-category px-3 py-1" style="background-color:#545F8B !important;border:none !important;color:white;border-radius:4px;">Update</a>
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
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="{{ url('/') }}" class="link"> <strong class="px-1 sitename">Ads Market</strong></a><span>All Rights Reserved</span></p>
    </div>
  </footer>
 
</x-app-admin-layout>