<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterLinksStep1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_links_step_1', function (Blueprint $table) {
            $table -> id();
			$table -> integer('top_level') -> default(0);
            $table -> string('title') -> default('');
			$table -> integer('page_id') -> default(0);
			$table -> integer('rang') -> default(0);
            $table -> string('free_link') -> default('');
			$table -> string('link_type') -> default('page');
			$table -> integer('module_step') -> default(0);
			$table -> integer('open_in_new_tab') -> default(0);
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
        Schema::dropIfExists('footer_links_step_1');
    }
}
