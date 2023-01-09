<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->integer('role')->default('0');
            $table->integer('salary');
            $table->string('desigination');
            $table->date('dob');
            $table->string('address');
            $table->timestamps();
        });

        DB::table('employees')->insert(
            array(
                'name' => 'satyam',
                'email' => 'satyam@gmail.com',
                'password' => 'satyam',
                'role' => 1,
                'salary' => 5000,
                'desigination' => 'developer',
                'dob' => '2004-05-05',
                'address' => 'varaashi'
         
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
