<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePhotosColumnInAdsTable extends Migration
{
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            if (Schema::hasColumn('ads', 'photos')) {
                $table->dropColumn('photos');
            }
        });
    }

    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->json('photos')->nullable();
        });
    }
}
