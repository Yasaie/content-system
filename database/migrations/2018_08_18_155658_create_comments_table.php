<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('website')->nullable();
			$table->mediumText('comment')->nullable();
			$table->unsignedInteger('parent_id')->nullable();
			$table->unsignedInteger('commentable_id');
			$table->string('commentable_type');
			$table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')
            	  ->references('id')->on('comments')
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
        Schema::dropIfExists('comments');
    }
}
