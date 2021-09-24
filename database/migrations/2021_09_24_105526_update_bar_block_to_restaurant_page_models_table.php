<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBarBlockToRestaurantPageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurant_page_models', function (Blueprint $table) {
            $table->dropColumn('bar_img_bg');
            $table->string('bar_left_img');
            $table->json('bar_left_desc');
            $table->string('bar_center_img');
            $table->string('bar_right_img');
            $table->json('bar_right_desc');
            $table->string('bar_bg_img');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurant_page_models', function (Blueprint $table) {
            $table->string('bar_img_bg');
            $table->dropColumn('bar_left_img');
            $table->dropColumn('bar_left_desc');
            $table->dropColumn('bar_center_img');
            $table->dropColumn('bar_right_img');
            $table->dropColumn('bar_right_desc');
            $table->dropColumn('bar_bg_img');
        });
    }
}
