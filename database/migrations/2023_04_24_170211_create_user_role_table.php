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
        Schema::create('user_role', function (Blueprint $table) {
            $table->id('UsrRoleId');
            $table->unsignedBigInteger('UsrRolId');
            $table->unsignedBigInteger('UsrUseId');

            $table->foreign('UsrUseId')
            ->references('UseId')->on('users');
            $table->foreign('UsrRolId')
              ->references('RolId')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_role');
    }
};
