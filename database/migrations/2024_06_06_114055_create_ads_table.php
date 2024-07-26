<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->varchar('users_id');
            $table->string('title');
            $table->text('description');
            $table->string('category_name');
            $table->string('sub_category_name', 8, 2);
            $table->string('sub_category_name_type', 8, 2);
            $table->string('brand')->nullable();
            $table->string('condition')->nullable();
            $table->string('type')->nullable();
            $table->string('device')->nullable();
            $table->string('make_car')->nullable();
            $table->string('year_update')->nullable();
            $table->string('kms_driven_no')->nullable();
            $table->string('feature')->nullable();
            $table->string('area_unit')->nullable();
            $table->decimal('area_square', 8, 2)->nullable();
            // $table->decimal('sale_land_area', 8, 2)->nullable();
            $table->string('furnished')->nullable();
            $table->string('pro_rent_house_bedroom')->nullable();
            $table->string('pro_rent_house_bathroom')->nullable();
            $table->string('pro_sale_house_bedroom')->nullable();
            $table->string('pro_sale_house_bathroom')->nullable();
            $table->string('pro_sale_appart_bedroom')->nullable();
            $table->string('pro_sale_appart_bathroom')->nullable();

            $table->string('pro_rent_appart_bedroom')->nullable();
            $table->string('pro_rent_apart_bathroom')->nullable();
            $table->string('pro_rent_appart_floor')->nullable();
            $table->string('floor_level_shope_rent')->nullable();

            $table->string('bedroom2')->nullable();
            $table->string('bathroom2')->nullable();
            $table->string('floor_level2')->nullable();
            $table->string('rent_shope_bathroom')->nullable();
            $table->string('bedroom_vacation_rent')->nullable();
            $table->string('bathroom_vacation_rent')->nullable();
            $table->string('make_bike')->nullable();

            $table->string('construction_state_new_rent_house')->nullable();
            $table->string('construction_state_new')->nullable();
            $table->string('pro_sale_appart_floor_level')->nullable();
            $table->string('pro_sale_shope_floor_level')->nullable();
            $table->string('pro_sale_portion_bedroom')->nullable();
            $table->string('pro_sale_portion_bathroom')->nullable();
            $table->string('pro_sale_portion_floor_level')->nullable();
            $table->string('no_storeys')->nullable();
            $table->string('model_bike')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('engine_capacity')->nullable();
            $table->string('ignition_capacity')->nullable();
            $table->string('origin')->nullable();
            $table->string('registration_city')->nullable();
            $table->string('product')->nullable();
            $table->string('price')->nullable();
            $table->string('photo')->nullable();
            $table->string('location')->nullable();
            $table->string('review_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('show_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
