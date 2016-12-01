<?php
session_start();
if(!isset($_SESSION['userid'])){
	header('Location:login.html');
}else{
//	echo $_SESSION['userid']."this is userid<br>";
}
//	if($_SESSION['userid']==""){
//		echo 'wooooooooo';
//
//	}
include '../php/businesslogic/contactbl/contact.php';
include '../php/businesslogic/userbl/userServer.php';
$rows = getFriends($_SESSION['userid']);
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
                        			<li><a href="infoEdit.php"><span class="glyphicon glyphicon-user"></span>账户设置</a></li>
                        			<li><a href="pwEdit.php"><span class="glyphicon glyphicon-cog"></span>密码修改</a></li>
                        			<li class="divider"></li>
                        			<li><a href="" id="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
			
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<div class="userinfo" style="height: 350px">
						<?php $hostHandle = new UserHandle();
							$host = $hostHandle->getHostInfo($_SESSION['userid']);
							$picURL = $host['picURL'];
							$usernmae = $host['username'];
							$grade = $host['grade'];
							$distance = $host['distance'];
							$time = $host['time'];
						?>
						<div class="user-header">
							<div class="user-header-img tc">
								<img src=<?php echo $picURL; ?>>
							</div>
						</div>
						<div class="tc">
							<h1><?php echo $usernmae;?></h1>
						</div>
						<div class="user-showinfo tc">
							<p class="grade">等级: <span><?php echo $grade;?></span></p>
							<p>累计运动里程：<span><?php echo $distance." km";?></span></p>
							<p>累计运动时间：<span><?php echo $time." min";?></span></p>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-xs-12">
					<div class="firend-part">
						<div class="list-panel">
							<div class="friend-list-panel">
			                    <div class="row">
                    				<div class="col-md-5">
                    					<div class="friend-title">

                    						<p>我的关注</p>
                    					</div>
                    				</div>
                    				
                    			</div>
                    			<hr>
								<ul class="friend-list">
									<?php foreach ($rows as $row) :?>
									<li>
										<div class="friend row">
											
											<?php $friendid = $row->getUserid();
												$userid = $_SESSION['userid'];
												echo "<p id='userid' $userid></p>";
												echo "<p id='friendid' $friendid></p>";
												echo "<a href='friendDetail.php?friendid=$friendid'>";
											?>
<!--											<a href="friendDetail.php">-->
												<div class="friend-img col-md-2 col-xs-3 col-sm-3">
													<?php
														$url = $row->getPicURL();
//														echo $url;
														echo "<img class='img-circle img-responsive' src='$url'>" ?>
<!--													<img class="img-circle img-responsive" src="../images/user2.jpg">-->
												</div>
												<div class="friend-name col-md-2 col-xs-3 col-sm-3">
													<p><?php echo $row->getName() ?></p>
												</div>
											</a>
												<div class="friend-grade col-md-2 col-xs-3 col-sm-3">
													<p><?php echo $row->getGrade()." 级" ?></p>
												</div>
												<div class="option pull-right">

					                    			<a href="#" id=<?php echo $friendid; ?> class = "manageFriend" data-toggle="tooltip" title="取消关注">
					                        			<span class="glyphicon glyphicon-trash"></span>

					                    			</a>
					                			</div>
											
											
										</div>

									</li>
									<?php  endforeach; ?>
									
								</ul>
							</div>
						</div>
						<div class="panel-body">
							
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
	<script src="../js/custom.js"></script>

	<?php foreach ($rows as $row) :
		$friendid = $row->getUserid();
		$userid = $_SESSION['userid'];
		echo <<<EOT
		<script>
		$("#$friendid").click(function(){
				if($("#$friendid").attr("title")=="取消关注"){
					var useridText = "$userid";
					var friendidText = "$friendid";
					$.post("../php/businesslogic/contactbl/contact.php",
						{
							method:"del",
							userid:useridText,
							friendid:friendidText
						},
						function(data,status){
							$("#$friendid").attr("title","关注");
							$("#$friendid span").attr("class","glyphicon glyphicon-star-empty");
						});
				}else{
					var useridText = "$userid";
					var friendidText = "$friendid";
					$.post("../php/businesslogic/contactbl/contact.php",
						{
							method:"add",
							userid:useridText,
							friendid:friendidText
						},
						function(data,status){
							$("#$friendid").attr("title","取消关注");
							$("#$friendid span").attr("class","glyphicon glyphicon-trash");
						});
				}
		});
	</script>


EOT;
		endforeach;
	?>

	</body>
</html>

