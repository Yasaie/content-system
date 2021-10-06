<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNestedablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nestedables', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nested_id');
            $table->string('nestable_type');
            $table->unsignedInteger('nestable_id');

            $table->foreign('nested_id')
			      ->references('id')->on('nested')
				  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nestedable');
    }
}
