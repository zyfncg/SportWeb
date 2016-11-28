<?php
/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/11/3
 * Time: 20:31
 */
require  '../../database/database.php';
require  'SimpleInfo.php';
require  '../statisticbl/statisticHandle.php';
require  '../statisticbl/sportData.php';
class ContactHandle{
    private $db;

    /**
     * ContactHandle constructor.
     */
    public function __construct(){
        $this->db = DB::getInstance();
    }

    public function getContactList($userid){
        $friendList = array();
        $sql = "select * from contant where hostid = '$userid'";
        $ret = $this->db->find($sql);

        while($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $friendid = $row['friendid'];
            $sql = "select userid,username,grade,picURL from users where userid = '$friendid'";
            $result = $this->db->find($sql);
            if($rowfriend = $result->fetchArray(SQLITE3_ASSOC)){
                $friendid1 = $rowfriend['userid'];
                $username = $rowfriend['usename'];
                $grade = $rowfriend['grade'];
                $pciURL = $rowfriend['picURL'];
                $friend = new SimpleInfo($friendid1,$username,$grade,$pciURL);
//                $sql1 = "select * from contant where hostid = '$userid' and friendid = '$friendid1'";
//                $check = $this->db->find($sql1);
//                if($check_care = $check->fetchArray(SQLITE3_ASSOC)){
//                    $friend->setIsCare(ture);
//                }
                $friendList[] = $friend;
            }

        }
        return $friendList;
    }
    public function getFriendInfo($userid, $friendid){
        $sql = "select userid,username,grade,picURL from users where userid = '$friendid'";
        $ret = $this->db->find($sql);
        if($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $username = $row['usename'];
            $grade = $row['grade'];
            $pciURL = $row['picURL'];
            $info = new SimpleInfo($friendid,$username,$grade,$pciURL);

        }
        $sportHandle = new StatisticHandle();
        $allsport = $sportHandle->getStatisticsAll($friendid);
        $todaysport = $sportHandle->getStatisticsToday($friendid);
        $result = new DetailInfo($info,$todaysport,$allsport);
        return $result;
    }
    public function addFriend($userid ,$friendid){
        $sql = "insert into contact values ('$userid','$friendid')";
        $ret = $this->db->operate($sql);
        return $ret;
    }
    public function delFriend($userid ,$friendid){
        $sql = "delete from contact where hostid = '$userid' and friendid = '$friendid'";
        $ret = $this->db->operate($sql);
        return $ret;
    }
}