<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->json('seo_title');
            $table->json('meta_description');
            $table->json('room_name');
            $table->json('room_area');
            $table->json('room_amount_persons');
            $table->json('room_bed_size');
            $table->string('room_main_image')->nullable();

            $table->json('room_description_title');
            $table->json('room_description_text');
            $table->string('room_description_first_image')->nullable();
            $table->string('room_description_second_image')->nullable();

            $table->json('room_slider_images');

            $table->json('room_features_title');
            $table->json('room_features_items');
            $table->json('room_feature_big_image');
            $table->json('room_feature_small_image');

            $table->json('room_options_small_title');
            $table->json('room_options_items');
            $table->json('room_options_btn_text');

            $table->string('room_main_slider_image')->nullable();
            $table->json('room_main_slider_text');

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
        Schema::dropIfExists('rooms');
    }
}
