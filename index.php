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
        <script type="text/javascript" src="scripts/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="scripts/datetimepicker/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="style/main.css" media="screen" />

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
	<body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php?module=home" title="Home" <?php if ($module == 'home'){echo 'class="active"';}?>>Home</a></li>
                        <li><a href="index.php?module=game" title="Games" <?php if ($module == 'game'){echo 'class="active"';}?>>Games</a></li>
                        <li><a href="index.php?module=team" title="Teams" <?php if ($module == 'team'){echo 'class="active"';}?>>Teams</a></li>
                        <li><a href="index.php?module=tournament" title="Tournaments" <?php if ($module == 'tournament'){echo 'class="active"';}?>>Tournaments</a></li>
                        <li><a href="index.php?module=report" title="Reports" <?php if ($module == 'game'){echo 'class="active"';}?>>Reports</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button type="button" class="btn btn-info">Register</button>
                        <div class="row">
                            <!--<div class="form-group">
                                <div class="checkbox col-md-8">
                                    <label>
                                        <input type="checkbox" name="remember"> Prisiminti mane
                                    </label>
                                </div>
                            </div>-->
                            <div class="col-md-4 col-md-offset-8">
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container main">
            <div class="container col-md-2">
                <div class="row well">
                    <p>Test text</p>
                </div>
                <div class="row well">
                    <p>Test text</p>
                </div>
            </div>

            <div class="container col-md-10 well">
                <p>Test text</p>
                <?php
                if(!empty($module)) {
                    if(empty($id) && empty($action)) {
                        include "controller/{$module}_list.php";
                    } else {
                        include "controller/{$module}_edit.php";
                    }
                }
                ?>
                <!--<div class="float-clear"></div>-->
            </div>
        </div>

        <!--
        <div id="footer">

        </div>
        -->
	</body>
</html>
