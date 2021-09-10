<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesServicesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities_services_models', function (Blueprint $table) {
            $table->id();
            $table->json('seo_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('hero_title_bold');
            $table->json('hero_title_thin');
            $table->json('hero_bottom_text')->nullable();
            $table->string('hero_bg_img');
            $table->string('top_left_img');
            $table->json('top_title');
            $table->json('top_description')->nullable();
            $table->string('bottom_right_img');
            $table->json('bottom_title');
            $table->json('sim_bottom_description')->nullable();
            $table->json('title_bold');
            $table->json('title_thin');
            $table->json('bottom_description')->nullable();
            $table->string('bg_img');
            $table->string('small_img')->nullable();
            $table->string('2top_left_img');
            $table->json('2top_title');
            $table->json('2top_description')->nullable();
            $table->string('2bottom_right_img');
            $table->json('2bottom_title');
            $table->json('2bottom_description')->nullable();
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
        Schema::dropIfExists('activities_services_models');
    }
}
