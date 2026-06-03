@props([
    'features' => [
        'Parking Spaces Available' => 'property_Parking',
        'Lobby in Building' => 'property_Lobby',
        'Double Glazed Windows' => 'property_Double',
        'Central Air Conditioning' => 'property_Central',
        'Central Heating' => 'property_Heating',
        'Electricity Backup' => 'property_Backup',
        'Waste Disposal' => 'property_Disposal',
        'Elevators' => 'property_Elevators',
        
        ], 
    'selected' => [],
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
