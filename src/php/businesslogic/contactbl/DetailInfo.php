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

    /**
     * DetailInfo constructor.
     * @param $simple
     * @param $todaysport
     * @param $allsport
     */
    public function __construct($simple, $todaysport, $allsport)
    {
        $this->simple = $simple;
        $this->todaysport = $todaysport;
        $this->allsport = $allsport;
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


}