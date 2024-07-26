@props(['name' => 'make_car', 'options' => [], 'class' => 'form-control'])

<div class="input-container mt-0 pt-0">
    <select name="{{ $name }}" class="selectpicker border {{ $class }} mt-2" data-show-subtext="true" data-live-search="true">
        <option value="" disabled selected>Select a make</option>
        @foreach ($options as $option)
            <option value="{{ $option }}" class="text-dark">{{ $option }}</option>
        @endforeach
    </select>
</div>
