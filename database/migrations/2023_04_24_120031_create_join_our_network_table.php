<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinOurNetworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_our_network', function (Blueprint $table) {
            $table->id();
            $table->string('title_en', 250)->default('');
            $table->string('title_az', 250)->default('');
            $table->string('title_ar', 250)->default('');
            $table->text('text_en')->nullable();
            $table->text('text_az')->nullable();
            $table->text('text_ar')->nullable();
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
        Schema::dropIfExists('join_our_network');
    }
}
