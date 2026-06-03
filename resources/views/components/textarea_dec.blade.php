@props(['id', 'class' => 'form-control', 'name' => 'description', 'spellcheck'=> 'true', 'maxlength' => '4096', 'row' => '6', 'autocomplete' => 'nope', 'value' => ''])

<textarea id="{{ $id }}" name="{{ $name }}" spellcheck="{{ $spellcheck }}" class="{{ $class }}" maxlength="{{ $maxlength }}" rows="{{ $row }}" autocomplete="{{ $autocomplete }}">{{ $value }}</textarea>
