<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2
 * Time: 21:19
 */
class UserInfo{
    private $uername;
    private $password;
    private $userid;
    private $picURL;
    private $grade;
    private $gender;
    private $birthday;
    private $introduce;
    private $address;

    /**
     * userInfo constructor.
     * @param $uername
     * @param $password
     * @param $userid
     * @param $grade
     * @param $gender
     * @param $birthday
     * @param $introduce
     * @param $address
     */
    public function __construct($uername, $password, $userid, $picURL, $grade, $gender, $birthday, $introduce, $address)
    {
        $this->uername = $uername;
        $this->password = $password;
        $this->userid = $userid;
        $this->picURL = $picURL;
        $this->grade = $grade;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->introduce = $introduce;
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getUername()
    {
        return $this->uername;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @return mixed
     */
    public function getPicURL()
    {
        return $this->picURL;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @return mixed
     */
    public function getIntroduce()
    {
        return $this->introduce;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }


}