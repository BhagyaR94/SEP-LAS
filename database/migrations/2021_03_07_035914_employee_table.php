<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('id')->autoIncrement(); 
            $table->timestamps();
            $table->string('full_name')->nullable(false);
            $table->string('initials')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('designation')->nullable(false);
            $table->date('date_joined')->nullable(false);
            $table->string('primary_address')->nullable(false);
            $table->string('secondary_address')->nullable(false);
            $table->string('primary_contact')->nullable(false);
            $table->string('secondary_contact')->nullable(false);
            $table->string('user_name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
            $table->integer('user_type')->nullable(false);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
