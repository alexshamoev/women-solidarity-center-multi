<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoGalleryStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema :: create('photo_gallery_step_0', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> string('title_ge') -> default('');
            $table -> string('title_en') -> default('');
            $table -> string('title_ru') -> default('');
            $table -> integer('rang') -> default(0);
            $table -> integer('published') -> default(1);
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema :: dropIfExists('photo_gallery_step_0');
    }
}