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
            $table->string('BanCardNumber');
            $table->string('BanOwenrName');
            $table->integer('BanExpireMonth');
            $table->integer('BanExpireYear');
            $table->string('CVV');

            $table->foreign('BanUseId')
            ->references('UseId')->on('users');
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
        Schema::dropIfExists('bank');
    }
};
