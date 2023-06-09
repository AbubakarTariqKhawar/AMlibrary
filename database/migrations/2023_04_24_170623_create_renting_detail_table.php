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
        Schema::create('renting_detail', function (Blueprint $table) {
            $table->id('RedId');
            $table->unsignedBigInteger('RedRenId');
            $table->unsignedBigInteger('RedUseId');
            $table->unsignedBigInteger('RedBooId');

            $table->foreign('RedRenId')
            ->references('RenId')->on('renting');
            $table->foreign('RedUseId')
            ->references('UseId')->on('users');
            $table->foreign('RedBooId')
              ->references('BooId')->on('book');
              $table->integer('RedQuantity');
              $table->integer('RedPrice');
              $table->integer('RedReturned');
              $table->unsignedBigInteger('RedAddId');
              $table->foreign('RedAddId')
                ->references('AddId')->on('address')->onDelete('cascade');
              $table->timestamp('RedCreatedDate')->nullable();
              $table->timestamp('RedReturnedDate')->nullable();
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
        Schema::dropIfExists('renting_detail');
    }
};
