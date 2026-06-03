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

			<div class="col-lg-12 col-12 col-md-12 mx-auto mb-5">
				<div class="top-bar bg-light pb-2">
					<div class="logo">
						<a href="{{ url('/post_ad') }}" class="home-link me-4 text-decoration-none text-dark">
							<i class="fas fa-arrow-left fa-lg pt-4 ps-2"></i>
						</a>
						<a href="{{ url('/') }}">
							<img src="assets/images/logo.svg" class="lazyload" alt="Logo">
						</a>
						@auth
						<button class="border-0 bg-transparent float-end mt-3">
							<span>{{ Auth::user()->name }}</span>

						</button>
						@endauth
					</div>
				</div>
			</div>
			<div class="row">
				<div class="  col-md-10 mx-auto">
					<h4 class="text-center heading-post text-uppercase">POST YOUR AD</h4>
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
					<form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" id="imageForm">
						@csrf
						<input type="hidden" name="category_name" value="{{ $cat }}">
						<input type="hidden" name="sub_category_name" value="{{$sub_cat}}">
						<input type="hidden" name="sub_category_name_type" value="{{$sub_cat_type}}">
						@auth
						<input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
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
									<span class="text-bread">{{$cat}} / {{$sub_cat}} / {{ $sub_cat_type}}
									</span>
									<a href="{{ url('/post_ad') }}" class="text-decoration-none text-dark"><button type="button" class=" ms-3 bg-transparent  change-attribute" style="font-size: 14px;">Change</button>
									</a>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<h4 class="mt-4 choose">INCLUDE SOME DETAILS</h4>
								<x-label_title for="title" class="label-span">Ad Title</x-label_title>
								<x-input_title id="title" type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter your ad title" required/>
								@error('title')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<x-label_title for="description" class="label-span text-wrap">Description</x-label_title>
								<x-textarea_dec id="description" name="description" spellcheck="true" class="form-control" rows="6" autocomplete="nope" value="{{ old('description') }}" required />
								@error('description')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							
									<div id="{{ $sub_cat == $subCategories[0]->sub_category_name ? $sub_cat : $subCategories[0]->sub_category_name  }}" class="component">
											<!-- tablets  -->
										<x-label_title for="title" class="label-span">Brand</x-label_title>
										<x-brand_input name="brand" :options="['Apple', 'Samsung', 'Other Tablets', 'Lenovo', 'Huawei', 'Others', 'Dany Tabs', 'Amazon', 'Asus', 'Dell', 'Alcatel', 'Huion']" placeholder="Select brand"  />
										
										<x-label_title for="title" class="label-span">Condition</x-label_title>
										<x-condition_tablets_five name="condition" :options="['New' => 'option-10','Used' => 'option-11','Open Box' => 'option-12','Refurbished' => 'option-13','For Part or Not Working' => 'option-14', ]" />
										<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
										<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" />
									<hr>
									</div>
									
									<div id="{{ $sub_cat == $subCategories[2]->sub_category_name ? $sub_cat : $subCategories[2]->sub_category_name  }}" class="component">
										<!-- smart watch  -->
										<x-label_title for="title" class="label-span mt-4">Brand</x-label_title>
										<x-brand_input name="brand" :options="['Apple', 'Samsung', 'Other Tablets', 'Lenovo', 'Huawei', 'Others', 'Dany Tabs', 'Amazon', 'Asus', 'Dell', 'Alcatel', 'Huion']" class="border form-control" placeholder="Select brand" />
										<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" />
										<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
										<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" />
										
									</div>
									<div id="{{ $sub_cat == $subCategories[3]->sub_category_name ? $sub_cat : $subCategories[3]->sub_category_name  }}"
										class="component">
										<!--  mobiles  -->
										<x-label_title for="title" class="label-span mt-4">Brand</x-label_title>
										<x-brand_input name="brand" :options="['Apple', 'Samsung', 'Other Tablets', 'Lenovo', 'Huawei', 'Others', 'Dany Tabs', 'Amazon', 'Asus', 'Dell', 'Alcatel', 'Huion']" class="border form-control" placeholder="Select brand" />
										<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
										<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" />
										
									<hr>
									</div>
									<div id="{{ $sub_cat == $subCategories[4]->sub_category_name ? $sub_cat : $subCategories[4]->sub_category_name  }}" class="component">
										<!--  car  -->
										<x-label_title for="title" class="label-span mt-4">Make</x-label_title>
										<x-brand_input name="make_car" :options="['Suzuki', 'Toyota', 'Honda', 'Daihatsu', 'Adam', 'Audi', 'BAIC', 'Bentley', 'BMW', 'Buick', 'Cadilac', 'Changan']" class="border form-control" />
										
									<hr>
									</div>
									
									<div id="{{ $sub_cat == $subCategories[5]->sub_category_name ? $sub_cat : $subCategories[5]->sub_category_name  }}"
										class="component">
										<!--  car installemnet  -->
										<x-label_title for="title" class="label-span mt-4">Make</x-label_title>
										<x-brand_input name="make_car" :options="['Suzuki', 'Toyota', 'Honda', 'Daihatsu', 'Adam', 'Audi', 'BAIC', 'Bentley', 'BMW', 'Buick', 'Cadilac', 'Changan']" class="border form-control" placeholder="Select brand" />
										
									<hr>
									</div>
								
									<div id="{{ $sub_cat == $subCategories[6]->sub_category_name ? $sub_cat : $subCategories[6]->sub_category_name  }}"
										class="component">
										<!--  car accessory  -->
										<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
                                  
									<div id="{{ $sub_cat == $subCategories[7]->sub_category_name ? $sub_cat : $subCategories[7]->sub_category_name  }}"
										class="component">
										<!--  spare part  -->
										<x-label_title for="title" class="label-span mt-4 ">Type</x-label_title>
										<x-condition_tablets_five name="type" :options="['Car Parts' => 'option-62','Other Parts' => 'option-63',]" />
										<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat == $subCategories[8]->sub_category_name ? $sub_cat : $subCategories[8]->sub_category_name }}" class="component">
										<!--  buses vans  -->
										<x-label_title for="year" class="label-span mt-2">Year</x-label_title>
										<x-input_number_year type="number" name="year_update[]" class="form-control" value="{{ old('year_update.0') }}" />
										<x-label_title for="kms_driven" class="label-span mt-2">KM's driven</x-label_title>
										<x-input_number_year type="number" name="kms_driven_no[]" class="form-control" value="{{ old('kms_driven_no.0') }}" />
										<x-label_title for="title" class="label-span mt-2">Condition</x-label_title>
										<x-condition_tablets_five name="condition" :options="['New' => 'option-1', 'Used' => 'option-2']" />
										
									</div>
                                    
									<div id="{{ $sub_cat == $subCategories[9]->sub_category_name ? $sub_cat : $subCategories[9]->sub_category_name }}" class="component">
										<!--  ricksha  -->
										<x-label_title for="title" class="label-span mt-2">Year</x-label_title>
										<x-input_number_year type="number" name="year_update[]" class="form-control" />
										<x-label_title for="title" class="label-span mt-2">KM's driven</x-label_title>
										<x-input_number_year type="number" name="kms_driven_no[]" class="form-control" />
										<x-label_title for="title" class="label-span mt-2">Condition</x-label_title>
										<x-condition_tablets_five name="condition" :options="['New' => 'option-1', 'Used' => 'option-2']" />
										
									</div>
									
									<div id="{{ $sub_cat == $subCategories[10]->sub_category_name ? $sub_cat : $subCategories[10]->sub_category_name  }}"
										class="component">
										<!--  boat  -->
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat == $subCategories[11]->sub_category_name ? $sub_cat : $subCategories[11]->sub_category_name  }}"
										class="component">
										<!--  trackter  -->
										<x-label_title for="title" class="label-span mt-2">Year</x-label_title>
										<x-input_number_km_driven type="number" name="year_update[]" class="form-control" />
										<x-label_title for="title" class="label-span mt-2">KM's driven</x-label_title>
										<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control" />
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Used' => 'option-2',]" />
										
										
									</div>
                                   
									<div id="{{ $sub_cat == $subCategories[12]->sub_category_name ? $sub_cat : $subCategories[12]->sub_category_name  }}"
										class="component">
										<!-- Land sale content here -->
										<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
										<x-condition_tablets_five name="type" :options="['Agricultural' => 'option-39', 'Commercial Plots' => 'option-40', 'Files' => 'option-41', 'Industrial Land' => 'option-42', 'Residential Plots' => 'option-43', 'Plot Form' => 'option-44']" />
										<x-label_title for="title" class="label-span mt-4">Feature</x-label_title>
										<x-feature_eight name="feature" :checkboxes="[ ['label' => 'Corner Plot', 'id' => 'checkbox-1', 'labelClass' => 'checkbox-option-1'], ['label' => 'Park Facing', 'id' => 'checkbox-2', 'labelClass' => 'checkbox-option-2'], ['label' => 'Disputed', 'id' => 'checkbox-3', 'labelClass' => 'checkbox-option-3'], ['label' => 'Sewerage', 'id' => 'checkbox-4', 'labelClass' => 'checkbox-option-4'], ['label' => 'Electricity', 'id' => 'checkbox-5', 'labelClass' => 'checkbox-option-5'],['label' => 'Water Supply', 'id' => 'checkbox-6', 'labelClass' => 'checkbox-option-6'],['label' => 'Gas Supply', 'id' => 'checkbox-7', 'labelClass' => 'checkbox-option-7'],['label' => 'Boundary Wall', 'id' => 'checkbox-8', 'labelClass' => 'checkbox-option-8']]" />
										<x-label_title for="title" class="label-span mt-2 ">Area unit</x-label_title>
										<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-39', 'Marla' => 'option-40', 'Square Feet' => 'option-41', 'Square Meter' => 'option-42', 'Square Yards' => 'option-43']" />
										<x-input_number_sale_land type="number" name="area_square[]" class="form-control" />
										
									</div>               
									<div id="{{ $sub_cat == $subCategories[13]->sub_category_name ? $sub_cat : $subCategories[13]->sub_category_name }}" class="component">
										<!-- Houses content here -->
										<x-label_title for="furnished" class="label-span mt-2">Furnished</x-label_title>
										<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20', 'Furnished' => 'option-21']" />

										<x-label_title for="pro_sale_house_bedroom" class="label-span mt-4">Bedrooms</x-label_title>
										<x-brand_input name="pro_sale_house_bedroom" :options="['','1', '2', '3', '4', '5', '6', 'Studio']" class="border form-control" placeholder="Select bedroom" />

										<x-label_title for="pro_sale_house_bathroom" class="label-span mt-2">Bathrooms</x-label_title>
										<x-brand_input name="pro_sale_house_bathroom" :options="['','1', '2', '3', '4', '5', '6', '7']" class="border form-control" placeholder="Select bathroom"/>

										<x-label_title for="construction_state_new" class="label-span mt-2">Construction State</x-label_title>
										<x-condition_tablets_five name="construction_state_new" :options="['Grey Structure' => 'option-15', 'Finished' => 'option-16']" />

										<x-label_title for="feature" class="label-span mt-3">Feature</x-label_title>
										<x-feature_twelve name="feature" :checkboxes="[ ['name' => 'property_servant', 'id' => 'checkbox-property_servant', 'labelClass' => 'checkbox-option-property_servant', 'label' => 'Servant Quarters'], ['name' => 'property_drawing', 'id' => 'checkbox-property_drawing', 'labelClass' => 'checkbox-option-property_drawing', 'label' => 'Drawing Room'], ['name' => 'property_dining', 'id' => 'checkbox-property_dining', 'labelClass' => 'checkbox-option-property_dining', 'label' => 'Dining Room'], ['name' => 'property_kitchen', 'id' => 'checkbox-property_kitchen', 'labelClass' => 'checkbox-option-property_kitchen', 'label' => 'Kitchen'], ['name' => 'property_study', 'id' => 'checkbox-property_study', 'labelClass' => 'checkbox-option-property_study', 'label' => 'Study Room'], ['name' => 'property_prayer', 'id' => 'checkbox-property_prayer', 'labelClass' => 'checkbox-option-property_prayer', 'label' => 'Prayer Room'], ['name' => 'property_powder', 'id' => 'checkbox-property_powder', 'labelClass' => 'checkbox-option-property_powder', 'label' => 'Powder Room'], ['name' => 'property_gym', 'id' => 'checkbox-property_gym', 'labelClass' => 'checkbox-option-property_gym', 'label' => 'Gym'], ['name' => 'property_store', 'id' => 'checkbox-property_store', 'labelClass' => 'checkbox-option-property_store', 'label' => 'Store Room'], ['name' => 'property_steam', 'id' => 'checkbox-property_steam', 'labelClass' => 'checkbox-option-property_steam', 'label' => 'Steam Room'], ['name' => 'property_lounge', 'id' => 'checkbox-property_lounge', 'labelClass' => 'checkbox-option-property_lounge', 'label' => 'Lounge or Sitting Room'], ['name' => 'property_laundry', 'id' => 'checkbox-property_laundry', 'labelClass' => 'checkbox-option-property_laundry', 'label' => 'Laundry Room'] ]" />

										<x-label_title for="area_unit" class="label-span mt-2">Area Unit</x-label_title>
										<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7', 'Marla' => 'option-8', 'Square Feet' => 'option-9', 'Square Meter' => 'option-10', 'Square Yards' => 'option-11']" />
										<x-input_number_sale_land type="number" name="area_square[]" class="form-control" />
										
								    </div>
                              
									<div id="{{ $sub_cat == $subCategories[14]->sub_category_name ? $sub_cat : $subCategories[14]->sub_category_name }}" class="component">
										<!-- Appartment sale  -->
										<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
										<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20', 'Furnished' => 'option-21']" />

										<x-label_title for="pro_sale_appart_bedroom" class="label-span mt-4 ">Bedrooms</x-label_title>
										<x-brand_input name="pro_sale_appart_bedroom" :options="['','1', '2', '3', '4', '5', '6', 'Studio']" class="border form-control" placeholder="Select bedrooms"  />

										<x-label_title for="pro_sale_appart_bathroom" class="label-span mt-2 ">Bathrooms</x-label_title>
										<x-brand_input name="pro_sale_appart_bathroom" :options="['1', '2', '3', '4', '5', '6', '7']" class="border form-control" placeholder="Select bathrooms" />
										<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
										<x-brand_input name="pro_sale_appart_floor_level" :options="['','1', '2', '3', '4', '5', '6', '7', 'Ground',]" class="border form-control" placeholder="Select floor level" />
										<x-label_title for="construction_state_new" class="label-span mt-2 ">Construction State</x-label_title>
										<x-condition_tablets_five name="construction_state_new" :options="['Grey Structure' => 'option-15', 'Finished' => 'option-16']" />

										<x-label_title for="title" class="label-span mt-3">Feature</x-label_title>
										<x-feature_twelve name="feature" :checkboxes="[ ['name' => 'property_servant-1', 'id' => 'checkbox-property_servant-1', 'labelClass' => 'checkbox-option-property_servant-1', 'label' => 'Servant Quarters'], ['name' => 'property_drawing-2', 'id' => 'checkbox-property_drawing-2', 'labelClass' => 'checkbox-option-property_drawing-2', 'label' => 'Drawing Room'], ['name' => 'property_dining-3', 'id' => 'checkbox-property_dining-3', 'labelClass' => 'checkbox-option-property_dining-3', 'label' => 'Dining Room'], ['name' => 'property_kitchen-4', 'id' => 'checkbox-property_kitchen-4', 'labelClass' => 'checkbox-option-property_kitchen-4', 'label' => 'Kitchen'], ['name' => 'property_study-5', 'id' => 'checkbox-property_study-5', 'labelClass' => 'checkbox-option-property_study-5', 'label' => 'Study Room'], ['name' => 'property_prayer-6', 'id' => 'checkbox-property_prayer-6', 'labelClass' => 'checkbox-option-property_prayer-6', 'label' => 'Prayer Room'], ['name' => 'property_powder-7', 'id' => 'checkbox-property_powder-7', 'labelClass' => 'checkbox-option-property_powder-7', 'label' => 'Powder Room'], ['name' => 'property_gym-8', 'id' => 'checkbox-property_gym-8', 'labelClass' => 'checkbox-option-property_gym-8', 'label' => 'Gym'], ['name' => 'property_store-9', 'id' => 'checkbox-property_store-9', 'labelClass' => 'checkbox-option-property_store-9', 'label' => 'Store Room'], ['name' => 'property_steam-10', 'id' => 'checkbox-property_steam-10', 'labelClass' => 'checkbox-option-property_steam-10', 'label' => 'Steam Room'], ['name' => 'property_lounge-11', 'id' => 'checkbox-property_lounge-11', 'labelClass' => 'checkbox-option-property_lounge-11', 'label' => 'Lounge or Sitting Room'], ['name' => 'property_laundry-12', 'id' => 'checkbox-property_laundry-12', 'labelClass' => 'checkbox-option-property_laundry-12', 'label' => 'Laundry Room'] ]" />

										<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
										<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7', 'Marla' => 'option-8', 'Square Feet' => 'option-9', 'Square Meter' => 'option-10', 'Square Yards' => 'option-11']" />
										<x-input_number_sale_land type="number" name="area_square[]" class="form-control" />
										
										
									</div>
									
									<div id="{{ $sub_cat == $subCategories[15]->sub_category_name ? $sub_cat : $subCategories[15]->sub_category_name  }}"
										class="component">
										<!--  shope office sale  -->
										<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
										<x-condition_tablets_five name="type" :options="['Office' => 'option-26','Shop' => 'option-27', 'Warehouse' => 'option-28','Factory' => 'option-29','Building' => 'option-30',]" />
										<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
										<x-brand_input name="pro_sale_shope_floor_level" :options="['','1', '2', '3', '4', '5', '6', '7', 'Ground',]" class="border form-control" placeholder="select floor level" />
										<x-label_title for="title" class="label-span mt-4">Feature</x-label_title>
										<x-feature_eight_second name="feature" :checkboxes="[ ['name' => 'property_parking', 'id' => 'checkbox-33', 'labelClass' => 'checkbox-option-33', 'label' => 'Parking Spaces Available'],['name' => 'property_lobby', 'id' => 'checkbox-34', 'labelClass' => 'checkbox-option-34', 'label' => 'Lobby in Building'],['name' => 'property_double', 'id' => 'checkbox-35', 'labelClass' => 'checkbox-option-35', 'label' => 'Double Glazed Windows'],['name' => 'property_air', 'id' => 'checkbox-36', 'labelClass' => 'checkbox-option-36', 'label' => 'Central Air Conditioning'],['name' => 'property_heating', 'id' => 'checkbox-37', 'labelClass' => 'checkbox-option-37', 'label' => 'Central Heating'],['name' => 'property_electricity', 'id' => 'checkbox-38', 'labelClass' => 'checkbox-option-38', 'label' => 'Electricity Backup'],['name' => 'property_waste', 'id' => 'checkbox-39', 'labelClass' => 'checkbox-option-39', 'label' => 'Waste Disposal'],['name' => 'property_elevators', 'id' => 'checkbox-40', 'labelClass' => 'checkbox-option-40', 'label' => 'Elevators']]" />
										<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
										<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" />
										<x-input_number_sale_land type="number" name="area_square[]" class="form-control" />
										
									</div>
									
									<div id="{{ $sub_cat == $subCategories[16]->sub_category_name ? $sub_cat : $subCategories[16]->sub_category_name  }}"
										class="component">
										<!--  portion sale  -->
										<x-label_title for="title" class="label-span mt-2">Furnished</x-label_title>
										<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20', 'Furnished' => 'option-21']" />
										<x-label_title for="title" class="label-span mt-4">Bedrooms</x-label_title>
										<x-bedroom_one name="pro_sale_portion_bedroom" :options="['', '1', '2', '3', '4', '5', '6', 'Studio']" class="border form-control" placeholder="Select bedrooms" />
										<x-label_title for="title" class="label-span mt-2">Bathrooms</x-label_title>
										<x-bedroom_one name="pro_sale_portion_bathroom" :options="[ ' ', '1', '2', '3', '4', '5', '6', '7']" class="border form-control" placeholder="Select bathrooms" />
										<x-label_title for="title" class="label-span mt-3">Feature</x-label_title>
										<x-feature_twelve name="feature" :checkboxes="[['name' => 'property_servant', 'id' => 'checkbox-41', 'labelClass' => 'checkbox-option-41', 'label' => 'Servant Quarters'], ['name' => 'property_drawing', 'id' => 'checkbox-42', 'labelClass' => 'checkbox-option-42', 'label' => 'Drawing Room'],['name' => 'property_dining', 'id' => 'checkbox-43', 'labelClass' => 'checkbox-option-43', 'label' => 'Dining Room'], ['name' => 'property_kitchen', 'id' => 'checkbox-44', 'labelClass' => 'checkbox-option-44', 'label' => 'Kitchen'],['name' => 'property_study', 'id' => 'checkbox-45', 'labelClass' => 'checkbox-option-45', 'label' => 'Study Room'],['name' => 'property_prayer', 'id' => 'checkbox-46', 'labelClass' => 'checkbox-option-46', 'label' => 'Prayer Room'],['name' => 'property_powder', 'id' => 'checkbox-47', 'labelClass' => 'checkbox-option-47', 'label' => 'Powder Room'], ['name' => 'property_gym', 'id' => 'checkbox-48', 'labelClass' => 'checkbox-option-48', 'label' => 'Gym'],  ['name' => 'property_store', 'id' => 'checkbox-49', 'labelClass' => 'checkbox-option-49', 'label' => 'Store Room'], ['name' => 'property_steam', 'id' => 'checkbox-50', 'labelClass' => 'checkbox-option-50', 'label' => 'Steam Room'],['name' => 'property_lounge', 'id' => 'checkbox-51', 'labelClass' => 'checkbox-option-51', 'label' => 'Lounge or Sitting Room'],['name' => 'property_laundry', 'id' => 'checkbox-52', 'labelClass' => 'checkbox-option-52', 'label' => 'Laundry Room'],]" />
										<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
										
										<x-bedroom_one name="pro_sale_portion_floor_level" :options="[ '', '1', '2', '3', '4', '5', '6', '7', 'Ground']" class="border form-control" placeholder="Select floor level" />
										<x-label_title for="title" class="label-span mt-2">Area Unit</x-label_title>
										<x-condition_tablets_five name="area_unit" :options="['Kanal' => 'option-7', 'Marla' => 'option-8', 'Square Feet' => 'option-9', 'Square Meter' => 'option-10', 'Square Yards' => 'option-11']" />
										<x-input_number_sale_land type="number" name="area_square[]" class="form-control" />
										
									</div>
								
									<div id="{{ $sub_cat == $subCategories[17]->sub_category_name ? $sub_cat : $subCategories[17]->sub_category_name  }}"
										class="component">
										<!--  house rent -->
										<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
										<x-condition_tablets_five name="furnished" :options="['Unfurnished' => 'option-20','Furnished' => 'option-21',]" />
										<x-label_title for="title" class="label-span mt-4 ">Bedrooms</x-label_title>
										<x-bedroom_one name="pro_rent_house_bedroom"
											:options="['','1', '2', '3', '4', '5', '6', 'Studio']"
											class="border form-control" placeholder="Select bedrooms" />
										<x-label_title for="title" class="label-span mt-2 ">Bathrooms</x-label_title>
										<x-bedroom_one name="pro_rent_house_bathroom"
											:options="['','1', '2', '3', '4', '5', '6', '7']"
											class="border form-control" placeholder="Select bathrooms" />
										<x-label_title for="title" class="label-span mt-2 ">No of storeys</x-label_title>
										<x-condition_tablets_five name="no_storeys" class="px-3"
											:options="[' 1 ' => 'option-22',' 2 ' => 'option-23', ' 3 ' => 'option-24', ' 4+ ' => 'option-25',]" />
										<x-label_title for="title" class="label-span mt-2 ">Contruction
											State</x-label_title>
											<x-condition_tablets_five name="construction_state_new_rent_house"
											:options="['Grey Structure' => 'option-15','Finished' => 'option-16',]" />

										<x-label_title for="title" class="label-span mt-3">Feature</x-label_title>
										<x-feature_twelve name="feature"
											:checkboxes="[ ['name' => 'property_servant', 'id' => 'checkbox-53', 'labelClass' => 'checkbox-option-53', 'label' => 'Servant Quarters'], ['name' => 'property_drawing', 'id' => 'checkbox-54', 'labelClass' => 'checkbox-option-54', 'label' => 'Drawing Room'],['name' => 'property_dining', 'id' => 'checkbox-55', 'labelClass' => 'checkbox-option-55', 'label' => 'Dining Room'], ['name' => 'property_kitchen', 'id' => 'checkbox-56', 'labelClass' => 'checkbox-option-56', 'label' => 'Kitchen'],['name' => 'property_study', 'id' => 'checkbox-57', 'labelClass' => 'checkbox-option-57', 'label' => 'Study Room'],['name' => 'property_prayer', 'id' => 'checkbox-58', 'labelClass' => 'checkbox-option-58', 'label' => 'Prayer Room'],['name' => 'property_powder', 'id' => 'checkbox-59', 'labelClass' => 'checkbox-option-59', 'label' => 'Powder Room'],['name' => 'property_gym', 'id' => 'checkbox-60', 'labelClass' => 'checkbox-option-60', 'label' => 'Gym'], ['name' => 'property_store', 'id' => 'checkbox-61', 'labelClass' => 'checkbox-option-61', 'label' => 'Store Room'], ['name' => 'property_steam', 'id' => 'checkbox-62', 'labelClass' => 'checkbox-option-62', 'label' => 'Steam Room'],['name' => 'property_lounge', 'id' => 'checkbox-63', 'labelClass' => 'checkbox-option-63', 'label' => 'Lounge or Sitting Room'],['name' => 'property_laundry', 'id' => 'checkbox-64', 'labelClass' => 'checkbox-option-64', 'label' => 'Laundry Room'],]" />
										<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
										<x-condition_tablets_five name="area_unit"
											:options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" />
											<x-input_number_sale_land type="number" name="area_square[]" class="form-control" />
										
									</div>
								
									<div id="{{ $sub_cat == $subCategories[18]->sub_category_name ? $sub_cat : $subCategories[18]->sub_category_name  }}"
										class="component">
										<!--  appartment rent  -->
										<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
										<x-condition_tablets_five name="furnished"
											:options="['Unfurnished' => 'option-20','Furnished' => 'option-21',]" />
										<x-label_title for="title" class="label-span mt-4 ">Bedrooms</x-label_title>
										<x-bedroom_one name="pro_rent_appart_bedroom"
											:options="['','1', '2', '3', '4', '5', '6', 'Studio']"
											class="border form-control" placeholder="Select bedrooms"/>
										<x-label_title for="title" class="label-span mt-2 ">Bathrooms</x-label_title>
										<x-bedroom_one name="pro_rent_apart_bathroom"
											:options="['','1', '2', '3', '4', '5', '6', '7']"
											class="border form-control" placeholder="Select bathrooms"/>
										<x-label_title for="title" class="label-span mt-3">Feature</x-label_title>
										<x-feature_twelve name="feature"
											:checkboxes="[['name' => 'property_servant', 'id' => 'checkbox-65', 'labelClass' => 'checkbox-option-65', 'label' => 'Servant Quarters'],['name' => 'property_drawing', 'id' => 'checkbox-66', 'labelClass' => 'checkbox-option-66', 'label' => 'Drawing Room'],['name' => 'property_dining', 'id' => 'checkbox-67', 'labelClass' => 'checkbox-option-67', 'label' => 'Dining Room'],['name' => 'property_kitchen', 'id' => 'checkbox-68', 'labelClass' => 'checkbox-option-68', 'label' => 'Kitchen'],['name' => 'property_study', 'id' => 'checkbox-69', 'labelClass' => 'checkbox-option-69', 'label' => 'Study Room'],['name' => 'property_prayer', 'id' => 'checkbox-70', 'labelClass' => 'checkbox-option-70', 'label' => 'Prayer Room'],['name' => 'property_powder', 'id' => 'checkbox-71', 'labelClass' => 'checkbox-option-71', 'label' => 'Powder Room'],['name' => 'property_gym', 'id' => 'checkbox-72', 'labelClass' => 'checkbox-option-72', 'label' => 'Gym'],['name' => 'property_store', 'id' => 'checkbox-73', 'labelClass' => 'checkbox-option-73', 'label' => 'Store Room'],['name' => 'property_steam', 'id' => 'checkbox-74', 'labelClass' => 'checkbox-option-74', 'label' => 'Steam Room'],['name' => 'property_lounge', 'id' => 'checkbox-75', 'labelClass' => 'checkbox-option-75', 'label' => 'Lounge or Sitting Room'],['name' => 'property_laundry', 'id' => 'checkbox-76', 'labelClass' => 'checkbox-option-76', 'label' => 'Laundry Room'],]" />
										<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
										<x-bedroom_one name="pro_rent_appart_floor"
											:options="['','1', '2', '3', '4', '5', '6', '7', 'Ground',]"
											class="border form-control" placeholder="Select Floor Level" />
										<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
										<x-condition_tablets_five name="area_unit"
											:options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" />
											<x-input_number_sale_land type="number" name="area_square[]" class="form-control" />
										
									</div>
									
									<div id="{{ $sub_cat == $subCategories[19]->sub_category_name ? $sub_cat : $subCategories[19]->sub_category_name  }}"
										class="component">
										<!--  portion rent  -->
										<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
										<x-condition_tablets_five name="furnished"
											:options="['Unfurnished' => 'option-20','Furnished' => 'option-21',]" />
										<x-label_title for="title" class="label-span mt-4 ">Bedrooms</x-label_title>
										<x-bedroom_one name="bedroom2"
											:options="['Selected','1', '2', '3', '4', '5', '6+', 'Studio']"
											class="border form-control" placeholder="Select bathrooms" />
										<x-label_title for="title" class="label-span mt-2 ">Bathrooms</x-label_title>
										<x-bedroom_one name="bathroom2"
											:options="['Selected','1', '2', '3', '4', '5', '6', '7+']"
											class="border form-control" placeholder="Select bathrooms" />
										<x-label_title for="title" class="label-span mt-3">Feature</x-label_title>
										<x-feature_twelve name="feature"
											:checkboxes="[['name' => 'property_servant', 'id' => 'checkbox-77', 'labelClass' => 'checkbox-option-77', 'label' => 'Servant Quarters'], ['name' => 'property_drawing', 'id' => 'checkbox-78', 'labelClass' => 'checkbox-option-78', 'label' => 'Drawing Room'],['name' => 'property_dining', 'id' => 'checkbox-79', 'labelClass' => 'checkbox-option-79', 'label' => 'Dining Room'], ['name' => 'property_kitchen', 'id' => 'checkbox-80', 'labelClass' => 'checkbox-option-80', 'label' => 'Kitchen'],['name' => 'property_study', 'id' => 'checkbox-81', 'labelClass' => 'checkbox-option-81', 'label' => 'Study Room'],['name' => 'property_prayer', 'id' => 'checkbox-82', 'labelClass' => 'checkbox-option-82', 'label' => 'Prayer Room'],['name' => 'property_powder', 'id' => 'checkbox-83', 'labelClass' => 'checkbox-option-83', 'label' => 'Powder Room'], ['name' => 'property_gym', 'id' => 'checkbox-84', 'labelClass' => 'checkbox-option-84', 'label' => 'Gym'],  ['name' => 'property_store', 'id' => 'checkbox-85', 'labelClass' => 'checkbox-option-85', 'label' => 'Store Room'], ['name' => 'property_steam', 'id' => 'checkbox-86', 'labelClass' => 'checkbox-option-86', 'label' => 'Steam Room'],['name' => 'property_lounge', 'id' => 'checkbox-87', 'labelClass' => 'checkbox-option-87', 'label' => 'Lounge or Sitting Room'],['name' => 'property_laundry', 'id' => 'checkbox-88', 'labelClass' => 'checkbox-option-88', 'label' => 'Laundry Room'],]" />
										<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
										<x-bedroom_one name="floor_level2"
											:options="['Selected','1', '2', '3', '4', '5', '6', '7+', 'Ground',]"
											class="border form-control" placeholder="Select floor level" />
										<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
										<x-condition_tablets_five name="area_unit"
											:options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" />
											<x-input_number_sale_land type="number" name="area_square[]" class="form-control" />
										
									</div>
									
									<div id="{{ $sub_cat == $subCategories[20]->sub_category_name ? $sub_cat : $subCategories[20]->sub_category_name  }}"
										class="component">
										<!--  shope rent  -->
										<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
										<x-condition_tablets_five name="type"
											:options="['Office' => 'option-26','Shop' => 'option-27', 'Warehouse' => 'option-28','Factory' => 'option-29','Building' => 'option-30',]" />
										<x-label_title for="title" class="label-span mt-2 ">Bathrooms</x-label_title>
										<x-bedroom_one name="rent_shope_bathroom"
											:options="['Selected','1', '2', '3', '4', '5', '6', '7+']"
											class="border form-control" placeholder="Select bathrooms" />
										<x-label_title for="title" class="label-span mt-4">Feature</x-label_title>
										<x-feature_eight_second name="feature" :checkboxes="[ ['name' => 'property_parking', 'id' => 'checkbox-33', 'labelClass' => 'checkbox-option-33', 'label' => 'Parking Spaces Available'],['name' => 'property_lobby', 'id' => 'checkbox-34', 'labelClass' => 'checkbox-option-34', 'label' => 'Lobby in Building'],['name' => 'property_double', 'id' => 'checkbox-35', 'labelClass' => 'checkbox-option-35', 'label' => 'Double Glazed Windows'],['name' => 'property_air', 'id' => 'checkbox-36', 'labelClass' => 'checkbox-option-36', 'label' => 'Central Air Conditioning'],['name' => 'property_heating', 'id' => 'checkbox-37', 'labelClass' => 'checkbox-option-37', 'label' => 'Central Heating'],['name' => 'property_electricity', 'id' => 'checkbox-38', 'labelClass' => 'checkbox-option-38', 'label' => 'Electricity Backup'],['name' => 'property_waste', 'id' => 'checkbox-39', 'labelClass' => 'checkbox-option-39', 'label' => 'Waste Disposal'],['name' => 'property_elevators', 'id' => 'checkbox-40', 'labelClass' => 'checkbox-option-40', 'label' => 'Elevators']]" />
										<x-label_title for="title" class="label-span mt-4 ">Floor level</x-label_title>
										<x-bedroom_one name="floor_level_shope_rent"
											:options="['Selected','1', '2', '3', '4', '5', '6', '7+',]"
											class="border form-control mt-0 pt-0" />
										<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
										<x-condition_tablets_five name="area_unit"
											:options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" />
											<x-input_number_sale_land type="number" name="area_square[]" class="form-control" />
										
									</div>
									
									<div id="{{ $sub_cat == $subCategories[21]->sub_category_name ? $sub_cat : $subCategories[21]->sub_category_name  }}"
										class="component">
										<!--  room rent  -->
										<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
										<x-condition_tablets_five name="furnished"
											:options="['Unfurnished' => 'option-20','Furnished' => 'option-21',]" />
										<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
										<x-condition_tablets_five name="type"
											:options="['Single' => 'option-60','Sharing' => 'option-61', ]" />
										
									</div>
									
									<div id="{{ $sub_cat == $subCategories[22]->sub_category_name ? $sub_cat : $subCategories[22]->sub_category_name  }}"
										class="component">
										<!--  roomate rent  -->
										<x-label_title for="title" class="label-span mt-2 ">Furnished</x-label_title>
										<x-condition_tablets_five name="furnished"
											:options="['Unfurnished' => 'option-20','Furnished' => 'option-21',]" />
										<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
										<x-condition_tablets_five name="type"
											:options="['Single' => 'option-60','Sharing' => 'option-61', ]" />
										
									</div>
									
									<div id="{{ $sub_cat == $subCategories[23]->sub_category_name ? $sub_cat : $subCategories[23]->sub_category_name  }}"
										class="component">
										<!--  vacation rent  -->
										<x-label_title for="bedroom" class="label-span mt-4">Bedrooms</x-label_title>
										<x-bedroom_one name="bedroom_vacation_rent"
													:options="['', '1', '2', '3', '4', '5', '6', 'Studio']"
													class="border form-control" placeholder="Select bedrooms" />
										<x-label_title for="bathroom_vacation_rent" class="label-span mt-2">Bathrooms</x-label_title>
										<x-bedroom_one name="bathroom_vacation_rent"
													:options="['', '1', '2', '3', '4', '5', '6', '7']"
													class="border form-control" placeholder="Select bathrooms"/>
										

									</div>
									
									<div id="{{ $sub_cat == $subCategories[24]->sub_category_name ? $sub_cat : $subCategories[24]->sub_category_name  }}"
										class="component">
										<!--  land rent  -->
										<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
										<x-condition_tablets_five name="type"
											:options="['Agricultural Land' => 'option-20','Commercial Plots' => 'option-21','Industrial Land' => 'option-21','Residential Plots' => 'option-21',]" />
										<x-label_title for="title" class="label-span mt-4">Feature</x-label_title>
										<x-feature_twelve name="feature"
											:checkboxes="[['name' => 'property_parking', 'id' => 'checkbox-97', 'labelClass' => 'checkbox-option-97', 'label' => 'Corner Plot'],['name' => 'property_lobby', 'id' => 'checkbox-98', 'labelClass' => 'checkbox-option-98', 'label' => 'Park Facing'],['name' => 'property_double', 'id' => 'checkbox-99', 'labelClass' => 'checkbox-option-99', 'label' => 'Disputed'],['name' => 'property_air', 'id' => 'checkbox-100', 'labelClass' => 'checkbox-option-100', 'label' => 'Sewerage'],['name' => 'property_heating', 'id' => 'checkbox-101', 'labelClass' => 'checkbox-option-101', 'label' => 'Electricity'],['name' => 'property_electricity', 'id' => 'checkbox-102', 'labelClass' => 'checkbox-option-102', 'label' => 'Water Supply'],['name' => 'property_waste', 'id' => 'checkbox-103', 'labelClass' => 'checkbox-option-103', 'label' => 'Gas Supply'],['name' => 'property_elevators', 'id' => 'checkbox-104', 'labelClass' => 'checkbox-option-104', 'label' => 'Boundary Wall']]" />
										<x-label_title for="title" class="label-span mt-2 ">Area Unit</x-label_title>
										<x-condition_tablets_five name="area_unit"
											:options="['Kanal' => 'option-7','Marla' => 'option-8', 'Square Feet' => 'option-9','Square Meter' => 'option-10','Square Yards' => 'option-11',]" />
											<x-input_number_sale_land type="number" name="area_square[]" class="form-control" />
										
									</div>
								
									<!-- sub_cat_name_type component-->
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[0]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[0]->sub_category_name_type  }}"
										class="component">
										
										<x-label_title for="title" class="label-span mt-4">Type</x-label_title>
										<x-condition_tablets_five name="type"
											:options="['IOS' => 'option-6','Micro-USB/Android' => 'option-7','USB Type-C' => 'option-8','Others' => 'option-9',]" />
										<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
											<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
										<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[1]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[1]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
										<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[2]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[2]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-4 ">Device</x-label_title>
										<x-condition_tablets_five name="device"
											:options="['Tablet' => 'option-17','Mobile' => 'option-18', 'Smart Watch' => 'option-19',]" />
										<x-label_title for="title" class="label-span mt-4">Type</x-label_title>
										<x-condition_tablets_five name="type"
											:options="['IOS' => 'option-6','Micro-USB/Android' => 'option-7','USB Type-C' => 'option-8','Others' => 'option-9',]" />
										<x-label_title for="title" class="label-span mt-4 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
											<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
											<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[3]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[3]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-4">Type</x-label_title>
										<x-condition_tablets_five name="type"
											:options="['Tablet' => 'option-57','Mobile' => 'option-58', 'Smart Watch' => 'option-59',]" />
										<x-label_title for="title" class="label-span mt-4 ">Deliverable</x-label_title>
										<x-condition_tablets_five name="deliverable" :options="['No' => 'option-1','Yes' => 'option-2',]" />
										
									</div>
								
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[4]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[4]->sub_category_name_type  }}"
										class="component">

										<nav id="nav-post-bike">
											<x-label_title for="make_bike" class="label-span mt-2">Make</x-label_title>
											<input type="hidden" name="make_bike" id="make_bike_input" value="">
											<div class="nav nav-tabs nav-tabs-container mb-3 d-flex border-0 flex-wrap" id="nav-make-tab" role="tablist">
												<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-1" aria-controls="tab-1" aria-selected="true" label="Jolta" />
												<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-2" aria-controls="tab-2" aria-selected="false" label="Crown" />
												<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-3" aria-controls="tab-3" aria-selected="false" label="Metro E-Vehicle" />
												<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-4" aria-controls="tab-4" aria-selected="false" label="MS Jaguar" />
												<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-5" aria-controls="tab-5" aria-selected="false" label="PakZon Electric" />
												<x-make_electric class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#tab-6" aria-controls="tab-6" aria-selected="false" label="United" />
											</div>
										</nav>
										<div class="tab-content border bg-light border-0" id="nav-tabContent"
											style="background-color: #fff !important;">
											<div class="tab-pane fade " id="tab-1" role="tabpanel"
												aria-labelledby="tab-1-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
													<x-input_number_km_driven type="number" name="year_update[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span  ">Engine
														type</x-label_title>
													<x-condition_tablets_five name="engine_type"
														:options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" />
													<x-label_title for="title" class="label-span mt-4 ">Engine
														Capacity</x-label_title>
													<x-bedroom_one name="engine_capacity"
														:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select Engine capacity"
														class="border form-control" />
													<x-label_title for="title" class="label-span mt-2 ">Km's
														driven</x-label_title>
													<x-input_number_km_driven type="number" name="kms_driven_no[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span ">Ignition
														type</x-label_title>
													<x-condition_tablets_five name="ignition_type"
														:options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Origin</x-label_title>
													<x-condition_tablets_five name="origin"
														:options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Condition</x-label_title>
													<x-condition_tablets_five name="condition"
														:options="['New' => 'option-8','Used' => 'option-9',]" />
													<x-label_title for="title" class="label-span mt-4 ">Registration
														City</x-label_title>
													<x-bedroom_one name="registration_city"
														:options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
														class="border form-control" />
											</div>
												<div class="tab-pane fade " id="tab-2" role="tabpanel"
													aria-labelledby="tab-2-tab" id="nav-post-model">
													<!-- <div class="input-container">
													<x-label_title for="model_bike" class="label-span mt-2">Model</x-label_title>
													<input type="hidden" name="model_bike" id="model_input" value="">
													<div class="nav nav-tabs nav-tabs-container mb-3 d-flex border-0 flex-wrap nav-post-model" id="nav-model-jolta" role="tablist">
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-1" aria-controls="sub-tab-1" aria-selected="true" label="EV-350" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-1" aria-controls="sub-tab-1" aria-selected="false" label="EV-650 Smart" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-1" aria-controls="sub-tab-1" aria-selected="false" label="EV-800" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-1" aria-controls="sub-tab-1" aria-selected="false" label="EV-1000" />
													</div>
												</div> -->
														
												<div class="tab-pane fade show" id="sub-tab-1" role="tabpanel"
													aria-labelledby="sub-tab-1-tab">
													<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
													<x-input_number_km_driven type="number" name="year_update[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span  ">Engine
														type</x-label_title>
													<x-condition_tablets_five name="engine_type"
														:options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" />
													<x-label_title for="title" class="label-span mt-4 ">Engine
														Capacity</x-label_title>
													<x-bedroom_one name="engine_capacity"
														:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select Engine capacity"
														class="border form-control" />
													<x-label_title for="title" class="label-span mt-2 ">Km's
														driven</x-label_title>
													<x-input_number_km_driven type="number" name="kms_driven_no[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span ">Ignition
														type</x-label_title>
													<x-condition_tablets_five name="ignition_type"
														:options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Origin</x-label_title>
													<x-condition_tablets_five name="origin"
														:options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Condition</x-label_title>
													<x-condition_tablets_five name="condition"
														:options="['New' => 'option-8','Used' => 'option-9',]" />
													<x-label_title for="title" class="label-span mt-4 ">Registration
														City</x-label_title>
													<x-bedroom_one name="registration_city"
														:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
														class="border form-control" />
												</div>
											</div>
											<div class="tab-pane fade " id="tab-3" role="tabpanel"
												aria-labelledby="nav-home3-tab">
												<!-- <div class="input-container" id="nav-post-model">
													<x-label_title for="model" class="label-span mt-2">Model</x-label_title>
													<input type="hidden" name="model_bike" id="model_input" value="">
													<div class="nav nav-tabs nav-tabs-container mb-3 d-flex border-0 flex-wrap nav-post-model" id="nav-model-jolta" role="tablist">
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-2" aria-controls="sub-tab-T9" aria-selected="true" label="T9" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-2" aria-controls="sub-tab-M6" aria-selected="false" label="M6" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-2" aria-controls="sub-tab-E8S-PRO" aria-selected="false" label="E8S PRO" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-2" aria-controls="sub-tab-LY" aria-selected="false" label="LY" />
													</div>
												</div> -->
												<div class="tab-pane fade show" id="sub-tab-2" role="tabpanel"
													aria-labelledby="sub-tab-2-tab">
													<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
													<x-input_number_km_driven type="number" name="year_update[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span ">Engine
														type</x-label_title>
													<x-condition_tablets_five name="engine_type"
														:options="['2 Stroke' => 'option-10','4 Stroke' => 'option-11',]" />
													<x-label_title for="title" class="label-span mt-4 ">Engine
														Capacity</x-label_title>
													<x-bedroom_one name="engine_capacity"
														:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc',]" placeholder="Select engine capacity"
									 					class="border form-control" />
													<x-label_title for="title" class="label-span mt-2 ">Km 's
														driven</x-label_title>
													<x-input_number_km_driven type="number" name="kms_driven_no[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span mt-2 ">Ignition
														type</x-label_title>
													<x-condition_tablets_five name="ignition_type"
														:options="['Self Start' => 'option-12','Kickstarter' => 'option-13',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Origin</x-label_title>
													<x-condition_tablets_five name="origin"
														:options="['Local' => 'option-14','Chinese' => 'option-15', 'Imported' => 'option-16',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Condition</x-label_title>
													<x-condition_tablets_five name="condition"
														:options="['New' => 'option-17','Condition' => 'option-18',]" />
													<x-label_title for="title" class="label-span mt-4 ">Registration
														City</x-label_title>
													<x-bedroom_one name="registration_city"
														:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
														class="border form-control" />
												</div>
											</div>
											<div class="tab-pane fade " id="tab-4" role="tabpanel"
												aria-labelledby="nav-home4-tab">
												<!-- <div class="input-container" id="nav-post-model">
													<x-label_title for="model" class="label-span mt-2">Model</x-label_title>
													<input type="hidden" name="model_bike" id="model_input" value="">
													<div class="nav nav-tabs nav-tabs-container mb-3 d-flex border-0 flex-wrap nav-post-model" id="nav-model-jolta" role="tablist">
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-3" aria-controls="sub-tab-E-70" aria-selected="true" label="E-70" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-3" aria-controls="sub-tab-E-125" aria-selected="false" label="E-125" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-3" aria-controls="sub-tab-E-70-Supreme" aria-selected="false" label="E-70 Supreme" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-3" aria-controls="sub-tab-E-Heavy-Bike" aria-selected="false" label="E-Heavy Bike" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-3" aria-controls="sub-tab-E-Scooter" aria-selected="false" label="E-Scooter" />
													</div>
												</div> -->
												<div class="tab-pane fade show" id="sub-tab-3" role="tabpanel"
													aria-labelledby="sub-tab-3-tab">
													<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
													<x-input_number_km_driven type="number" name="year_update[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span ">Engine
														type</x-label_title>
													<x-condition_tablets_five name="engine_type"
														:options="['2 Stroke' => 'option-10','4 Stroke' => 'option-11',]" />
													<x-label_title for="title" class="label-span mt-4 ">Engine
														Capacity</x-label_title>
													<x-bedroom_one name="engine_capacity"
														:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc',]"  placeholder="Select engine capacity"
														class="border form-control" />
													<x-label_title for="title" class="label-span mt-2 ">Km 's
														driven</x-label_title>
													<x-input_number_km_driven type="number" name="kms_driven_no[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span mt-2 ">Ignition
														type</x-label_title>
													<x-condition_tablets_five name="ignition_type"
														:options="['Self Start' => 'option-12','Kickstarter' => 'option-13',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Origin</x-label_title>
													<x-condition_tablets_five name="origin"
														:options="['Local' => 'option-14','Chinese' => 'option-15', 'Imported' => 'option-16',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Condition</x-label_title>
													<x-condition_tablets_five name="condition"
														:options="['New' => 'option-17','Condition' => 'option-18',]" />
													<x-label_title for="title" class="label-span mt-4 ">Registration
														City</x-label_title>
													<x-bedroom_one name="registration_city"
														:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
														class="border form-control" />
												</div>
											</div>
											<div class="tab-pane fade " id="tab-5" role="tabpanel"
												aria-labelledby="nav-home5-tab">
												<!-- <div class="input-container" id="nav-post-model">
													<x-label_title for="model" class="label-span mt-2">Model</x-label_title>
													<input type="hidden" name="model_bike" id="model_input" value="">
													<div class="nav nav-tabs nav-tabs-container mb-3 d-flex border-0 flex-wrap nav-post-model" id="nav-model-jolta" role="tablist">
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-4" aria-controls="sub-tab-PES-70L" aria-selected="true" label="PES-70L" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-4" aria-controls="sub-tab-PES-70D" aria-selected="false" label="PES-70D" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-4" aria-controls="sub-tab-PE-70L" aria-selected="false" label="PE-70L" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-4" aria-controls="sub-tab-E-PE-70D" aria-selected="false" label="PE-70D" />
														<x-make_road_select class="nav-tab-button rounded px-3 py-2" data-bs-toggle="tab" data-bs-target="#sub-tab-4" aria-controls="sub-tab-PE-100L" aria-selected="false" label="PE-100L" />
													</div>
												</div> -->
												<div class="tab-pane fade show" id="sub-tab-4" role="tabpanel"
													aria-labelledby="sub-tab-4-tab">
													<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
													<x-input_number_km_driven type="number" name="year_update[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span ">Engine
														type</x-label_title>
													<x-condition_tablets_five name="engine_type"
														:options="['2 Stroke' => 'option-10','4 Stroke' => 'option-11',]" />
													<x-label_title for="title" class="label-span mt-4 ">Engine
														Capacity</x-label_title>
													<x-bedroom_one name="engine_capacity"
														:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc',]" placeholder="Select engine capacity"
														class="border form-control" />
													<x-label_title for="title" class="label-span mt-2 ">Km 's
														driven</x-label_title>
													<x-input_number_km_driven type="number" name="kms_driven_no[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span mt-2 ">Ignition
														type</x-label_title>
													<x-condition_tablets_five name="ignition_type"
														:options="['Self Start' => 'option-12','Kickstarter' => 'option-13',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Origin</x-label_title>
													<x-condition_tablets_five name="origin"
														:options="['Local' => 'option-14','Chinese' => 'option-15', 'Imported' => 'option-16',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Condition</x-label_title>
													<x-condition_tablets_five name="condition"
														:options="['New' => 'option-17','Condition' => 'option-18',]" />
													<x-label_title for="title" class="label-span mt-4 ">Registration
														City</x-label_title>
													<x-bedroom_one name="registration_city"
														:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
														class="border form-control" />
												</div>
											</div>
											<div class="tab-pane fade " id="tab-6" role="tabpanel"
												aria-labelledby="nav-home6-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
												<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Engine
													type</x-label_title>
												<x-condition_tablets_five name="engine_type"
													:options="['2 Stroke' => 'option-26','4 Stroke' => 'option-27',]" />
												<x-label_title for="title" class="label-span mt-2 ">Engin
													Capacity</x-label_title>
												<x-bedroom_one name="engine_capacity"
													:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select engine capacity"
													class="border form-control" />
												<x-label_title for="title" class="label-span mt-2 ">KM'S
													driven</x-label_title>
												<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Ignition
													type</x-label_title>
												<x-condition_tablets_five name="ignition_type"
													:options="['Self Start' => 'option-28','Kickstarter' => 'option-29',]" />
												<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['Local' => 'option-30','Chinese' => 'option-31', 'Imported' => 'option-32',]" />
												<x-label_title for="title"
													class="label-span mt-2 ">Condition</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['New' => 'option-33','Condition' => 'option-34',]" />
												<x-label_title for="title" class="label-span mt-2 ">Registration
													City</x-label_title>
												<x-bedroom_one name="registration_city"
													:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
													class="border form-control" />
											</div>
										</div>
										

									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[5]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[5]->sub_category_name_type  }}"
										class="component">
										<nav id="nav-post-bike2">
											<label for="make_bike2" class="label-span mt-2">Make</label>
											<input type="hidden" name="make_bike2" id="make_bike_input2" value="" style="cursor:pointer;">
											<div class="nav nav-tabs nav-tabs-container mb-3 d-flex border-0 flex-wrap" id="nav-make-tab2" role="tablist">
												<x-make_electric class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-7" aria-controls="tab-7" aria-selected="true" label="Honda" />
												<x-make_electric class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-8" aria-controls="tab-8" aria-selected="false" label="Kawasaki" />
												<x-make_electric class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-9" aria-controls="tab-9" aria-selected="false" label="Yamaha" />
												<x-make_electric class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-10" aria-controls="tab-10" aria-selected="false" label="Suzuki" />
												<x-make_electric class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-11" aria-controls="tab-11" aria-selected="false" label="Super Power" />
												<x-make_electric class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-12" aria-controls="tab-12" aria-selected="false" label="Others" />
												<x-make_electric class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-13" aria-controls="tab-13" aria-selected="false" label="BMW" />
												<x-make_electric class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-14" aria-controls="tab-14" aria-selected="false" label="CF Moto" />
												<x-make_electric class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-15" aria-controls="tab-15" aria-selected="false" label="Super Asia" />
												<x-make_electric class="nav-tab-button2 rounded px-3 py-2 m-1" data-bs-toggle="tab" data-bs-target="#tab-16" aria-controls="tab-16" aria-selected="false" label="Super Star" />
											</div>
										</nav>

										
										<div class="tab-content border bg-light border-0" id="nav-tabContent"
											style="background-color: #fff !important;">
											<div class="tab-pane fade " id="tab-7" role="tabpanel"
												aria-labelledby="tab-1-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
													<x-input_number_km_driven type="number" name="year_update[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span  ">Engine
														type</x-label_title>
													<x-condition_tablets_five name="engine_type"
														:options="['2 Stroke' => 'option-1','4 Stroke' => 'option-2',]" />
													<x-label_title for="title" class="label-span mt-4 ">Engine
														Capacity</x-label_title>
													<x-bedroom_one name="engine_capacity"
														:options="['150cc - 199cc','300cc - 499cc', '200cc - 249cc', '100cc - 149cc', '250cc - 299cc', 'Others', '50cc', '70cc','500cc - 699cc', '700cc - 999cc', '1000cc','Above 1000cc']" placeholder="Select engine capacity"
														class="border form-control" />
													<x-label_title for="title" class="label-span mt-2 ">Km's
														driven</x-label_title>
													<x-input_number_km_driven type="number" name="kms_driven_no[]"
														class="form-control border-0 ps-0 "
														aria-label="Sizing example input"
														aria-describedby="inputGroup-sizing-sm" />
													<x-label_title for="title" class="label-span ">Ignition
														type</x-label_title>
													<x-condition_tablets_five name="ignition_type"
														:options="['Self Start' => 'option-3','Kickstarter' => 'option-4',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Origin</x-label_title>
													<x-condition_tablets_five name="origin"
														:options="['Local' => 'option-5','Chinese' => 'option-6', 'Imported' => 'option-7',]" />
													<x-label_title for="title"
														class="label-span mt-2 ">Condition</x-label_title>
													<x-condition_tablets_five name="condition"
														:options="['New' => 'option-8','Used' => 'option-9',]" />
													<x-label_title for="title" class="label-span mt-4 ">Registration
														City</x-label_title>
													<x-bedroom_one name="registration_city"
														:options="['Unregistered','Karachi','Punjab','Bahawalnagar','Bahawalpur','Chichawatni','Faisalabad', 'Gujrat', 'Hafizabad', 'Hyderabad', 'Islamabad', 'Multan', 'Okara', 'Peshawar', 'Rawalpindi','Sheikhüpura','Lahore', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
														class="border form-control" />
											</div>
												<div class="tab-pane fade " id="tab-8" role="tabpanel"
													aria-labelledby="tab-2-tab" id="nav-post-model">
													<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
												<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Engine
													type</x-label_title>
												<x-condition_tablets_five name="engine_type"
													:options="['2 Stroke' => 'option-26','4 Stroke' => 'option-27',]" />
												<x-label_title for="title" class="label-span mt-2 ">Engin
													Capacity</x-label_title>
												<x-bedroom_one name="engine_capacity"
													:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select engine capacity"
													class="border form-control" />
												<x-label_title for="title" class="label-span mt-2 ">KM'S
													driven</x-label_title>
												<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Ignition
													type</x-label_title>
												<x-condition_tablets_five name="ignition_type"
													:options="['Self Start' => 'option-28','Kickstarter' => 'option-29',]" />
												<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['Local' => 'option-30','Chinese' => 'option-31', 'Imported' => 'option-32',]" />
												<x-label_title for="title"
													class="label-span mt-2 ">Condition</x-label_title>
												<x-condition_tablets_five name="condition"
													:options="['New' => 'option-33','Used' => 'option-34',]" />
												<x-label_title for="title" class="label-span mt-2 ">Registration
													City</x-label_title>
												<x-bedroom_one name="registration_city"
													:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
													class="border form-control" />
											</div>
											<div class="tab-pane fade " id="tab-9" role="tabpanel"
												aria-labelledby="nav-home3-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
												<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Engine
													type</x-label_title>
												<x-condition_tablets_five name="engine_type"
													:options="['2 Stroke' => 'option-26','4 Stroke' => 'option-27',]" />
												<x-label_title for="title" class="label-span mt-2 ">Engin
													Capacity</x-label_title>
												<x-bedroom_one name="engine_capacity"
													:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select engine capacity"
													class="border form-control" />
												<x-label_title for="title" class="label-span mt-2 ">KM'S
													driven</x-label_title>
												<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Ignition
													type</x-label_title>
												<x-condition_tablets_five name="ignition_type"
													:options="['Self Start' => 'option-28','Kickstarter' => 'option-29',]" />
												<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['Local' => 'option-30','Chinese' => 'option-31', 'Imported' => 'option-32',]" />
												<x-label_title for="title"
													class="label-span mt-2 ">Condition</x-label_title>
												<x-condition_tablets_five name="condition"
													:options="['New' => 'option-33','Used' => 'option-34',]" />
												<x-label_title for="title" class="label-span mt-2 ">Registration
													City</x-label_title>
												<x-bedroom_one name="registration_city"
													:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
													class="border form-control" />
											</div>
											<div class="tab-pane fade " id="tab-10" role="tabpanel"
												aria-labelledby="nav-home4-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
												<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Engine
													type</x-label_title>
												<x-condition_tablets_five name="engine_type"
													:options="['2 Stroke' => 'option-26','4 Stroke' => 'option-27',]" />
												<x-label_title for="title" class="label-span mt-2 ">Engin
													Capacity</x-label_title>
												<x-bedroom_one name="engine_capacity"
													:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select engine capacity"
													class="border form-control" />
												<x-label_title for="title" class="label-span mt-2 ">KM'S
													driven</x-label_title>
												<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Ignition
													type</x-label_title>
												<x-condition_tablets_five name="ignition_type"
													:options="['Self Start' => 'option-28','Kickstarter' => 'option-29',]" />
												<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['Local' => 'option-30','Chinese' => 'option-31', 'Imported' => 'option-32',]" />
												<x-label_title for="title"
													class="label-span mt-2 ">Condition</x-label_title>
												<x-condition_tablets_five name="condition"
													:options="['New' => 'option-33','Used' => 'option-34',]" />
												<x-label_title for="title" class="label-span mt-2 ">Registration
													City</x-label_title>
												<x-bedroom_one name="registration_city"
													:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
													class="border form-control" />
											</div>
											<div class="tab-pane fade " id="tab-11" role="tabpanel"
												aria-labelledby="nav-home5-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
												<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Engine
													type</x-label_title>
												<x-condition_tablets_five name="engine_type"
													:options="['2 Stroke' => 'option-26','4 Stroke' => 'option-27',]" />
												<x-label_title for="title" class="label-span mt-2 ">Engin
													Capacity</x-label_title>
												<x-bedroom_one name="engine_capacity"
													:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select engine capacity"
													class="border form-control" />
												<x-label_title for="title" class="label-span mt-2 ">KM'S
													driven</x-label_title>
												<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Ignition
													type</x-label_title>
												<x-condition_tablets_five name="ignition_type"
													:options="['Self Start' => 'option-28','Kickstarter' => 'option-29',]" />
												<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['Local' => 'option-30','Chinese' => 'option-31', 'Imported' => 'option-32',]" />
												<x-label_title for="title"
													class="label-span mt-2 ">Condition</x-label_title>
												<x-condition_tablets_five name="condition"
													:options="['New' => 'option-33','Used' => 'option-34',]" />
												<x-label_title for="title" class="label-span mt-2 ">Registration
													City</x-label_title>
												<x-bedroom_one name="registration_city"
													:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
													class="border form-control"/>
											</div>
											<div class="tab-pane fade " id="tab-12" role="tabpanel"
												aria-labelledby="nav-home6-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
												<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Engine
													type</x-label_title>
												<x-condition_tablets_five name="engine_type"
													:options="['2 Stroke' => 'option-26','4 Stroke' => 'option-27',]" />
												<x-label_title for="title" class="label-span mt-2 ">Engin
													Capacity</x-label_title>
												<x-bedroom_one name="engine_capacity"
													:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select engine capacity"
													class="border form-control" />
												<x-label_title for="title" class="label-span mt-2 ">KM'S
													driven</x-label_title>
												<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Ignition
													type</x-label_title>
												<x-condition_tablets_five name="ignition_type"
													:options="['Self Start' => 'option-28','Kickstarter' => 'option-29',]" />
												<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['Local' => 'option-30','Chinese' => 'option-31', 'Imported' => 'option-32',]" />
												<x-label_title for="title"
													class="label-span mt-2 ">Condition</x-label_title>
												<x-condition_tablets_five name="Used"
													:options="['New' => 'option-33','used' => 'option-34',]" />
												<x-label_title for="title" class="label-span mt-2 ">Registration
													City</x-label_title>
												<x-bedroom_one name="registration_city"
													:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
													class="border form-control" />
											</div>
											<div class="tab-pane fade " id="tab-13" role="tabpanel"
												aria-labelledby="nav-home6-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
												<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Engine
													type</x-label_title>
												<x-condition_tablets_five name="engine_type"
													:options="['2 Stroke' => 'option-26','4 Stroke' => 'option-27',]" />
												<x-label_title for="title" class="label-span mt-2 ">Engin
													Capacity</x-label_title>
												<x-bedroom_one name="engine_capacity"
													:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select engine capacity"
						 							class="border form-control" />
												<x-label_title for="title" class="label-span mt-2 ">KM'S
													driven</x-label_title>
												<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Ignition
													type</x-label_title>
												<x-condition_tablets_five name="ignition_type"
													:options="['Self Start' => 'option-28','Kickstarter' => 'option-29',]" />
												<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['Local' => 'option-30','Chinese' => 'option-31', 'Imported' => 'option-32',]" />
												<x-label_title for="title"
													class="label-span mt-2 ">Condition</x-label_title>
												<x-condition_tablets_five name="condition"
													:options="['New' => 'option-33','Used' => 'option-34',]" />
												<x-label_title for="title" class="label-span mt-2 ">Registration
													City</x-label_title>
												<x-bedroom_one name="registration_city"
													:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
													class="border form-control" />
											</div>
											<div class="tab-pane fade " id="tab-14" role="tabpanel"
												aria-labelledby="nav-home6-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
												<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Engine
													type</x-label_title>
												<x-condition_tablets_five name="engine_type"
													:options="['2 Stroke' => 'option-26','4 Stroke' => 'option-27',]" />
												<x-label_title for="title" class="label-span mt-2 ">Engin
													Capacity</x-label_title>
												<x-bedroom_one name="engine_capacity"
													:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select engine capacity"
													class="border form-control" />
												<x-label_title for="title" class="label-span mt-2 ">KM'S
													driven</x-label_title>
												<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Ignition
													type</x-label_title>
												<x-condition_tablets_five name="ignition_type"
													:options="['Self Start' => 'option-28','Kickstarter' => 'option-29',]" />
												<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['Local' => 'option-30','Chinese' => 'option-31', 'Imported' => 'option-32',]" />
												<x-label_title for="title"
													class="label-span mt-2 ">Condition</x-label_title>
												<x-condition_tablets_five name="condition"
													:options="['New' => 'option-33','Used' => 'option-34',]" />
												<x-label_title for="title" class="label-span mt-2 ">Registration
													City</x-label_title>
												<x-bedroom_one name="registration_city"
													:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
													class="border form-control" />
											</div>
											<div class="tab-pane fade " id="tab-15" role="tabpanel"
												aria-labelledby="nav-home6-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
												<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Engine
													type</x-label_title>
												<x-condition_tablets_five name="engine_type"
													:options="['2 Stroke' => 'option-26','4 Stroke' => 'option-27',]" />
												<x-label_title for="title" class="label-span mt-2 ">Engin
													Capacity</x-label_title>
												<x-bedroom_one name="engine_capacity"
													:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select engine capacity"
													class="border form-control" />
												<x-label_title for="title" class="label-span mt-2 ">KM'S
													driven</x-label_title>
												<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Ignition
													type</x-label_title>
												<x-condition_tablets_five name="ignition_type"
													:options="['Self Start' => 'option-28','Kickstarter' => 'option-29',]" />
												<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['Local' => 'option-30','Chinese' => 'option-31', 'Imported' => 'option-32',]" />
												<x-label_title for="title"
													class="label-span mt-2 ">Condition</x-label_title>
												<x-condition_tablets_five name="condition"
													:options="['New' => 'option-33','Used' => 'option-34',]" />
												<x-label_title for="title" class="label-span mt-2 ">Registration
													City</x-label_title>
												<x-bedroom_one name="registration_city"
													:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
													class="border form-control" />
											</div>
											<div class="tab-pane fade " id="tab-16" role="tabpanel"
												aria-labelledby="nav-home6-tab">
												<x-label_title for="title" class="label-span mt-2 ">Year</x-label_title>
												<x-input_number_km_driven type="number" name="year_update[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Engine
													type</x-label_title>
												<x-condition_tablets_five name="engine_type"
													:options="['2 Stroke' => 'option-26','4 Stroke' => 'option-27',]" />
												<x-label_title for="title" class="label-span mt-2 ">Engin
													Capacity</x-label_title>
												<x-bedroom_one name="engine_capacity"
													:options="['Selected','70cc', '50cc', '100cc - 149cc', 'Above 1000cc', '150cc - 199cc', '50cc', '70cc']" placeholder="Select engine capacity"
													class="border form-control" />
												<x-label_title for="title" class="label-span mt-2 ">KM'S
													driven</x-label_title>
												<x-input_number_km_driven type="number" name="kms_driven_no[]" class="form-control border-0 ps-0 "
													aria-label="Sizing example input"
													aria-describedby="inputGroup-sizing-sm" />
												<x-label_title for="title" class="label-span mt-2 ">Ignition
													type</x-label_title>
												<x-condition_tablets_five name="ignition_type"
													:options="['Self Start' => 'option-28','Kickstarter' => 'option-29',]" />
												<x-label_title for="title" class="label-span mt-2 ">Origin</x-label_title>
												<x-condition_tablets_five name="origin"
													:options="['Local' => 'option-30','Chinese' => 'option-31', 'Imported' => 'option-32',]" />
												<x-label_title for="title"
													class="label-span mt-2 ">Condition</x-label_title>
												<x-condition_tablets_five name="condition"
													:options="['New' => 'option-33','Used' => 'option-34',]" />
												<x-label_title for="title" class="label-span mt-2 ">Registration
													City</x-label_title>
												<x-bedroom_one name="registration_city"
													:options="['Selected','Unregistered', 'Lahore', 'Islamabad', 'Faisalabad', 'Abbottabad', 'Ahmadpur East',]" placeholder="Select registration city"
													class="border form-control" />
											</div>
										</div>
										

									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[6]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[6]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										

									</div>
								
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[7]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[7]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[8]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[8]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[9]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[9]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
										<x-condition_tablets_five name="type"
											:options="['1 Seater' => 'option-51','2 Seater' => 'option-52', '3 Seater' => 'option-53', 'Dewan' => 'option-54', 'L Shaped' => 'option-55', 'Sofa Set' => 'option-56', ]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[10]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[10]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[11]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[11]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										<x-label_title for="title" class="label-span mt-2 ">Type</x-label_title>
										<x-condition_tablets_five name="type"
											:options="['Computer Chairs' => 'option-51','Executive Chairs' => 'option-52', 'Visitor Chairs' => 'option-53', 'Others' => 'option-54' ]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[12]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[12]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[13]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[13]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										

									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[14]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[14]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[15]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[15]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[16]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[16]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[17]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[17]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[18]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[18]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[19]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[19]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[20]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[20]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Product</x-label_title>
										<x-bedroom_one name="product"
											:options="['Straighteners','Hair Oils', 'Trimmers', 'Dryers & Stylers', 'Others', 'Anti Lice', 'Beard Oils', 'Curlers', 'Dryers & Stylers', 'Hair Brushes & Combs', 'Hair Fiber','Hair Removers','Shampoos & Conditioners','Wax Heaters','Wigs & Hair Extensions',]"
											class="border form-control" />
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[21]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[21]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Product</x-label_title>
										<x-bedroom_one name="product"
											:options="['Straighteners','Hair Oils', 'Trimmers', 'Dryers & Stylers', 'Others', 'Anti Lice', 'Beard Oils', 'Curlers', 'Dryers & Stylers', 'Hair Brushes & Combs', 'Hair Fiber','Hair Removers','Shampoos & Conditioners','Wax Heaters','Wigs & Hair Extensions',]" placeholder="Select product"
											class="border form-control" />
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[22]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[22]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										

									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[23]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[23]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[24]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[24]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Make</x-label_title>
										<x-bedroom_one name="make_car"
											:options="['Others','Speed', 'Morgan', 'Sohrab', 'Specialized', 'Louis', 'Precision', 'Scott', 'Trinx', 'Speed', 'Fareast','Bianchi', 'Giant', 'Cobalt', 'Continental',]" placeholder="Select Make "
											class="border form-control" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
								
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[25]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[25]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Make</x-label_title>
										<x-bedroom_one name="make_car"
											:options="['Others','Speed', 'Morgan', 'Sohrab', 'Specialized', 'Louis', 'Precision', 'Scott', 'Trinx', 'Speed', 'Fareast','Bianchi', 'Giant', 'Cobalt', 'Continental',]" placeholder="Select Make "
											class="border form-control" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[26]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[26]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Make</x-label_title>
										<x-bedroom_one name="make_car"
											:options="['Others','Speed', 'Morgan', 'Sohrab', 'Specialized', 'Louis', 'Precision', 'Scott', 'Trinx', 'Speed', 'Fareast','Bianchi', 'Giant', 'Cobalt', 'Continental',]" placeholder="Select Make "
											class="border form-control" />
											<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[27]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[27]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[28]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[28]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition"
											:options="['New' => 'option-1','Used' => 'option-2',]" />
										
									</div>
									
									<div id="{{ $sub_cat_type == $subCategoryNameTypes[29]->sub_category_name_type ? $sub_cat_type : $subCategoryNameTypes[29]->sub_category_name_type  }}"
										class="component">
										<x-label_title for="title" class="label-span mt-2 ">Condition</x-label_title>
										<x-condition_tablets_five name="condition" :options="['New' => 'option-1','Condition' => 'option-2',]" />
										
									</div>
									<h4 class="mt-2 choose">SET A PRICE</h4>
									<x-price_set label="Price" currency="Rs" name="price" class="extra-class" />
									<hr>
									<x-imageupload/>
									
									@error('image_path')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									@error('image_path.*')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									<x-location_city name="location"  />
									<hr>
									<x-profile :image="'assets/images/Profile-Male-PNG.png'" name="review_name" :name="Auth::user()->name" :phone="Auth::user()->phone_no" :showPhoneCheckbox="true" />
									<hr>
									<x-post_button type="submit" class="post-ad-btn" label="Post Now" />
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
    const params = new URLSearchParams(window.location.search);
    const sub_cat_type = params.get('sub_cat_type');
    const sub_cat = params.get('sub_cat');
    const cat_name = params.get('cat_name');

    console.log(sub_cat_type);
    console.log(sub_cat);
    console.log(cat_name);

    // Hide all components initially
    document.querySelectorAll('.component').forEach(component => {
        component.classList.remove('active');
    });

    // Show only the relevant component based on URL parameters
    let componentToShow = null;
    if (sub_cat_type) {
        componentToShow = document.getElementById(sub_cat_type);
    } else if (sub_cat) {
        componentToShow = document.getElementById(sub_cat);
    } else if (cat_name) {
        componentToShow = document.getElementById(cat_name);
    }

    // If a matching component is found, make it active
    if (componentToShow) {
        componentToShow.classList.add('active');
    }
});



</script>