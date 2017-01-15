<?php

/**
 * Created by PhpStorm.
 * User: Edvinas
 * Date: 2017-01-15
 * Time: 17:04
 */
class zaidejas
{

    /**
     * player constructor.
     */
    public function __construct()
    {
    }

    public function getPlayer($id){
        $query = "SELECT * FROM `zaidejas` WHERE `id`='{$id}'";
        $data = mysql::select($query);
        return $data[0];
    }

    public function getPlayerList($limit = null, $offset = null){
        $limitOffsetString = "";
        if(isset($limit)){
            $limitOffsetString .= "LIMIT {$limit}";
        }
        if (isset($offset)){
            $limitOffsetString .= "OFFSET {$offset}";
        }

        $query = "SELECT * FROM `zaidejas`" . $limitOffsetString;
        $data = mysql::select($query);

        return $data;
    }

    public function deletePlayer($id){
        $query = "DELETE FROM `zaidejas` WHERE `id`='{$id}'";
        mysql::query($query);
    }

    public function updatePlayer($data){
        $query = "UPDATE `zaidejas` SET                  
                    `vardas`='{$data['vardas']}',
                    `pavarde`='{$data['pavarde']}',
                    `ign`='{$data['ign']}',
                    `gimimo_data`='{$data['gimimo_data']}',
                    `tautybe`='{$data['tautybe']}'
                     WHERE `id`='{$data['id']}'";
        mysql::query($query);
    }

    public function insertPlayer($data){
        $query = "INSERT INTO `zaidejas`
                                (
                                    `vardas`, 
                                    `pavarde`, 
                                    `ign`, 
                                    `gimimo_data`, 
                                    `tautybe`
                                ) 
                                VALUES 
                                (
                                    '{$data['vardas']}',
                                    '{$data['pavarde']}',
                                    '{$data['ign']}',
                                    '{$data['gimimo_data']}',
                                    '{$data['tautybe']}'
                                )";
        mysql::query($query);
    }
}