delimiter ;

CREATE TABLE `tournament_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_slot` int(11) DEFAULT NULL,
  `hero_id` int(11) DEFAULT NULL,
  `item_0` int(11) DEFAULT NULL,
  `item_1` int(11) DEFAULT NULL,
  `item_2` int(11) DEFAULT NULL,
  `item_3` int(11) DEFAULT NULL,
  `item_4` int(11) DEFAULT NULL,
  `item_5` int(11) DEFAULT NULL,
  `kills` int(11) DEFAULT NULL,
  `deaths` int(11) DEFAULT NULL,
  `assists` int(11) DEFAULT NULL,
  `gold` int(11) DEFAULT NULL,
  `last_hits` int(11) DEFAULT NULL,
  `denies` int(11) DEFAULT NULL,
  `gold_per_min` int(11) DEFAULT NULL,
  `xp_per_min` int(11) DEFAULT NULL,
  `gold_spent` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `win` tinyint(4) DEFAULT NULL,
  `match_id` bigint(20) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `account_id` bigint(20) DEFAULT NULL,
  `league_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `dota2`.`users` ADD COLUMN `fantasy_role` INT(1) NULL  AFTER `timecreated` ;