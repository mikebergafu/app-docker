<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberCoverLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriber_cover_letters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subscriber_id')->unsigned()->index('sub-cover_letters');
            $table->integer('job_id')->unsigned()->index('sub-job-cover_letters');
            $table->string('cover_doc');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('subscriber_cover_letters');
    }
}
