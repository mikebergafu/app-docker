<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('msisdn_id')->unsigned()->index('sub_msisdn');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names');
            $table->string('phone_number');
            $table->string('optional_phone')->nullable();
            $table->string('email',100)->unique();
            /*$table->timestamp('email_verified_at')->nullable();*/
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
        Schema::dropIfExists('subscribers');
    }
}
