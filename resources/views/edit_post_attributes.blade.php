<x-app-layout>
	<style>
		#main-nav {
			display: none;
		}
		.main-nav {
			display: none;
		}
		.component {
			display: none;
		}

		.component.active {
			display: block;
		}

		.is-invalid {
			border-color: #dc3545;
			/* Red color for invalid input */
		}
		.fade-out {
        opacity: 0;
        transition: opacity 0.5s;
    }
	#make_bike_select {
    cursor: pointer;
  
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 8px 12px;
    font-size: 16px;
    color: #495057;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
	}

	/* Styling when select box is focused */
	#make_bike_select:focus {
		border-color: #80bdff;
		box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
		outline: none;
	}

	/* Styling the select options */
	#make_bike_select option {
		padding: 10px;
		font-size: 16px;
		color: #212529;
		background-color: #ffffff;
		cursor: pointer;
	}

	/* Change background on hover for options */
	#make_bike_select option:hover {
		background-color: #f1f1f1;
	}

	/* Styling the hidden input */
	#make_bike_input {
		cursor: pointer;
		display: none; /* Hide the input */
	}

	.image-wrapper {
		display: inline-block;
		position: relative;
		margin: 10px;
	}

	.image-wrapper img {
		border: 2px solid #ddd;
		border-radius: 4px;
	}
	.cover-banner {
		position: absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		background-color: rgba(66, 63, 55, 0.86);
		color: white;
		text-align: center;
		padding: 0px;
	}

	.delete-icon {
		position: absolute;
		top: 5px;
		right: 5px;
		background-color: rgba(0, 0, 0, 0.7);
		color: white;
		padding: 3px;
		border-radius: 50%;
		cursor: pointer;
		font-size: 14px;
	}
	</style>

	<button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top"
		style="display: none;"><i class="fas fa-arrow-up"></i></button>
	<div class="container-fluid" id="main-container">
		<div class="row">

			<div class="col-lg-12 col-12 col-md-12  mb-5">
				<div class="top-bar bg-light pb-2">
					<div class="logo">
						<a href="{{ url('/') }}">
							<img src="{{ asset('assets/images/logo.svg')}}" class="lazyload m-2" alt="Logo">
						</a>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="  col-md-10 mx-auto">
					<h4 class="text-center heading-post text-uppercase">Edit POST YOUR AD</h4>
				</div>
			</div>
			<div class="row">

				<div class="col-md-7 col-12 card mx-auto pt-4 pb-4 mb-5" id="main-card-post">
						@if(Session::has('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ Session::get('success') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						@endif

						@if(Session::has('error'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{ Session::get('error') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						@endif
						<form method="POST" action="{{ route('edit_post_attributes.update', encrypt($ad->id)) }}" enctype="multipart/form-data" id="updateform">
						@csrf
                        @method('PUT') <!-- Important for PUT method -->
    
                        <input type="hidden" id="category_name" name="category_name" value="{{ $ad->category_name  }}">
                        <input type="hidden" id="sub_category_name" name="sub_category_name" value="{{ $ad->sub_category_name  }}">
                        <input type="hidden"  id="sub_category_name_type" name="sub_category_name_type" value="{{ $ad->sub_category_name_type }}">
                        
                        @auth
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        @endauth
						<div class="row">
							<div class=" col-md-12  mx-auto">
								<h4 class="text-left choose text-uppercase py-2 " style="font-size: 20px;">Selected
									category</h4>
							</div>
						</div>
						<div class="row pb-3">
							<div class="col-md-9">
                                <div class="bread d-flex">
                                    <span class="text-bread">{{ $ad->category_name  }} / {{ $ad->sub_category_name  }} / {{ $ad->sub_category_name_type  }}</span>
                                </div>
							</div>
						</div>
                        @php
                            $sub_cat = $ad->sub_category_name;
                            $sub_cat_type = $ad->sub_category_name_type;
                        @endphp
						<hr>
						<div class="row">
							<div class="col-md-12">
								<h4 class="mt-4 choose">INCLUDE SOME DETAILS</h4>
								<x-label_title for="title" class="label-span">Ad Title</x-label_title>
								<x-input_title id="title" type="text" name="title" class="form-control" value="{{ old('title', $ad->title) }}" placeholder="Enter your ad title" required/>
								@error('title')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<x-label_title for="description" class="label-span text-wrap">Description</x-label_title>
                                <x-textarea_dec  id="description"  name="description"  spellcheck="true"  class="form-control" rows="6" autocomplete="nope"  value="{{ old('description', $ad->description) }}"  required />
								@error('description')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							@if($sub_cat == $subCategories[0]['sub_category_name'])
                                <div id="{{ $sub_cat == $subCategories[0]['sub_category_name'] ? $sub_cat : $subCategories[0]['sub_category_name'] }}" class="component">
									<x-label_title for="brand" class="label-span mt-2">Brand</x-label_title>
									<x-brand_tablets name="brand" :options="['Apple', 'Samsung', 'Other Tablets', 'Lenovo', 'Huawei', 'Others', 'Dany Tabs', 'Amazon', 'Asus', 'Dell', 'Alcatel', 'Huion']"  value="{{ old('brand', $ad->brand) }}" placeholder="Select brand" />
									<x-label_title for="condition" class="label-span">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-10','Used' => 'option-11','Open Box' => 'option-12','Refurbished' => 'option-13','For Part or Not Working' => 'option-14']" :selected=" old('condition', $ad->condition) " />
									<x-label_title for="deliverable" class="label-span mt-4">Deliverable</x-label_title>
									<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1', 'Yes' => 'option-2']" :selected="old('deliverable', $ad->deliverable)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
                                    <x-price_tablets label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
                                    <hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
                                    <hr>
                                </div>
								@elseif($sub_cat == $subCategories[2]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[2]['sub_category_name'] ? $sub_cat : $subCategories[2]['sub_category_name']  }}" class="component">
									<!-- smart watch  -->
									<x-label_title for="title" class="label-span mt-4">Brand</x-label_title>
									<x-brand_input name="brand" :options="['Apple', 'Samsung', 'Other Tablets', 'Lenovo', 'Huawei', 'Others', 'Dany Tabs', 'Amazon', 'Asus', 'Dell', 'Alcatel', 'Huion']" class="border form-control"  value="{{ old('brand', $ad->brand) }}" />
									<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected="old('condition', $ad->condition)"  />
									<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
									<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" :selected="old('deliverable', $ad->deliverable)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									<hr>
								</div>
								@elseif($sub_cat == $subCategories[3]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[3]['sub_category_name'] ? $sub_cat : $subCategories[3]['sub_category_name']  }}"
									class="component">
									<!--  mobiles  -->
									<x-label_title for="title" class="label-span mt-4">Brand</x-label_title>
									<x-brand_input name="brand" :options="['Apple', 'Samsung', 'Other Tablets', 'Lenovo', 'Huawei', 'Others', 'Dany Tabs', 'Amazon', 'Asus', 'Dell', 'Alcatel', 'Huion']" class="border form-control" value="{{ old('brand', $ad->brand) }}" />
									<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
									<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" :selected="old('deliverable', $ad->deliverable)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								<hr>
								</div>
								@elseif($sub_cat == $subCategories[4]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[4]['sub_category_name'] ? $sub_cat : $subCategories[4]['sub_category_name']  }}" class="component">
									<!--  car  -->
									<x-label_title for="title" class="label-span mt-4">Make</x-label_title>
									<x-brand_input name="make_car" :options="['Suzuki', 'Toyota', 'Honda', 'Daihatsu', 'Adam', 'Audi', 'BAIC', 'Bentley', 'BMW', 'Buick', 'Cadilac', 'Changan']" class="border form-control"  value="{{ old('make_car', $ad->make_car) }}" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}"  />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								<hr>
								</div>
								@elseif($sub_cat == $subCategories[5]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[5]['sub_category_name'] ? $sub_cat : $subCategories[5]['sub_category_name']  }}"
									class="component">
									<!--  car installemnet  -->
									<x-label_title for="title" class="label-span mt-4">Make</x-label_title>
									<x-brand_input name="make_car" :options="['Suzuki', 'Toyota', 'Honda', 'Daihatsu', 'Adam', 'Audi', 'BAIC', 'Bentley', 'BMW', 'Buick', 'Cadilac', 'Changan']" class="border form-control" value="{{ old('make_car', $ad->make_car) }}" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								<hr>
								</div>
								@elseif($sub_cat == $subCategories[6]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[6]['sub_category_name'] ? $sub_cat : $subCategories[6]['sub_category_name']  }}"
									class="component">
									<!--  car accessory  -->
									<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1', 'Used' => 'option-2']" :selected="old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat == $subCategories[7]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[7]['sub_category_name'] ? $sub_cat : $subCategories[7]['sub_category_name']  }}"
									class="component">
									<!--  spare part  -->
									<x-label_title for="title" class="label-span mt-4 ">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['Car Parts' => 'option-62','Other Parts' => 'option-63',]" :selected=" old('type', $ad->type)" />
									<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								    <hr>
								</div>
								@elseif($sub_cat == $subCategories[8]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[8]['sub_category_name'] ? $sub_cat : $subCategories[8]['sub_category_name'] }}" class="component">
									<!--  buses vans  -->
									<x-label_title for="year" class="label-span mt-2">Year</x-label_title>
									<x-input_number_year type="number" name="year_update[]" class="form-control" value="{{ old('year_update.0',$ad->year_update) }}" />
									<x-label_title for="kms_driven" class="label-span mt-2">KM's driven</x-label_title>
									<x-input_number_year type="number" name="kms_driven_no[]" class="form-control" value="{{ old('kms_driven_no.0', $ad->kms_driven_no) }}" />
									<x-label_title for="title" class="label-span mt-2">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1', 'Used' => 'option-2']" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								    <hr>
								</div>
								@elseif($sub_cat == $subCategories[9]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[9]['sub_category_name'] ? $sub_cat : $subCategories[9]['sub_category_name'] }}" class="component">
									<!--  ricksha  -->
									<x-label_title for="title" class="label-span mt-2">Year</x-label_title>
									<x-input_number_year type="number" name="year_update[]" class="form-control" value="{{ old('year_update', $ad->year_update) }}" />
									<x-label_title for="title" class="label-span mt-2">KM's driven</x-label_title>
									<x-input_number_year type="number" name="kms_driven_no[]" class="form-control" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
									<x-label_title for="title" class="label-span mt-2">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1', 'Used' => 'option-2']" :selected=" old('condition', $ad->condition)"  />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class"  value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								    <hr>
								</div>
								@elseif($sub_cat == $subCategories[10]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[10]['sub_category_name'] ? $sub_cat : $subCategories[10]['sub_category_name']  }}"
									class="component">
									<!--  boat  -->
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]"  :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									<hr>
								</div>
								@elseif($sub_cat == $subCategories[11]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[11]['sub_category_name'] ? $sub_cat : $subCategories[11]['sub_category_name']  }}"
									class="component">
									<!--  trackter  -->
									<x-label_title for="title" class="label-span mt-2">Year</x-label_title>
									<x-input_number_km_driven type="number" name="year_update[]" class="form-control" value="{{ old('year_update', $ad->year_update) }}"   />
									<x-label_title for="title" class="label-span mt-2">KM's driven</x-label_title>
									<x-input_number_year type="number" name="kms_driven_no[]" class="form-control" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									<hr>
								</div>
								@elseif($sub_cat == $subCategories[12]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[12]['sub_category_name'] ? $sub_cat : $subCategories[12]['sub_category_name']  }}"
									class="component">
									<!-- Land sale content here -->
									<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['Agricultural' => 'option-39', 'Commercial Plots' => 'option-40', 'Files' => 'option-41', 'Industrial Land' => 'option-42', 'Residential Plots' => 'option-43', 'Plot Form' => 'option-44']" :selected=" old('type', $ad->type)" />
									<x-label_title for="title" class="label-span mt-4">Feature</x-label_title>
									<x-feature_eight :selected="$selectedFeatures" />
									<x-label_title for="title" class="label-span mt-2 ">Area unit</x-label_title>
									<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-39', 'Marla' => 'option-40', 'Square Feet' => 'option-41', 'Square Meter' => 'option-42', 'Square Yards' => 'option-43']"  :selected=" old('area_unit', $ad->area_unit)"  />
									<x-input_number_sale_land type="number" name="area_square[]" class="form-control"  value="{{ old('area_square', $ad->area_square) }}" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									<hr>
								</div>
								@elseif($sub_cat == $subCategories[13]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[13]['sub_category_name'] ? $sub_cat : $subCategories[13]['sub_category_name'] }}" class="component">
									<!-- Houses content here -->
									<x-label_title for="furnished" class="label-span mt-2">Furnished</x-label_title>
									<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20', 'Furnished' => 'option-21']" :selected=" old('furnished', $ad->furnished)" />
									<x-label_title for="pro_sale_house_bedroom" class="label-span mt-4">Bedrooms</x-label_title>
									<x-brand_input name="pro_sale_house_bedroom" :options="['','1', '2', '3', '4', '5', '6', 'Studio']" class="border form-control" placeholder="Select bedroom" value="{{ old('pro_sale_house_bedroom', $ad->pro_sale_house_bedroom) }}" />
									<x-label_title for="pro_sale_house_bathroom" class="label-span mt-2">Bathrooms</x-label_title>
									<x-brand_input name="pro_sale_house_bathroom" :options="['','1', '2', '3', '4', '5', '6', '7']" class="border form-control" placeholder="Select bathroom" value="{{ old('pro_sale_house_bathroom', $ad->pro_sale_house_bathroom) }}"/>
									<x-label_title for="construction_state_new" class="label-span mt-2">Construction State</x-label_title>
									<x-condition_tablets_five name="construction_state_new" :options="['Grey Structure' => 'option-15', 'Finished' => 'option-16']" :selected=" old('construction_state_new', $ad->construction_state_new)" />
									<x-label_title for="feature" class="label-span mt-3">Feature</x-label_title>
									<x-feature_twelve :selected="$selectedFeatures" />
									<x-label_title for="area_unit" class="label-span mt-2">Area Unit</x-label_title>
									<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7', 'Marla' => 'option-8', 'Square Feet' => 'option-9', 'Square Meter' => 'option-10', 'Square Yards' => 'option-11']" :selected=" old('area_unit', $ad->area_unit)" />
									<x-input_number_sale_land type="number" name="area_square[]" class="form-control" value="{{ old('area_square', $ad->area_square) }}" />

									@error('area_square')
									<span class="text-danger">{{ $message }}</span>
									@enderror
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit  :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									<hr>
							    </div>
								@elseif($sub_cat == $subCategories[14]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[14]['sub_category_name'] ? $sub_cat : $subCategories[14]['sub_category_name'] }}" class="component">
									<!-- Appartment sale  -->
									<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
									<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20', 'Furnished' => 'option-21']" :selected=" old('furnished', $ad->furnished)" />
									<x-label_title for="pro_sale_appart_bedroom" class="label-span mt-4 ">Bedrooms</x-label_title>
									<x-brand_input name="pro_sale_appart_bedroom" :options="['','1', '2', '3', '4', '5', '6', 'Studio']" class="border form-control" placeholder="select Bedrooms" value="{{ old('pro_sale_appart_bedroom', $ad->pro_sale_appart_bedroom) }}"  />
									<x-label_title for="pro_sale_appart_bathroom" class="label-span mt-2 ">Bathrooms</x-label_title>
									<x-brand_input name="pro_sale_appart_bathroom" :options="['1', '2', '3', '4', '5', '6', '7']" class="border form-control" placeholder="select Bathrooms" value="{{ old('pro_sale_appart_bathroom', $ad->pro_sale_appart_bathroom) }}"  />
									<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
									<x-brand_input name="pro_sale_appart_floor_level" :options="['','1', '2', '3', '4', '5', '6', '7', 'Ground',]" class="border form-control" placeholder="select floor level" value="{{ old('pro_sale_appart_floor_level', $ad->pro_sale_appart_floor_level) }}" />
									<x-label_title for="construction_state_new" class="label-span mt-2 ">Construction State</x-label_title>
									<x-condition_tablets_five name="construction_state_new" :options="['Grey Structure' => 'option-15', 'Finished' => 'option-16']" :selected=" old('construction_state_new', $ad->construction_state_new)" />
									<x-label_title for="title" class="label-span mt-3">Feature</x-label_title>
									<x-feature_twelve :selected="$selectedFeatures" />
									<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
									<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7', 'Marla' => 'option-8', 'Square Feet' => 'option-9', 'Square Meter' => 'option-10', 'Square Yards' => 'option-11']" :selected=" old('area_unit', $ad->area_unit)" />
									<x-input_number_sale_land type="number" name="area_square[]" class="form-control" value="{{ old('area_square', $ad->area_square) }}" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat == $subCategories[15]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[15]['sub_category_name'] ? $sub_cat : $subCategories[15]['sub_category_name']  }}"
									class="component">
									<!--  shope office sale  -->
									<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['Office' => 'option-26','Shop' => 'option-27', 'Warehouse' => 'option-28','Factory' => 'option-29','Building' => 'option-30',]"  :selected=" old('type', $ad->type)" />
									<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
									<x-brand_input name="pro_sale_shope_floor_level" :options="['','1', '2', '3', '4', '5', '6', '7', 'Ground',]" class="border form-control" placeholder="select floor level" value="{{ old('pro_sale_shope_floor_level', $ad->pro_sale_shope_floor_level) }}" />
									<x-label_title for="title" class="label-span mt-4">Feature</x-label_title>
									<x-feature_eight_second :selected="$selectedFeatures" />
									<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
									<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" :selected=" old('area_unit', $ad->area_unit)" />
									<x-input_number_sale_land type="number" name="area_square[]" class="form-control" value="{{ old('area_square', $ad->area_square) }}" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat == $subCategories[16]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[16]['sub_category_name'] ? $sub_cat : $subCategories[16]['sub_category_name']  }}"
									class="component">
									<!--  portion sale  -->
									<x-label_title for="title" class="label-span mt-2">Furnished</x-label_title>
									<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20', 'Furnished' => 'option-21']"  :selected=" old('furnished', $ad->furnished)"/>
									<x-label_title for="title" class="label-span mt-4">Bedrooms</x-label_title>
									<x-brand_input name="pro_sale_portion_bedroom" :options="['', '1', '2', '3', '4', '5', '6', 'Studio']" class="border form-control" placeholder="select bedroom" value="{{ old('pro_sale_portion_bedroom', $ad->pro_sale_portion_bedroom) }}" />
									<x-label_title for="title" class="label-span mt-2">Bathrooms</x-label_title>
									<x-brand_input name="pro_sale_portion_bathroom" :options="[ ' ', '1', '2', '3', '4', '5', '6', '7']" class="border form-control" placeholder="select bathroom" value="{{ old('pro_sale_portion_bathroom', $ad->pro_sale_portion_bathroom) }}" />
									<x-label_title for="title" class="label-span mt-3">Feature</x-label_title>
									<x-feature_twelve :selected="$selectedFeatures" />
									<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>	
									<x-brand_input name="pro_sale_portion_floor_level" :options="[ '', '1', '2', '3', '4', '5', '6', '7', 'Ground']" class="border form-control" placeholder="select floor level"  value="{{ old('pro_sale_portion_floor_level', $ad->pro_sale_portion_floor_level) }}" />
									<x-label_title for="title" class="label-span mt-2">Area Unit</x-label_title>
									<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7', 'Marla' => 'option-8', 'Square Feet' => 'option-9', 'Square Meter' => 'option-10', 'Square Yards' => 'option-11']" :selected=" old('area_unit', $ad->area_unit)" />
									<x-input_number_sale_land type="number" name="area_square[]" class="form-control" value="{{ old('area_square', $ad->area_square) }}" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class"  value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat == $subCategories[17]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[17]['sub_category_name'] ? $sub_cat : $subCategories[17]['sub_category_name']  }}"
									class="component">
									<!--  house rent -->
									<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
									<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20','Furnished' => 'option-21',]" :selected=" old('furnished', $ad->furnished)" />
									<x-label_title for="title" class="label-span mt-4 ">Bedrooms</x-label_title>
									<x-brand_input name="pro_rent_house_bedroom" :options="['','1', '2', '3', '4', '5', '6', 'Studio']" class="border form-control" placeholder="Select bedroom" value="{{ old('pro_rent_house_bedroom', $ad->pro_rent_house_bedroom) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Bathrooms</x-label_title>
									<x-brand_input name="pro_rent_house_bathroom" :options="['','1', '2', '3', '4', '5', '6', '7']" class="border form-control" placeholder="Select bathroom" value="{{ old('pro_rent_house_bathroom', $ad->pro_rent_house_bathroom) }}" />
									<x-label_title for="title" class="label-span mt-2 ">No of storeys</x-label_title>
									<x-condition_tablets_five name="no_storeys" class="px-3 " :options="[' 1 ' => 'option-22',' 2 ' => 'option-23', ' 3 ' => 'option-24', ' 4+ ' => 'option-25',]" :selected=" old('no_storeys', $ad->no_storeys)" />
									<x-label_title for="title" class="label-span mt-2 ">Contruction State</x-label_title>
									<x-condition_tablets_five  name="construction_state_new_rent_house"  :options="['Grey Structure' => 'option-15', 'Finished' => 'option-16']" :selected="old('construction_state_new_rent_house', $ad->construction_state_new_rent_house)" />
									<x-label_title for="title" class="label-span mt-3">Feature</x-label_title>
									<x-feature_twelve :selected="$selectedFeatures" />
									<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
									<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" :selected=" old('area_unit', $ad->area_unit)" />
									<x-input_number_sale_land type="number" name="area_square[]" class="form-control" value="{{ old('area_square', $ad->area_square) }}" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class"  value="{{ old('price', $ad->price) }}"/>
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat == $subCategories[18]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[18]['sub_category_name'] ? $sub_cat : $subCategories[18]['sub_category_name']  }}"
									class="component">
									<!--  appartment rent  -->
									<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
									<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20','Furnished' => 'option-21',]" :selected=" old('furnished', $ad->furnished)" />
									<x-label_title for="title" class="label-span mt-4 ">Bedrooms</x-label_title>
									<x-brand_input name="pro_rent_appart_bedroom" :options="['','1', '2', '3', '4', '5', '6', 'Studio']" class="border form-control" placeholder="Select Bedroom" value="{{ old('pro_rent_appart_bedroom', $ad->pro_rent_appart_bedroom) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Bathrooms</x-label_title>
									<x-brand_input name="pro_rent_apart_bathroom" :options="['','1', '2', '3', '4', '5', '6', '7']" class="border form-control" placeholder="Select bathroom" value="{{ old('pro_rent_apart_bathroom', $ad->pro_rent_apart_bathroom) }}" />
									<x-label_title for="title" class="label-span mt-3">Feature</x-label_title>
									<x-feature_twelve :selected="$selectedFeatures"/>
									<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
									<x-brand_input name="pro_rent_appart_floor" :options="['','1', '2', '3', '4', '5', '6', '7', 'Ground',]" class="border form-control" placeholder="Select Floor Level" value="{{ old('pro_rent_appart_floor', $ad->pro_rent_appart_floor) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
									<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" :selected=" old('area_unit', $ad->area_unit)" />
									<x-input_number_sale_land type="number" name="area_square[]" class="form-control" value="{{ old('area_square', $ad->area_square) }}" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat == $subCategories[19]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[19]['sub_category_name'] ? $sub_cat : $subCategories[0]['sub_category_name']  }}"
									class="component">
									<!--  portion rent  -->
									<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
									<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20','Furnished' => 'option-21',]" :selected=" old('furnished', $ad->furnished) " />
									<x-label_title for="title" class="label-span mt-4 ">Bedrooms</x-label_title>
									<x-brand_input name="bedroom2" :options="['Selected','1', '2', '3', '4', '5', '6+', 'Studio']" class="border form-control" value="{{ old('bedroom2', $ad->bedroom2) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Bathrooms</x-label_title>
									<x-brand_input name="bathroom2" :options="['Selected','1', '2', '3', '4', '5', '6', '7+']" class="border form-control" value="{{ old('bathroom2', $ad->bathroom2) }}" />
									<x-label_title for="title" class="label-span mt-3">Feature</x-label_title>
									<x-feature_twelve :selected="$selectedFeatures"/>
									<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
									<x-brand_input name="floor_level2" :options="['Selected','1', '2', '3', '4', '5', '6', '7+', 'Ground',]" class="border form-control" value="{{ old('floor_level2', $ad->floor_level2) }}"  />
									<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
									<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" :selected=" old('area_unit', $ad->area_unit)"  />
									<x-input_number_sale_land type="number" name="area_square[]" class="form-control" value="{{ old('area_square', $ad->area_square) }}"   />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror	
								</div>
								@elseif($sub_cat == $subCategories[20]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[20]['sub_category_name'] ? $sub_cat : $subCategories[20]['sub_category_name']  }}"
									class="component">
									<!--  shope rent  -->
									<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['Office' => 'option-26','Shop' => 'option-27', 'Warehouse' => 'option-28','Factory' => 'option-29','Building' => 'option-30',]"  :selected=" old('type', $ad->type) " />
									<x-label_title for="title" class="label-span mt-2 ">Bathrooms</x-label_title>
									<x-brand_input name="rent_shope_bathroom" :options="['Selected','1', '2', '3', '4', '5', '6', '7+']" class="border form-control" value="{{ old('rent_shope_bathroom', $ad->rent_shope_bathroom) }}" />
									<x-label_title for="title" class="label-span mt-4">Feature</x-label_title>
									<x-feature_eight_second :selected="$selectedFeatures"/>
									<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
									<x-brand_input name="floor_level_shope_rent" :options="['Selected','1', '2', '3', '4', '5', '6', '7+',]" class="border form-control mt-0 pt-0" value="{{ old('floor_level_shope_rent', $ad->floor_level_shope_rent) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
									<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" :selected=" old('area_unit', $ad->area_unit)" />
									<x-input_number_sale_land type="number" name="area_square[]" class="form-control" value="{{ old('area_square', $ad->area_square) }}" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}"  />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat == $subCategories[21]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[21]['sub_category_name'] ? $sub_cat : $subCategories[21]['sub_category_name']  }}"
									class="component">
									<!--  room rent  -->
									<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
									<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20','Furnished' => 'option-21',]" :selected="old('furnished', $ad->furnished) " />
									<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['Single' => 'option-60','Sharing' => 'option-61', ]" :selected=" old('type', $ad->type)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat == $subCategories[22]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[22]['sub_category_name'] ? $sub_cat : $subCategories[22]['sub_category_name']  }}"
									class="component">
									<!--  roomate rent  -->
									<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
									<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20','Furnished' => 'option-21',]" :selected=" old('furnished', $ad->furnished)" />
									<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['Single' => 'option-60','Sharing' => 'option-61', ]"  :selected=" old('type', $ad->type)"/>
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat == $subCategories[23]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[23]['sub_category_name'] ? $sub_cat : $subCategories[23]['sub_category_name']  }}"
									class="component">
									<!--  vacation rent  -->
									<x-label_title for="bedroom" class="label-span mt-4">Bedrooms</x-label_title>
									<x-brand_input name="bedroom_vacation_rent" :options="['', '1', '2', '3', '4', '5', '6', 'Studio']" class="border form-control" placeholder="Select Bedroom"  value="{{ old('bedroom_vacation_rent', $ad->bedroom_vacation_rent) }}"  />
									<x-label_title for="bathroom_vacation_rent" class="label-span mt-2">Bathrooms</x-label_title>
									<x-brand_input name="bathroom_vacation_rent" :options="['', '1', '2', '3', '4', '5', '6', '7']" class="border form-control" placeholder="Select Bathroom" value="{{ old('bathroom_vacation_rent', $ad->bedroom_vacation_rent) }}"/>
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}"/>
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat == $subCategories[24]['sub_category_name'])
								<div id="{{ $sub_cat == $subCategories[24]['sub_category_name'] ? $sub_cat : $subCategories[24]['sub_category_name']  }}"
									class="component">
									<!--  land rent  -->
									<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['Agricultural Land' => 'option-20','Commercial Plots' => 'option-21','Industrial Land' => 'option-21','Residential Plots' => 'option-21',]" :selected=" old('type', $ad->type)"  />
									<x-label_title for="title" class="label-span mt-4">Feature</x-label_title>
                                    <x-feature_eight :selected="explode(',', $ad->feature)" />
									<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
									<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" :selected=" old('area_unit', $ad->area_unit)" />
									<x-input_number_sale_land type="number" name="area_square[]" class="form-control" value="{{ old('area_square', $ad->area_square) }}" placeholder="Enter Area" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class"  value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[0]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[0]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[0]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-4">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['IOS' => 'option-6','Micro-USB/Android' => 'option-7','USB Type-C' => 'option-8','Others' => 'option-9',]" :selected=" old('type', $ad->type)" />
									<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition) " />
									<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
									<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" :selected=" old('deliverable', $ad->deliverable)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[1]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[1]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[1]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
									<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]"  :selected=" old('deliverable', $ad->deliverable)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[2]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[2]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[2]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-4 ">Device</x-label_title>
									<x-condition_tablets_five name="device" :options="['Tablet' => 'option-17','Mobile' => 'option-18', 'Smart Watch' => 'option-19',]" :selected=" old('device', $ad->device)" />
									<x-label_title for="title" class="label-span mt-4">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['IOS' => 'option-6','Micro-USB/Android' => 'option-7','USB Type-C' => 'option-8','Others' => 'option-9',]" :selected="old('type', $ad->type) " />
									<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
								    <x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" :selected=" old('deliverable', $ad->deliverable)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[3]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[3]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[3]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-4">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['Tablet' => 'option-57','Mobile' => 'option-58', 'Smart Watch' => 'option-59',]" :selected=" old('type', $ad->type)" />
									<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
									<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" :selected=" old('deliverable', $ad->deliverable)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[4]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[4]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[4]['sub_category_name_type']  }}"
									class="component">
									<nav id="nav-post-bike">
										<x-label_title for="make_bike" class="label-span mt-2">Make</x-label_title>
										<div class="nav nav-tabs nav-tabs-container mb-3 d-flex border-0 flex-wrap" id="nav-make-tab" role="tablist">
											<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-1" aria-controls="tab-1" aria-selected="true" label="Jolta" value="Jolta" currentValue="{{ old('make_bike', $ad->make_bike ?? '') }}" />
											<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-2" aria-controls="tab-2" aria-selected="false" label="Crown" value="Crown" currentValue="{{ old('make_bike', $ad->make_bike ?? '') }}" />
											<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-3" aria-controls="tab-3" aria-selected="false" label="Metro E-Vehicle" value="Metro E-Vehicle" currentValue="{{ old('make_bike', $ad->make_bike ?? '') }}" />
											<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-4" aria-controls="tab-4" aria-selected="false" label="MS Jaguar" value="MS Jaguar" currentValue="{{ old('make_bike', $ad->make_bike ?? '') }}" />
											<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-5" aria-controls="tab-5" aria-selected="false" label="PakZon Electric" value="PakZon Electric" currentValue="{{ old('make_bike', $ad->make_bike ?? '') }}" />
											<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-6" aria-controls="tab-6"  aria-selected="false"  label="United" value="United"  currentValue="{{ old('make_bike', $ad->make_bike ?? '') }}" />
										</div>
									</nav>
									<div class="tab-content border bg-light border-0" id="nav-tabContent"style="background-color: #fff !important;">
										<div class="tab-pane fade {{ (old('make_bike', $ad->make_bike ?? '') === 'Jolta') ? 'show active' : '' }}" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike', $ad->make_bike ?? '') === 'Crown') ? 'show active' : '' }}" id="tab-2" role="tabpanel" aria-labelledby="tab-2">	
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike', $ad->make_bike ?? '') === 'Metro E-Vehicle') ? 'show active' : '' }}" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
										    <x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike', $ad->make_bike ?? '') === 'MS Jaguar') ? 'show active' : '' }}" id="tab-4" role="tabpanel" aria-labelledby="tab-4">
										    <x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike', $ad->make_bike ?? '') === 'PakZon Electric') ? 'show active' : '' }}" id="tab-5" role="tabpanel" aria-labelledby="tab-5">
										    <x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike', $ad->make_bike ?? '') === 'United') ? 'show active' : '' }}" id="tab-6" role="tabpanel" aria-labelledby="tab-6">
										    <x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
									</div>
									<h4 class="mt-2 choose">SET A PRICE</h4>
                                    <x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
                                    <hr>
                                    <x-imageuploadedit :adImages="$adImages"/>
                                    @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @error('image_path.*')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[5]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[5]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[5]['sub_category_name_type']  }}" class="component">
									<nav id="nav-post-bike2">
										<label for="make_bike2" class="label-span mt-2">Make</label>
										<input type="hidden" name="make_bike2" id="make_bike_input2" value="" style="cursor:pointer;">
										<div class="nav nav-tabs nav-tabs-container mb-3 d-flex border-0 flex-wrap" id="nav-make-tab2" role="tablist">
											<x-make_bike2_btn class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-7" aria-controls="tab-7" aria-selected="true" label="Honda" value="Honda"  currentValue="{{ old('make_bike2', $ad->make_bike2 ?? '') }}"  />
											<x-make_bike2_btn class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-8" aria-controls="tab-8" aria-selected="false" label="Kawasaki" value="Kawasaki" currentValue="{{ old('make_bike2', $ad->make_bike2 ?? '') }}" />
											<x-make_bike2_btn class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-9" aria-controls="tab-9" aria-selected="false" label="Yamaha" value="Yamaha"  currentValue="{{ old('make_bike2', $ad->make_bike2 ?? '') }}" />
											<x-make_bike2_btn class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-10" aria-controls="tab-10" aria-selected="false" label="Suzuki" value="Suzuki"   currentValue="{{ old('make_bike2', $ad->make_bike2 ?? '') }}" />
											<x-make_bike2_btn class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-11" aria-controls="tab-11" aria-selected="false" label="Super Power" value="Super Power"  currentValue="{{ old('make_bike2', $ad->make_bike2 ?? '') }}" />
											<x-make_bike2_btn class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-12" aria-controls="tab-12" aria-selected="false" label="Others" value="Others" currentValue="{{ old('make_bike2', $ad->make_bike2 ?? '') }}" />
											<x-make_bike2_btn class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-13" aria-controls="tab-13" aria-selected="false" label="BMW" value="BMW" currentValue="{{ old('make_bike2', $ad->make_bike2 ?? '') }}" />
											<x-make_bike2_btn class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-14" aria-controls="tab-14" aria-selected="false" label="CF Moto" value="CF Moto" currentValue="{{ old('make_bike2', $ad->make_bike2 ?? '') }}" />
											<x-make_bike2_btn class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-15" aria-controls="tab-15" aria-selected="false" label="Super Asia" value="Super Asia" currentValue="{{ old('make_bike2', $ad->make_bike2 ?? '') }}" />
											<x-make_bike2_btn class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-16" aria-controls="tab-16" aria-selected="false" label="Super Star" value="Super Star" currentValue="{{ old('make_bike2', $ad->make_bike2 ?? '') }}" />
										</div>
									</nav>
									<div class="tab-content border bg-light border-0" id="nav-tabContent" style="background-color: #fff !important;">
										<div class="tab-pane fade {{ (old('make_bike2', $ad->make_bike2 ?? '') === 'Honda') ? 'show active' : '' }}"  id="tab-7" role="tabpanel"aria-labelledby="tab-1-tab">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike2', $ad->make_bike2 ?? '') === 'Kawasaki') ? 'show active' : '' }} " id="tab-8" role="tabpanel"aria-labelledby="tab-2-tab" id="nav-post-model">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
									    </div>
										<div class="tab-pane fade {{ (old('make_bike2', $ad->make_bike2 ?? '') === 'Yamaha') ? 'show active' : '' }} " id="tab-9" role="tabpanel" aria-labelledby="nav-home3-tab">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike2', $ad->make_bike2 ?? '') === 'Suzuki') ? 'show active' : '' }}" id="tab-10" role="tabpanel" aria-labelledby="nav-home4-tab">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike2', $ad->make_bike2 ?? '') === 'Super Power') ? 'show active' : '' }}" id="tab-11" role="tabpanel" aria-labelledby="nav-home5-tab">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike2', $ad->make_bike2 ?? '') === 'Others') ? 'show active' : '' }}" id="tab-12" role="tabpanel" aria-labelledby="nav-home6-tab">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike2', $ad->make_bike2 ?? '') === 'BMW') ? 'show active' : '' }}" id="tab-13" role="tabpanel" aria-labelledby="nav-home6-tab">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike2', $ad->make_bike2 ?? '') === 'CF Moto') ? 'show active' : '' }}" id="tab-14" role="tabpanel" aria-labelledby="nav-home6-tab">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input"	aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike2', $ad->make_bike2 ?? '') === 'Super Asia') ? 'show active' : '' }}" id="tab-15" role="tabpanel" aria-labelledby="nav-home6-tab">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
										<div class="tab-pane fade {{ (old('make_bike2', $ad->make_bike2 ?? '') === 'Super Star') ? 'show active' : '' }}" id="tab-16" role="tabpanel" aria-labelledby="nav-home6-tab">
											<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
											<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('year_update', $ad->year_update) }}" />
											<x-label_title for="title" class="label-span  ">Engine type</x-label_title>
											<x-condition_tablets_five name="engine_type" :options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" :selected="old('engine_type', $ad->engine_type)"/>
											<x-label_title for="title" class="label-span mt-4 ">Engine Capacity</x-label_title>
											<x-brand_input name="engine_capacity" :options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" class="border form-control" value="{{ old('engine_capacity', $ad->engine_capacity) }}" />
											<x-label_title for="title" class="label-span mt-2 ">Km's driven</x-label_title>
											<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('kms_driven_no', $ad->kms_driven_no) }}" />
											<x-label_title for="title" class="label-span ">Ignition type</x-label_title>
											<x-condition_tablets_five name="ignition_type" :options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" :selected=" old('ignition_type', $ad->ignition_type)" />
											<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
											<x-condition_tablets_five name="origin" :options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" :selected="old('origin', $ad->origin)" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
											<x-condition_tablets_five name="condition" :options="['New' => 'option-8','Used' => 'option-9',]" :selected=" old('condition', $ad->condition)" />
											<x-label_title for="title" class="label-span mt-4 ">Registration City</x-label_title>
											<x-brand_input name="registration_city" :options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" class="border form-control" value="{{ old('registration_city', $ad->registration_city) }}" />
										</div>
									</div>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
                                    <hr>
                                    <x-imageuploadedit :adImages="$adImages"/>
                                    @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @error('image_path.*')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[6]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[6]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[6]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)"  />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror

								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[7]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[7]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[7]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition":options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition) " />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[8]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[8]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[8]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition) " />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[9]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[9]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[9]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['1 Seater' => 'option-51','2 Seater' => 'option-52', '3 Seater' => 'option-53', 'Dewan' => 'option-54', 'L Shaped' => 'option-55', 'Sofa Set' => 'option-56', ]" :selected=" old('type', $ad->type)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[10]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[10]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[10]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[11]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[11]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[11]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
									<x-condition_tablets_five name="type" :options="['Computer Chairs' => 'option-51','Executive Chairs' => 'option-52', 'Visitor Chairs' => 'option-53', 'Others' => 'option-54' ]" value="{{ old('type', $ad->type) }}" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[12]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[12]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[12]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition) " />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[13]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[13]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[13]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition) " />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[14]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[14]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[14]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[15]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[15]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[15]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[16]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[16]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[16]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[17]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[17]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[17]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[18]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[18]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[18]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[19]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[19]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[19]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition"
										:options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[20]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[20]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[20]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Product</x-label_title>
									<x-brand_input name="product" :options="['Straighteners','Hair Oils', 'Trimmers', 'Dryers & Stylers', 'Others', 'Anti Lice', 'Beard Oils', 'Curlers', 'Dryers & Stylers', 'Hair Brushes & Combs', 'Hair Fiber','Hair Removers','Shampoos & Conditioners','Wax Heaters','Wigs & Hair Extensions',]" class="border form-control" value="{{ old('product', $ad->product) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition) " />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[21]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[21]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[21]['sub_category_name_type']  }}" class="component">
									<x-label_title for="title" class="label-span mt-2 ">Product</x-label_title>
									<x-brand_input name="product" :options="['Straighteners','Hair Oils', 'Trimmers', 'Dryers & Stylers', 'Others', 'Anti Lice', 'Beard Oils', 'Curlers', 'Dryers & Stylers', 'Hair Brushes & Combs', 'Hair Fiber','Hair Removers','Shampoos & Conditioners','Wax Heaters','Wigs & Hair Extensions',]" class="border form-control" value="{{ old('product', $ad->product) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[22]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[22]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[22]['sub_category_name_type']  }}" class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[23]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[23]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[23]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[24]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[24]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[24]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Make</x-label_title>
									<x-brand_input name="make_car" :options="['Others','Speed', 'Morgan', 'Sohrab', 'Specialized', 'Louis', 'Precision', 'Scott', 'Trinx', 'Speed', 'Fareast','Bianchi', 'Giant', 'Cobalt', 'Continental',]" class="border form-control"  value="{{ old('make_car', $ad->make_car) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[25]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[25]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[25]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Make</x-label_title>
									<x-brand_input name="make_car" :options="['Others','Speed', 'Morgan', 'Sohrab', 'Specialized', 'Louis', 'Precision', 'Scott', 'Trinx', 'Speed', 'Fareast','Bianchi', 'Giant', 'Cobalt', 'Continental',]" class="border form-control" value="{{ old('make_car', $ad->make_car) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[26]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[26]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[26]['sub_category_name_type']  }}" class="component">
									<x-label_title for="title" class="label-span mt-2 ">Make</x-label_title>
									<x-brand_input name="make_car" :options="['Others','Speed', 'Morgan', 'Sohrab', 'Specialized', 'Louis', 'Precision', 'Scott', 'Trinx', 'Speed', 'Fareast','Bianchi', 'Giant', 'Cobalt', 'Continental',]" class="border form-control" value="{{ old('make_car', $ad->make_car) }}" />
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[27]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[27]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[27]['sub_category_name_type']  }}"
									class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[28]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[28]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[28]['sub_category_name_type']  }}" class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								@elseif($sub_cat_type == $subCategoryNameTypes[29]['sub_category_name_type'])
								<div id="{{ $sub_cat_type == $subCategoryNameTypes[29]['sub_category_name_type'] ? $sub_cat_type : $subCategoryNameTypes[29]['sub_category_name_type']  }}" class="component">
									<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
									<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Condition' => 'option-2',]" :selected=" old('condition', $ad->condition)" />
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" value="{{ old('price', $ad->price) }}" />
									<hr>
									<x-imageuploadedit :adImages="$adImages"/>
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
                            @endif
							
							    <span class="message-text">
								<span class="input-message">Maximum 20 images. Rearrange or delete as necessary:</span>
								</span>
								<x-location_city name="location" value="{{ old('location', $ad->location) }}" />
								@error('location')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
								<hr>
								<x-profile :image="asset('assets/images/Profile-Male-PNG.png')"  name="review_name"  :name="Auth::check() ? Auth::user()->name : 'Guest'"  :phone="Auth::check() ? Auth::user()->phone_no : 'N/A'"  :showPhoneCheckbox="true" 
                                    />
								<hr>
								<x-post_button type="submit" class="post-ad-btn" label="Update Post" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>   
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the values from the hidden input fields
        const sub_cat_type = document.getElementById('sub_category_name_type').value;
        const sub_cat = document.getElementById('sub_category_name').value;
        const cat_name = document.getElementById('category_name').value;
        console.log(sub_cat_type);
    console.log(sub_cat);
    console.log(cat_name);
        // Hide all components
        document.querySelectorAll('.component').forEach(component => {
            component.classList.remove('active');
        });

        // Show the component based on sub_category_name_type value
		if (sub_cat_type) {
        const component = document.getElementById(sub_cat_type);
        if (component) {
            component.classList.add('active');
        }
    } else if (sub_cat) {
        const component = document.getElementById(sub_cat);
        if (component) {
            component.classList.add('active');
        }
    } else if (cat_name) {
        const component = document.getElementById(cat_name);
        if (component) {
            component.classList.add('active');
        }
    }
    });
</script>
