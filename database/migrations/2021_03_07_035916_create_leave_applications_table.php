<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('applicant_id')->nullable(false);
            $table->timestamps();
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable(false);
            $table->string('reason',225)->nullable(false);
            $table->char('type',120)->nullable(false);
            $table->enum('half_day', ['morning','evening']);       
            $table->string('contact_location')->nullable(false);
            $table->enum('status',['pending','approved','rejected'])->nullable(false);
            $table->integer('substitute_employee_id');
            $table->integer('supervisor_employee_id')->nullable(false);
            
            //constraints 
            //$table->primary('id');
            $table->unique( ['applicant_id', 'start_date', 'end_date' ]);
         #   $table->foreign('substitute_employee_id')->references('id')->on('employee');
         #   $table->foreign('supervisor_employee_id')->references('id')->on('employee');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_applications');
    }
}
