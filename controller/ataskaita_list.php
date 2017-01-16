<?php
/**
 * Created by PhpStorm.
 * User: Edvinas
 * Date: 2017-01-15
 * Time: 17:21
 */

    include 'views/report.class.php';
    $modelsObj = new report();

    include 'utils/paging.class.php';
    $paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

?>
<ul class="reportList">
		<li>
			<p>
				<a href="report.php?id=1" target="_blank" title="Sutarčių ataskaita">Žaidėjų ataskaita</a>
			</p>
		</li>