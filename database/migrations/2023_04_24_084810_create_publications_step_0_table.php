<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsStep0Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications_step_0', function (Blueprint $table) {
            $table->id();
            $table->string('alias_en')->default('');
            $table->string('alias_az')->default('');
            $table->string('alias_ar')->default('');
            $table->string('title_en')->default('');
            $table->string('title_az')->default('');
            $table->string('title_ar')->default('');
            $table->string('datetime_en')->nullable();
            $table->string('datetime_az')->nullable();
            $table->string('datetime_ar')->nullable();
            $table->text('header_text_en')->nullable();
            $table->text('header_text_az')->nullable();
            $table->text('header_text_ar')->nullable();
            $table->text('black_text_en')->nullable();
            $table->text('black_text_az')->nullable();
            $table->text('black_text_ar')->nullable();
            $table->longText('main_text_en')->nullable();
            $table->longText('main_text_az')->nullable();
            $table->longText('main_text_ar')->nullable();
            $table->integer('rang')->default(0);
            $table->string('meta_title_en')->default('');
            $table->string('meta_title_az')->default('');
            $table->string('meta_title_ar')->default('');
            $table->string('meta_description_en')->default('');
            $table->string('meta_description_az')->default('');
            $table->string('meta_description_ar')->default('');
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
        Schema::dropIfExists('publications_step_0');
    }
}
