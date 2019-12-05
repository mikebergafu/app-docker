<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBigExtraContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('big_extra_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('extra_id')->unsigned();
            $table->integer('system_entity_id');
            $table->bigInteger('record_id')->unsigned();
            $table->longText('content');
            $table->smallInteger('user_type');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('big_extra_contents');
    }
}
