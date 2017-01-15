<?php

class turnyras {
	
	public function __construct() {}
	
	public function getTurnyras($id) {
		$query = " SELECT *
				   FROM `turnyras`
				   WHERE `id`='{$id}'";
		$data = mysql::select($query);
		print_r($data);
		return $data[0];
	}
	public function getTurnyrasList($limit = null, $offset = null){
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		$query = " SELECT `turnyras`.`id`,
						  `turnyras`.`pavadinimas`,
						  `zaidimas`.`pavadinimas` AS `game`,
						  `turnyras`.`miestas`,
						  `turnyras`.`salis`,
						  `turnyras`.`prizinis_fondas`,
						  `turnyras`.`pradzia`,
						  `turnyras`.`pabaiga`,
						  `turnyras`.`busena`,
						  `turnyras`.`organizatorius`
				   FROM `turnyras`
						LEFT JOIN `zaidimas`
							ON `turnyras`.`sporto_saka` = `zaidimas`.`id` LIMIT {$limit} OFFSET {$offset}";					
		$data = mysql::select($query);
		return $data;
	}
	public function getTurnyrasListCount() {
		$query = "  SELECT COUNT(`turnyras`.`id`) as `kiekis`
					FROM `turnyras`";
		$data = mysql::select($query);
		return $data[0]['kiekis'];
	}
	
	public function insertTurnyras($data) {
		$query = "  INSERT INTO `turnyras`
								(
									`id`,
									`pavadinimas`,
									`sporto_saka`,
									`miestas`,
									`salis`,
									`prizinis_fondas`,
									`pradzia`,
									`pabaiga`,
									`busena`,
									`organizatorius`
								)
								VALUES
								(
									'{$data['id']}',
									'{$data['pavadinimas']}',
									'{$data['sporto_saka']}',
									'{$data['miestas']}',
									'{$data['salis']}',
									'{$data['prizinis_fondas']}',
									'{$data['pradzia']}',
									'{$data['pabaiga']}',
									'1',
									'{$data['organizatorius']}'								
								)";
		mysql::query($query);
	}
	
	public function updateTurnyras($data){
		$query = "UPDATE 	`turnyras`
				  SET	 	`pavadinimas`='{$data['pavadinimas']}',
							`sporto_saka`='{$data['sporto_saka']}',
							`miestas`='{$data['miestas']}',
							`salis`='{$data['salis']}',
							`prizinis_fondas`='{$data['prizinis_fondas']}',
							`pradzia`='{$data['pradzia']}',
							`pabaiga`='{$data['pabaiga']}',
							`busena`='1',
							`organizatorius`='{$data['organizatorius']}'
				 WHERE `id`='{$data['id']}'";
		mysql::query($query);
	}
	public function deleteTurnyras($id){
		$query = " DELETE FROM `turnyras`
				   WHERE `id`='{$id}'";
		mysql::query($query);
		//$query = "DELETE FROM `dalyvis`
			//	  WHERE `turnyro_id` ='{$id}'";
		//mysql::query($query);
	}
	public function getMaxIdOfTurnyras() {
		$query = "  SELECT MAX(`id`) AS `latestId`
					FROM `turnyras`";
		$data = mysql::select($query);
		
		return $data[0]['latestId'];
	}
}
