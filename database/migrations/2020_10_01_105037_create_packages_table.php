<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->mediumText('body')->nullable();
            $table->string('external_url');
            $table->boolean('published')->default(false);
            $table->json('json')->nullable();
            $table->unsignedBigInteger('submitted_by_user_id')->nullable();
            $table->datetime('publish_date')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('packages');
    }
}
