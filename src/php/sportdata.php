<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/12/2
 * Time: 19:28
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/src/php/database/database.php';
if(isset($_POST['upload'])){
    $userid = htmlspecialchars($_POST['userid']);
    $password = $_POST['password'];

    $db = DB::getInstance();
    $sql = "select * from users where userid = '$userid' and password = '$password'";

    $check_query = $db->find($sql);
    if($result = $check_query->fetchArray(SQLITE3_ASSOC)){
        $datalist = json_decode($_POST['data'],true);
        foreach($datalist as $data){
            $day = $data['day'];
            $distance = $data['distance'];
            $time = $data['time'];
            $sql = "select * from sport where userid='$userid' and daydate='$day'";
            $ret = $db->find($sql);
            if($check = $ret->fetchArray(SQLITE3_ASSOC)){
                $sql = "update sport set distance='$distance',sportTime='$time' where userid='$userid' and daydate='$day'";
                $ret1 = $db->operate($sql);
                if(!$ret1){
                    echo $ret1;
                }
            }else{
                $sql = "insert into sport VALUES ('$userid','$day',$distance,$time)";
                $ret1 = $db->operate($sql);
                if(!$ret1){
                    echo $ret1;
                }
            }
        }
    }else{
        $doc = array("FALSE"=>"用户名或密码错误");
        echo json_encode($doc);
        exit;
    }
}