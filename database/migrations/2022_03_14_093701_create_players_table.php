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
            $table->string('name', 50);
            $table->double('height', 4, 1);
            $table->double('weight', 4, 1);
            $table->double('PPG', 3, 1);
            $table->double('RPG', 3, 1);
            $table->double('APG', 3, 1);
            $table->double('MPG', 3, 1);
            $table->double('FG', 3, 1);
            $table->double('3P', 3, 1);
            $table->double('FT', 3, 1);
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
