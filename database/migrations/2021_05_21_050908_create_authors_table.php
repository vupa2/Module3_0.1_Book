<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('category_id');
            $table->string('name', 200);
            $table->date('year_of_birth')->nullable();
            $table->date('year_of_dead')->nullable();
            $table->integer('age')->nullable();
            $table->string('country')->nullable();
            $table->string('image')->nullable();
            $table->integer('total_books')->default(0);
            $table->longText('description')->nullable();
            $table->text('summary')->nullable();
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
        Schema::dropIfExists('authors');
    }
}
