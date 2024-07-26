@props(['label' => 'City', 'name' => 'location', 'placeholder' => 'Select City', 'cities' => []])

<div class="city-container mb-4">
    <h4 class="mt-2 choose mb-3">YOUR AD'S LOCATION</h4>
    <div class="input-container">
        <select id="{{ $name }}" name="{{ $name }}" class="custom-select" {{ $attributes }}>
            <option value="">{{ $placeholder }}</option>
            @foreach($cities as $city)
                <option value="{{ $city }}">{{ $city }}</option>
            @endforeach
        </select>
        <label for="{{ $name }}" class="custom-label">{{ $label }}</label>
    </div>
</div>



<style>
    /* Custom select styles */
    .custom-select {
        position: relative;
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: #fff;
        cursor: pointer;
    }

    /* Label styles */
    .custom-label {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 10px;
        font-size: 16px;
        color: #aaa;
        pointer-events: none;
        transition: 0.2s;
    }

    /* Adjust label position on focus or when input is not empty */
    .custom-select:focus + .custom-label,
    .custom-select:not(:placeholder-shown) + .custom-label {
        top: 0;
        font-size: 12px;
        color: #545F8B;
    }

    /* Container styles */
    .input-container {
        position: relative;
        margin-top: 20px;
    }

    /* City list styles */
    .city-list {
        list-style-type: none;
        padding: 0;
        margin: 10px 0 0 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        max-height: 200px;
        overflow-y: auto;
        display: none;
        position: absolute;
        width: calc(100% - 2px); /* Adjust width to match input */
        background-color: #fff;
        z-index: 10;
    }

    /* City list item styles */
    .city-list li {
        padding: 8px 10px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    /* Hover effect on city list items */
    .city-list li:hover {
        background-color: #545F8B;
        color: #fff;
    }

    /* Display city list when input container is focused */
    .input-container:focus-within .city-list {
        display: block;
    }
</style>
