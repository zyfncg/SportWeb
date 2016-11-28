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
        $sql = "select * from sport where userid = '$userid' and daydate = '$today'";
        $ret = $this->db->find($sql);
        while($row = $ret->fetchArray(SQLITE3_ASSOC)){
            echo $row['userid'];
            echo $row['daydate'];
            echo $row['distance'];
            echo $row['sportTime'];
        }
    }
    public function getStatisticsWeek($userid){

    }
    public function getStatisticsAll($userid){

    }
    public function saveSportData($sportData){

    }
}