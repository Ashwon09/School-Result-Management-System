<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistrationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registration_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
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
            $table->enum('status',['waiting','processing','rejected','completed'])->default('waiting');
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
        Schema::dropIfExists('student_registration_requests');
    }
}
