<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        //id, password , birth , number , email , 사진
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); //id 값 
            $table->string('name'); // 이름 
            $table->string('birth'); // 생일
            $table->string('number'); // 전화번호
            $table->string('email')->unique(); //이메일
            $table->string('password'); // 비번
            $table->timestamps(); 
            $table->string('photo')->nullable();
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
}
