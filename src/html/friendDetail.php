<?php
session_start();
if(!isset($_SESSION['userid'])){
	header('Location:login.html');
}else{
	echo $_SESSION['userid']."this is userid<br>";
}

require '../php/businesslogic/contactbl/contact.php';
$rows = getDetail($_SESSION['userid'],$_GET['friendid']);
$simple = $rows->getSimple();
$todaysport = $rows->getTodaysport();
$allsport = $rows->getAllsport();
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
							<li class="active"><a href="friend.php"><p class="top-tab">好友</p></a></li>
							<li><a href="activity.php"><p class="top-tab">活动</p></a></li>
							

							<li class="dropdown">
                    			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        		<span class="glyphicon glyphicon-user"></span><span class="caret"></span>
                    			</a>
                    			<ul class="dropdown-menu">
                        			<li><a href="infoEdit.html"><span class="glyphicon glyphicon-user"></span>账户设置</a></li>
                        			<li><a href="pwEdit.html"><span class="glyphicon glyphicon-cog"></span>密码修改</a></li>
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
		
		<div class="infobody col-center-block" style="max-width: 800px">
			<div class="info-header">
					<div class="userinfo" style="height: 360px">
						<div class="user-header">
							<div class="user-header-img tc">
								<img src="../images/user2.jpg">
							</div>
						</div>
						<div class="tc">

							<h1><?php $name = $simple->getName(); echo "$name"?></h1>
						</div>
						<div class="user-showinfo tc">
							<p class="grade">等级: <span><?php $grade = $simple->getGrade();  echo "$grade"." 级" ?></span></p>
							<p>累计运动里程：<span><?php $dist = $allsport->getDistance(); echo "$dist"." km" ?></span></p>
							<p>累计运动时间：<span><?php $time = $allsport->getTime(); echo "$time"." min" ?></span></p>
							<?php
								if($simple->getIsCare()){
									echo "<label class='col-center-block'>已关注</label>";
								}else{
									echo "<label class='col-center-block'>关注</label>";
								}
							?>

						</div>
					</div>
			</div>
			<div class="row">
					<div class="today_sport" style="height: 240px">
						
						<div class="run-distance col-md-6">
							<div class="runImg">
								<img class="img-circle img-responsive" src="../images/run.jpg">
							</div>
							<div class="runText tc">
								<p>今日运动里程 <span><?php $dist = $todaysport->getDistance(); echo "$dist"." km" ?></span></p>
							</div>
						</div>
						<div class="run-time col-md-6">
							<div class="timeImg">
								<img class="img-circle img-responsive" src="../images/time.jpg">
							</div>
							<div class="runText tc">
								<p>今日运动时间 <span><?php $time = $todaysport->getTime(); echo "$time"." min" ?></span></p>
							</div>
						</div>
					</div>

			</div>
			<div class="following row">
					<h3>关注的人</h3>
					<div class="follow-panel">
						<ul class="follow-list">
							<?php
								$friends = getFriends($_GET['friendid']);
								foreach ($friends as $row) :
								$friendid = $row->getUserid();
								if($friendid==$_SESSION['userid']){
									continue;
								}
							?>
							<li>
								<div class="friend row">
									<?php
										echo "<a href='friendDetail.php?friendid=$friendid'>";
									?>
										<div class="friend-img col-md-2 col-xs-3 col-sm-3">
											<?php
												$url = $row->getPicURL();
												echo "<img class='img-circle img-responsive' src='$url'>"
											?>
										</div>
										<div class="friend-name col-md-2 col-xs-3 col-sm-3">
											<p><?php echo $row->getName() ?></p>
										</div>
									</a>
									<div class="friend-grade col-md-2 col-xs-3 col-sm-3">
										<p><?php echo $row->getGrade() ?></p>
									</div>
									<div class="option pull-right">
										<?php
											if($row->getIsCare()){
												echo "<a href='#' data-toggle='tooltip' title='点击取消关注'><span class='glyphicon glyphicon-star'></span></a>";
											}else{
												echo "<a href='#' data-toggle='tooltip' title='点击关注'><span class='glyphicon glyphicon-star-empty'></span></a>";
											}
										?>

									</div>

								</div>
							</li>
							<?php endforeach; ?>

						</ul>
					</div>
						
				</div>

		</div>

	</div>

	<!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- 包括所有已编译的插件 -->
    <script src="../js/bootstrap.min.js"></script>

	</body>
</html>

