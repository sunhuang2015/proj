<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string("req")->unique();
            $table->string('applicant');
            $table->string('phone');
            $table->string('subject');
            $table->decimal('network_qty')->default(0);
            $table->decimal('telephone_qty')->default(0);
            $table->text('description');
            $table->string('department')->nullable();
            $table->string('costcenter');
            $table->integer('step_id')->unsigned()->default(1);

            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('step_id')->references('id')->on('steps')->onDelete('cascade');
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
        Schema::drop('projects');
    }
}
