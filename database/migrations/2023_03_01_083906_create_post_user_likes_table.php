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
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('post_id');
            $table->unsignedSmallInteger('user_id');

            $table->index('post_id' , 'pul_post_idx');
            $table->index('user_id' , 'pul_user_idx');

            $table->foreign('post_id', 'pul_post_fk')->on('posts')->references('id');
            $table->foreign('user_id', 'pul_user_fk')->on('users')->references('id');
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
        Schema::drop('post_user_likes');
    }
};