<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/3
 * Time: 17:22
 */
require 'userHandle.php';
$userHandle = new UserHandle();
if(isset($_POST['username'])){
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $grade = $_POST['grade'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $intro = $_POST['intro'];
    $user = array("userid"=>$userid,"username"=>$username,"address"=>$address,"grade"=>$grade,
        "birthday"=>$birthday,"intro"=>$intro,"gender"=>$gender);
    $ret = $userHandle->saveUser($user);
    if($ret){
        echo "TRUE";
    }else{
        echo "网络错误，请重试";
    }
    exit;
}
function getUser($userid){
    $userHandle = new UserHandle();
    return $userHandle->getUser($userid);
}

function getHostInfo($hostid){
    $userHandle = new UserHandle();
    return $userHandle->getHostInfo($hostid);
}