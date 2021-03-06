<?php
session_start();
if(!isset($_SESSION['userid']) || !isset($_GET['friendid'])){
	header('Location:login.html');
}
require '../php/businesslogic/contactbl/contact.php';
$rows = getDetail($_SESSION['userid'],$_GET['friendid']);
$simple = $rows->getSimple();
$todaysport = $rows->getTodaysport();
$allsport = $rows->getAllsport();
$friends = $rows->getFriends();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Sport</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="运动网站,运动,社交,活动，sport"/>
		<meta name="description" content="sportlift运动社交网站为热爱运动的人群提供运动数据统计，运动社交和活动组织等服务"/>

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
	<div id="page-body">
		
		<div class="infobody col-center-block" style="max-width: 800px">
			<div class="info-header">
					<div class="userinfo" style="height: 360px">
						<div class="user-header">
							<div class="user-header-img tc">
								<?php $picURL=$simple->getPicURL();?>
								<img src=<?php echo $picURL;?>>
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
									echo "<button id='friend-op-btn' class='col-center-block btn'>取消关注</button>";
								}else{
									echo "<button id='friend-op-btn' class='col-center-block btn'>关注</button>";
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
										<p><?php echo $row->getGrade()." 级" ?></p>
									</div>
									<div class="option pull-right">
										<?php
											if($row->getIsCare()){
												echo "<a id='$friendid' data-toggle='tooltip' title='取消关注'><span class='glyphicon glyphicon-star'></span></a>";
											}else{
												echo "<a id='$friendid' data-toggle='tooltip' title='关注'><span class='glyphicon glyphicon-star-empty'></span></a>";
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
	<script src="../js/custom.js"></script>
	<script>
		var user = function () {
			var userid = <?php $userid=$_SESSION['userid']; echo $userid; ?>;
			return {
				getUserid:function () {
					return userid;
				}
			}
		}();
		var lookidText = <?php $lookid=$_GET['friendid']; echo $lookid; ?>;
		$("#friend-op-btn").click(function () {
			var btntext = $("#friend-op-btn").text();
			if(btntext=="关注"){
				$.post("../php/businesslogic/contactbl/contact.php",
					{
						method:"add",
						userid:user.getUserid(),
						friendid:lookidText
					},
					function(data,status){
//						alert("取消啊！！！");
						$("#friend-op-btn").text("取消关注");
					});
			}else{
				$.post("../php/businesslogic/contactbl/contact.php",
					{
						method:"del",
						userid:user.getUserid(),
						friendid:lookidText
					},
					function(data,status){
//						alert("取消啊！！！");
						$("#friend-op-btn").text("关注");
					});
			}

		});
	</script>

	<?php foreach ($friends as $row) :
		$friendid = $row->getUserid();
		$userid = $_SESSION['userid'];
		if($friendid != $userid){
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
							if(data=="TRUE"){
								$("#$friendid").attr("title","关注");
								$("#$friendid span").attr("class","glyphicon glyphicon-star-empty");
							}
							
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
							if(data=="TRUE"){
								$("#$friendid").attr("title","取消关注");
								$("#$friendid span").attr("class","glyphicon glyphicon-star");
							}	
						});
				}
		});
	</script>
EOT;
		}

	endforeach;
	?>

	</body>
</html>

