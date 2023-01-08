<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpExpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_exps', function (Blueprint $table) {
                $table->increments('id');
            $table->integer('emp_id');
                $table->string('compony');
                $table->integer('last_salary');
                $table->string('desigiation');
                $table->integer('experience');
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
        Schema::dropIfExists('emp_exp');
    }
}
