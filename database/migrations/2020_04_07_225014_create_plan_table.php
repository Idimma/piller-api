<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('plan_type')->nullable();
            $table->string('plan_name')->nullable();
            $table->string('building_type')->nullable();
            $table->text('material_estimation')->nullable();
            $table->enum('material_type', ['block', 'cement', 'both']);
            $table->integer('cement_percentage')->default(0);
            $table->integer('block_percentage')->default(0);
            $table->string('start_date')->nullable();
            $table->bigInteger('block_target')->default(0);
            $table->bigInteger('cement_target')->default(0);

            $table->string('plan_status')->nullable();
            $table->double('deposit',19,5);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
