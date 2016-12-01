<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/3
 * Time: 17:09
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/businesslogic/statisticbl/statisticHandle.php';
class UserHandle{

    private $db;

    /**
     * UserHandle constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getHostInfo($hostid){
        $picURL = null;
        $username = null;
        $grade = null;
        $distance = null;
        $time = null;


        $sql = "select * from users where userid='$hostid'";
        $ret = $this->db->find($sql);
        if($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $picURL = $row['picURL'];
            $username = $row['username'];
            $grade = $row['grade'];

        }
        $statHandle = new StatisticHandle();
        $sport = $statHandle->getStatisticsAll($hostid);
        $distance = $sport->getDistance();
        $time = $sport->getTime();

        $user = array("userid"=>$hostid,"picURL"=>$picURL,"username"=>$username,"grade"=>$grade,"distance"=>$distance, "time"=>$time);
        return $user;
    }

    public function getUser($userid){
        $username = null;
        $grade = null;
        $gender = null;
        $birthday = null;
        $intro = null;
        $address = null;

        $sql = "select * from users where userid='$userid'";
        $ret = $this->db->find($sql);
        if($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $username = $row['username'];
            $grade = $row['grade'];
            $birthday = $row['birthday'];
            $gender = $row['gender'];
            $address = $row['address'];
            $intro = $row['intro'];
        }

        $user = array("userid"=>$userid,"username"=>$username,"address"=>$address,"grade"=>$grade,
                       "birthday"=>$birthday,"intro"=>$intro,"gender"=>$gender);
        return $user;
    }

    public function saveUser($user){
        $userid = $user['userid'];
        $username = $user['username'];
        $gender = $user['gender'];
        $birthday = $user['birthday'];
        $intro = $user['intro'];
        $address = $user['address'];
        $sql = <<<EOT
            update users  set username='$username',address='$address',birthday='$birthday',gender='$gender',intro='$intro' where userid='$userid';
EOT;
        $ret = $this->db->operate($sql);

        return $ret;
    }

    public function updatePSW($pswInfo){
        $userid = $pswInfo['userid'];
        $oldpw = $pswInfo['oldpw'];
        $newpw = $pswInfo['newpw'];
        $sql = "select * from users where userid = '$userid' and password = '$oldpw'";
        $check_query = $this->db->find($sql);
        if($result = $check_query->fetchArray(SQLITE3_ASSOC)){
            $sql = "update users set password='$newpw'";
            $ret = $this->db->operate($sql);
            return $ret;
        }
        return FALSE;
    }
    public function savepic($picInfo){

    }

}
