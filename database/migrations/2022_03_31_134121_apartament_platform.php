<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApartamentPlatform extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_apartament', function (Blueprint $table) {
            $table->id();
            $table->date("register_date");
            $table->boolean("premium");
            $table->unsignedBigInteger("apartament_id");
            $table->unsignedBigInteger("platform_id");
            $table->foreign("apartament_id")->references("id")->on("apartaments");
            $table->foreign("platform_id")->references("id")->on("platforms");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
