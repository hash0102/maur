<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('height', 4, 1);
            $table->double('weight', 4, 1);
            $table->double('PPG', 3, 1);
            $table->double('RPG', 3, 1);
            $table->double('APG', 3, 1);
            $table->double('MPG', 3, 1);
            $table->double('FG', 3, 1);
            $table->double('three_point', 3, 1);
            $table->double('FT', 3, 1);
            $table->integer('team_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->integer('age');
            $table->string('image', 100);
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
        Schema::dropIfExists('players');
    }
}
