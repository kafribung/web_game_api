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
            $table->smallInteger('game1')->default(0)->unsigned();
            $table->smallInteger('game2')->default(0)->unsigned();
            $table->smallInteger('game3')->default(0)->unsigned();
            $table->smallInteger('game4')->default(0)->unsigned();
            $table->smallInteger('game5')->default(0)->unsigned();
            $table->smallInteger('game6')->default(0)->unsigned();
            $table->smallInteger('total')->default(0)->unsigned();
            $table->bigInteger('position_id')->unsigned();
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
