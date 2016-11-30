<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2
 * Time: 21:23
 */
include "activityHandle.php";
$actHandel = new ActivityHandle();

if(isset($_POST['method'])){
    $method = $_POST['method'];
    if($method == "createactivity"){
        $activityid = $_POST['activityid'];
        $creator = $_POST['creator'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $intro = $_POST['intro'];
        $actInfo = array("aciivityid"=>$activityid,"creator"=>$creator,"name"=>$name,"address"=>$address,
            "startTime"=>$startTime,"endTime"=>$endTime,"intro"=>$intro);
        $ret = addActivity($activityid,$actInfo);
        if($ret){
            echo "TRUE";
        }else{
            echo "网络错误，请重试";
        }
        exit;
    }
    $activityid = $_POST['activityid'];
    $userid = $_POST['userid'];

    if($method == "joinactivity"){
        $ret = addMember($activityid,$userid);
        if($ret){
            echo "TRUE";
        }else{
            echo "网络错误，请重试";
        }
    }
    if($method == "quitactivity"){
        $ret = delMember($activityid,$userid);
        if($ret){
            echo "TRUE";
        }else{
            echo "网络错误，请重试";
        }
    }
    if($method == "delactivity"){
        $ret = delActivity($activityid);
        if($ret){
            echo "TRUE";
        }else{
            echo "网络错误，请重试";
        }
    }
}

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