<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserToTripReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trip_details', function (Blueprint $table) {
            //
            $table->bigInteger('reviewer_id')->unsigned()->after('trip_id');
            $table->foreign('reviewer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trip_details', function (Blueprint $table) {
            //
            $table->dropForeign('reviewer_id');
            $table->dropColumn('reviewer_id');
        });
    }
}
