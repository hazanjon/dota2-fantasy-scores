<?php
/**
 * All Info About One Player
 */
class tournamentstat_mapper_db {
	public function __construct() {
	}
	
	public function set_account_id($id) {
		$this->_account_id = (string)$id;
	}
	
	public function get_account_id() {
		return $this->_account_id;
	}
	
	/**
	 * @param steam_id or null
	 * @return player object
	 */
	public function load($id = null) {
		if(!is_null($id)) {
			$this->_steam_id = (string)$id;
		}
		$tournament_stats = new tournament_stats();
				
		$db = db::obtain();
		$result = $db->query_first_pdo('SELECT * FROM ' . db::real_tablename('tournament_stats') . ' WHERE account_id = ?', array($this->get_account_id()));
		$tournament_stats->set_array($result);
		return $tournament_stats;
	}
	
	/**
	 * Determines whether the player should be inserted or updated in the db
	 * @param player object
	 */
	public function save(tournament_stat $tournament_stat) {
		
		if(tournamentstat_mapper_db::stat_exists($tournament_stat->get('account_id'), $tournament_stat->get('match_id'))) {
			//$this->update($tournament_stat);
			echo 'update';
		}
		else {
			$this->insert($tournament_stat);
		}
	}
	
	private function insert(tournament_stat $tournament_stat) {
		$db = db::obtain();
		$db->insert_pdo(db::real_tablename('tournament_stats'), $tournament_stat->get_data_array());
	}
	
	private function update(player $player) {
		$db = db::obtain();
		$db->update_pdo(db::real_tablename('tournament_stats'), $tournament_stat->get_data_array(), array('account_id' => $tournament_stat->get('account_id'), 'match_id' => $tournament_stat->get('match_id')));
	}
	
	/**
	 * @param string steam_id
	 * @return bool
	 */
	public static function stat_exists($account_id = null, $match_id = null) {
		if(is_null($account_id) || is_null($match_id)) {
			return;
		}
		
		$db = db::obtain();
		$result = $db->query_first_pdo('SELECT * FROM ' . db::real_tablename('tournament_stats') . ' WHERE account_id = ? AND match_id = ?', array($account_id, $match_id));
		
		if($result['id']) {
			return true;
		}
		return false;
	}
}
?>
