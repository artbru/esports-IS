<?php
class report {
	
	public function __construct() {}
	public function getTournamentsInCountries(){
		$query = "SELECT `turnyras`.`salis`,
						 `turnyras`.`pavadinimas` ,
						 `turnyras`.`prizinis_fondas`,
						 `turnyras`.`miestas`
				  FROM `turnyras`
				  GROUP BY `turnyras`.`salis`
				  ORDER BY `turnyras`.`salis` ASC";
		$data = mysql::select($query);
		
		return $data;
	}
	
	
}