<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update3BlockToSpaPageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spa_page_models', function (Blueprint $table) {
            $table->dropColumn('block1_title');
            $table->dropColumn('block1_with_left_img');
            $table->dropColumn('block2_title');
            $table->dropColumn('block2_with_right_img');
            $table->dropColumn('block3_title');
            $table->dropColumn('block3_with_left_img');
            $table->json('block3_service_blocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spa_page_models', function (Blueprint $table) {
            $table->json('block1_title')->nullable();
            $table->json('block1_with_left_img')->nullable();
            $table->json('block2_title')->nullable();
            $table->json('block2_with_right_img')->nullable();
            $table->json('block3_title')->nullable();
            $table->json('block3_with_left_img')->nullable();
            $table->dropColumn('block3_service_blocks');
        });
    }
}
