<?php
/**
 * Created by PhpStorm.
 * User: Edvinas
 * Date: 2017-01-15
 * Time: 17:21
 */

    include 'views/team.class.php';
    $modelsObj = new team();

    include 'utils/paging.class.php';
    $paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

?>