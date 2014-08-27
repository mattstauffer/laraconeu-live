<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkMessagesToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function(Blueprint $table)
        {
            $table->integer('user_id')->nullable();
        });

        Schema::table('users', function(Blueprint $table)
        {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function(Blueprint $table)
        {
            $table->dropColumn('user_id');
        });

        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
        });
    }
}
