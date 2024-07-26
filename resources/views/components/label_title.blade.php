@props(['for', 'class' => 'label-text'])

<label for="{{ $for }}" class="{{ $class }}">{{ $slot }}</label>
