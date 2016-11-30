<?php

/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/28
 * Time: 20:51
 */
require 'SimpleInfo.php';
class DetailInfo
{
    private $simple;
    private $todaysport;
    private $allsport;
    private $friends;

    /**
     * DetailInfo constructor.
     * @param $simple
     * @param $todaysport
     * @param $allsport
     * @param $friends
     */
    public function __construct($simple, $todaysport, $allsport, $friends)
    {
        $this->simple = $simple;
        $this->todaysport = $todaysport;
        $this->allsport = $allsport;
        $this->friends = $friends;
    }


    /**
     * @return mixed
     */
    public function getSimple()
    {
        return $this->simple;
    }

    /**
     * @return mixed
     */
    public function getTodaysport()
    {
        return $this->todaysport;
    }

    /**
     * @return mixed
     */
    public function getAllsport()
    {
        return $this->allsport;
    }

    /**
     * @return mixed
     */
    public function getFriends()
    {
        return $this->friends;
    }


}