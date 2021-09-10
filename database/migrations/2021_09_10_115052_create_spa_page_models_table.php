<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpaPageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spa_page_models', function (Blueprint $table) {
            $table->id();
            $table->json('seo_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('hero_title')->nullable();
            $table->json('hero_bottom_text')->nullable();
            $table->json('block2_bold_title_1')->nullable();
            $table->json('block2_thin_title_1')->nullable();
            $table->json('block2_bold_title_2')->nullable();
            $table->json('block2_thin_title_2')->nullable();
            $table->string('mini_first_img')->nullable();
            $table->string('mini_second_img')->nullable();
            $table->string('mini_third_img')->nullable();
            $table->string('big_img')->nullable();
            $table->json('text_bottom')->nullable();
            $table->json('btn_text')->nullable();
            $table->json('block1_title')->nullable();
            $table->json('block1_with_left_img')->nullable();
            $table->json('block2_title')->nullable();
            $table->json('block2_with_right_img')->nullable();
            $table->json('block3_title')->nullable();
            $table->json('block3_with_left_img')->nullable();
            $table->json('block4_bold_title')->nullable();
            $table->json('block4_thin_title')->nullable();
            $table->json('block4_sub_title')->nullable();
            $table->json('block4_description')->nullable();
            $table->json('block4_btn_text')->nullable();
            $table->string('block4_first_img')->nullable();
            $table->string('block4_second_img')->nullable();
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
        Schema::dropIfExists('spa_page_models');
    }
}
