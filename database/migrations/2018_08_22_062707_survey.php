<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Survey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobileNumber', 100);
            $table->string('question1', 100);
            $table->string('question2', 100)->nullable();
            $table->string('question3', 2000)->nullable();
            $table->string('question4', 2000)->nullable();
            $table->string('question5', 2000)->nullable();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
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
    }
}
