<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing ID
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('address'); 
            $table->string('mobile');
            $table->string('year_level');
            $table->string('course');
            $table->string('section');
            $table->timestamps(); // This creates `created_at` and `updated_at` columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
