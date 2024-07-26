@props(['name' => '', 'options' => [], 'class' => 'form-control' , 'placeholder' => ''])

<div class="input-container mt-0 pt-0">
    <select name="{{ $name }}" class="selectpicker border {{ $class }} mt-2" data-show-subtext="true" data-live-search="true">
        <option value="" disabled selected>{{$placeholder}}</option>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" class="text-dark">{{ $label }}</option>
        @endforeach
    </select>
</div>
