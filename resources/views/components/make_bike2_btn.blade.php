@props([
    'dataBsTarget' => '#', 
    'dataBsToggle' => '', 
    'type' => 'button', 
    'class' => 'nav-tab-button rounded px-3 py-2', 
    'id' => 'nav-auto-tab', 
    'ariaControls' => 'nav-auto', 
    'ariaSelected' => 'false', 
    'label' => '', 
    'value' => '', 
    'currentValue' => ''
])

@php
    // Check if the label matches the current value
    $isActive = trim($label) === trim($currentValue);
@endphp

<button
    class="{{ $class }} {{ $isActive ? 'active' : '' }}" {{-- Add 'active' class when tab is selected --}}
    id="{{ $id }}"
    data-bs-toggle="{{ $dataBsToggle }}"
    data-bs-target="{{ $dataBsTarget }}"
    type="{{ $type }}"
    role="tab"
    aria-controls="{{ $ariaControls }}"
    aria-selected="{{ $isActive ? 'true' : 'false' }}" {{-- Conditionally set aria-selected --}}
    data-value="{{ $label }}"
>
    {{ $label }}
</button>

{{-- Hidden input field to store the selected value --}}
<input type="hidden" name="make_bike2" id="make_bike_input2" value="{{ $value }}" />
