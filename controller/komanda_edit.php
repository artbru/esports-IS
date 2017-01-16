<?php
/**
 * Created by PhpStorm.
 * User: Edvinas
 * Date: 2017-01-15
 * Time: 17:21
 */

    include 'views/komanda.class.php';
    $contractsObj = new komanda();

    $formErrors = null;
    $fields = array();

    $required = array('pavadinimas', 'regionas', 'zaidimas', 'nariu_sk');

    if (!empty($_POST['submit'])){
        include 'utils/validator.class.php';

        $validations = array(
            'pavadinimas' => 'alfanum',
            'regionas' => 'alfanum',
            'zaidimas' => 'alfanum',
            'nariu_sk' => 'positivenumber'
        );

        $validator = new validator($validations, $required);

        if ($validator->validate($_POST)){
            $data = $validator->preparePostFieldsForSQL();
            if (isset($data['id']) && $data['id'] > 0){
                $contractsObj->updateTeam($data);
            } else {
                $latestId = $contractsObj->getMaxIdOfTeam();
                $data['id'] = $latestId+1;
                $contractsObj->insertTeam($data);
            }

            die();
        } else {
            $formErrors = $validator->getErrorHTML();
            $fields = $_POST;
        }
    } else {
        if (!empty($id)){
            $fields = $contractsObj->getTeam($id);
        }
    }
?>

<form method="post" action="">
    <div class="form-group">
        <label for="pavadinimas">Pavadinimas</label>
        <input type="text" class="form-control" id="pavadinimas">
    </div>
    <div class="form-group">
        <label for="regionas">Regionas</label>
        <input type="text" class="form-control" id="regionas">
    </div>
    <div class="form-group">
        <label for="zaidimas">Žaidimas</label>
        <input type="text" class="form-control" id="zaidimas">
    </div>
    <div class="form-group">
        <label for="reitingas_regione">Reitingas regione</label>
        <input type="number" class="form-control" id="reitingas_regione">
    </div>
    <div class="form-group">
        <label for="reitingas_pasaulyje">Reitingas pasaulyje</label>
        <input type="number" class="form-control" id="reitingas_pasaulyje">
    </div>
    <div class="form-group">
        <label for="svetaine">Svetainė</label>
        <input type="url" class="form-control" id="svetaine">
    </div>
    <div class="form-group">
        <label for="nariu_sk">Narių skaičius</label>
        <input type="number" class="form-control" id="nariu_sk">
    </div>
    <p>
        <input type="submit" class="submit" name="submit" value="Issaugoti">
    </p>
    <?php if(isset($fields['id'])) { ?>
        <input type="hidden" name="id" value="<?php echo $fields['id']; ?>" />
    <?php } ?>
</form>



