<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\TeamStat;

class TeamStatsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TeamStatsAPI';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '外部からチームのスタッツ情報を取得';

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
    public function handle(TeamStat $teamStat)
    {
        $teamStat = $teamStat->teamStatsApi();
    }
}
