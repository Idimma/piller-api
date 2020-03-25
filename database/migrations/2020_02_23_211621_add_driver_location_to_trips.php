<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDriverLocationToTrips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            //
            $table->string('driver_address')->nullable()->after('status_id');
            $table->string('driver_lat')->nullable()->after('driver_address');
            $table->string('driver_lon')->nullable()->after('driver_lat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trips', function (Blueprint $table) {
            //
            $table->dropColumn('driver_address');
            $table->dropColumn('driver_lat');
            $table->dropColumn('driver_lon');

        });
    }
}
