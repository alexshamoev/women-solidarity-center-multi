<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveModuleLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('module_levels');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('module_levels', function (Blueprint $table) {
            $table->id();
            $table->integer('top_level')->default(0);
            $table->string('title')->default('');
            $table->integer('rang') -> default(0);
            $table->timestamps();
        });
    }
}
