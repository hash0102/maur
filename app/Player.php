<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    
    protected $fillable = [
        'team_id',
        'first_name',
        'last_name',
        'jersey',
        'height',
        'weight',
        'position',
        'birthday',
        'birthcity',
        'birthcountry',
        'college',
        'highschool',
        'image',
        'experience',
        'salary'
    ];
    
    public function getPlayerPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('team_id', 'ASC')->paginate($limit_count);
    }

    public function posts()
    {
        return $this->hasMany('App\Post');  
    }
    
    public function team()
    {
        return $this->belongsTo('App\Team');  
    }
    
    public function position()
    {
        return $this->belongsTo('App\Position');  
    }
    
    public function rankings()
    {
        return $this->belongsToMany('App\Ranking');
    }
    
    public function playerapi()
    {
       $teamName = array('WAS','CHA','ATL','MIA','ORL','NY','PHI','BKN','BOS','TOR',
       'CHI','CLE','IND','DET','MIL','MIN','UTA','OKC','POR','DEN',
       'MEM','HOU','NO','SA','DAL','GS','LAL','LAC','PHO','SAC');
        for($a=0;$a<30;$a++){
           $team_name= $teamName[$a];

        $curl = curl_init();
        
        curl_setopt_array($curl, [
        	CURLOPT_URL => "https://api.sportsdata.io/v3/nba/scores/json/Players/$team_name?key=6a29d7bfa4364c1b9546b3c736a07556",
        	CURLOPT_RETURNTRANSFER => true,
        	CURLOPT_FOLLOWLOCATION => true,
        	CURLOPT_ENCODING => "",
        	CURLOPT_MAXREDIRS => 10,
        	CURLOPT_TIMEOUT => 30,
        	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        	CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => ["Ocp-Apim-Subscription-Key: 6a29d7bfa4364c1b9546b3c736a07556"],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $player_content_api=json_decode($response, true);
            for ($i=0;$i<count($player_content_api);$i++)
            {
                $player = new Self;

                $teamId=$player_content_api[$i]['TeamID'];
                $firstName=$player_content_api[$i]['FirstName'];
                $lastName=$player_content_api[$i]['LastName'];
                
                if(isset($player_content_api[$i]['Jersey'])){
                    $jersey=$player_content_api[$i]['Jersey'];
                }else{
                    $jersey='000';
                }
    
                $height=$player_content_api[$i]['Height'] / 0.39370;
                $weight=$player_content_api[$i]['Weight'] /2.2046;
                $position=$player_content_api[$i]['Position'];
                $image=$player_content_api[$i]['PhotoUrl'];
                
                if(isset($player_content_api[$i]['BirthDate'])){
                   $birthday=$player_content_api[$i]['BirthDate']; 
                }else{
                    $birthday="No Data";
                }
                
                if(isset($player_content_api[$i]['BirthCity'])){
                   $birthcity=$player_content_api[$i]['BirthCity'];  
                }else{
                    $birthcity="No Data";
                }
                

                if(isset($player_content_api[$i]['College'])){
                    $college=$player_content_api[$i]['College'];
                }else{
                    $college='No Data';
                }

                if(isset($player_content_api[$i]['HighSchool'])){
                    $highschool=$player_content_api[$i]['HighSchool'];
                }else{
                    $highschool='No Data';
                }

                if(isset($player_content_api[$i]['Experience'])){
                   $experience=$player_content_api[$i]['Experience'];
                }else{
                    $experience= 0;
                }

                if(isset($player_content_api[$i]['Salary'])){
                    $salary=$player_content_api[$i]['Salary'];
                }else{
                    $salary = 0;
                }

                if(isset($player_content_api[$i]['BirthCountry'])){
                    $birthcountry=$player_content_api[$i]['BirthCountry'];
                }else{
                $birthcountry='NO Data';
                }

                $player->team_id=$teamId;
                $player->first_name=$firstName;
                $player->last_name=$lastName;
                $player->jersey=$jersey;
                $player->height=round($height,1);
                $player->weight=round($weight,1);
                $player->position=$position;
                $player->birthday=$birthday;
                $player->birthcity=$birthcity;
                $player->birthcountry=$birthcountry;
                $player->college=$college;
                $player->highschool=$highschool;
                $player->image=$image;
                $player->experience=$experience;
                $player->salary=$salary;
                $player->save();
            }
        }
        }
    }
}
