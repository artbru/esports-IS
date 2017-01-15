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

            }

            header("Location: index.php?module={$module}");
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


