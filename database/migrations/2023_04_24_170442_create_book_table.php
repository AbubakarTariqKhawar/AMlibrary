<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id('BooId');
            $table->unsignedBigInteger('BooCatId');
            $table->string('BooName');
            $table->string('BooDescription');
            $table->string('BooPicture');
            $table->text('BooLink');
            $table->integer('BooPrice');
            $table->foreign('BooCatId')
            ->references('CatId')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
};
