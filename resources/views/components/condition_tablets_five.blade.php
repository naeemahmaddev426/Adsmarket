@props(['class' => '','name' => 'condition', 'options' => []])

<div class="input-container mt-0 pt-0">
    <div class="input-check d-flex mt-0 pt-0">
        <div class="wrapper">
            @foreach ($options as $label => $id)
                <label for="{{ $id }}">
                    <input type="radio" name="{{ $name }}" id="{{ $id }}" value="{{ $label }}" data-label="{{ $label }}" class="{{$class}}">
                    
                </label>
            @endforeach
        </div>
    </div>
</div>
