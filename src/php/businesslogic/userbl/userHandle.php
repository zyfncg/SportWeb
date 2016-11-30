<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/3
 * Time: 17:09
 */
require $_SERVER['DOCUMENT_ROOT'].'/src/php/database/database.php';
class UserHandle{

    private $db;

    /**
     * UserHandle constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }


    public function getUser($userid){
        $username = null;
        $userid = null;
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
            $intro = $row['intoe'];
        }

        $user = array("userid"=>$userid,"username"=>$username,"address"=>$address,"grade"=>$grade,
                       "birthday"=>$birthday,"intor"=>$intro,"gender"=>$gender);
        return $user;
    }

    public function saveUser($user){
        $userid = $user['userid'];
        $username = $user['username'];
        $grade = $user['grade'];
        $gender = $user['gender'];
        $birthday = $user['birthday'];
        $intro = $user['intro'];
        $address = $user['address'];
        $sql = <<<EOT
            insert into users(userid,username,grade,address,birthday,gander,intro) VALUES 
            ('$userid','$username','$grade','$address','$birthday','$gender','$intro');
EOT;
        $ret = $this->db->operate($sql);

        return $ret;
    }

    public function updatePSW($pswInfo){

    }
    public function savepic($picInfo){

    }

}
