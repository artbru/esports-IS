<?php

	include 'views/report.class.php';
	$repObj = new report();
	include 'views/turnyras.class.php';
	$tObj = new turnyras();
	/* 
	$formErrors = null;
	$fields = array();
	$formSubmitted = true;
	
	$data = array();
	if(!empty($_POST['submit'])){
		$formSubmitted = true;
		
		$validations = array ();
		
		include 'utils/validator.class.php';
		$validator = new validator($validations);
		if($validator->validate($_POST)){
			$data = 
			$validator->preparePostFieldsForSQL();
		} else {
			// gauname klaidu pranešima
			$formErrors = $validator->getErrorHTML();
			// gauname ivestus laukus
			$fields = $_POST;
		}
	} */
?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Turnyras</th>
				<th>Prizinis fondas</th>
				<th>Miestas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $repData = $repObj->getTournamentsInCountries();

            for($i = 0; $i < sizeof($repData); $i++ ){
									if($i == 0 || $repData[$i]['salis'] != $repData[$i-1]['salis']){
										echo
											"<tr class='rowSeparator'><td colspan '3'></rd></tr>"
											."<tr>"
												."<td class='groupSeparator' colspan'5'>{$repData[$i]['salis']}</td>"
											."</tr>";	
									}
									echo
									"<tr>"
											."<td>{$repData[$i]['pavadinimas']}</td>"
											."<td>{$repData[$i]['prizinis_fondas']}</td>"
											."<td>{$repData[$i]['miestas']}</td>"
										. "</tr>";
								}
            ?>
        </tbody>


    </table>
</div>




