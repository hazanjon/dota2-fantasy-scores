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