@props([
    'id' => '',
    'type' => 'text',
    'name' => '',
    'class' => 'form-control',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    
])

<div class="mb-4">
    <div class="input-group input-group-sm rounded border border-1">
        <input
            id="{{ $id }}"
            type="{{ $type }}"
            name="{{ $name }}"
            class="{{ $class }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            
           
        />
    </div>
</div>
