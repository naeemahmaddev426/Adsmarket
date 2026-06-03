
@props(['label' => 'Price', 'currency' => 'Rs', 'value' => ''])

<label for="price" class="label-text">
    <span class="label-span">{{ $label }}</span>
</label>
<div class="input-group input-group-sm rounded border border-1 mb-4">
    <span class="input-group-text2 border-0 pe-0" id="inputGroup-sizing-sm">{{ $currency }} |</span>
    <input type="number" name="price" class="form-control border-0 ps-0 extra-class" 
       aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" 
       value="{{ old('price', $value) }}">
</div>


<style>
    .image-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
    position: relative;
}

.image-wrapper {
    position: relative;
    display: inline-block;
    border: 2px solid #ddd;
    padding: 5px;
    cursor: move;
}

.image-wrapper img {
    max-width: 150px;
    max-height: 150px;
}

.delete-icon {
    position: absolute;
    top: 5px;
    right: 5px;
    background: rgba(0,0,0,0.5);
    color: #fff;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    text-align: center;
    line-height: 20px;
    cursor: pointer;
}
</style>
