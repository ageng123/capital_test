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
        Schema::create('users_points', function (Blueprint $table) {
            $table->bigIncrements('up_id');
            $table->unsignedBigInteger('uid')->nullable();
            $table->unsignedBigInteger('point')->nullable()->default(0);
            $table->datetime('expired')->nullable();
            $table->timestamps();
        });
        Schema::create('users_point_histories', function(Blueprint $table){
            $table->bigIncrements('uph_id');
            $table->unsignedBigInteger('articles_id')->nullable();
            $table->unsignedBigInteger('history_type')->nullable()->default(1);
            $table->unsignedBigInteger('withdraw_status')->nullable();
            $table->unsignedBigInteger('withdraw_amount')->nullable();
            $table->unsignedBigInteger('point_amount')->nullable();
            $table->unsignedBigInteger('uid')->nullable();
            $table->timestamps();
        });
        Schema::table('users_point_histories', function(Blueprint $table){
            $table->foreign('uid')->references('id')->on('users');
            $table->foreign('articles_id')->references('id')->on('capital_articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_points');
        Schema::dropIfExists('users_point_histories');
    }
};
