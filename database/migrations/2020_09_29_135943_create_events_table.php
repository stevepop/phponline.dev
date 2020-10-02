<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->mediumText('body')->nullable();
            $table->string('external_url')->nullable();
            $table->boolean('published')->default(false);
            $table->morphs('eventable');
            $table->string('timezone');
            $table->datetime('starts_at')->nullable();
            $table->datetime('ends_at')->nullable();
            $table->datetime('publish_date')->nullable();
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
        Schema::dropIfExists('events');
    }
}
