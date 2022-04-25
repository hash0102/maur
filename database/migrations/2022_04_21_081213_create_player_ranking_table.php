<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerRankingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_ranking', function (Blueprint $table) {
            $table->bigInteger('player_id')->unsigned();
            $table->bigInteger('ranking_id')->unsigned();
            $table->string('position',10);
            $table->primary(['player_id', 'ranking_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_ranking');
    }
}
