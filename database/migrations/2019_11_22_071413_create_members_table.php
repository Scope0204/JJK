<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        //목표, 사진 , 자기소개
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id'); //오토
            //$table->unsignedBigInteger('userId')->primary(); 
            $table->string('name'); //이름 
            $table->string('intro'); // 자기소개 
            $table->string('goal'); // 목표 
            $table->string('photo')->nullable();//사진
            $table->timestamps();
            // $table->foreign('userId')->references('userId')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
