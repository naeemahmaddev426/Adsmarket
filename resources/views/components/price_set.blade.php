
@props(['label' => 'Price', 'currency' => 'Rs'])

<label for="title" class="label-text">
    <span class="label-span">{{ $label }}</span>
</label>
<div class="input-group input-group-sm rounded border border-1 mb-4">
    <span class="input-group-text2 border-0 pe-0" id="inputGroup-sizing-sm">{{ $currency }} |</span>
    <input type="number" class="form-control border-0 ps-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" {{ $attributes }}>
</div>
