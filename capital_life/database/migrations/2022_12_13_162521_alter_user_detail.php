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

        // Finally, add the foreign key constraint to the user_detail table.
        Schema::table('user_detail', function (Blueprint $table) {
            $table->foreign('uid')
                    ->references('id')
                    ->on('users');
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
    }
};
