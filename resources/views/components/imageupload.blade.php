@props(['adImages' => []]) 

<div class="row">
    <h4 class="mt-2 choose mb-3">UPLOAD UP TO 20 PHOTOS</h4>
    <div class="image-container">
        <!-- Existing images from the database -->
        @foreach($adImages as $adImage)
            <div class="image-wrapper" data-index="{{ $loop->index + 1 }}">
                <img src="{{ Storage::url($adImage->image_path) }}" 
                     alt="{{ $adImage->original_name }}" 
                     style="width: 100px; height: 100px; object-fit: cover;">
                <span class="delete-icon" data-id="{{ $adImage->id }}">&times;</span>

                @if($loop->first)
                    <div class="cover-banner">Cover Image</div>
                @endif
            </div>
        @endforeach

        <div class="add-photo-icon">
            <img src="{{ asset('assets/images/iconAddPhoto_noinline.8924e2486f689a28af51da37a7bda6ec.svg') }}" alt="Add Photo">
        </div>

        <input type="file" name="image_path[]" multiple class="file-input" accept="image/*">
        <input type="file" name="image_path[]" multiple class="hiddenInput" style="display: none;">
        <span class="message-text">
            <span class="input-message">Maximum 20 images. Rearrange or delete as necessary:</span>
        </span>
    </div>
</div>


<style>
.image-wrapper {
    display: inline-block;
    position: relative;
    margin: 10px;
}

.image-wrapper img {
    border: 2px solid #ddd;
    border-radius: 4px;
}

.cover-banner {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: rgba(66, 63, 55, 0.86);
    color: white;
    text-align: center;
    padding: 0px;
}

.delete-icon {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 3px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 14px;
}

</style>

