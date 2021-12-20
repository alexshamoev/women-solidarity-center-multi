<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuButtonsStep1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_buttons_step_1', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table -> string('title_ge') -> default('');
			$table -> string('title_en') -> default('');
			$table -> string('title_ru') -> default('');
            $table -> string('free_link_ge') -> default('');
			$table -> string('free_link_en') -> default('');
			$table -> string('free_link_ru') -> default('');
			$table -> string('link_type') -> default('page');
			$table -> integer('module_step') -> default(0);
			$table -> integer('page') -> default(0);
			$table -> integer('open_in_new_tab') -> default(0);
			$table -> integer('parent') -> default(0);
			$table -> integer('rang') -> default(0);
			$table -> integer('published') -> default(0);
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
        Schema::dropIfExists('menu_buttons_step_1');
    }
}