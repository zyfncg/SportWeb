<?php
session_start();
if(!isset($_SESSION['userid'])){
	header('Location:login.html');
}
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
							<li><a href="activity.php"><p class="top-tab">活动</p></a></li>
							

							<li class="dropdown">
                    			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        		<span class="glyphicon glyphicon-user"></span><span class="caret"></span>
                    			</a>
                    			<ul class="dropdown-menu">
                        			<li><a href="infoEdit.php"><span class="glyphicon glyphicon-user"></span>账户设置</a></li>
                        			<li><a href="pwEdit.php"><span class="glyphicon glyphicon-cog"></span>密码修改</a></li>
                        			<li class="divider"></li>
                        			<li><a href="" id="logout"><span class="	glyphicon glyphicon-log-out"></span> Logout</a></li>
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
	<div class="page-body">
		<div class="pw-panel">
			<div class="row col-center-block">
				<div class="col-md-4"><label>旧密码</label></div>
				<div class="col-md-8">
					<input type="password" id="old-pw" value="">
				</div>
				
			</div>
			<hr>
			<div class="row col-center-block">
				<div class="col-md-4"><label>新密码</label></div>
				<div class="col-md-8">
					<input type="password" id="new-pw" value="">
					<p id="confirm-tip" style="color: #c12e2a"></p>
				</div>
				
			</div>
			<br>
			<div class="row col-center-block">
				<div class="col-md-4"><label>确认密码</label></div>
				<div class="col-md-8">
					<input type="password" id="confirm-pw" value="">
				</div>
				
			</div>
			<div class="row col-center-block" style="max-width: 300px; margin: 30px auto">
				<button id="save-btn" class="btn col-center-block">保存</button>
				<p id="save-tip" class="col-center-block" style="color: #ae8c3b"></p>
			</div>

		</div>

	</div>
	

	<!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- 包括所有已编译的插件 -->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/custom.js"></script>
    <script>
		$("#save-btn").click(function () {
			var useridText = <?php $userid=$_SESSION['userid'];echo $userid; ?>;
			var oldpw = $("#old-pw").val();
			var newpw = $("#new-pw").val();
			var comfirmpw = $("#confirm-pw").val();
			if(newpw==comfirmpw){
				$.post("../php/businesslogic/userbl/userServer.php",
					{
						action:"savepw",
						userid:useridText,
						oldpw:oldpw,
						newpw:newpw
					},
					function (data) {
						if(data == "TRUE"){
							$("#save-tip").text("修改成功");
							$("#confirm-tip").text("");
						}else{
							$("#save-tip").text("密码错误，请重试");
							$("#confirm-tip").text("");
						}
					}
				);
			}else{
				$("#confirm-tip").text("密码不一致");
				$("#save-tip").text("");
			}
		});
	</script>
	</body>
</html>