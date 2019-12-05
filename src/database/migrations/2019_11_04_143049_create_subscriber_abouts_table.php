<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriber_abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subscriber_id')->unsigned()->index('sub-abouts');
            $table->integer('job_title_id')->unsigned()->nullable();
            $table->string('job_title',100)->nullable();
            $table->mediumText('about');
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
        Schema::dropIfExists('subscriber_abouts');
    }
}
