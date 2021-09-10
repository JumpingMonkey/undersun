<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivatPolicyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privat_policy_models', function (Blueprint $table) {
            $table->id();

            $table->json('seo_title');
            $table->json('meta_description');
            $table->json('title');
            $table->json('title_block_1');
            $table->json('desc_block_1');
            $table->json('title_block_2');
            $table->json('desc_block_2');
            $table->json('title_block_3');
            $table->json('desc_block_3');

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
        Schema::dropIfExists('privat_policy_models');
    }
}
