<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VideosTags extends Migration
{

    public function up()
    {
        Schema::create('videos_tags', function (Blueprint $table) {
            
            $table->bigInteger('video_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();

            $table->foreign('tag_id')
                ->references('id')->on('tags')
                ->onDelete('cascade');

            $table->foreign('video_id')
                ->references('id')->on('videos')
                ->onDelete('cascade');

            $table->primary(['video_id', 'tag_id']);

            $table->timestamps();
        });
    }

    public function down()
    {
        
    }
}
