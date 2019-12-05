<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMSISDNSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_s_i_s_d_n_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('msisdn');
            $table->string('network')->default('mtn');
            $table->string('password');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_subscribed')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('m_s_i_s_d_n_s');
    }
}
