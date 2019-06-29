<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibliothequeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliotheque', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('owner');
            $table->string('phoneNumber');
            $table->string('city');
            $table->string('quarter');
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
        Schema::dropIfExists('bibliotheque');
    }
}
