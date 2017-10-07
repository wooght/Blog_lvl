<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVipUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vip_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nulltable();
            $table->string('email')->unique();
            $table->string('password')->nulltable();
            $table->string('face_img');
            $table->rememberToken();
            $table->integer('user_status')->default('0');
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
        Schema::dropIfExists('vip_users');
    }
}
