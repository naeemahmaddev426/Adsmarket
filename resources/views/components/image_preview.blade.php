@props([
    'title' => 'UPLOAD UP TO 20 PHOTOS',
    'iconSrc' => 'assets/images/iconAddPhoto_noinline.8924e2486f689a28af51da37a7bda6ec.svg',
    'accept' => 'image/*',
    'multiple' => true,
    'name' => 'image_path[]',
])

<div {{ $attributes->merge(['class' => 'row']) }}>
    <h4 class="mt-2 choose mb-3">{{ $title }}</h4>
    <div class="image-container" id="imageContainer">
        <div class="add-photo-icon" id="addPhotoIcon">
            <img src="{{ asset($iconSrc) }}" alt="Add Photo">
        </div>
        <input type="file" id="fileInput" name="{{ $name }}" accept="{{ $accept }}" {{ $multiple ? 'multiple' : '' }} class="file-input">
    </div>

    <span class="message-text">
        <span class="input-message">For the cover picture we recommend using the landscape mode</span>
    </span>
</div>
