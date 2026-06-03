@props([
    'features' => [
        'Servant Quarters' => 'property_servant',
        'Drawing Room' => 'property_drawing',
        'Dining Room' => 'property_dining',
        'Kitchen' => 'property_kitchen',
        'Study Room' => 'property_study',
        'Prayer Room' => 'property_prayer',
        'Powder Room' => 'property_powder',
        'Gym' => 'property_gym',
        'Store Room' => 'property_store',
        'Steam Room' => 'property_steam',
        'Lounge or Sitting Room' => 'property_lounge',
        'Laundry Room' => 'property_laundry',
    ],
    'selected' => [],  // Default to an empty array
    'class' => ''
])

<div class="input-container mt-0 pt-0">
    <div class="input-check d-flex" id="checkbox_feature">
        <div class="checkbox-wrapper">
            @foreach ($features as $label => $id)
                <input type="checkbox" 
                       name="feature[]" 
                       id="{{ $id }}" 
                       value="{{ $label }}" 
                       data-label="{{ $label }}" 
                       class="{{ $class }}" 
                       {{ in_array($label, (array) $selected) ? 'checked' : '' }}>
               
            @endforeach
        </div>
    </div>
</div>

<style>
    .input-check input[type="checkbox"]:checked {
        background-color: #545f8b; 
        border-color: #545f8b;
    }
</style>
