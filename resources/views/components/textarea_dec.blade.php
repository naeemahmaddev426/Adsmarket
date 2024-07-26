@props(['id', 'class' => 'form-control', 'name' => 'description', 'spellcheck'=> 'false', 'maxlength' => '4096', 'row' => '6' , 'autocomplete' => 'nope' ])

<textarea id="{{ $id }}" name="{{ $name }}" spellcheck="{{ $spellcheck }}" class="{{ $class }}" maxlength="{{ $maxlength }}" rows="{{ $row }}" autocomplete="{{ $autocomplete }}"></textarea>