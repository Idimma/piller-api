<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserImageToUserTable extends Migration
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
            $table->string('uuid')->nullable()->after('id');
            $table->boolean('status')->default(1)->after('password');
            $table->string('image_url')->nullable()->after('password');
            $table->string('phone')->nullable()->after('image_url');
            $table->softDeletes();
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
            $table->dropColumn('image_url');
            $table->dropColumn('uuid');
            $table->dropColumn('status');
            $table->dropColumn('phone');
            $table->dropSoftDeletes();
        });
    }
}
