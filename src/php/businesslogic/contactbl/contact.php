<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2
 * Time: 21:22
 */
require 'contactHandle.php';
$contHandle = new ContactHandle();


function getFriends($userid){
    $contHandle = new ContactHandle();
    return $contHandle->getContactList($userid);
}
function getDetail($userid,$friendid){
    $conHandle = new ContactHandle();
    return $conHandle->getFriendInfo($userid,$friendid);
}