<?php
/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/11/3
 * Time: 20:59
 */
require_once dirname(__FILE__).'/../contactbl/contactHandle.php';
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
    public function getActivityInfo($activityid,$userid){
        $memberary = array();
        $sql = "select * from memberView where activityid = '$activityid'";
        $ret1 = $this->db->find($sql);
        $isJoin = FALSE;
        $isCare = FALSE;
        while($memb = $ret1->fetchArray(SQLITE3_ASSOC)){
            $memberid = $memb['memberid'];
            if($userid == $memberid){
                $isSelf = TRUE;
                $isJoin = TRUE;
            }else{
                $isSelf = FALSE;
                $sql = "select * from contact where hostid='$userid' and friendid='$memberid'";
                $ret2 = $this->db->find($sql);
                if($check = $ret2->fetchArray(SQLITE3_ASSOC)){
                    $isCare = TRUE;
                }
            }

            $memberary[] = array("memberid"=>$memb['memberid'],"username"=>$memb['username'],
                                  "picURL"=>$memb['picURL'],"grade"=>$memb['grade'],
                                  "isCare"=>$isCare,"isSelf"=>$isSelf);

        }

        $sql = "select * from activity where activityid='$activityid'";
        $ret = $this->db->find($sql);
        if($act = $ret->fetchArray(SQLITE3_ASSOC)){
            $creatorid = $act['creator'];
            $isCreator = ($userid == $creatorid);
            $isCare = FALSE;
            $sql = "select * from users where userid='$creatorid'";
            $create = $this->db->find($sql);
            if($creatInfo = $create->fetchArray(SQLITE3_ASSOC)){
                if($isCreator){
                    $isJoin = TRUE;
                    $isSelf = TRUE;
                }else{
                    $isSelf = FALSE;
                    $sql = "select * from contact where hostid='$userid' and friendid='$creatorid'";
                    $ret2 = $this->db->find($sql);
                    if($check = $ret2->fetchArray(SQLITE3_ASSOC)){
                        $isCare = TRUE;
                    }
                }

                $creator = array("creatorid"=>$creatorid,"username"=>$creatInfo['username'],
                                  "picURL"=>$creatInfo['picURL'],"grade"=>$creatInfo['grade'],
                                  "isCare"=>$isCare,"isSelf"=>$isSelf);

            }
            $activity = array("activityid"=>$activityid,"creator"=>$creator,"name"=>$act['name'], "address"=>$act['address'],
                "startTime"=>$act['startTime'],"endTime"=>$act['endTime'],"intro"=>$act['intro'], "peopleNum"=>$act['peopleNum'],
                "isJoin"=>$isJoin,"isCreator"=>$isCreator,"creatorInfo"=>$creator,"memberary"=>$memberary);
            return $activity;
        }

    }
    public function addActivity($activityid,$actInfo){
        $name = $actInfo['name'];
        $creator = $actInfo['creator'];
        $address = $actInfo['address'];
        $startTime = $actInfo['startTime'];
        $endTime = $actInfo['endTime'];
        $intro = $actInfo['intro'];
        $sql = <<<EOT
            insert into activity(activityid,creator,name,address,startTime,endTime,peopleNum,intro) 
            values('$activityid','$creator','$name','$address','$startTime','$endTime',1,'$intro');
EOT;
        $ret = $this->db->operate($sql);

        return $ret;
    }
    public function updateActivity($activityid,$actInfo){
        $name = $actInfo['name'];
        $address = $actInfo['address'];
        $startTime = $actInfo['startTime'];
        $endTime = $actInfo['endTime'];
        $intro = $actInfo['intro'];
        $sql = <<<EOT
            update activity set name='$name',address='$address',startTime='$startTime',endTime='$endTime',intro='$intro'
            where activityid='$activityid';
EOT;
        $ret = $this->db->operate($sql);

        return $ret;
    }
    public function delActivity($activityid){
        $sql = "delete from member where activityid='$activityid'";
        $ret = $this->db->operate($sql);
        if($ret){
            $sql = "delete from activity where activityid='$activityid'";
            $ret = $this->db->operate($sql);
        }
        return $ret;
    }
    public function addMember($activityid,$userid){
        $sql = "insert into member(activityid,memberid) values ('$activityid','$userid')";
        $ret = $this->db->operate($sql);
        if($ret){
            $sql = "update activity set peopleNum=peopleNum+1";
            $ret = $this->db->operate($sql);
        }
        return $ret;
    }
    public function delMember($activityid,$userid){
        $sql = "delete from member where activityid='$activityid' and memberid='$userid'";
        $ret = $this->db->operate($sql);
        if($ret){
            $sql = "update activity set peopleNum=peopleNum-1";
            $ret = $this->db->operate($sql);
        }
        return $ret;
    }
}