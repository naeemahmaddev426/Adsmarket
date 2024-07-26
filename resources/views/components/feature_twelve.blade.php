<!-- @props(['title' => 'Features', 'checkboxes' => []])

<div class="input-container mt-0 pt-0">
    <div class="input-check d-flex mt-0 pt-0" id="checkbox_feature">
        <div class="checkbox-wrapper">
            @foreach ($checkboxes as $checkbox)
                <input type="checkbox" name="{{ $checkbox['name'] }}" id="{{ $checkbox['id'] }}">
                <label for="{{ $checkbox['id'] }}" class="checkbox-option {{ $checkbox['labelClass'] }}">
                    <span>{{ $checkbox['label'] }}</span>
                </label>
            @endforeach
        </div>
    </div>
</div> -->
@props( ['checkboxes' => [] ,'features' => [
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
   
]] )

<div class="input-container mt-0 pt-0">
    <div class="input-check d-flex" id="checkbox_feature">
        <div class="checkbox-wrapper">
            @foreach ($checkboxes as $checkbox)
                <input type="checkbox" name="feature[]" id="{{ $checkbox['id'] }}" value="{{ $checkbox['label'] }}"
                       @if(in_array($checkbox['label'], old('feature', []))) checked @endif>
                <label for="{{ $checkbox['id'] }}" class="checkbox-option {{ $checkbox['labelClass'] }}">
                    <span>{{ $checkbox['label'] }}</span>
                </label>
            @endforeach
        </div>
    </div>
</div>