<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2
 * Time: 21:22
 */
require 'contactHandle.php';
function getFriends($userid){
    $contHandle = new ContactHandle();
    return $contHandle->getContactList($userid);
}
function getDetail($userid){
    $conHandle = new ContactHandle();
    return $conHandle->getFriendInfo($userid);
}