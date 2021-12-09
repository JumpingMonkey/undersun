<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlexFieldPrivatPolicyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('privat_policy_models', function (Blueprint $table) {
            $table->dropColumn('title_block_1');
            $table->dropColumn('desc_block_1');
            $table->dropColumn('title_block_2');
            $table->dropColumn('desc_block_2');
            $table->dropColumn('title_block_3');
            $table->dropColumn('desc_block_3');
            $table->json('blocks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('privat_policy_models', function (Blueprint $table) {
            $table->json('title_block_1');
            $table->json('desc_block_1');
            $table->json('title_block_2');
            $table->json('desc_block_2');
            $table->json('title_block_3');
            $table->json('desc_block_3');
            $table->dropColumn('blocks');
        });
    }
}
