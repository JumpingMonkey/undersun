<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOptionsLabelFieldToAllRoomsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_rooms_pages', function (Blueprint $table) {
            $table->json('options_label');
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
            $table->dropColumn('options_label');
        });
    }
}
