@props(['checkboxes' => []])

<div class="input-container">
    <label for="title" class="label-text mt-2 mb-1">
        <span class="label-span">Features</span>
    </label>
    <div class="input-check d-flex" id="checkbox_feature">
        <div class="checkbox-wrapper">
            @foreach ($checkboxes as $checkbox)
                <input type="checkbox" name="{{ $checkbox['name'] }}" id="{{ $checkbox['id'] }}">
                <label for="{{ $checkbox['id'] }}" class="checkbox-option {{ $checkbox['labelClass'] }}">
                    <span>{{ $checkbox['label'] }}</span>
                </label>
            @endforeach
        </div>
    </div>
</div>