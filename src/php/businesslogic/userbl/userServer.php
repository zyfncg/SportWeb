<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/3
 * Time: 17:22
 */
require 'userHandle.php';
$userHandle = new UserHandle();
if(isset($_POST['save'])){
    $userid = $_POST['userid'];

}