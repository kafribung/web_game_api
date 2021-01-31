<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('hp')->nullable();
            $table->smallInteger('stage1')->default(0)->unsigned();
            $table->smallInteger('stage2')->default(0)->unsigned();
            $table->smallInteger('stage3')->default(0)->unsigned();
            $table->smallInteger('stage4')->default(0)->unsigned();
            $table->smallInteger('stage5')->default(0)->unsigned();
            $table->smallInteger('stage6')->default(0)->unsigned();
            $table->bigInteger('position_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
