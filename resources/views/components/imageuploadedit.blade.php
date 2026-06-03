@props(['adImages' => []])

<div class="row">
    <h4 class="mt-2 custom-choose-title mb-3">UPLOAD UP TO 20 PHOTOS</h4>
    <div class="custom-photo-container" id="customImageContainer">
        <div class="custom-add-photo" id="customAddPhotoIcon">
            <img src="{{ asset('assets/images/iconAddPhoto_noinline.8924e2486f689a28af51da37a7bda6ec.svg') }}" alt="Add Photo">
        </div>
        <input type="file" name="image_path[]" class="custom-file-input d-none" id="customFileInput" accept="image/jpeg, image/png, image/gif, image/svg+xml" multiple>
        <input type="hidden" name="hidden_images" class="custom-hidden-input">

        {{-- Display existing images --}}
        @foreach($adImages as $image)
            <div class="custom-image-wrapper" style="position: relative;">
                <img src="{{ asset($image->image_path) }}" alt="Ad Image" class="custom-ad-image" width="100" height="100">
                
                <!-- Trash icon at the top-right corner -->
                <span class="custom-delete-icon" data-id="{{ $image->id }}">
                    <i class="fas fa-trash"></i>
                </span>

                @if ($loop->first)
                    <div class="custom-cover-banner">Cover Image</div>
                @endif
            </div>
        @endforeach
    </div>
</div>

<style>
    .custom-image-wrapper {
        display: inline-block;
        position: relative;
        margin: 10px;
    }
    .custom-ad-image {
        border: 2px solid #ddd;
        border-radius: 4px;
    }
    .custom-add-photo {
        width: 100px;
        height: 100px;
        border: 1px solid #ccc;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .custom-cover-banner {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(66, 63, 55, 0.86);
        color: white;
        text-align: center;
        padding: 0px;
    }
  
    .custom-delete-icon {
        position: absolute;
        top: 2px;
        right: 3px;
        background-color: #545f8b;
        color: white;
        padding: 4px;
        border-radius: 100%;
        cursor: pointer;
        font-size: 12px;
        border: 1px solid white;
}
    
</style>
