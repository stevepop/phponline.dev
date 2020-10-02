<?php

use App\Models\Link;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->mediumText('body')->nullable();
            $table->string('url');

            $table->string('status')->default(Link::STATUS_SUBMITTED);

            $table->boolean('approved')->default(false);

            $table->unsignedBigInteger('user_id');

            $table->timestamp('publish_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
