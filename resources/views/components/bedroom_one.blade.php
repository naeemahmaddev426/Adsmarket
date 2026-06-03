@props(['name', 'options' => [], 'class' => '', 'placeholder' => ''])

<div class="input-container mt-0 pt-0 position-relative">
    <select name="{{ $name }}" id="{{ $name }}" class="selectpicker {{ $class }} mt-2 " style="font-size:14px !important" data-show-subtext="true" data-live-search="true">
        <option value="" disabled selected>{{$placeholder}}</option>
        @foreach ($options as $option)
            <option value="{{ $option }}">{{ $option }}</option>
        @endforeach
    </select>
    <!-- Add dropdown icon using a span element -->
    <span class="dropdown-icon position-absolute end-0 top-50 translate-middle-y pe-3">
        <i class="fas fa-chevron-down"></i> <!-- You can use a different icon here if needed -->
    </span>
</div>
