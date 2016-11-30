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
		
		<div class="infobody">
			
			<div class="row">
				<div class="col-md-4">
					<div class="userinfo row" style="height: 280px">
						<div class="user-header">
							<div class="user-header-img tc">
								<img src="../images/user1.jpg">
							</div>
						</div>
						<div class="tc">
							<h1>沉迷web</h1>
						</div>

					</div>
					<div class="match-nav-list row">
						<ul class="nav nav-tabs" id="act-menu-tab">
							<li class="active">
								<div>
									<a href="#activity-list" data-toggle="tab">
									<label class="animate tc">
										活动中心<i class="fa fa-bars float-right"></i>
									</label>
									</a>
								</div>
							
							</li>
							
                			<li>
								<dropdown>
								  <input id="toggle2" type="checkbox">
								  <label for="toggle2" class="animate tc">我的活动<i class="fa fa-bars float-right"></i></label>
								  <ul class="animate">
								  	<li class="animate">
							  			<a href="#create-activity" data-toggle="tab">
							  				<div>
							  					<span class="tc">发起新活动</span><i class="fa fa-cog float-right"></i>
							  				</div>
							  			</a>		
								  	</li>
								    <li class="animate">
								    	<a href="#create-activity-list" data-toggle="tab">
							  				<div>
							  					<span class="tc">创建的活动</span><i class="fa fa-code float-right"></i>
							  				</div>
							  			</a>
								    </li>
								    <li class="animate">
								    	<a href="#join-activity-list" data-toggle="tab">
							  				<div>
							  					<span class="tc">参加的活动</span><i class="fa fa-arrows-alt float-right"></i>
							  				</div>
							  			</a>
								    </li>
								  </ul>
								</dropdown>
                			</li>
						</ul>
						
					</div>
				</div>
				<div class="col-md-8 col-xs-12">
					<div class="activity-part tab-content">
						<div class="list-panel tab-pane fade in active" id="activity-list">
							<div class="activity-list-panel">
								<div class="activity-list-title">
									<p>活动列表</p>
								</div>
								<ul class="activity-list">
									<li>
										<div class="row">
											<div class="activity-name col-md-3 col-xs-3 tc">
												<p>活动</p>
											</div>
											<div class="activity-addr col-md-2 col-xs-2 tc">
												<p>活动地点</p>
											</div>
											<div class="activity-time-title col-md-5 col-xs-5 tc">
												<p>活动时间</p>
											</div>
											<div class="activity-num col-md-2 col-xs-2 tc">
												<p>参加人数</p>
											</div>
										</div>
									</li>
									<li>
										<div class="blank10"></div>
									</li>
									<?php
										$actHandle = new ActivityHandle();
										$rows = $actHandle->getActivityList();
										foreach ($rows as $row):
									?>
									<li>
										<div class="activity row">
											<?php
												$activityid = $row['activityid'];
												echo "<a href='activityDetail.php?activityid=$activityid'>"
											?>
												<div class="activity-name col-md-3 col-xs-3 tc">
													<?php $name = $row['name'];
														echo "<p>$name</p>";
													?>
