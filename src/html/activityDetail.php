<?php
session_start();
if(!isset($_SESSION['userid'])){
	header('Location:login.html');
}else{
//	echo $_SESSION['userid']."   this is userid<br>";
}
require '../php/businesslogic/activitybl/activity.php';
$actHandle = new ActivityHandle();
$activityid = $_GET['activityid'];
$userid = $_SESSION['userid'];
$actInfo = $actHandle->getActivityInfo($activityid,$userid);
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
							<li class="active"><a href="activity.php"><p class="top-tab">活动</p></a></li>
							

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
		
		<div class="activityInfo">
			
			<div class="activity-base-info">
				<div class="runImg">
					<img class="img-circle img-responsive" src="../images/run1.png">
				</div>
				<div class="tc">
                    <h1 style="display: none"><?php echo "$activityid";?></h1>
					<h2><?php echo $actInfo['name'] ?></h2>
					<h3>活动介绍</h3>
					<p><?php echo $actInfo['intro'] ?></p>
					<h3>活动时间</h3>
					<p>开始时间：<?php echo $actInfo['startTime'] ?></p>
					<p>结束时间：<?php echo $actInfo['endTime'] ?></p>
				</div>
			</div>
			<div class="row">
				<?php
					$isJoin = $actInfo['isJoin'];
					if($isJoin){
						$isCreator = $actInfo['isCreator'];
						if($isCreator){
							echo "<button id='delact-btn' class='col-center-block btn'>删除活动</button>";

						}else{
							echo "<button id='quitact-btn' class='col-center-block btn'>退出活动</button>";
						}
					}else{

						echo "<button id='join-btn' class='col-center-block btn'>参加活动</button>";
					}
				?>
<!--				<button class="col-center-block btn">参加活动</button>-->
			</div>
			<div class="member">
				<h3>创建者</h3>
				<div class="creator">
					
						<div class="friend row">
							<?php
							$creatorInfo = $actInfo['creatorInfo'];
							$creatorid = $creatorInfo['creatorid'];
							$userid = $_SESSION['userid'];
							echo "<p id='userid'>$userid</p>";
							echo "<p id='creatorid'>$creatorid</p>";
							echo "<a href='friendDetail.php?friendid=$creatorid'>";
							?>
							<div class="friend-img col-md-2 col-xs-3 col-sm-3">
								<?php
								$url = $creatorInfo['picURL'];
								echo "<img class='img-circle img-responsive' src='$url'>" ?>
							</div>
							<div class="friend-name col-md-2 col-xs-3 col-sm-3">
								<p><?php echo $creatorInfo['username'] ?></p>
							</div>
							</a>
							<div class="friend-grade col-md-2 col-xs-3 col-sm-3">
								<p><?php echo $creatorInfo['grade']." 级" ?></p>
							</div>
							<div class="option pull-right">
								<?php
								if($creatorInfo['isSelf']){
									echo "<a href='#' data-toggle='tooltip' title='我'><span class='glyphicon glyphicon-user'></span></a>";
								}else{
									if($creatorInfo['isCare']){
										echo "<a href='#' data-toggle='tooltip' title='点击取消关注'><span class='glyphicon glyphicon-star'></span></a>";
									}else{
										echo "<a href='#' data-toggle='tooltip' title='点击关注'><span class='glyphicon glyphicon-star-empty'></span></a>";
									}
								}
								?>
							</div>

				</div>

			</div>
                <h3>参与者</h3>
                <div class="follower">

                    <div class="follow-panel">
                        <ul class="follow-list">
                            <?php
                                $memberary = $actInfo['memberary'];
                                foreach ($memberary as $member):

                                ?>
                                <li>
                                    <div class="friend row">
                                        <div class="friend row">
                                            <?php
                                            $memberid = $member['memberid'];
                                            $userid = $_SESSION['userid'];
                                            echo "<p id='userid'>$userid</p>";
                                            echo "<p id='memberid'> $memberid</p>";
                                            echo "<a href='friendDetail.php?friendid=$memberid'>";
                                            ?>
                                            <div class="friend-img col-md-2 col-xs-3 col-sm-3">
                                                <?php
                                                $url = $member['picURL'];
                                                echo "<img class='img-circle img-responsive' src='$url'>" ?>
                                            </div>
                                            <div class="friend-name col-md-2 col-xs-3 col-sm-3">
                                                <p><?php echo $member['username'] ?></p>
                                            </div>
                                            </a>
                                            <div class="friend-grade col-md-2 col-xs-3 col-sm-3">
                                                <p><?php echo $member['grade']." 级" ?></p>
                                            </div>
                                            <div class="option pull-right">
                                                <?php
                                                if($member['isSelf']){
                                                    echo "<a href='#' data-toggle='tooltip' title='我'><span class='glyphicon glyphicon-user'></span></a>";
                                                }else{
                                                    if($member['isCare']){
                                                        echo "<a href='#' data-toggle='tooltip' title='点击取消关注'><span class='glyphicon glyphicon-star'></span></a>";
                                                    }else{
                                                        echo "<a href='#' data-toggle='tooltip' title='点击关注'><span class='glyphicon glyphicon-star-empty'></span></a>";
                                                    }
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
    </div>

	<!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- 包括所有已编译的插件 -->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/custom.js"></script>
    <script>

        var activityidStr = $(".activity-base-info h1").text();
        var useridStr = <?php echo $_SESSION['userid']; ?>;

        $("#modact-btn").click(function () {

        });
        $("#delact-btn").click(function () {

            $.post("../php/businesslogic/activitybl/activity.php",
                {
                    method:"delactivity",
                    activityid:activityidStr,
                    userid:useridStr
                },
                function (data,status){
                    if(data=="TRUE"){
                        location.href = "activity.php";
                    }else{
                        alert(data);
                    }
                });
        });
        $("#quitact-btn").click(function () {

            $.post("../php/businesslogic/activitybl/activity.php",
                {
                    method:"quitactivity",
                    activityid:activityidStr,
                    userid:useridStr
                },
                function (data,status){
                    if(data=="TRUE"){
                        location.href = "activityDetail.php?activityid="+activityidStr;
                    }else{
                        alert(data);
                    }
                });
        });
        $("#join-btn").click(function () {

            alert(activityidStr);
            alert(useridStr);
            $.post("../php/businesslogic/activitybl/activity.php",
                {
                    method:"joinactivity",
                    activityid:activityidStr,
                    userid:useridStr
                },
                function (data,status){
                    if(data=="TRUE"){
                        location.href = "activityDetail.php?activityid="+activityidStr;
                    }else{
                        alert(data);
                    }
                });
        });

    </script>
	</body>
</html>

