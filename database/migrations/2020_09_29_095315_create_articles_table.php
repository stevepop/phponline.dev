<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('excerpt');
            $table->mediumText('body');

            $table->string('external_url')->nullable();
            $table->string('tweet_url')->nullable();

            $table->string('level');

            $table->boolean('published')->default(false);
            $table->boolean('send_automated_tweet')->default(true);
            $table->boolean('tweet_sent')->default(false);

            $table->string('preview_secret');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('submitted_by_user_id')->nullable();


            $table->datetime('publish_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('submitted_by_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
