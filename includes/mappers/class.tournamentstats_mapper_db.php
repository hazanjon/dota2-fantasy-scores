<?php
/**
 * Load info about tournment games from database
 */
class tournamentstats_mapper_db {
	/**
	 * @var array
	 */
	private $_ids = array();
	
	/**
	 * @param $id
	 * @return players_mapper_db
	 */
	 public function add_id($id) {
		 $id = (string)$id;
		 if(!in_array($id, $this->_ids)) {
			 array_push($this->_ids, $id);
		 }
		 
		 return $this;
	 }
	 
	 public function remove_id($id) {
		$id = (string)$id;
		foreach($this->_ids as $k=>$v) {
			if($v == $id) {
				unset($this->_ids[$k]);
			}
		}
		return $this;
	 }
	 
	 /**
	  * Removes all ids
	  * @return players_mapper_db
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
	    * Default Constructor
	    */
	   public function __construct() {
	   }
	   
	   public function load() {
		   $db = db::obtain();
		   $tournament_stats = array();
		   $result = $db->fetch_array_pdo('SELECT * FROM tournament_stats WHERE account_id IN (' . $this->get_ids_string() . ')', array());
		   foreach($result as $r) {
			   $tournament_stat = new tournament_stat();
			   $tournament_stat->set_array((array)$r);
			   $tournament_stats[] = $tournament_stat;
		   }
		   
		   return $tournament_stats;
	   }
	   
	   public function all() {
		   $db = db::obtain();
		   $tournament_stats = array();
		   $result = $db->fetch_array_pdo('SELECT * FROM tournament_stats');
		   foreach($result as $r) {
			   $tournament_stat = new tournament_stat();
			   $tournament_stat->set_array((array)$r);
			   $tournament_stats[] = $tournament_stat;
		   }
		   
		   return $tournament_stats;
	   }
}
?>
