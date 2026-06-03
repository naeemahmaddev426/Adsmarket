<x-imageuploadedit  :adImages="$adImages"/>
@error('image_path')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('image_path.*')
<div class="alert alert-danger">{{ $message }}</div>
@enderror