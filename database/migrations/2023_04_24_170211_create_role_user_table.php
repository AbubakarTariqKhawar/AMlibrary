<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_UseId');
            $table->unsignedBigInteger('role_RolId');
            $table->timestamps();

            $table->foreign('user_UseId')
                ->references('UseId')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('role_RolId')
                ->references('RolId')
                ->on('role')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
