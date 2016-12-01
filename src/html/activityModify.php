<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('Location:login.html');
}else{
//	echo $_SESSION['userid']."   this is userid<br>";
}
require '../php/businesslogic/activitybl/activity.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme style  -->
    <link rel="stylesheet" href="../css/style.css">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">


    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="../js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="page-header">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
        <div class="header-show">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top_menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><span>SPORT LIFE</span></a>
            </div>
            <!-- /.navbar-header -->

            <div class="collapse navbar-collapse navbar-responsive-collapse" id="top_menu">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html"><p class="top-tab">首页</p></a></li>
                    <li><a href="mySport.php"><p class="top-tab">我的运动</p></a></li>
                    <li><a href="friend.php"><p class="top-tab">好友</p></a></li>
                    <li class="active"><a href="activity.php"><p class="top-tab">活动</p></a></li>


                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-user"></span><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="infoEdit.php"><span class="glyphicon glyphicon-user"></span>账户设置</a></li>
                            <li><a href="pwEdit.php"><span class="glyphicon glyphicon-cog"></span>密码修改</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html"><span class="	glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-static-side -->
        </div>

    </nav>
</div>
<div id="page-body">

    <div class="infobody">

        <div class="row" style="max-width: 650px;margin: auto;">

            <div class="col-md-12 col-xs-12">
                <div class="activity-part">

                        <div class="updateActivityPanel">
                            <h2 class="tc">修改活动</h2>
                            <hr>
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="actName" class="col-sm-2 control-label">活动名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="actName" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="activityIntro" class="col-sm-2 control-label">简介</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="3" id="activityIntro"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="actAddr" class="col-sm-2 control-label">活动地点</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="actAddr" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="startDate" class="col-sm-2 control-label">开始时间</label>
                                    <div class="input-group date form_datetime col-sm-6" data-date="" data-date-format="yyyy年mm月dd日 hh:ii" data-link-field="startDate" data-link-format="yyyy-mm-dd hh:ii" style="padding-left:15px;">
                                        <input class="form-control" size="16" type="text" value="" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" id="startDate" value="" /><br/>
                                </div>
                                <div class="form-group">
                                    <label for="endDate" class="col-sm-2 control-label">结束时间</label>
                                    <div class="input-group date form_datetime col-sm-6" data-date="" data-date-format="yyyy年mm月dd日 hh:ii" data-link-field="endDate" data-link-format="yyyy-mm-dd hh:ii" style="padding-left:15px;">
                                        <input class="form-control" size="16" type="text" value="" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" id="endDate" value="" /><br/>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">确认</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- 包括所有已编译的插件 -->
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script>
    $('.form_datetime').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });

</script>
</body>
</html>

