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
        Schema::create('renting', function (Blueprint $table) {
            $table->id('RenId');
            $table->unsignedBigInteger('RenUseId');
            $table->unsignedBigInteger('RenAddId');
            $table->timestamp('RenCreatedDate')->nullable();
            $table->timestamp('RenReturnedDate')->nullable();
            $table->integer('RenPaid');
            $table->integer('BooRecived');
            $table->foreign('RenUseId')
            ->references('UseId')->on('users');
            $table->foreign('RenAddId')
            ->references('AddId')->on('address')->onDelete('cascade');
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
        Schema::dropIfExists('renting');
    }
};
