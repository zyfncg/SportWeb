<?php
/**
 * Created by PhpStorm.
 * User: ZhangYF
 * Date: 2016/10/30
 * Time: 20:41
 */
//登录
$username = htmlspecialchars($_POST['username']);
$password = md5($_POST['password']);
echo $username;
echo "<br>";
echo $password;
//包含数据库连接文件
//include('conn.php');
//检测用户名及密码是否正确
//$check_query = mysql_query("select userid from user_list where username='$username' and password='$password' limit 1");
//if($result = mysql_fetch_array($check_query)){
if($username == "111"){
    //登录成功
    session_start();
    $_SESSION['username'] = $username;
//    $_SESSION['userid'] = $result['userid'];
    echo $username,' 欢迎你！进入 <a href="my.php">用户中心</a><br />';
    echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
    header('Location: ../index.html');
    exit;
} else {
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}



//注销登录
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
    exit;
}