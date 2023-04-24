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
        Schema::create('bank', function (Blueprint $table) {
            $table->id('BanID');
            $table->unsignedBigInteger('BanUseId');
            $table->bigInteger('BanCardNumber');
            $table->string('BanOwenrName');
            $table->integer('BanExpireMonth');
            $table->integer('BanExpireYear');
            $table->integer('CVV');

            $table->foreign('BanUseId')
            ->references('UseId')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank');
    }
};
