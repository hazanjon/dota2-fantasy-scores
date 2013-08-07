<!DOCTYPE html>
<html>
  <head>
    <title>TI3 Fantasy Challenge Scores</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  </head>
  <body>

    <?php

    require_once ('config.php');
    /*
    //missing matches
    //262580105 - mufc - dk
    //262561359 - mufc - dk
    //262553182 - dignitas - lgd
        $match_mapper_db = new match_mapper_db();
        $match_mapper_db->set_match_id(262561359);
        $match = $match_mapper_db->load();
        $match_mapper_db = new match_mapper_db();
        $match_mapper_db->set_match_id(262580105);
        $match = $match_mapper_db->load();
    */
    /*    $match_mapper_db = new match_mapper_db();
        $match_mapper_db->set_match_id(262553182);
        $match = $match_mapper_db->load();
    */

    //Load tourny stats

    if($_GET['update'] == 1){
        $tournamentstat_mapper_db = new tournamentstat_mapper_db();
        $playersforteams = array(
            89230834,//Tongfu
            1185644,//Liquid
            3916428,//Alliance
            26316691,//VP
            31818853,//LGD.int
            82327674,//IG
            89249333,//Orange
            21289303,//Mouz
            5448108,//Dignitas
            19672354,//Fnatic
            70388657,//Navi
            82630959,//Zenith
            99460568,//Rattlesnake
            98878010,//LGD
        );
        foreach($playersforteams as $acc_id){
            $tournamentstats_mapper_web = new tournamentstats_mapper_web();
            $stats_info = $tournamentstats_mapper_web->add_id($acc_id)->load();
            //print_R($stats_info);
            foreach($stats_info as $stat){
                $res = $tournamentstat_mapper_db->save($stat);
                //print_R($res);
                $match_mapper_db = new match_mapper_db();
                $match_mapper_db->set_match_id($stat->get('match_id'));
                $match = $match_mapper_db->load();
            }
        }
    }

    //Update match info

    $start_date = '2013-08-03';
    //$tournamentstats_mapper_db = new tournamentstats_mapper_db();
    //$stats_info = $tournamentstats_mapper_db->add_id(89230834)->load();
    //$stats_info = $tournamentstats_mapper_db->all();
    $player_mapper_db = new player_mapper_db();
    $player = array();
    $player_cache = array();

    $matches_mapper_db = new matches_mapper_db();
    $matches_mapper_db->set_account_id($account_id);
    $matchs = $matches_mapper_db->load();
    $points = array();

    foreach($matchs as $match){
       // echo $match->get('match_id');
        if($match->get('human_players') != 10){
            continue;
        }
        
        $match_date = date('Y-m-d', strtotime($match->get('start_time').' - 8 HOURS'));
            
        if(strtotime($match->get('start_time').' - 8 HOURS') < strtotime($start_date))
            continue;
        
        foreach($match->get('slots') as $slot){
            
            if(empty($player_cache[$slot->get('account_id')])){
                $player_mapper_db->set_account_id($slot->get('account_id'));
                $player_cache[$slot->get('account_id')] = $player_mapper_db->load();
            }
            $player = $player_cache[$slot->get('account_id')];
            $slotpoints = $slot->get_fantasy_points();
            $points[$player->get('personaname')]['player'] = $player;
            $points[$player->get('personaname')]['points'][$match_date][$match->get('match_id')] = $slotpoints[$player->get('fantasy_role')];
            
            /*echo $player->get('personaname').' - ';
                print_R($slotpoints);
            echo '<br>';*/
        }
    }

    echo '<table class="table table_hover">';
        echo '<thead>';
            echo '<tr>';
                echo '<th>Player</th>';
                echo '<th>Position</th>';
                for($i = 0; $i < 7; $i++){
                    echo '<th>Day '.($i+1).'</th>';
                }
                echo '<th>Total</th>';
            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
            foreach($points as $name => $data){
                echo '<tr>';
                    echo '<td><a href="/breakdown/'.$data['player']->get('account_id').'"><img src="'.$data['player']->get('avatar').'"> '.$name.'</a></td>';
                    echo '<td>'.ucfirst($data['player']->get('fantasy_role')).'</td>';
                    $total = 0;
                    for($i = 0; $i < 7; $i++){
                        $thisdate = date('Y-m-d', strtotime($start_date.' +'.$i.' DAYS'));
                        $val = round(array_sum($data['points'][$thisdate]), 1);
                        $total += $val;
                        echo '<td>'.$val.'</td>';
                    }
                    echo '<td>'.$total.'</td>';
                echo '</tr>';
            }
        echo '</tbody>';
    echo '</table>';

    ?>
    </body>

</html>  