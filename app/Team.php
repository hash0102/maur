<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'abname',
        'state_name',
        'image',
        'conference'
        ];

    public function players()   
    {
    return $this->hasMany('App\Player');
    }
    
        public function playerapis()   
    {
    return $this->hasMany('App\Playerapi');
    }

    public function Posts()
    {
        return $this->hasMany('App\Post');
    }
    
     public function teamapi(){
        
        $curl = curl_init();
        
        curl_setopt_array($curl, [
        	CURLOPT_URL => "https://api.sportsdata.io/v3/nba/scores/json/AllTeams?key=6a29d7bfa4364c1b9546b3c736a07556",
        	CURLOPT_RETURNTRANSFER => true,
        	CURLOPT_FOLLOWLOCATION => true,
        	CURLOPT_ENCODING => "",
        	CURLOPT_MAXREDIRS => 10,
        	CURLOPT_TIMEOUT => 30,
        	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        	CURLOPT_CUSTOMREQUEST => "GET",
        	CURLOPT_HTTPHEADER => [
    	        "Ocp-Apim-Subscription-Host: https://api.sportsdata.io/v3/nba/scores/json/teams",
        		"Ocp-Apim-Subscription-Key: 6a29d7bfa4364c1b9546b3c736a07556 "
        	],
        ]);
        
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
        	echo "cURL Error #:" . $err;
        } else {
            
        $team_content_api=json_decode($response, true);
        for ($i=0; $i<30; $i++)
            {
            $team = new Self;
            
            $teamAbName=$team_content_api[$i]['Key'];
            $city=$team_content_api[$i]['City'];
            $teamName=$team_content_api[$i]['Name'];
            $image=$team_content_api[$i]['WikipediaLogoUrl'];
            $conference=$team_content_api[$i]['Conference'];
            
            $team->name = $teamName;
            $team->abname = $teamAbName;
            $team->state_name = $city;
            $team->image = $image;
            $team->conference = $conference;
            
            $team->save();
            
            }
      }
    }
}