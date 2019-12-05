<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriber_education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subscriber_id')->unsigned()->index('sub-education');
            $table->integer('level_id')->nullable()->unsigned();
            $table->string('level_name')->nullable();
            $table->date('from_date')->nullable();
            $table->date('date_date')->nullable();
            $table->integer('institution_id')->nullable()->unsigned()->index('sub-institution');
            $table->string('institution_name')->nullable();
            $table->integer('country_id')->unsigned();
            $table->string('supporting_doc')->nullable();
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
        Schema::dropIfExists('subscriber_education');
    }
}
