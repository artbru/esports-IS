<? php
	include 'views/turnyras.class.php';
	$modelsObj = new turnyras();
	
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);
	
	if(!empty($removeId)){
		$count = 0;
		$removeErrorParameter = '';
		if($count == 0 && $removeId > 10){
			$modelsObj->deleteTurnyras($removeId);
		} else {
			$removeErrorParameter = '$remove_error=1';
		}
		header("Location: index.php?module={$module}{$removeErrorParameter}");
		die;
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Turnyrai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas turnyras</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Turnyras nebuvo pašalintas.
	</div>
<?php } ?>

<table>
	<tr>
		<th>Pavadinimas</th>
		<th>Žaidimas</th>
		<th>Šalis</th>
		<th>Pradžia</th>
		<th>Pabaiga</th>
	<th></th>
	</tr>
	<?php
		$elementCount = $modelsObj->getTurnyrasListCount();
		$paging->process($elementCount, $pageId);
		$data = $modelsObj->getTurnyrasList($paging->size, $paging->first);
		
		foreach($data as $key => $val){
			echo
				"<tr>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>{$val['game']}</td>"
					. "<td>{$val['salis']}</td>"
					. "<td>{$val['pradzia']}</td>"
					. "<td>{$val['pabaiga']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;' title=''>salinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['id']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
		?>
</table>
<?php
	include 'controller/paging.php';
?>