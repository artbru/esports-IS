<?php 
	include 'views/turnyras.class.php';
	$modelsObj = new turnyras();
	include 'views/zaidimas.class.php';
	$gamesObj = new zaidimas();
	include 'views/Organizatorius.class.php';
	$orgObj = new org();
	
	$formErrors = null;
	$fields = array();
	
	$required = array('pavadinimas', 'sporto_saka', 'miestas','salis','prizinis_fondas','pradzia','pabaiga');
	if(!empty($_POST['submit'])) {
		include 'utils/validator.class.php';
		$validations = array (
			'pavadinimas' => 'alfanum',
			'sporto_saka' => 'alfanum',
			'miestas' => 'alfanum',
			'salis' => 'alfanum',
			'prizinis_fondas'=>'positivenumber',
			'pradzia'=>'date',
			'pabaiga'=>'date'
		);
		$validator = new validator($validations, $required);
		
		if($validator->validate($$_POST)){
			$data = $validator->preparePostFieldsForSQL();
			print_r($data);
			if(isset($data['id']) && $data['id']>0){
				$modelsObj->updateTurnyras($data);
			} else{
				$latestId = $modelsObj->getMaxIdOfTurnyras();
				$data['id'] = $latestId+1;
				$modelsObj->insertTurnyras($data);
			}
			header("Location: index.php?module={$module}");
			die();
		}else {
			// gauname klaidu pranešima
			$formErrors = $validator->getErrorHTML();
			// gauname ivestus laukus
			$fields = $_POST;
		}
	} else {
		// tikriname, ar nurodytas elemento id. Jeigu taip, išrenkame elemento duomenis ir jais užpildome formos laukus.
		if(!empty($id)) {
			$fields = $modelsObj->getTurnyras($id);
		}
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>">Turnyrai</a></li>
	<li><?php if(!empty($id)) echo "Turnyro redagavimas"; else echo "Naujas turnyras"; ?></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
	<?php if($formErrors != null) { ?>
		<div class="errorBox">
			Neivesti arba neteisingai ivesti šie laukai:
			<?php 
				echo $formErrors;
			?>
		</div>
	<?php } ?>
	<form action="" method="post">
		<fieldset>
			<legend>Turnyro informacija</legend>
			<p>
				<label class="field" for="pavadinimas">Pavadinimas<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pavadinimas" name="pavadinimas" class="textbox-150" value="<?php echo isset($fields['pavadinimas']) ? $fields['pavadinimas'] : ''; ?>">
				
			</p>
			<p>
				<label class="field" for="sporto_saka">Zaidimas<?php echo in_array('sporto_saka', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="sporto_saka" name="sporto_saka">
					<option value="">---------------</option>
					<?php
						$data = $gamesObj->getZaidimasList();
						foreach($data as $key => $val) {
							$selected = "";
							if(isset($fields['sporto_saka']) && $fields['sporto_saka'] == $val['id']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id']}'>{$val['pavadinimas']}</option>";
						}
					?>
				</select>
			</p>
			<p>	
				<label class="field" for="miestas">Miestas<?php echo in_array('miestas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="miestas" name="miestas" class="textbox-150" value="<?php echo isset($fields['miestas']) ? $fields['miestas'] : ''; ?>">
				
			</p>
			<p>	
				<label class="field" for="salis">Šalis<?php echo in_array('salis', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="titulu_sk" name="titulu_sk" class="textbox-150" value="<?php echo isset($fields['titulu_sk']) ? $fields['titulu_sk'] : ''; ?>">
						
			</p>
			<p>	
				<label class="field" for="prizinis_fondas">Prizinis Fondas<?php echo in_array('prizinis_fondas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="prizinis_fondas" name="prizinis_fondas" class="textbox-150" value="<?php echo isset($fields['prizinis_fondas']) ? $fields['atsiradimo_data'] : ''; ?>">
				
			</p>
			<p>	
				<label class="field" for="pradzia">Pradžia<?php echo in_array('pradzia', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pradzia" name="pradzia" class="textbox-150" value="<?php echo isset($fields['pradzia']) ? $fields['pradzia'] : ''; ?>">
						
			</p>
			<p>	
				<label class="field" for="pabaiga">Pabaiga<?php echo in_array('pabaiga', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pabaiga" name="pabaiga" class="textbox-150" value="<?php echo isset($fields['pabaiga']) ? $fields['pabaiga'] : ''; ?>">
						
			</p>
			<p>	
				<label class="hidden" for="busena">Būsena<?php echo in_array('busena', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="hidden" id="busena" name="busena" class="textbox-150" value="<?php echo isset($fields['busena']) ? $fields['busena'] : ''; ?>">
						
			</p>
			<p>
				<label class="field" for="organizatorius">Organizatorius<?php echo in_array('organizatorius', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="organizatorius" name="organizatorius">
					<option value="">---------------</option>
					<?php
						$data = $orgObj->getOrgList();
						foreach($data as $key => $val) {
							$selected = "";
							if(isset($fields['organizatorius']) && $fields['organizatorius'] == $val['login']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['login']}'>{$val['pavarde']}</option>";
						}
					?>
				</select>
			</p>
			
		</fieldset>
		<p class="required-note">* pazymetus laukus uzpildyti privaloma</p>
		<p>
			<input type="submit" class="submit" name="submit" value="Issaugoti">
		</p>
		<?php if(isset($fields['id'])) { ?>
			<input type="hidden" name="id" value="<?php echo $fields['id']; ?>" />
		<?php } ?>
	</form>
</div>
