<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedItemsTable extends Migration
{
    public function up()
    {
        Schema::create('feed_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->string('website');
            $table->json('json')->nullable();
            $table->datetime('published_at');

            $table->unsignedBigInteger('feed_id');
            $table->timestamps();
            $table->foreign('feed_id')->references('id')->on('feeds')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('feed_items');
    }
}
