<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('price');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('language')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('author')->nullable();
            $table->string('numberOfPage')->nullable();
            $table->string('isbn')->nullable();
            $table->string('literaryPrize')->nullable();
            $table->string('schoolLevel')->nullable();
            $table->string('documentType');
            $table->string('idLibrary');
            $table->foreign('idLibrary')->references('id')
                                        ->on('bibliotheque')
                                        ->onDelete('null');
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
        Schema::dropIfExists('document');
    }
}
