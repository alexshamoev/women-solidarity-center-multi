<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventStep0Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_step_0', function (Blueprint $table) {
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
            $table->string('register_link')->default('');
            $table->string('address_en', 250)->default('');
            $table->string('address_ar', 250)->default('');
            $table->string('address_az', 250)->default('');
            $table->timestamp('event_date')->nullable();
            $table->integer('rang')->default(0);
            $table->string('meta_title_en')->default('');
            $table->string('meta_title_ar')->default('');
            $table->string('meta_title_az')->default('');
            $table->string('meta_description_en')->default('');
            $table->string('meta_description_ar')->default('');
            $table->string('meta_description_az')->default('');
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
        Schema::dropIfExists('event_step_0');
    }
}
