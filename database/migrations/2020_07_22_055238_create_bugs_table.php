<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->longText('description');
            $table->longText('expectation');
            $table->date('dateNoticed');            
            $table->bigInteger('applicationId')->unsigned();

            // ! adding the relationship to the applications table. 
            $table->foreign('applicationId')->references('id')->on('applications')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('reporterId');

            // ! adding the relationship to the users table for the reporters table. 
            $table->foreign('reporterId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('bugs');
    }
}
