<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();

            $table->string('footer_logo')->nullable();
            $table->json('footer_navigation');
            $table->json('footer_address_text');
            $table->string('footer_address_map')->nullable();
            $table->string('footer_tel')->nullable();
            $table->text('footer_social')->nullable();
            $table->json('footer_copyright');
            $table->json('footer_public_offer_text');
            $table->json('footer_public_offer_file');

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
        Schema::dropIfExists('footers');
    }
}
