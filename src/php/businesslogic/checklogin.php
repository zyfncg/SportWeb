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
    }elseif ($_POST['action'] == "login"){
        $username = htmlspecialchars($_POST['username']);
        //$password = md5($_POST['password']);
        $password = $_POST['password'];

        //包含数据库连接文件
        include '../database/database.php';
        $db = DB::getInstance();
        $sql = "select * from users where userid = '$username' and password = '$password'";

        $check_query = $db->find($sql);
        if($result = $check_query->fetchArray(SQLITE3_ASSOC)){

            $_SESSION['userid'] = $username;
//          $_SESSION['userid'] = $result['userid'];
            $doc = array("status" => "TRUE");
            echo json_encode($doc);
//            header('Location: ../../html/mySport.php');
            exit;
        }else {
            $doc = array("status" => "FALSE");
            echo json_encode($doc);
            exit;
        }
    }
}




