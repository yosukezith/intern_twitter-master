<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendshipsTable extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendships', function (Blueprint $table) {
            $table->integer('follower_id')->unsigned();

            $table->foreign('follower_id')->references('id')->on('users');

            $table->integer('followee_id')->unsigned();

            $table->foreign('followee_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * マイグレーションを戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friendships');
    }
}
