<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventStep1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_step_1', function (Blueprint $table) {
            $table->id();
            $table->integer('top_level')->default(0);
            $table->string('title_en')->default('');
            $table->string('title_ar')->default('');
            $table->string('title_az')->default('');
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
        Schema::dropIfExists('event_step_1');
    }
}
