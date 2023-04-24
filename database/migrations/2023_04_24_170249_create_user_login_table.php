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
        Schema::create('user_login', function (Blueprint $table) {
            $table->id('UslId');
            $table->timestamp('UslLoginDT')->nullable();
            $table->timestamp('UslLogoutDT')->nullable();
            $table->unsignedBigInteger('UslUseId');
            $table->foreign('UslUseId')
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
        Schema::dropIfExists('user_login');
    }
};
