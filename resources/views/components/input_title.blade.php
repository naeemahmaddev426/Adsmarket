@props([
    'id' => '',
    'type' => 'text',
    'name' => '',
    'class' => 'form-control',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'maxlength' => 70,
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
            maxlength="{{ $maxlength }}"
            oninput="updateCharCount('{{ $id }}', '{{ $maxlength }}')"
        />
    </div>
    <div class="char-count-container">
        <span class="char-count" id="{{ $id }}-charCount">
            <span class="count-text float-end pt-1">0/{{ $maxlength }}</span>
        </span>
    </div>
</div>
