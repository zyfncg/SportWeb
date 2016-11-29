<?php
/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/10/30
 * Time: 20:13
 */
class DB {

    private static $instance;
    private $db;

    private function __construct(){
        $path = $_SERVER['DOCUMENT_ROOT']."/database/sportlife.db";
//        $path = "../../../database/sportlife.db";
        $this->db = new SQLite3($path);
//        $this->db = new PDO('sqlite:'.$_SERVER['DOCUMENT_ROOT']."/database/sportlife.db");

        if(!$this->db){
            echo $this->db->lastErrorMsg();
        }else {
//            echo "Opened database successfully\n";
        }
    }
    private function __clone(){}

    public static function getInstance(){
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function find($sql){
        $db = $this->db;
        $ret = $db->query($sql);
        return $ret;
    }
    public function operate($sql){
        $db = $this->db;
        $ret = $db->exec($sql);
        return $ret;
    }
}


