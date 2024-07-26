<!-- resources/views/components/button.blade.php -->

@props([
    'type' => 'button',
    'class' => 'post-ad-btn',
    'label' => 'Button',
])

<button type="{{ $type }}" class="{{ $class }}">
    {{ $label }}
</button>
