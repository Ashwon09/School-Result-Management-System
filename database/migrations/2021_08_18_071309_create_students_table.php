<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->String('symbol_number')->unique();
            $table->String('first_name');
            $table->String('last_name');
            $table->String('contact_number')->nullable();
            $table->String('email')->nullable();
            $table->date('dob');
            $table->enum('gender',['male','female']);
            $table->String('class');
            $table->String('father_name');
            $table->String('province');
            $table->String('district');
            $table->String('address');
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
        Schema::dropIfExists('students');
    }
}
