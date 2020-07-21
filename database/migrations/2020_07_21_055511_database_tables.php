<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bugs', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->text('decription');
            $table->text('expectation');
            $table->date('dateNoticed');
            $table->string('software');
            $table->unsignedBigInteger('reporter_id');

            //! added the relationships with users.
            $table->foreign('reporter_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('evidences', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('loaction_pointer');
            $table->unsignedBigInteger('bug_id')->nullable();

            // !
            $table->foreign('bug_id')->references('id')->on('bugs')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('lead_approvals', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('bug_id')->nullable();

            // ! 
            $table->foreign('bug_id')->references('id')->on('bugs')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('leadApproval_id');

            // ! 
            $table->foreign('leadApproval_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedBigInteger('firstLineSupport_id')->nullable();

            // ! 
            $table->foreign('firstLineSupport_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


            $table->boolean('approval');
            $table->text('reason');
            $table->date('expected_fixing_date');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('first_line_supports', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bug_id')->nullable();

            // ! 
            $table->foreign('bug_id')->references('id')->on('bugs')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedBigInteger('firstLineSupport_id');

            // !
            $table->foreign('firstLineSupport_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            
            $table->boolean('approval');
            $table->text('reason');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('bugs');
        Schema::dropIfExists('evidences');
        Schema::dropIfExists('lead_approvals');
        Schema::dropIfExists('first_line_supports');

    }
}
