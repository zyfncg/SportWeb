<?php
/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/10/30
 * Time: 20:41
 */
//登录
session_start();
$username = htmlspecialchars($_POST['username']);
//$password = md5($_POST['password']);
$password = $_POST['password'];
echo $username;
echo "<br>";
echo $password;
//包含数据库连接文件
include '../database/database.php';

$db = DB::getInstance();
$sql = "select * from user where name = '$username' and password = '$password'";

$check_query = $db->find($sql);
if($result = $check_query->fetchArray(SQLITE3_ASSOC)){
    echo "ok<br>";
    $_SESSION['username'] = $username;
//    $_SESSION['userid'] = $result['userid'];
    echo $username,' 欢迎你！进入 <a href="my.php">用户中心</a><br />';
    echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
//    header('Location: ../index.html');
    exit;
}else {
    $doc = array("error" => "Username or Password error");
    echo json_encode($doc);
}


//注销登录
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
    exit;
}