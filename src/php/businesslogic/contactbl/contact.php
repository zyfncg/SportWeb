<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2
 * Time: 21:22
 */
require 'contactHandle.php';
$contHandle = new ContactHandle();
if(isset($_POST['method'])){
    $userid = $_POST['userid'];
    $friendid = $_POST['friendid'];
    echo $friendid."<br>";
    $method = $_POST['method'];
    if($method == "del"){
        $ret = $contHandle->delFriend($userid,$friendid);
        if($ret){
            echo "true";
        }else{
            echo "error";
        }
    }elseif ($method == "add"){
        $ret = $contHandle->addFriend($userid,$friendid);
        if($ret){
            echo "true";
        }else{
            echo "error";
        }
    }
}

function getFriends($userid){
    $contHandle = new ContactHandle();
    return $contHandle->getContactList($userid);
}
function getDetail($userid,$friendid){
    $conHandle = new ContactHandle();
    return $conHandle->getFriendInfo($userid,$friendid);
}