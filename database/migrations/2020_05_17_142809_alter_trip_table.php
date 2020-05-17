<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('trips', function(Blueprint $table){
            $table->double('quantity', 10,2)->after('price');
            $table->timestamp('due_date')->nullable()->after('quantity');
            $table->text('comment')->nullable()->after('due_date');
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
        Schema::table('trips', function(Blueprint $table){
            $table->dropColumn('quantity');
            $table->dropColumn('due_date');
            $table->dropColumn('comment');
        });
    }
}
