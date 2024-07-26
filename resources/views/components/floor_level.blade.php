@props(['name' => '', 'options' => [], 'class' => ''])
                <div class="input-container mt-0 pt-0">
                    <select name="{{ $name }}" id="{{ $name }}" class="selectpicker {{ $class }} mt-2" data-show-subtext="true" data-live-search="true">
                      @foreach ($options as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                      @endforeach
                    </select>
                  </div>