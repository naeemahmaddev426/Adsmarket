@props(['type' => 'number', 'name' => '', 'class' => 'form-control', 'value' => ''])

<div class="input-group input-group-sm rounded border border-1 mb-4">
    @if(is_array($value))
        @foreach($value as $val)
            <input type="{{ $type }}" name="{{ $name }}" class="{{ $class }}" value="{{ $val }}">
        @endforeach
    @else
        <input type="{{ $type }}" name="{{ $name }}" class="{{ $class }}" value="{{ $value }}">
    @endif
</div>
