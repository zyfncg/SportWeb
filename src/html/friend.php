<?php
session_start();
if(!isset($_SESSION['userid'])){
	header('Location:login.html');
}else{
	echo $_SESSION['userid']."this is userid<br>";
}
//	if($_SESSION['userid']==""){
//		echo 'wooooooooo';
//
//	}
require '../php/businesslogic/contactbl/contact.php';
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
							<li><a href="activity.html"><p class="top-tab">活动</p></a></li>
							

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
					<div class="userinfo" style="height: 200px">
						<div class="user-header">
							<div class="user-header-img tc">
								<img src="../images/user1.jpg">
							</div>
						</div>
						<div class="tc">
							<h1>沉迷web</h1>
						</div>
						<div class="user-showinfo tc">
							<p class="grade">等级: <span>1</span></p>
							<p>累计运动里程：<span>3.6km</span></p>
							<p>累计运动时间：<span>100小时</span></p>
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
                    				<div class="col-md-3 pull-right">
                    				  <div class="input-group custom-search-form">
                                        <input type="text" class="form-control" placeholder="Search...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                       </div>
                    				</div>
                    				
                    			</div>
                    			<hr>
								<ul class="friend-list">
									<?php foreach ($rows as $row) :?>
									<li>
										<div class="friend row">
											<a href="friendDetail.php">
												<div class="friend-img col-md-2 col-xs-3 col-sm-3">
													<img class="img-circle img-responsive" src="../images/user2.jpg">
												</div>
												<div class="friend-name col-md-2 col-xs-3 col-sm-3">
													<p><?php echo $row->getName() ?></p>
												</div>
											</a>
												<div class="friend-grade col-md-2 col-xs-3 col-sm-3">
													<p><?php echo $row->getGrade() ?></p>
												</div>
												<div class="option pull-right">

					                    			<a href="#" data-toggle="tooltip" title="取消关注">
					                        			<span class="glyphicon glyphicon-trash"></span>

					                    			</a>
					                			</div>
											
											
										</div>

									</li>
									<?php  endforeach; ?>
									<li>
										<div class="friend row">
											<a href="friendDetail.php">
												<div class="friend-img col-md-2 col-xs-3 col-sm-3">
													<img class="img-circle img-responsive" src="../images/user2.jpg">
												</div>
												<div class="friend-name col-md-2 col-xs-3 col-sm-3">
													<p>doge1</p>
												</div>
											</a>
												<div class="friend-grade col-md-2 col-xs-3 col-sm-3">
													<p>3级</p>
												</div>
												<div class="option pull-right">
					                    			<a href="#" data-toggle="tooltip" title="取消关注">
					                        			<span class="glyphicon glyphicon-trash"></span>

					                    			</a>
					                			</div>
											
											
										</div>

									</li>
									<li>
										<div class="friend row">
											<a href="friendDetail.php">
												<div class="friend-img col-md-2 col-xs-3 col-sm-3">
													<img class="img-circle img-responsive" src="../images/user2.jpg">
												</div>
												<div class="friend-name col-md-2 col-xs-3 col-sm-3">
													<p>doge2</p>
												</div>
											</a>
												<div class="friend-grade col-md-2 col-xs-3 col-sm-3">
													<p>3级</p>
												</div>
												<div class="option pull-right">
					                    			<a href="#" data-toggle="tooltip" title="取消关注">
					                        			<span class="glyphicon glyphicon-trash"></span>

					                    			</a>
					                			</div>
											
											
										</div>

									</li>
									<li>
										<div class="friend row">
											<a href="friendDetail.php">
												<div class="friend-img col-md-2 col-xs-3 col-sm-3">
													<img class="img-circle img-responsive" src="../images/user2.jpg">
												</div>
												<div class="friend-name col-md-2 col-xs-3 col-sm-3">
													<p>doge3</p>
												</div>
											</a>
												<div class="friend-grade col-md-2 col-xs-3 col-sm-3">
													<p>3级</p>
												</div>
												<div class="option pull-right">
					                    			<a href="#" data-toggle="tooltip" title="取消关注">
					                        			<span class="glyphicon glyphicon-trash"></span>

					                    			</a>
					                			</div>
											
											
										</div>

									</li>
									<li>
										<div class="friend row">
											<a href="friendDetail.php">
												<div class="friend-img col-md-2 col-xs-3 col-sm-3">
													<img class="img-circle img-responsive" src="../images/user2.jpg">
												</div>
												<div class="friend-name col-md-2 col-xs-3 col-sm-3">
													<p>doge4</p>
												</div>
											</a>
												<div class="friend-grade col-md-2 col-xs-3 col-sm-3">
													<p>3级</p>
												</div>
												<div class="option pull-right">
					                    			<a href="#" data-toggle="tooltip" title="取消关注">
					                        			<span class="glyphicon glyphicon-trash"></span>

					                    			</a>
					                			</div>
											
											
										</div>

									</li>
									<li>
										<div class="friend row">
											<a href="friendDetail.php">
												<div class="friend-img col-md-2 col-xs-3 col-sm-3">
													<img class="img-circle img-responsive" src="../images/user2.jpg">
												</div>
												<div class="friend-name col-md-2 col-xs-3 col-sm-3">
													<p>doge5</p>
												</div>
											</a>
												<div class="friend-grade col-md-2 col-xs-3 col-sm-3">
													<p>3级</p>
												</div>
												<div class="option pull-right">
					                    			<a href="#" data-toggle="tooltip" title="取消关注">
					                        			<span class="glyphicon glyphicon-trash"></span>

					                    			</a>
					                			</div>
											
											
										</div>

									</li>
									<li>
										<div class="friend row">
											<a href="friendDetail.php">
												<div class="friend-img col-md-2 col-xs-3 col-sm-3">
													<img class="img-circle img-responsive" src="../images/user2.jpg">
												</div>
												<div class="friend-name col-md-2 col-xs-3 col-sm-3">
													<p>doge6</p>
												</div>
											</a>
												<div class="friend-grade col-md-2 col-xs-3 col-sm-3">
													<p>3级</p>
												</div>
												<div class="option pull-right">
					                    			<a href="#" data-toggle="tooltip" title="取消关注">
					                        			<span class="glyphicon glyphicon-trash"></span>

					                    			</a>
					                			</div>
											
											
										</div>

									</li>
									
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

	</body>
</html>

