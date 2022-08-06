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
            $table->integer('team_id')->unsigned();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->integer('jersey');
            $table->decimal('height', $precision=4, $scale=1);
            $table->decimal('weight', 4, 1);
            $table->string('position', 10);
            $table->string('birthday',100);
            $table->string('birthcity',100);
            $table->string('birthcountry',100);
            $table->string('college', 100);
            $table->string('highschool', 100);
            $table->string('image', 100);
            $table->integer('experience');
            $table->integer('salary');
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
