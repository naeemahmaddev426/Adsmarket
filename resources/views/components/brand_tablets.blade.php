@props([
    'name' => 'brand', 
    'options' => [], 
    'class' => 'form-control', 
    'placeholder' => '', 
    'value' => '' 
])

<div class="input-container mt-0 pt-0">
    <select name="brand" 
            class="selectpicker border {{ $class }} mt-2" 
            data-show-subtext="true" 
            data-live-search="true">
        <option value="" disabled {{ $value == '' ? 'selected' : '' }}>
            {{ $placeholder }}
        </option>
        @foreach ($options as $label)
            <option value="{{ $label }}" {{ $label == $value ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>
