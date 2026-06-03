@props([
    'features' => [
        'Corner Plot' => 'property_corner',
        'Park Facing' => 'property_facing',
        'Disputed' => 'property_disputed',
        'Sewerage' => 'property_swerage',
        'Electricity' => 'property_electricity',
        'Water Supply' => 'property_water',
        'Gas Supply' => 'property_supply',
        'Boundary Wall' => 'property_boundary',
        
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
