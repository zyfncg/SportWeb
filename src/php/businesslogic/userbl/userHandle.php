<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/3
 * Time: 17:09
 */
class UserHandle{

    public function getUser($userid){
        $uername = null;
        $userid = null;
        $grade = null;
        $gender = null;
        $birthday = null;
        $introduce = null;
        $address = null;

        $user = new UserInfo($uername, null, $userid, $grade, $gender, $birthday, $introduce, $address);
        return $user;
    }

    protected function saveUser($user){

        return false;
    }

}
