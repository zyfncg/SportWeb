<?php
/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/10/30
 * Time: 20:41
 */
//登录
session_start();

if(isset($_POST['action'])){
    //注销登录
    if($_POST['action'] == "logout"){
        unset($_SESSION['userid']);
        $doc = array("status"=>"TRUE");
        echo json_encode($doc);
        header('Location: ../../html/login.html');
        exit;
    }
}

$username = htmlspecialchars($_POST['username']);
//$password = md5($_POST['password']);
$password = $_POST['password'];

//包含数据库连接文件
include '../database/database.php';
$db = DB::getInstance();
$sql = "select * from users where userid = '$username' and password = '$password'";

$check_query = $db->find($sql);
if($result = $check_query->fetchArray(SQLITE3_ASSOC)){
    echo "ok<br>";
    $_SESSION['userid'] = $username;
//    $_SESSION['userid'] = $result['userid'];
    echo $username,' 欢迎你！进入 <a href="my.php">用户中心</a><br />';
    echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
    header('Location: ../../html/mySport.php');
    exit;
}else {
    $doc = array("error" => "Username or Password error");
    echo json_encode($doc);
    header('Location: ../../html/login1.html');
}


