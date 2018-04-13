<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
/*            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');*/
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('type');
            $table->string('images');
            $table->string('time' , 15)->default('00:00:00');
            $table->string('tags');
            $table->integer('price');
            $table->integer('commentCount')->default(0);
            $table->integer('viewCount')->default(0);
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
        Schema::dropIfExists('courses');
    }
}
