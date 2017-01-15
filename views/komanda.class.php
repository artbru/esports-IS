<?php

/**
 * Created by PhpStorm.
 * User: Edvinas
 * Date: 2017-01-15
 * Time: 16:07
 */
class komanda
{
    public function __construct()
    {
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getTeam($id){
        $query = "SELECT * FROM `komanda` WHERE `id`='{$id}'";
        $data = mysql::select($query);
        return $data[0];
    }

    /**
     * @param null $limit
     * @param null $offset
     * @return bool
     */
    public function getTeamList($limit = null, $offset = null){
        $limitOffsetString = "";
        if(isset($limit)){
            $limitOffsetString .= "LIMIT {$limit}";
        }
        if (isset($offset)){
            $limitOffsetString .= "OFFSET {$offset}";
        }

        $query = "SELECT * FROM `komanda`" . $limitOffsetString;
        $data = mysql::select($query);

        return $data;
    }

    public function getTeamListCount() {
        $query = "  SELECT COUNT(`id`) as `kiekis`
                    FROM `komanda`";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    public function deleteTeam($id){
        $query = "DELETE FROM `komanda` WHERE `id`='{$id}'";
        mysql::query($query);
    }

    public function updateTeam($data){
        $query = "UPDATE `komanda` SET 
                  `pavadinimas`='{$data['pavadinimas']}',
                   `regionas`='{$data['regionas']}',
                   `zaidimas`='{$data['zaidimas']}',
                   `reitingas_regione`='{$data['reitingas_regione']}',
                   `reitingas_pasaulyje`='{$data['reitingas_pasaulyje']}',
                   `svetaine`='{$data['svetaine']}',
                   `nariu_sk`='{$data['nariu_sk']}'
                   WHERE `id`='{$data['id']}'";
        mysql::query($query);

    }

    public function insertTeam($data){
        $query = "INSERT INTO `komanda`
                                (
                                    `pavadinimas`,
                                    `regionas`,
                                    `zaidimas`,
                                    `reitingas_regione`,
                                    `reitingas_pasaulyje`,
                                    `svetaine`,
                                    `nariu_sk`
                                ) 
                                VALUES (
                                    '{$data['pavadinimas']}',
                                    '{$data['regionas']}',
                                    '{$data['zaidimas']}',
                                    '{$data['reitingas_regione']}',
                                    '{$data['reitingas_pasaulyje']}',
                                    '{$data['svetaine']}',
                                    '{$data['nariu_sk']}'
                                )";

        mysql::query($query);
    }
}