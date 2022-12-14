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
        //
        Schema::create('capital_categories', function (Blueprint $table) {
            $table->bigIncrements('category_id')->unsigned();
            $table->string('category_name')->unique();
            $table->text('category_description')->nullable();
            $table->boolean('category_active')->default(true);
            $table->timestamps();
        });
        Schema::create('capital_articles_category', function (Blueprint $table) {
            $table->bigIncrements('cac_id');
            $table->unsignedBigInteger('capital_articles_id');
            $table->unsignedBigInteger('capital_category_id');
      
            $table->foreign('capital_articles_id')
                  ->references('id')
                  ->on('capital_articles');
      
            $table->foreign('capital_category_id')
                  ->references('category_id')
                  ->on('capital_categories');
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
        Schema::dropIfExists('capital_categories');
        Schema::dropIfExists('capital_articles_category');
    }
};
