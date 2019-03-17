<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
		Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->unsignedInteger('cat_id')->nullable();
			$table->unsignedInteger('tag_id')->nullable();
			$table->string('photourl')->nullable();;
			$table->enum('status', array( 'available', 'pending', 'sold'))->nullable()->index('status');
            $table->timestamps();
        });
		Schema::table('pets', function (Blueprint $table) {
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
        });
		Schema::table('pets', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('tags');
    }
}
