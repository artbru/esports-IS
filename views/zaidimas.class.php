<?php

class zaidimas {
	
	public function __construct() {}
	
	public function getZaidimas($id) {
		$query = " SELECT *
				   FROM `zaidimas`
				   WHERE `id`='{$id}'";
		$data = mysql::select($query);
		print_r($data);
		return $data[0];
	}
	public function getZadimasList($limit = null, $offset = null){
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		$query = " SELECT `zaidimas`.`pavadinimas`,
						  `zaidimas`.`zanras`
						  `zaidimas`.`isleidimo_metai`,
						  `zaidimas`.`leidejas`,
						  `zaidimas`.`platforma`
				   FROM `turnyras` LIMIT {$limit} OFFSET {$offset}";					
		$data = mysql::select($query);
		return $data;
	}
	public function getZaidimasListCount() {
		$query = "  SELECT COUNT(`zaidimas`.`id`) as `kiekis`
					FROM `zaidimas`"
		$data = mysql::select($query);
		return $data[0]['kiekis'];
	}
	
	public function insertZaidimas($data) {
		$query = "  INSERT INTO `zaidimas`
								(
									`id`,
									`pavadinimas`,
									`zanras`,
									`isleidimo_metai`,
									`leidejas`,
									`platforma`
								)
								VALUES
								(
									'{$data['id']}',
									'{$data['pavadinimas']}',
									'{$data['zanras']}',
									'{$data['isleidimo_metai']}',
									'{$data['leidejas']}',
									'{$data['platforma']}'								
								)";
		mysql::query($query);
	}
	
	public function updateZaidimas($data){
		$query = "UPDATE 	`zaidimas`
				  SET	 	`pavadinimas`='{$data['pavadinimas']}',
							`zanras`='{$data['zanras']}',
							`isleidimo_metai`='{$data['isleidimo_metai']}',
							`leidejas`='{$data['leidejas']}',
							`platforma`='{$data['platforma']}
				 WHERE `id`='{$data['id']}";
		mysql::query($query);
	}
	public function deleteZaidimas($id){
		$query = " DELETE FROM `zaidimas`
				   WHERE `id`='{$id}'";
		mysql::query($query);
	}
}