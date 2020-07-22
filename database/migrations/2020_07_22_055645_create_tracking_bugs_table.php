<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_bugs', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->integer('status');
            $table->unsignedBigInteger('bugId');

            // ! adding the relationship to the bugs table. 
            $table->foreign('bugId')->references('id')->on('bugs')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('firstLineSupportId');

            // ! adding the relationship to the users table for the reporters table. 
            $table->foreign('firstLineSupportId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->boolean('firstLineSupportApproval')->nullable();

            $table->longText('firstLineSupportComments')->nullable();

            $table->string('firstLineSupportResponseTime')->nullable();

            $table->unsignedBigInteger('technicalLead')->nullable();

            // ! adding the relationship to the users table for the reporters table. 
            $table->foreign('technicalLead')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->boolean('technicalLeadApproval')->nullable();

            $table->longText('technicalLeadComments')->nullable();

            $table->string('technicalLeadResponseTime')->nullable();

            $table->unsignedBigInteger('closedBy')->nullable();

            // ! adding the relationship to the users table for the reporters table. 
            $table->foreign('closedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->date('closingDateProjected')->nullable();

            $table->date('actualClosingDate')->nullable();

            $table->longText('closingComments')->nullable();

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
        Schema::dropIfExists('tracking_bugs');
    }
}
