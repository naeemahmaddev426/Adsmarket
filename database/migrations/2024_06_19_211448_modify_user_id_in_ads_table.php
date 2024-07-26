<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUserIdInAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
            // Alternatively, you can set a default value
            // $table->unsignedBigInteger('user_id')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            // Or remove the default value
            // $table->unsignedBigInteger('user_id')->default(null)->change();
        });
    }
}
