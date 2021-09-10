<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantPageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_page_models', function (Blueprint $table) {
            $table->id();

            $table->json('seo_title');
            $table->json('meta_description');
            $table->json('hero_title');
            $table->json('hero_bottom_text');
            $table->json('int_bold_title');
            $table->json('int_thin_title');
            $table->string('int_first_img')->nullable();
            $table->string('int_second_img')->nullable();
            $table->string('int_third_img')->nullable();
            $table->string('int_fourth_img')->nullable();
            $table->json('int_main_description');
            $table->json('int_above_btn_description');
            $table->json('int_btn_text')->nullable();
            $table->json('int_btn_link');
            $table->string('video')->nullable();
            $table->json('play_video_text')->nullable();
            $table->json('small_under_video_text');
            $table->json('large_under_video_text');
            $table->string('bar_img_bg')->nullable();
            $table->json('bar_left_text');
            $table->json('bar_center_text');
            $table->json('bar_center_desc');
            $table->json('bar_right_text');
            $table->json('style_bold_title');
            $table->json('style_thin_title');
            $table->string('style_left_img')->nullable();
            $table->json('style_large_text_under_left_img');
            $table->json('style_small_text_under_left_img');
            $table->json('style_top_title_above_right_img');
            $table->json('style_bottom_title_above_right_img');
            $table->string('style_right_img')->nullable();
            $table->json('style2_bold_title');
            $table->json('style2_thin_title');
            $table->string('style2_left_little_img')->nullable();
            $table->json('style2_sub_title');
            $table->json('style2_description');
            $table->json('style2_btn_title')->nullable();
            $table->json('style2_btn_link');
            $table->string('style2_large_img')->nullable();
            $table->json('gallery')->nullable();
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
        Schema::dropIfExists('restaurant_page_models');
    }
}
