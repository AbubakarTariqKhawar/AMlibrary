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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('UseId');
            $table->string('Usename');
            $table->string('UseSureName');
            $table->string('UseEmail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('UsePassword');
            $table->bigInteger('UsePhone');
            $table->string("UsePic")->nullable();
            $table->unsignedBigInteger('UseRolId');
            $table->foreign('UseRolId')
              ->references('RolId')->on('role');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
