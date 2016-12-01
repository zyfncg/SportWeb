<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/3
 * Time: 17:22
 */
require 'userHandle.php';
$userHandle = new UserHandle();
if(isset($_POST['action'])){
    if($_POST['action'] == "saveinfo"){
        $userid = $_POST['userid'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $intro = $_POST['intro'];
        $user = array("userid"=>$userid,"username"=>$username,"address"=>$address,
            "birthday"=>$birthday,"intro"=>$intro,"gender"=>$gender);
        $ret = $userHandle->saveUser($user);
        if($ret){
            $doc = array("status"=>"TRUE");
            echo json_encode($doc);
        }else{
            $doc = array("status"=>"FALSE");
            echo json_encode($doc);
        }
        exit;
    }elseif ($_POST['action'] == "savepw"){
        $userid = $_POST['userid'];
        $oldpw = $_POST['oldpw'];
        $newpw = $_POST['newpw'];
        $pwinfo = array("userid"=>$userid,"oldpw"=>$oldpw,"newpw"=>$newpw);
        $ret = $userHandle->updatePSW($pwinfo);
        if($ret){
            echo "TRUE";
        }else{
            echo "FALSE";
        }
        exit;
    }

}
function getUser($userid){
    $userHandle = new UserHandle();
    return $userHandle->getUser($userid);
}

function getHostInfo($hostid){
    $userHandle = new UserHandle();
    return $userHandle->getHostInfo($hostid);
}