<!--													<p>马拉松</p>-->
												</div>
												<div class="activity-addr col-md-2 col-xs-2 tc">
													<?php
														$address = $row['address'];
														echo "<p>$address</p>"
													?>
												</div>
												<div class="activity-time col-md-5 col-xs-5 tc">
													<p>开始:<?php echo $row['startTime'] ?></p>
													<p>结束:<?php echo $row['endTime'] ?></p>
												</div>
												<div class="activity-num col-md-2 col-xs-2 tc">
													<p><?php echo $row['peopleNum'] ?>人</p>
												</div>
											</a>
											
										</div>
									</li>
									<?php endforeach; ?>

								</ul>
							</div>
						</div>
						<div class="tab-pane fade" id="create-activity">
							<div class="createActivityPanel">
								<h2 class="tc">创建活动</h2>
								<hr>
								<div class="form-horizontal">
								   <div class="form-group">
								      <label for="actName" class="col-sm-2 control-label">活动名称</label>
								      <div class="col-sm-10">
								         <input type="text" class="form-control" id="actName" placeholder="" required>
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
								         <input type="text" class="form-control" id="actAddr" placeholder="" required>
								      </div>
								   </div>
									<div class="form-group">
							      		<label for="startDate" class="col-sm-2 control-label">开始时间</label>
	                					<div class="input-group date form_datetime col-sm-6" data-date="" data-date-format="yyyy年mm月dd日 hh:ii" data-link-field="startDate" data-link-format="yyyy-mm-dd hh:ii" style="padding-left:15px;">
						                    <input class="form-control" size="16" type="text" value="" readonly required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						                </div>
						                <input type="hidden" id="startDate" value="" /><br/>
							   		</div>
							   		<div class="form-group">
							      		<label for="endDate" class="col-sm-2 control-label">结束时间</label>
	                					<div class="input-group date form_datetime col-sm-6" data-date="" data-date-format="yyyy年mm月dd日 hh:ii" data-link-field="endDate" data-link-format="yyyy-mm-dd hh:ii" style="padding-left:15px;">
						                    <input class="form-control" size="16" type="text" value="" readonly required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						                </div>
						                <input type="hidden" id="endDate" value="" /><br/>
							   		</div>
									<div class="form-group">
								    	<div class="col-sm-offset-2 col-sm-10">
								         	<button id="ok" class="btn btn-default">确认</button>
								      	</div>
								   </div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="create-activity-list">
							<div class="activity-list-panel">
								<div class="activity-list-title">
									<p>活动列表</p>
								</div>
								<ul class="activity-list">
									<li>
										<div class="row">
											<div class="activity-name col-md-3 col-xs-3 tc">
												<p>活动</p>
											</div>
											<div class="activity-addr col-md-2 col-xs-2 tc">
												<p>活动地点</p>
											</div>
											<div class="activity-time-title col-md-5 col-xs-5 tc">
												<p>活动时间</p>
											</div>
											<div class="activity-num col-md-2 col-xs-2 tc">
												<p>参加人数</p>
											</div>
										</div>
									</li>
									<li>
										<div class="blank10"></div>
									</li>
									<?php
									$actHandle = new ActivityHandle();
									$rows = $actHandle->getCreateActivitys($_SESSION['userid']);
									foreach ($rows as $row):
										?>
										<li>
											<div class="activity row">
												<?php
												$activityid = $row['activityid'];
												echo "<a href='activityDetail.php?activityid=$activityid'>"
												?>
												<div class="activity-name col-md-3 col-xs-3 tc">
													<?php $name = $row['name'];
													echo "<p>$name</p>";
													?>
													<!--													<p>马拉松</p>-->
												</div>
												<div class="activity-addr col-md-2 col-xs-2 tc">
													<?php
													$address = $row['address'];
													echo "<p>$address</p>"
													?>
												</div>
												<div class="activity-time col-md-5 col-xs-5 tc">
													<p>开始:<?php echo $row['startTime'] ?></p>
													<p>结束:<?php echo $row['endTime'] ?></p>
												</div>
												<div class="activity-num col-md-2 col-xs-2 tc">
													<p><?php echo $row['peopleNum'] ?>人</p>
												</div>
												</a>

											</div>
										</li>
									<?php endforeach; ?>

								</ul>
							</div>
						</div>
						<div class="tab-pane fade" id="join-activity-list">
							<div class="activity-list-panel">
								<div class="activity-list-title">
									<p>活动列表</p>
								</div>
								<ul class="activity-list">
									<li>
										<div class="row">
											<div class="activity-name col-md-3 col-xs-3 tc">
												<p>活动</p>
											</div>
											<div class="activity-addr col-md-2 col-xs-2 tc">
												<p>活动地点</p>
											</div>
											<div class="activity-time-title col-md-5 col-xs-5 tc">
												<p>活动时间</p>
											</div>
											<div class="activity-num col-md-2 col-xs-2 tc">
												<p>参加人数</p>
											</div>
										</div>
									</li>
									<li>
										<div class="blank10"></div>
									</li>
									<?php
									$actHandle = new ActivityHandle();
									$rows = $actHandle->getJoinActivitys($_SESSION['userid']);
									foreach ($rows as $row):
										?>
										<li>
											<div class="activity row">
												<?php
												$activityid = $row['activityid'];
												echo "<a href='activityDetail.php?activityid=$activityid'>"
												?>
												<div class="activity-name col-md-3 col-xs-3 tc">
													<?php $name = $row['name'];
													echo "<p>$name</p>";
													?>
													<!--													<p>马拉松</p>-->
												</div>
												<div class="activity-addr col-md-2 col-xs-2 tc">
													<?php
													$address = $row['address'];
													echo "<p>$address</p>"
													?>
												</div>
												<div class="activity-time col-md-5 col-xs-5 tc">
													<p>开始:<?php echo $row['startTime'] ?></p>
													<p>结束:<?php echo $row['endTime'] ?></p>
												</div>
												<div class="activity-num col-md-2 col-xs-2 tc">
													<p><?php echo $row['peopleNum'] ?>人</p>
												</div>
												</a>

											</div>
										</li>
									<?php endforeach; ?>

								</ul>
							</div>
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
		$("#ok").click(function () {
			var time = new Date();
			var timeStr = time.getTime();
			var userid = <?php $userid=$_SESSION['userid']; echo "$userid"; ?>;
			var activityidStr = userid + "" + timeStr;
			var nameStr = $("#actName").val();
			var addressStr = $("#actAddr").val();
			var startTimeStr = $("#startDate").val();
			var endTimeStr = $("#endDate").val();
			var introStr = $("#activityIntro").val();
			alert(userid);
			$.post("../php/businesslogic/activitybl/activity.php",
				{
					method:"createactivity",
					activityid:activityidStr,
					creator:userid,
					name:nameStr,
					address:addressStr,
					startTime:startTimeStr,
					endTime:endTimeStr,
					intro:introStr
				},
				function (data,state) {
					alert(data);
					if(data == "TRUE"){
						location.href = "activity.php";
					}
				});

		});
    </script>
	</body>
</html>

