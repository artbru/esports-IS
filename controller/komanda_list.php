<?php
/**
 * Created by PhpStorm.
 * User: Edvinas
 * Date: 2017-01-15
 * Time: 17:21
 */

    include 'views/komanda.class.php';
    $modelsObj = new komanda();

    include 'utils/paging.class.php';
    $paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Regionas</th>
                <th>Žaidimas</th>
                <th>Reitingas regione</th>
                <th>Reitingas pasaulyje</th>
                <th>Interneto svetainė</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $elementCount = $modelsObj->getTeamListCount();
            $paging->process($elementCount, $pageId);
            $data = $modelsObj->getTeamList($paging->size, $paging->first);

            foreach ($data as $key => $val){
                echo
                    "<tr>"
                    . "<td><a href=''>{$val['pavadinimas']}</a></td>"
                    . "<td>{$val['regionas']}</td>"
                    . "<td>{$val['zaidimas']}</td>"
                    . "<td>{$val['reitingas_regione']}</td>"
                    . "<td>{$val['reitingas_pasaulyje']}</td>"
                    . "<td>{$val['svetaine']}</td>"
                    . "<td>";
            }
            ?>
        </tbody>


    </table>
</div>

<?php
// itraukiame puslapiu šablona
include 'controller/paging.php';
?>