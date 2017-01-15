<?php

class org {
	
	public function __construct() {}
	
	public function getOrg($id) {
		$query = " SELECT *
				   FROM `organizatorius`
				   WHERE `login`='{$id}'";
		$data = mysql::select($query);
		print_r($data);
		return $data[0];
	}
	public function getOrgList($limit = null, $offset = null){
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		$query = " SELECT `organizatorius`.`vardas`,
						  `organizatorius`.`pavarde`,
						  `organizatorius`.`gimimo_data`,
						  `organizatorius`.`email`,
						  `organizatorius`.`tel_nr`
				   FROM `organizatorius` LIMIT {$limit} OFFSET {$offset}";					
		$data = mysql::select($query);
		return $data;
	}
	public function getOrgListCount() {
		$query = "  SELECT COUNT(`organizatorius`.`id`) as `kiekis`
					FROM `organizatorius`"
		$data = mysql::select($query);
		return $data[0]['kiekis'];
	}
	
	public function insertOrg($data) {
		$query = "  INSERT INTO `organizatorius`
								(
									`login`,
									`vardas`,
									`pavarde`,
									`gimimo_data`,
									`email`,
									`tel_nr`,
									`pass`
								)
								VALUES
								(
									'{$data['login']}',
									'{$data['vardas']}',
									'{$data['pavarde']}',
									'{$data['gimimo_data']}',
									'{$data['email']}',
									'{$data['tel_nr']}',
									'{$data['pass']}'
								)";
		mysql::query($query);
	}
	
	public function updateOrg($data){
		$query = "UPDATE 	`organizatorius`
				  SET	 	`vardas`='{$data['vardas']}',
							`pavarde`='{$data['pavarde']}',
							`gimimo_data`='{$data['gimimo_data']}',
							`email`='{$data['email']}',
							`tel_nr`='{$data['tel_nr']},
							`pass`='{$data['pass']}
				 WHERE `login`='{$data['login']}";
		mysql::query($query);
	}
	public function deleteOrg($id){
		$query = " DELETE FROM `organizatorius`
				   WHERE `login`='{$id}'";
		mysql::query($query);
	}
}