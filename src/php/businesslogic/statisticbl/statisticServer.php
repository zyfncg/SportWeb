<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2
 * Time: 21:21
 */
require "statisticHandle.php";


function getTodayData($userid){
    $statHandle = new StatisticHandle();
    return $statHandle->getStatisticsToday($userid);
}
function getWeekData($userid){
    $statHandle = new StatisticHandle();
    return $statHandle->getStatisticsWeek($userid);
}
function getAllData($userid){
    $statHandle = new StatisticHandle();
    return $statHandle->getStatisticsAll($userid);
}

//require '../../database/database.php';
//$datatime = new DateTime();
//echo $datatime->format('Y-m-d');
//$d=strtotime('-4 days');
//echo date('Y-m-d',$d);
//$day = date('Y-m-d',$d);
//echo $day;
//$db = DB::getInstance();
//$sql = "select * from sport where daydate = '$day'";
//
//$ret = $db->find($sql);
//while($row = $ret->fetchArray(SQLITE3_ASSOC)){
//    echo $row['userid']."<br>";
//    echo $row['daydate']."<br>";
//    echo $row['distance']."<br>";
//    echo $row['sportTime']."<br>";
//}
