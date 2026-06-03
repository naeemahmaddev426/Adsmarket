<!-- resources/views/components/lazy-image.blade.php -->

<div class="image-wrapper" style="position: relative;">
    <!-- Loader Spinner -->
    <div class="loader" style="
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%);
        border: 4px solid #f3f3f3; 
        border-top: 4px solid #3498db; 
        border-radius: 50%; 
        width: 40px; 
        height: 40px; 
        animation: spin 2s linear infinite;">
    </div>

    <!-- Lazy Loaded Image -->
    <img 
        data-src="{{ $src }}" 
        class="lazyload {{ $class }}" 
        alt="{{ $alt ?? 'Image' }}" 
        style="opacity: 0; {{ $style }}" 
        onload="this.style.opacity=1; this.previousElementSibling.style.display = 'none';"
    >
</div>

