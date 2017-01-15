<?php

class dalyvis {
	
	public function __construct() {}
	
	public function getDalyvis($id) {
		$query = " SELECT *
				   FROM `dalyvis`
				   WHERE `turnyro_id``='{$id}'";
		$data = mysql::select($query);
		print_r($data);
		return $data[0];
	}
	public function getDalyvisList($limit = null, $offset = null){
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		$query = " SELECT `turnyras`.`pavadinimas`, AS `tournament`,
						  `komanda`.`pavadinimas` AS `komanda1`,
						  `komanda`.`pavadinimas` AS `komanda2`,
						  `komanda`.`pavadinimas` AS `komanda3`,
						  `komanda`.`pavadinimas` AS `komanda4`,
						  `komanda`.`pavadinimas` AS `komanda5`,
						  `komanda`.`pavadinimas` AS `komanda6`,
						  `komanda`.`pavadinimas` AS `komanda7`,
						  `komanda`.`pavadinimas` AS `komanda8`,
				   FROM `dalyvis`
						LEFT JOIN `turnyras`
							ON `dalyvis`.`turnyro_id` = `turnyras`.`id` 
						LEFT JOIN `komanda`
							ON `dalyvis`.`komanda1` = `komanda`.`pavadinimas`
						LEFT JOIN `komanda`
							ON `dalyvis`.`komanda2` = `komanda`.`pavadinimas`
						LEFT JOIN `komanda`
							ON `dalyvis`.`komanda3` = `komanda`.`pavadinimas`
						LEFT JOIN `komanda`
							ON `dalyvis`.`komanda4` = `komanda`.`pavadinimas`
						LEFT JOIN `komanda`
							ON `dalyvis`.`komanda5` = `komanda`.`pavadinimas`
						LEFT JOIN `komanda`
							ON `dalyvis`.`komanda6` = `komanda`.`pavadinimas`
						LEFT JOIN `komanda`
							ON `dalyvis`.`komanda7` = `komanda`.`pavadinimas`
						LEFT JOIN `komanda`
							ON `dalyvis`.`komanda8` = `komanda`.`pavadinimas` LIMIT {$limit} OFFSET {$offset}";					
		$data = mysql::select($query);
		return $data;
	}
	public function getDalyvisListCount() {
		$query = "  SELECT COUNT(`dalyvis`.`turnyro_id`) as `kiekis`
					FROM `dalyvis`";
		$data = mysql::select($query);
		return $data[0]['kiekis'];
	}
	
	public function insertDalyvis($data) {
		$query = "  INSERT INTO `dalyvis`
								(
									`turnyro_id`,
									`komanda1`,
									`komanda2`,
									`komanda3`,
									`komanda4`,
									`komanda5`,
									`komanda6`,
									`komanda7`,
									`komanda8`
								)
								VALUES
								(
									'{$data['turnyro_id']}',
									'{$data['komanda1']}',
									'{$data['komanda2']}',
									'{$data['komanda3']}',
									'{$data['komanda4']}',
									'{$data['komanda5']}',
									'{$data['komanda6']}',
									'{$data['komanda7']}',
									'{$data['komanda8']}'							
								)";
		mysql::query($query);
	}
	
	public function updateDalyvis($data){
		$query = "UPDATE 	`dalyvis`
				  SET		`komanda1`='{$data['komanda1']}',
							`komanda2`='{$data['komanda2']}',
							`komanda3`='{$data['komanda3']}',
							`komanda4`='{$data['komanda4']}',
							`komanda5`='{$data['komanda5']}',
							`komanda6`='{$data['komanda6']}',
							`komanda7`='{$data['komanda7']}',
							`komanda8`='{$data['komanda8']}'
				 WHERE `turnyro_id`='{$data['turnyro_id']}";
		mysql::query($query);
	}
}