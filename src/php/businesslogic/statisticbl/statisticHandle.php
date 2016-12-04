<?php
/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/11/3
 * Time: 20:02
 */

//include $_SERVER['DOCUMENT_ROOT'].'../../database/database.php';
include $_SERVER['DOCUMENT_ROOT'].'/src/php/database/database.php';
require_once 'SportData.php';
class StatisticHandle{
    private $db;

    /**
     * StatisticHandle constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getStatisticsToday($userid){
        $today = date('Y-m-d');
        $data = $this->getDataByDay($userid,$today);
        $sql = "select * from sport where daydate='$today' and userid in (select friendid from contact where hostid='$userid') order by distance desc";
        $ret = $this->db->find($sql);
        $rank = 1;
        $isSet = 0;
        while($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $distance = $row['distance'];
            if($data->getDistance()>=$distance){
                $data->setRank($rank);
                $isSet = 1;
                break;
            }else{
                $rank = $rank + 1;
            }
        }
        if($isSet == 0){
            $data->setRank($rank);
        }
        return $data;
    }

    public function getStatisticsWeek($userid){
        $weekdata = array();
        for($i = -6; $i <= 0; $i++){
            $d=strtotime("$i days");
            $day = date('Y-m-d',$d);
            $data = $this->getDataByDay($userid,$day);
            $weekdata[$i+6] = $data;
        }
        return $weekdata;
    }
    private function getDataByDay($userid, $day){

        $sql = "select * from sport where userid = '$userid' and daydate = '$day'";
        $ret = $this->db->find($sql);
        $distance = 0;
        $time = 0;
        while($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $day = $row['daydate'];
            $distance = $row['distance'];
            $time = $row['sportTime'];
        }
        $data = new SportData($userid, $distance, $day, $time);
        return $data;
    }
    public function getStatisticsAll($userid){
        $today = date('Y-m-d');
        $sql = "select sum(distance),sum(sportTime) from sport where userid = '$userid'";
        $ret = $this->db->find($sql);
        $distance = 0;
        $time = 0;
        if($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $distance = $row['sum(distance)'];
            $time = $row['sum(sportTime)'];
            if($distance == null){
                $distance = 0;
            }
            if($time == null){
                $time = 0;
            }
        }
        $data = new SportData($userid, $distance, $today, $time);
        return $data;
    }
    public function saveSportData($data){

    }
}