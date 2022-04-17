<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Team;

class TeamApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TeamAPI';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '外部APIからチーム情報を取得する';

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
    public function handle(Team $team)
    {
        $team_api = $team->teamapi();
    }
}
