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
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.adssubcategory') }}">Ad Sub Category</a></li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="card">
            <form class="mb-5 ms-4 mt-4" action="{{ route('admin.adsubscategorytype.update', $subCategoryType->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_id">Category Name</label>
                    <select name="category_id" id="category_id" class="form-control w-25 mt-3">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $subCategoryType->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_category_id">Sub Category Name</label>
                    <select name="sub_category_id" id="sub_category_id" class="form-control w-25 mt-3">
                        @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" {{ $subCategory->id == $subCategoryType->sub_category_id ? 'selected' : '' }}>{{ $subCategory->sub_category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="sub_category_name_type">Sub Category Name Type</label>
                    <input type="text" name="sub_category_name_type" id="sub_category_name_type" class="form-control w-25 mt-3" value="{{ $subCategoryType->sub_category_name_type }}">
                </div>
                <button type="submit" class="mt-3 px-3 py-1" style="background-color:#545F8B !important;border:none !important;color:white;border-radius:4px;">Update</button>
            </form>

        </div>
    </div>
</main>
  <footer id="footer" class="footer pb-0 mt-4 fixed-bottom" style="background-color:#fdfcfc !important;">
    <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="{{ url('/') }}" class="link"> <strong class="px-1 sitename">Ads Market</strong></a><span>All Rights Reserved</span></p>
    </div>
  </footer>
</x-app-admin-layout>