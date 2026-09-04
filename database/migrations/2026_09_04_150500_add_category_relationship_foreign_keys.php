<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add the database constraints that match the Eloquent hierarchy.
     */
    public function up(): void
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->foreign('category_id', 'fk_sub_categories_category')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
        });

        Schema::table('sub_category_name_type', function (Blueprint $table) {
            $table->foreign('category_id', 'fk_sub_category_type_category')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
            $table->foreign('sub_category_id', 'fk_sub_category_type_sub_category')
                ->references('id')
                ->on('sub_categories')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('sub_category_name_type', function (Blueprint $table) {
            $table->dropForeign('fk_sub_category_type_category');
            $table->dropForeign('fk_sub_category_type_sub_category');
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropForeign('fk_sub_categories_category');
        });
    }
};
