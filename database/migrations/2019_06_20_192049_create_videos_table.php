<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title',170);
            $table->string('low',170)->nullable();
            $table->string('medium',170)->nullable();
            $table->string('high',170)->nullable();
            $table->string('thumbnail',170);
            $table->smallInteger('status');// 1 - active 2 - pending 3 - blocked
            $table->bigInteger('views');
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
        Schema::dropIfExists('videos');
    }
}
