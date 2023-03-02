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
        Schema::create('commons', function (Blueprint $table) {
            $table->id();
            $table -> bigInteger('user_id') -> unsigned();
            $table -> bigInteger('post_id') -> unsigned();
            $table -> timestamps();
            $table -> string('CommonMsg');

            $table -> foreign('user_id') -> references('id') -> on('users')
            -> onDelete('cascade') -> onUpdate('cascade');
            $table -> foreign('post_id') -> references('id') -> on('posts')
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
        Schema::dropIfExists('commons');
    }
};
