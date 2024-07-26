@props(['name' => '', 'class' => 'form-control', 'type' => ''])

<label for="{{ $name }}" class="label-text mb-1 mt-3">
    <span class="label-span">Area</span>
</label>
<div class="input-group input-group-sm rounded border border-1 mb-4">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="{{ $class }} border-0 ps-0"
           value="{{ old($name) }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div>