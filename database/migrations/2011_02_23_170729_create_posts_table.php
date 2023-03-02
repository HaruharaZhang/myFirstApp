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
        Schema::create('post', function (Blueprint $table) {
            //$table -> primary(['postId', 'userId']);
            $table -> id();
            $table -> bigInteger('user_id') -> unsigned();
            $table -> string('title');
            $table -> timestamps();
            $table -> string('desc');
            $table -> string('message');

            $table -> foreign('user_id') -> references('id') -> on('users')
            -> onDelete('cascade') -> onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
};