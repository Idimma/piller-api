<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('customer_code');
            $table->dropColumn('authorization_code');
            $table->dropColumn('customer_id');
            $table->dropColumn('last_four');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('customer_code');
            $table->string('authorization_code');
            $table->integer('customer_id');
            $table->integer('last_four');
        });
    }
}
