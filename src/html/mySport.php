<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header('Location:login.html');
	}else{
//		echo $_SESSION['userid']."this is userid<br>";
	}
//	if($_SESSION['userid']==""){
//		echo 'wooooooooo';
//
//	}
	require '../php/businesslogic/statisticbl/statisticServer.php';
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
	<script type="text/javascript" src="../js/ichart.1.2.min.js"></script>
	
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
							<li  class="active"><a href="mySport.php"><p class="top-tab">我的运动</p></a></li>
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
	<div id="page-body">
		<div class="info-page-body">
			<div class="tc">
				<h1>今日的运动情况</h1>
			</div>
			<div class="row">
					
					<div class="today_sport" style="height: 240px">
						
						<div class="run-distance col-md-4 col-xs-12">
							<div class="runImg">
								<img class="img-circle img-responsive" src="../images/run.jpg">
							</div>
							<div class="runText tc">
								<p>今日运动里程
									<span><?php
										$data = (object)getTodayData($_SESSION['userid']);
										echo $data->getDistance()." km"; ?>
									</span>
								</p>
							</div>
						</div>
						<div class="run-time col-md-4 col-xs-12">
							<div class="timeImg">
								<img class="img-circle img-responsive" src="../images/time.jpg">
							</div>
							<div class="runText tc">
								<p>今日运动时间 <span>
										<?php
//										$data = (object)getTodayData($_SESSION['userid']);

										echo $data->getTime()."min"; ?>
									</span></p>
							</div>
						</div>
						<div class="run-rank col-md-4 col-xs-12">
							<div class="rankImg">
								<img class="img-circle img-responsive" src="../images/rank.jpg">
							</div>
							<div class="runText tc">
								<p>今日运动排名 <span><?php echo $data->getRank() ?></span></p>
							</div>
						</div>
					</div>
					

			</div>

			<div class="row">
				
				<div class="text-center">
					<h1>本周的运动情况</h1>
					<div class="weak_sport">
						<div class="run-distance col-md-6 col-xs-12">
							<div id='canvasDiv1'></div>
						</div>
						<div class="run-time col-md-6 col-xs-12">
							<div id='canvasDiv2'></div>
						</div>
					</div>
					
				</div>

			</div>

			<div class="row">
				
				<div class="text-center">
					<h1>您加入以来的运动情况</h1>
					<div class="today_sport" style="height: 200px">
						
						<div class="run-distance col-md-6 col-xs-12">
							<div class="runImg">
								<img class="img-circle img-responsive" src="../images/run1.png">
							</div>
							<div class="runText tc">
								<p>总运动里程 <span>
										<?php
										$data = (object)getALLData($_SESSION['userid']);
										echo $data->getDistance(); ?>
									</span></p>
							</div>
						</div>
						<div class="run-time col-md-6 col-xs-12">
							<div class="timeStatistic">
								<img class="img-circle img-responsive" src="../images/time.jpg">
							</div>
							<div class="timeText tc">
								<p>总运动时间 <span>
										<?php
										echo $data->getTime()."min"; ?>
									</span></p>
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
	<script src="../js/custom.js"></script>
    <script type="text/javascript">
				$(function(){

					var distanceData = <?php
						$weekData = getWeekData($_SESSION['userid']);
						echo "[";
						foreach ($weekData as $sport):
							$date = $sport->getDay();
							$date = date('m/d',strtotime($date));
							$distance = $sport->getDistance();
							echo "{name:'$date',value:$distance,color:'#76a871'},";
						endforeach;
						echo "]";
					?>;
//					var distanceData = [
//					        	{name : '星期一',value : 12.75,color:'#76a871'},
//					        	{name : '星期二',value : 29.84,color:'#76a871'},
//					        	{name : '星期三',value : 24.88,color:'#76a871'},
//					        	{name : '星期四',value : 6.77,color:'#76a871'},
//					        	{name : '星期五',value : 2.02,color:'#76a871'},
//					        	{name : '星期六',value : 3.73,color:'#76a871'},
//					        	{name : '星期日',value : 22.73,color:'#76a871'}
//				        	];
					var timeData = <?php
						echo "[";
						foreach ($weekData as $sport):
							$date = $sport->getDay();
							$date = date('m/d',strtotime($date));
							$time = $sport->getTime();
							echo "{name:'$date',value:$time,color:'#76a871'},";
						endforeach;
						echo "]";
						?>;
//				    var timeData = [
//					        	{name : '星期一',value : 120,color:'#76a871'},
//					        	{name : '星期二',value : 20,color:'#76a871'},
//					        	{name : '星期三',value : 24,color:'#76a871'},
//					        	{name : '星期四',value : 177,color:'#76a871'},
//					        	{name : '星期五',value : 27,color:'#76a871'},
//					        	{name : '星期六',value : 73,color:'#76a871'},
//					        	{name : '星期日',value : 83,color:'#76a871'}
//				        	];
		        	
					var chart1 = new iChart.Column2D({
						render : 'canvasDiv1',
						data: distanceData,
						footnote : {
							text : '本周运动里程分布',
							color : '#909090',
							fontsize : 16,
							textAlign:"center",

						},
						shadow:true,//激活阴影
						shadow_color:'#c7c7c7',//设置阴影颜色
						decimalsnum:2,
						width : 400,
						height : 300,
						border: 0,
						align:"center",
            			offsetx:16,
            			offsety:-10,
						coordinate:{
							background_color:'#fefefe',
							scale:[{
								 position:'left',	
								 start_scale:0,
								 end_scale:16,
								 scale_space:2,
								 listeners:{
									parseText:function(t,x,y){
										return {text:t+"km"}
									}
								}
							}]
						}
					});

					var chart2 = new iChart.Column2D({
						render : 'canvasDiv2',
						data: timeData,
						footnote : {
							text : '本周运动时间分布',
							color : '#909090',
							fontsize : 16,
							textAlign:"center",

						},
						shadow:true,//激活阴影
						shadow_color:'#c7c7c7',//设置阴影颜色
						decimalsnum:2,
						width : 400,
						height : 280,
						border: 20,
						align:"center",
            			offsetx:16,
            			offsety:-10,
						coordinate:{
							background_color:'#fefefe',
							scale:[{
								 position:'left',	
								 start_scale:0,
								 end_scale:320,
								 scale_space: 40,
								 listeners:{
									parseText:function(t,x,y){
										return {text:t+"m"}
									}
								}
							}]
						}
					});
					chart1.draw();
					chart2.draw();
			});
				
	</script>
	</body>
</html>

