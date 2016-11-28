<?php

/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/28
 * Time: 19:36
 */
class SimpleInfo
{
    private $userid;
    private $name;
    private $grade;
    private $picURL;
    private $isCare = true;

    /**
     * SimpleInfo constructor.
     * @param $userid
     * @param $name
     * @param $grade
     * @param $picURL
     */
    public function __construct($userid, $name, $grade, $picURL)
    {
        $this->userid = $userid;
        $this->name = $name;
        $this->grade = $grade;
        $this->picURL = $picURL;
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
    public function getName()
    {
        return $this->name;
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
    public function getPicURL()
    {
        return $this->picURL;
    }

    /**
     * @param mixed $isCare
     */
    public function setIsCare($isCare)
    {
        $this->isCare = $isCare;
    }

    /**
     * @return mixed
     */
    public function getIsCare()
    {
        return $this->isCare;
    }

}