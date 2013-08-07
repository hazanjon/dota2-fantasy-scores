<?php

    require_once ('config.php');
    /*  
    {
        id: <player_id>,
        days: [
            {
                day_id: <day>,
                total: <total_points>,
                breakdown: [
                    {
                        match_id: <match_id>,
                        total:
                        points: {
                            kills: ,   
                            deaths: ,   
                            assists: ,   
                            last_hits: ,   
                            GPM: ,   
                            XPM: ,   
                        }
                    }
                ]
            }
        }   
    }
    */
    
    $player_mapper_db = new player_mapper_db();
    $player = array();
    $player_cache = array();

    $matches_mapper_db = new matches_mapper_db();
    $matchs = $matches_mapper_db->load();
    $points = array();

    $matchobjects = array();
    $playerobjects = array();
    $player_cache = array();

    foreach($matchs as $match){
        if($match->get('human_players') != 10){
            continue;
        }
        
        $adjusted_unix = strtotime($match->get('start_time').' - 12 HOURS');
        $start_unix = strtotime(TI3_START);
            
        $match_date = date('Y-m-d', $adjusted_unix);
            
        if($adjusted_unix < $start_unix)
            continue;
        
        $day = ceil(($adjusted_unix - $start_unix) / 3600 / 24);
        
        $matchobjects[] = $match->get_data_array();
            
        foreach($match->get('slots') as $slot){
            
            $account_id = $slot->get('account_id');
            
            if(empty($player_cache[$account_id])){
                $player_mapper_db->set_account_id($account_id);
                $player_cache[$account_id] = $player_mapper_db->load();
            }
        
            $player = $player_cache[$account_id];
            
            if(empty($playerobjects[$account_id])){
                $playerobject = new stdClass();
                $playerobject->id = $account_id;
                $playerobject->player = $player->get_data_array();
                $playerobject->days = array();
                $playerobjects[$account_id] = $playerobject;
            }            
                    
            if(empty($playerobjects[$account_id]->days[$day])){
                $dayobject = new stdClass();
                $dayobject->id = $day;
                $dayobject->total = 0;
                $dayobject->breakdown = array();
                $playerobjects[$account_id]->days[$day] = $dayobject;
            }
            
            $fp = $slot->get_fantasy_points_breakdown();
            
            $slotpoints = $fp[$player->get('fantasy_role')];
            
            $playerobjects[$account_id]->days[$day]->total += array_sum($slotpoints);
            
            $breakdown = new stdClass();
            $breakdown->match_id = $match->get('match_id');
            $breakdown->total = array_sum($slotpoints);
            $breakdown->points = new stdClass();
            
            foreach($slotpoints as $field => $val){
                $breakdown->points->$field = $val;
            }
            
            $playerobjects[$account_id]->days[$day]->breakdown[] = $breakdown;
        }
    }
    
    //remove the array keys
    foreach($playerobjects as $account_id => $player){
        $playerobjects[$account_id]->days = array_values($player->days);
    }

    $playerobjects = array_values($playerobjects);
    
    $file = './ti3-data.js';
    
    $towrite = "";
    
    $towrite .= "var matchData = " . json_encode($matchobjects, JSON_NUMERIC_CHECK). ";\n";
    $towrite .= "var playerData = " . json_encode($playerobjects, JSON_NUMERIC_CHECK). ";\n";

    file_put_contents($file, $towrite);
    
    //echo $towrite;