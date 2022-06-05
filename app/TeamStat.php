<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamStat extends Model
{
     protected $fillable = [
        'name',
        'team_id',
        'win',
        'lose',
        ];
    
    public function teamStatsApi()
    {
        
        $curl = curl_init();
        
        curl_setopt_array($curl, [
        	CURLOPT_URL => "https://api.sportsdata.io/v3/nba/scores/json/TeamSeasonStats/2022?key=6a95fe096b624968bd33620f83c32082",
        	CURLOPT_RETURNTRANSFER => true,
        	CURLOPT_FOLLOWLOCATION => true,
        	CURLOPT_ENCODING => "",
        	CURLOPT_MAXREDIRS => 10,
        	CURLOPT_TIMEOUT => 30,
        	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        	CURLOPT_CUSTOMREQUEST => "GET",
        	CURLOPT_HTTPHEADER => [
    	        "Ocp-Apim-Subscription-Host: https://api.sportsdata.io/v3/nba/scores/json/TeamSeasonStats/2022",
        		"Ocp-Apim-Subscription-Key: 6a29d7bfa4364c1b9546b3c736a07556 "
        	],
        ]);
        
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
        	echo "cURL Error #:" . $err;
        } else {
            
            $team_stats_api=json_decode($response, true);
            for ($i=0; $i<30; $i++)
            {
                $teamStat = new Self;
                $teamId=$team_stats_api[$i]['TeamID'];
                $name=$team_stats_api[$i]['Name'];
                $win=$team_stats_api[$i]['Wins'];
                $lose=$team_stats_api[$i]['Losses'];
                $teamStat->team_id = $teamId;
                $teamStat->name = $name;
                $teamStat->win = $win;
                $teamStat->lose = $lose;
                $teamStat->save();
            }
        }
    }
}
