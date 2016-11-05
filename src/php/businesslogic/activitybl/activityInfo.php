<?php
/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/11/3
 * Time: 21:14
 */
class ActivityInfo{
    private $activityid;
    private $creater;
    private $activityName;
    private $address;
    private $startTime;
    private $endTime;
    private $description;
    private $participate;

    /**
     * ActivityInfo constructor.
     * @param $activityid
     * @param $creater
     * @param $activityName
     * @param $address
     * @param $startTime
     * @param $endTime
     * @param $description
     * @param $participate
     */
    public function __construct($activityid, $creater, $activityName, $address, $startTime, $endTime, $description, $participate)
    {
        $this->activityid = $activityid;
        $this->creater = $creater;
        $this->activityName = $activityName;
        $this->address = $address;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->description = $description;
        $this->participate = $participate;
    }

    /**
     * @return mixed
     */
    public function getActivityid()
    {
        return $this->activityid;
    }

    /**
     * @return mixed
     */
    public function getCreater()
    {
        return $this->creater;
    }

    /**
     * @return mixed
     */
    public function getActivityName()
    {
        return $this->activityName;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getParticipate()
    {
        return $this->participate;
    }



}