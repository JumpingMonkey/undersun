<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBgImgBlockAllRoomsPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_rooms_pages', function (Blueprint $table) {
            $table->string('hero_bg_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_rooms_pages', function (Blueprint $table) {
            $table->dropColumn('hero_bg_image')->nullable();
        });
    }
}
