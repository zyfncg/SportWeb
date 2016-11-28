<?php
/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/11/3
 * Time: 20:02
 */

include '../../database/database.php';

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
        $today = date('Y-m-d');
        $sql = "select * from sport where userid = '$userid' and daydate = '$day'";
        $ret = $this->db->find($sql);
        $distance = 0;
        $day = $today;
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
        $alldata = array();
        $sql = "select * from sport where userid = '$userid'";
        $ret = $this->db->find($sql);
        $distance = 0;
        $day = $today;
        $time = 0;
        while($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $day = $row['daydate'];
            $distance = $row['distance'];
            $time = $row['sportTime'];
        }
        $data = new SportData($userid, $distance, $day, $time);
        return $alldata;
    }
    public function saveSportData($sportData){

    }
}