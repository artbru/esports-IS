<?php
	include 'views/zaidimas.class.php';
	$modelsObj = new zaidimas();
	include 'utils/paging.class.php';
    $paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Žanras</th>
                <th>Išleidimo metai</th>
                <th>Leidejas</th>
                <th>Platforma</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $elementCount = $modelsObj->getZaidimasListCount();
            $paging->process($elementCount, $pageId);
            $data = $modelsObj->getZaidimasList($paging->size, $paging->first);

            foreach ($data as $key => $val){
                echo
                    "<tr>"
                    . "<td><a href=''>{$val['pavadinimas']}</a></td>"
                    . "<td>{$val['zanras']}</td>"
                    . "<td>{$val['isleidimo_metai']}</td>"
                    . "<td>{$val['leidejas']}</td>"
                    . "<td>{$val['platforma']}</td>"
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