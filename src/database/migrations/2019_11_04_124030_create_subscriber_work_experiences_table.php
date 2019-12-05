<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriber_work_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subscriber_id')->unsigned()->index('sub-work_experiences');
            $table->integer('level_id')->nullable()->unsigned();
            $table->string('position')->nullable();
            $table->mediumText('responsibilities')->nullable();
            $table->date('from_date')->nullable();
            $table->date('date_date')->nullable();
            $table->integer('institution_id')->nullable()->unsigned()
                ->index('sub-work_experiences-institution');
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
        Schema::dropIfExists('subscriber_work_experiences');
    }
}
