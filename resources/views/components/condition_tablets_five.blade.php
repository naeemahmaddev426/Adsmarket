@props(['class' => '', 'name' => '', 'options' => [], 'selected' => ''])

<div class="input-container mt-0 pt-0">
    <div class="input-check d-flex mt-0 pt-0">
        <div class="wrapper">
            @foreach ($options as $label => $id)
                <input type="radio" 
                       name="{{ $name }}" 
                       id="{{ $id }}" 
                       value="{{ trim($label) }}" 
                       data-label="{{ trim($label) }}" 
                       class="{{ $class }}  {{ $selected === $label ? 'checked' : ''}}" 
                       {{ trim($selected) == trim($label) ? 'checked' : '' }}>
               
            @endforeach
        </div>
    </div>
</div>

<style>
    .input-check input[type="radio"]:checked {
        background-color: #545f8b; 
        border-color: #545f8b;
    }
</style>
