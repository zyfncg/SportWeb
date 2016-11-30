<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2
 * Time: 21:23
 */
include "activityHandle.php";
$actHandel = new ActivityHandle();
function getActivityList(){
    $actHandle = new ActivityHandle();
    return $actHandle->getActivityList();
}
function getActivityInfo($activityid,$userid){
    $actHandle = new ActivityHandle();
    return $actHandle->getActivityInfo($activityid,$userid);
}
function getCreateActivity($userid){
    $actHandle = new ActivityHandle();
    return $actHandle->getCreateActivitys($userid);
}
function getJoinActivity($userid){
    $actHandle = new ActivityHandle();
    return $actHandle->getJoinActivitys($userid);
}
function addActivity($activityid,$actInfo){
    $actHandle = new ActivityHandle();
    return $actHandle->addActivity($activityid,$actInfo);
}
function updateActivity($activtyid,$actInfo){
    $actHandle = new ActivityHandle();
    return $actHandle->updateActivity($activtyid,$actInfo);
}
function delActivity($activityid){
    $actHandle = new ActivityHandle();
    return $actHandle->delActivity($activityid);
}
function addMember($activityid,$userid){
    $actHandle = new ActivityHandle();
    return $actHandle->addMember($activityid,$userid);
}
function delMember($activityid,$userid){
    $actHandle = new ActivityHandle();
    return $actHandle->delMember($activityid,$userid);
}