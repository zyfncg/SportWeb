<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/12/2
 * Time: 19:28
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/src/php/database/database.php';
$jsondata =  file_get_contents("php://input");
$phpdata = json_decode($jsondata,true);
if(isset($phpdata['userid'])){
    $doc = array("result"=>"get");
    echo json_encode($doc);
    $userid = htmlspecialchars($phpdata['userid']);
    $password = $phpdata['password'];

    $db = DB::getInstance();
    $sql = "select * from users where userid = '$userid' and password = '$password'";

    $check_query = $db->find($sql);
    if($result = $check_query->fetchArray(SQLITE3_ASSOC)){
//        $datalist = json_decode($phpdata['data'],true);

        foreach($phpdata['data'] as $data){
            $day = $data['day'];
            $distance = $data['distance'];
            $time = $data['time'];
            $sql = "select * from sport where userid='$userid' and daydate='$day'";
            $ret = $db->find($sql);
            if($check = $ret->fetchArray(SQLITE3_ASSOC)){
                $sql = "update sport set distance='$distance',sportTime='$time' where userid='$userid' and daydate='$day'";
                $ret1 = $db->operate($sql);
                if(!$ret1){
                    $doc = array("result"=>"update fail");
                    echo json_encode($doc);
                    exit;
                }
            }else{
                $sql = "insert into sport VALUES ('$userid','$day',$distance,$time)";
                $ret1 = $db->operate($sql);
                if(!$ret1){
                    $doc = array("result"=>"insert fail");
                    echo json_encode($doc);
                    exit;
                }
            }
        }
        setGrade($userid);
        $doc = array("result"=>"success");
        echo json_encode($doc);
        exit;
    }else{
        $doc = array("result"=>"FALSE");
        echo json_encode($doc);
        exit;
    }
}
$doc = array("result"=>"error");
echo json_encode($doc);
exit;
function setGrade($userid){
    $data = getStatisticsAll($userid);
    $gradelist = array(10,30,80,200,500,1000);
    $distance =$data['distance'];
    $grade = 6;
    for($i = 0; $i < 6; $i++){
        if($distance < $gradelist[$i]){
            $grade = $i;
            break;
        }
    }
    $db = DB::getInstance();
    $sql = "update users set grade='$grade' where userid='$userid'";
    $ret = $db->operate($sql);
    if(!$ret){
        $doc = array("result"=>"grade update fail");
        echo json_encode($doc);
        exit;
    }
}
function getStatisticsAll($userid){
    $today = date('Y-m-d');
    $sql = "select sum(distance),sum(sportTime) from sport where userid = '$userid'";
    $db = DB::getInstance();
    $ret = $db->find($sql);
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
    $data = array("distance"=>$distance,"time"=>$time);
    return $data;
}