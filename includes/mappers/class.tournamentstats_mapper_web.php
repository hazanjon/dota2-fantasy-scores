<?php
/**
 * Load info about players
 *
 * @example
 * <code>
 *  $players_mapper_web = new players_mapper_web();
 *  $players_info = $players_mapper_web->add_id('76561198067833250')->add_id('76561198058587506')->load();
 *  foreach($players_info as $player_info) {
 *    echo $player_info->get('realname');
 *    echo '<img src="'.$player_info->get('avatarfull').'" alt="'.$player_info->get('personaname').'" />';
 *    echo '<a href="'.$player_info->get('profileurl').'">'.$player_info->get('personaname').'\'s steam profile</a>';
 *  }
 *  print_r($players_info);
 * </code>
 */
class tournamentstats_mapper_web {
    /**
     *
     */
    const player_steam_url = 'https://api.steampowered.com/IDOTA2Match_570/GetTournamentPlayerStats/v001/';
    /**
     * @var array
     */
    private $_ids = array();
    private $_league_id = 65006;//API only supports 65006 at the moment

    /**
     * @param $id
     * @return players_mapper_web
     */
    public function add_id($id) {
        $id = (string)$id;
        if (!in_array($id, $this->_ids)) {
            array_push($this->_ids, $id);
        }
        return $this;
    }

    /**
     * @param $id
     * @return players_mapper_web
     */
    public function remove_id($id) {
        $id = (string)$id;
        foreach($this->_ids as $k => $v) {
            if ($v == $id) {
                unset($this->_ids[$k]);
            }
        }
        return $this;
    }

    /**
     * @return players_mapper_web
     */
    public function remove_ids() {
        $this->_ids = array();
        return $this;
    }

    /**
     * @return array
     */
    public function get_ids() {
        return $this->_ids;
    }

    /**
     * @return string
     */
    public function get_ids_string() {
        return implode(',', $this->get_ids());
    }

    /**
     *
     */
    public function __construct() {

    }

    /**
     * @return array
     */
    public function load() {
        $request = new request(self::player_steam_url, array('league_id' => $this->_league_id, 'account_id' => $this->get_ids_string()));
        $stats_info = $request->send();
        if (is_null($stats_info)) {
            return null;
        }
        
        $tournament_stats = array();
        foreach($stats_info->matches->match as $stat_info) {
            $tournament_stat = new tournament_stat();
            $tournament_stat->set_array((array)$stat_info);
            $tournament_stat->set('account_id', $stats_info->account_id);
            $tournament_stat->set('league_id', $this->_league_id);
            $tournament_stats[] = $tournament_stat;
        }
        return $tournament_stats;
    }
}