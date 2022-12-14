<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_detail', function (Blueprint $table) {
            $table->bigIncrements('user_detail_id');
            $table->timestamps();
            $table->bigInteger('uid')->nullable();
            $table->bigInteger('no_ktp')->nullable();
            $table->bigInteger('no_hp')->nullable();
            $table->bigInteger('referral_code')->nullable();
            $table->bigInteger('referral')->nullable();
            $table->bigInteger('referral_uid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_detail');
    }
};
