<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2
 * Time: 21:21
 */
include '../database/database.php';
$datatime = new DateTime();
echo $datatime->format('Y-m-d');
$d=strtotime('-3 days');
echo date('Y-m-d',$d);
$day = date('Y-m-d',$d);

$db = DB::getInstance();
$sql = "select * from sport where daydate = '$day'";

$ret = $db->find($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC)){
    echo $row['userid'];
    echo $row['daydate'];
    echo $row['distance'];
    echo $row['sportTime'];
}
