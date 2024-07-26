@props(['checkboxes' => [
    ['label' => 'Corner Plot', 'id' => 'checkbox-1', 'labelClass' => 'checkbox-option-1'],
    ['label' => 'Park Facing', 'id' => 'checkbox-2', 'labelClass' => 'checkbox-option-2'],
    ['label' => 'Disputed', 'id' => 'checkbox-3', 'labelClass' => 'checkbox-option-3'],
    ['label' => 'Sewerage', 'id' => 'checkbox-4', 'labelClass' => 'checkbox-option-4'],
    ['label' => 'Electricity', 'id' => 'checkbox-5', 'labelClass' => 'checkbox-option-5'],
    ['label' => 'Water Supply', 'id' => 'checkbox-6', 'labelClass' => 'checkbox-option-6'],
    ['label' => 'Gas Supply', 'id' => 'checkbox-7', 'labelClass' => 'checkbox-option-7'],
    ['label' => 'Boundary Wall', 'id' => 'checkbox-8', 'labelClass' => 'checkbox-option-8'],
]])

<div class="input-container mt-0 pt-0">
    <div class="input-check d-flex" id="checkbox_feature">
        <div class="checkbox-wrapper mt-0 pt-0">
            @foreach ($checkboxes as $checkbox)
                <input type="checkbox" name="feature[]" value="{{ $checkbox['label'] }}" id="{{ $checkbox['id'] }}">
                <label for="{{ $checkbox['id'] }}" class="checkbox-option {{ $checkbox['labelClass'] }}">
                    <span>{{ $checkbox['label'] }}</span>
                </label>
            @endforeach
        </div>
    </div>  
</div>