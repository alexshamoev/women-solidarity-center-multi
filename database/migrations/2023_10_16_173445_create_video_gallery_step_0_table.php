<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoGalleryStep0Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_gallery_step_0', function (Blueprint $table) {
            $table->id();
            $table->string('alias_en')->default('');
            $table->string('alias_ar')->default('');
            $table->string('alias_az')->default('');
            $table->string('title_en')->default('');
            $table->string('title_ar')->default('');
            $table->string('title_az')->default('');
            $table->text('text_en')->nullable();
            $table->text('text_ar')->nullable();
            $table->text('text_az')->nullable();
            $table->string('youtube_link')->default('');
            $table->integer('rang')->default(0);
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
        Schema::dropIfExists('video_gallery_step_0');
    }
}
