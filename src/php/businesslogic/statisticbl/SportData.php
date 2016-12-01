<?php

/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/11/3
 * Time: 19:33
 */
class SportData{
    private $userid;
    private $distance;
    private $day;
    private $time;
    private $rank;

    /**
     * SportData constructor.
     * @param $userid
     * @param $distance
     * @param $day
     * @param $time
     */
    public function __construct($userid, $distance, $day, $time)
    {
        $this->userid = $userid;
        $this->distance = $distance;
        $this->day = $day;
        $this->time = $time;
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
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }


    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }

}