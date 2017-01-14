<?php
	// nuskaitome konfigūracijų failą
	include 'config.php';

	// iškviečiame prisijungimo prie duomenų bazės klasę
	include 'utils/mysql.class.php';
	
	// nustatome pasirinktą modulį
	$module = '';
	if(isset($_GET['module'])) {
		$module = mysql::escape($_GET['module']);
	}
	
	// jeigu pasirinktas elementas (sutartis, automobilis ir kt.), nustatome elemento id
	$id = '';
	if(isset($_GET['id'])) {
		$id = mysql::escape($_GET['id']);
	}
	
	// nustatome, ar kuriamas naujas elementas
	$action = '';
	if(isset($_GET['action'])) {
		$action = mysql::escape($_GET['action']);
	}
	
	// jeigu šalinamas elementas, nustatome šalinamo elemento id
	$removeId = 0;
	if(!empty($_GET['remove'])) {
		// paruošiame $_GET masyvo id reikšmę SQL užklausai
		$removeId = mysql::escape($_GET['remove']);
	}
		
	// nustatome elementų sąrašo puslapio numerį
	$pageId = 1;
	if(!empty($_GET['page'])) {
		$pageId = mysql::escape($_GET['page']);
	}
	
	// nustatome, kiek įrašų rodysime elementų sąraše
	define('NUMBER_OF_ROWS_IN_PAGE', 10);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="robots" content="noindex">
		<title>Sporto Organizacijų IS</title>
		<link rel="stylesheet" type="text/css" href="scripts/datetimepicker/jquery.datetimepicker.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style/main.css" media="screen" />
		<script type="text/javascript" src="scripts/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="scripts/datetimepicker/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
	</head>
	<body>
		<div id="body">
			<div id="header">
				<h3 id="slogan"><a href="index.php">Sporto Organizacijų IS</a></h3>
			</div>
			<div id="content">
				<div id="topMenu">
					<ul class="float-left">
						<li><a href="index.php?module=country" title="Šalys"<?php if($module == 'countries') { echo 'class="active"'; } ?>>Šalis</a></li>
						<li><a href="index.php?module=tournament" title="Turnyrai"<?php if($module == 'service') { echo 'class="active"'; } ?>>Turnyras</a></li>
						<li><a href="index.php?module=referee" title="Arbitrai"<?php if($module == 'customer') { echo 'class="active"'; } ?>>Arbitras</a></li>
						<li><a href="index.php?module=player" title="Žaidėjai"<?php if($module == 'employee') { echo 'class="active"'; } ?>>Žaidėjas</a></li>
						<li><a href="index.php?module=coach" title="Treneriai"<?php if($module == 'car') { echo 'class="active"'; } ?>>Treneris</a></li>
						<li><a href="index.php?module=sponsor" title="Remėjai"<?php if($module == 'brand') { echo 'class="active"'; } ?>>Remėjas</a></li>
						<li><a href="index.php?module=team" title="Komandos"<?php if($module == 'tean') { echo 'class="active"'; } ?>>Komandos</a></li>
						<li><a href="index.php?module=arena" title="Arenos"<?php if($module == 'arena') { echo 'class="active"'; } ?>>Arenos</a></li>
						<li><a href="index.php?module=agent" title="Agentai"<?php if($module == 'agent') { echo 'class="active"'; } ?>>Agentai</a></li>
						<li><a href="index.php?module=city" title="Miestai"<?php if($module == 'city') { echo 'class="active"'; } ?>>Miestai</a></li>
					</ul>
					<ul class="float-right">
						<li><a href="index.php?module=report" title="Ataskaitos"<?php if($module == 'report') { echo 'class="active"'; } ?>>Ataskaitos</a></li>
					</ul>
				</div>
				<div id="contentMain">
					<?php
						if(!empty($module)) {
							if(empty($id) && empty($action)) {
								include "controls/{$module}_list.php";
							} else {
								include "controls/{$module}_edit.php";
							}
						}
					?>
					<div class="float-clear"></div>
				</div>
			</div>
			<div id="footer">

			</div>
		</div>
	</body>
</html>
