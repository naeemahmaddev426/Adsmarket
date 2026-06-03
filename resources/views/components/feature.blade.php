@props(['features', 'initialCount' => 5])


    <h4 class="fs-6 fw-bold px-1 pt-3">Feature</h4>

    <div class="features-list">
        @foreach($features->take($initialCount) as $feature)
            @php
                $featureFormatted = strtolower(str_replace(' ', '_', $feature));
                $checked = is_array(request('feature')) && in_array($feature, request('feature')) ? 'checked' : '';
            @endphp
            <div class="form-group" style="display: flex; align-items: center;">
                <input type="checkbox" id="{{ $featureFormatted }}" name="feature[]" class="feature" value="{{ $feature }}" {{ $checked }}  style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px; margin-right:4px">
                <label for="{{ $featureFormatted }}" 
                    style="cursor: pointer; {{ $checked ? 'font-weight: bold; color: black;' : 'color: #666;' }}"
                    onclick="toggleCheckbox('{{ $featureFormatted }}')">{{ $feature }}
                </label>
            </div>
        @endforeach
    </div>

    @if($features->count() > $initialCount)
        <div class="more-features" style="display: none;">
            @foreach($features->skip($initialCount) as $feature)
                @php
                    $featureFormatted = strtolower(str_replace(' ', '_', $feature));
                    $checked = is_array(request('feature')) && in_array($feature, request('feature')) ? 'checked' : '';
                @endphp
                <div class="form-group" style="display: flex; align-items: center;">
                    <input type="checkbox" id="{{ $featureFormatted }}" name="feature[]" class="feature" value="{{ $feature }}" {{ $checked }}  style="height:15px;width:15px; color:#545f8b !important; background:#545f8b !important;border:1px solid #545f8b;padding:3px; margin-right:4px">
                    <label for="{{ $featureFormatted }}" 
                        style="cursor: pointer; {{ $checked ? 'font-weight: bold; color: black;' : 'color: #666;' }}"
                        onclick="toggleCheckbox('{{ $featureFormatted }}')">{{ $feature }}
                    </label>
                </div>
            @endforeach
        </div>

        <a href="javascript:void(0);" id="toggleFeatures" style="font-size:14px; color:#545F8B;">
            View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>
        </a>
    @endif

<style>
    
</style>
