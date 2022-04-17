<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Player;

class PlayerApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PlayerAPI';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '外部APIから選手情報を取得する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Player $player)
    {
        $player_api = $player->basketapi();
    }
}
