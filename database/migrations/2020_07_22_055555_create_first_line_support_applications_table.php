<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirstLineSupportApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first_line_support_applications', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('firstLineSupportId');

            // ! adding the relationship to the users table. 
            $table->foreign('firstLineSupportId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('applicationId')->unsigned();

            // ! adding the relationship to the applications table. 
            $table->foreign('applicationId')->references('id')->on('applications')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('first_line_support_applications');
    }
}
