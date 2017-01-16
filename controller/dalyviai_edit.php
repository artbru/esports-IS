<?php
	include 'views/dalyvis.class.php';
	$modelsObj = new dalyvis();
	include 'utils/paging.class.php';
    $paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Turnyras</th>
                <th>Komandos</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
			$id = $_GET['id'];
			print_r($id);
            $data = $modelsObj->getDalyvisList($id,$paging->size, $paging->first);
			print_r($data);
			if(!empty($data))
                echo
                    "<tr>"
                    . "<td>{$data['0']['tournament']}</td>"
                    . "<td>{$data['0']['kom1']}</td>"
                    . "<td>{$data['0']['kom2']}</td>"
                    . "<td>{$data['0']['kom3']}</td>"
                    . "<td>{$data['0']['kom4']}</td>"
					. "<td>{$data['0']['kom5']}</td>"
					. "<td>{$data['0']['kom6']}</td>"
					. "<td>{$data['0']['kom7']}</td>"
					. "<td>{$data['0']['kom8']}</td>"
                    . "<td>"
					. "<a href='index.php?module={$module}&id={$data['0']['turnyro_id']}&action=redaguoti' title=''>redaguoti</a>"
					. "</td>";
					"</tr>"
            ?>
        </tbody>


    </table>
</div>

<?php
// itraukiame puslapiu šablona
include 'controller/paging.php';
?>