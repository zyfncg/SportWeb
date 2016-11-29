<?php
/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/11/3
 * Time: 20:59
 */
require dirname(__FILE__).'/../contactbl/contactHandle.php';
class ActivityHandle{
    private $db;

    /**
     * ActivityHandle constructor.
     */
    public function __construct(){
        $this->db = DB::getInstance();
    }
    public function getActivityList(){
        $list = array();
        $sql = "select * from activity";
        $ret = $this->db->find($sql);

        while($row = $ret->fetchArray(SQLITE3_ASSOC)){

            $activity = array("activityid"=>$row['activityid'],"creator"=>$row['creator'],"name"=>$row['name'],
                                "address"=>$row['address'],"startTime"=>$row['startTime'],"endTime"=>$row['endTime'],
                                "peopleNum"=>$row['peopleNum']);
            $list[] = $activity;
        }
        return $list;
    }
    public function getCreateActivitys($userid){
        $list = array();
        $sql = "select * from activity where creator='$userid'";
        $ret = $this->db->find($sql);

        while($row = $ret->fetchArray(SQLITE3_ASSOC)){

            $activity = array("activityid"=>$row['activityid'],"creator"=>$row['creator'],"name"=>$row['name'],
                "address"=>$row['address'],"startTime"=>$row['startTime'],"endTime"=>$row['endTime'],
                "peopleNum"=>$row['peopleNum']);
            $list[] = $activity;
        }
        return $list;
    }
    public function getJoinActivitys($userid){
        $list = array();
        $sql = "select activityid from memberView where memberid='$userid'";
        $ret = $this->db->find($sql);

        while($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $activityid = $row['activityid'];
            $sql = "select * from activity where activityid='$activityid'";
            $ret1 = $this->db->find($sql);
            if($act = $ret1->fetchArray(SQLITE3_ASSOC)){
                $activity = array("activityid"=>$act['activityid'],"creator"=>$act['creator'],"name"=>$act['name'],
                    "address"=>$act['address'],"startTime"=>$act['startTime'],"endTime"=>$act['endTime'],
                    "peopleNum"=>$act['peopleNum']);
            }

            $list[] = $activity;
        }
        return $list;
    }
    public function getActivityInfo($activityid){
//        $memberary = array();
//        $activityid = $row['activityid'];
//        $sql = "select * from memberView where activityid = '$activityid'";
//        $ret1 = $this->db->find($sql);
//        while($memb = $ret1->fetchArray(SQLITE3_ASSOC)){
//            $memberary[] = array("memberid"=>$memb['memberid'],"name")
//            }
    }
    public function addActivity($activityid,$actInfo){

    }
    public function updateActivity($activityid,$actInfo){

    }
    public function delActivity($activityid){

    }
    public function addMember($activityid,$userid){

    }
    public function delMember($activityid,$userid){

    }
}