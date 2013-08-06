<!DOCTYPE html>
<html>
  <head>
    <title>TI3 Fantasy Challenge Scores</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  </head>
  <body>

    <?php

    require_once ('config.php');

    $account_id = (int)$_GET['id'];
    $player_mapper_db = new player_mapper_db();
    $player_mapper_db->set_account_id($account_id);
    $player = $player_mapper_db->load();
    
    ?>
    <div class="row">
        <span class="span2">
            <img src="<?php echo $player->get('avatarfull');?>" class="img-polaroid">
        </span>
        <span class="span2">
            <div class="row">
                <span class="span2">
                    <h1><?php echo $player->get('personaname');?></h1>
                </span>
                <span class="span2">
                    <h3><?php echo ucfirst($player->get('fantasy_role'));?></h3>
                </span>
            </div>  
        </span>
    
    </div>  
    <?

    $matches_mapper_db = new matches_mapper_db();
    $matches_mapper_db->set_account_id($account_id);
    $matchs = $matches_mapper_db->load();
    //Update match info

    $start_date = '2013-08-03';

    $points = array();
    foreach($matchs as $match){
        if($match->get('human_players') != 10){
            continue;
        }
        
        $adjusted_unix = strtotime($match->get('start_time').' - 12 HOURS');
        $start_unix = strtotime($start_date);
            
        $match_date = date('Y-m-d', $adjusted_unix);
            
        if($adjusted_unix < $start_unix)
            continue;
        
        $day = ceil(($adjusted_unix - $start_unix) / 3600 / 24);
        
        foreach($match->get('slots') as $slot){
            if($slot->get('account_id') == $account_id){
                $fp = $slot->get_fantasy_points_breakdown();
                $points[$day][$match->get('match_id')]['day'] = $day;
                $points[$day][$match->get('match_id')]['match'] = $match;
                $points[$day][$match->get('match_id')]['slot'] = $slot;
                $points[$day][$match->get('match_id')]['points'] = $fp[$player->get('fantasy_role')];
            }
            
            /*echo $player->get('personaname').' - ';
                print_R($slotpoints);
            echo '<br>';*/
        }
    }
    //print_R($points);

    foreach($points as $day => $set){
        echo '<h2>Day '.$day.'</h2>';
        echo '<table class="table table_hover">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Radiant</th>';
                    echo '<th>Dire</th>';
                    echo '<th>Time</th>';
                    echo '<th>Kills</th>';
                    echo '<th>Deaths</th>';
                    echo '<th>Assists</th>';
                    echo '<th>Last Hits</th>';
                    echo '<th>GPM</th>';
                    echo '<th>XPM</th>';
                    echo '<th>Total</th>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
                $type_totals = array();
                foreach($set as $match_id => $match){
                    echo '<tr>';
                        echo '<td>'.$match['match']->get('match_id').'</td>';
                        echo '<td>'.$match['match']->get('radiant_name').'</td>';
                        echo '<td>'.$match['match']->get('dire_name').'</td>';
                        echo '<td>'.$match['match']->get('start_time').'</td>';
                        $total = 0;
                        foreach($match['points'] as $field => $val){
                            $real = $match['slot']->get($field);
                            //$type_totals[$field.'_val'] += $real;
                            $type_totals[$field] += $val;
                            //echo '<td>'.$real.'</td>';
                            //$val = round($val, 2);
                            $total += $val;
                            echo '<td>'.$val.' ('.$real.')</td>';
                        }
                        $total = ceil($total*100)/100;
                        //$type_totals['total'] += $total;
                        echo '<td>'.$total.'</td>';
                    echo '</tr>';
                }
        
                echo '<tr class="success">';
                    echo '<td colspan="4">Total</td>';
                    $total = 0;
                    foreach($type_totals as $val){
                        //$val = round($val, 2);
                        $val = ceil($val*100)/100;
                        $total += $val;
                        echo '<td>'.$val.'</td>';
                    }
                    
                    echo '<td><strong>'.$total.'</strong></td>';
                echo '</tr>';
            echo '</tbody>';
        echo '</table>';
    }
    ?>
    </body>
</html>
