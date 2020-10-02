<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');

            $table->mediumText('body')->nullable();

            $table->string('url')->nullable();

            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->boolean('published')->default(false);

            $table->unsignedBigInteger('submitted_by_user_id')->nullable();

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
        Schema::dropIfExists('user_groups');
    }
}
