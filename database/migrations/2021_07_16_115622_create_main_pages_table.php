<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_pages', function (Blueprint $table) {
            $table->id();

            $table->json('seo_title');
            $table->json('meta_description');
            $table->json('hero_title');
            $table->json('hero_text');
            $table->string('hero_main_image')->nullable();
            $table->json('hero_slider');
            $table->json('introduce_small_title');
            $table->json('introduce_big_title');
            $table->json('introduce_text');
            $table->string('introduce_main_image')->nullable();
            $table->json('benefits_title');
            $table->string('benefits_first_image')->nullable();
            $table->string('benefits_second_image')->nullable();
            $table->string('benefits_third_image')->nullable();
            $table->json('benefits_items');
            $table->json('rooms_title');
            $table->json('rooms_text');
            $table->json('rooms_more_btn_text');
            $table->json('services_small_title');
            $table->string('services_small_image')->nullable();
            $table->json('services_slides');
            $table->json('services_more_btn_text');
            $table->json('spa_title');
            $table->json('spa_text');
            $table->string('spa_main_image')->nullable();
            $table->string('spa_small_image')->nullable();
            $table->json('spa_more_btn_text');
            $table->json('made_title');
            $table->string('made_left_image')->nullable();
            $table->string('made_center_big_image')->nullable();
            $table->string('made_center_small_image')->nullable();
            $table->string('made_right_image')->nullable();
            $table->string('made_more_btn_text')->nullable();

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
        Schema::dropIfExists('main_pages');
    }
}
