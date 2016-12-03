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
                    $doc = array("result"=>"更新失败");
                    echo json_encode($doc);
                }
            }else{
                $sql = "insert into sport VALUES ('$userid','$day',$distance,$time)";
                $ret1 = $db->operate($sql);
                if(!$ret1){
                    $doc = array("result"=>"插入失败");
                    echo json_encode($doc);
                }
            }
        }

        exit;
    }else{
        $doc = array("result"=>"FALSE");
        echo json_encode($doc);
        exit;
    }
}
$doc = array("result"=>"error");
echo json_encode($doc);