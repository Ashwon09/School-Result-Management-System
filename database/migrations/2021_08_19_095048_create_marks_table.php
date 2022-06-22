<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('student_id')->nullable();
            $table->foreignId('student_id')->constrained();
            // $table->unsignedInteger('subject_id')->nullable();
            $table->foreignId('subject_id')->constrained();
            $table->String('class');
            $table->integer('marks');
            $table->String('grade')->nullable(); 
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
        Schema::dropIfExists('marks');
    }
}
