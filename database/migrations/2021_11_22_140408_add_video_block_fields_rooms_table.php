<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoBlockFieldsRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('video')->nullable();
            $table->json('play_video_text')->nullable();
            $table->json('small_under_video_text');
            $table->json('large_under_video_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('video')->nullable();
            $table->dropColumn('play_video_text')->nullable();
            $table->dropColumn('small_under_video_text');
            $table->dropColumn('large_under_video_text');
        });
    }
}
