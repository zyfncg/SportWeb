<?php
session_start();
if(!isset($_SESSION['userid'])){
	header('Location:login.html');
}
require '../php/businesslogic/userbl/userServer.php';
$user = getUser($_SESSION['userid']);
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
	<link rel="stylesheet" href="../css/tabs.css">
	<link type="text/css" rel="stylesheet" href="../css/fileinput.min.css" />
	<link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css" media="screen">

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
	<div class="info-page-body">
		<div class="tabs">
        	<a href="#" hidefocus="true" class="active">基本信息</a>
        	<a href="#" hidefocus="true">头像</a>
    	</div> 
    	<div class="swiper-container">
	       <div class="swiper-wrapper">
	        <div class="swiper-slide">
	           <div class="content-slide">
	              	<div class="infoEdit">
	              		<div id="info-form" class="form-horizontal" role="form">
						   <div class="form-group">
						      <label for="userName" class="col-sm-2 control-label">用户名</label>
						      <div class="col-sm-8">
						         <input type="text" class="form-control" id="userName" name="username" placeholder="" value='<?php $username=$user['username']; echo $username ?>'>
						      </div>
						   </div>
						   <div class="form-group">
						      <label for="userIntro" class="col-sm-2 control-label">个性签名</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" id="userIntro" name="intro" value='<?php $intro=$user['intro']; echo "$intro" ?>'>
						      </div>
						   </div>
						   <div class="form-group">
						   		<label for="sex" class="col-sm-2 control-label">性别</label>
								<label class="checkbox-inline">
							      <input type="radio" name="optionsRadiosinline" id="malebox"
							         value="male" checked>男
							   </label>
							   <label class="checkbox-inline">
							      <input type="radio" name="optionsRadiosinline" id="femalebox"
							         value="female">女
							   </label>
							</div>   
						   <div class="form-group">
						      		<label for="birthday" class="col-sm-2 control-label">生日</label>
                					<div class="input-group date form_date col-sm-6" data-date="" data-date-format="yyyy-mm-dd" data-link-field="birthday" data-link-format="yyyy-mm-dd" style="padding-left:15px;">
					                    <input class="form-control" size="16" type="text"  readonly value='<?php $birthday=$user['birthday']; echo $birthday; ?>'>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					                </div>
					                <input type="hidden" id="birthday" name="birthday" value="<?php $birthday=$user['birthday']; echo $birthday; ?>" /><br/>
						   </div>
						   <div class="form-group">
						      <label for="userAddr" class="col-sm-2 control-label">所在地</label>
						      <div class="col-sm-4">
						         <input type="text" class="form-control" id="userAddr" name="address" placeholder="" value='<?php $address=$user['address']; echo $address ?>'>
						      </div>
						   </div>
						   <hr>
							<div class="form-group">
						    	<div class="col-sm-offset-2 col-sm-5">
						         	<button id="submit-btn" class="btn btn-default">保存</button>
									<span id="saveinfo-tip" style="color: #3e8f3e;"></span>
						      	</div>

						   </div>
						</div>
	              		
	              	</div>
	          </div>
	        </div>
	        <div class="swiper-slide">
	            <div class="content-slide">
	             	<div class="user-picture" style="width: 60%;margin: 20px auto">
	        			<form enctype="multipart/form-data">
			                <input id="userPic" type="file" name="image" class="projectfile" value="${deal.image}">
			                <br>
			                <button type="submit" class="btn btn-primary">保存</button>
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
	<script src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/fileinput.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/idangerous.swiper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script>
		var tabsSwiper = new Swiper('.swiper-container',{
			speed:500,
			onSlideChangeStart: function(){
				$(".tabs .active").removeClass('active');
				$(".tabs a").eq(tabsSwiper.activeIndex).addClass('active');
			}
		});		

		$(".tabs a").on('touchstart mousedown',function(e){
			e.preventDefault()
			$(".tabs .active").removeClass('active');
			$(this).addClass('active');
			tabsSwiper.swipeTo($(this).index());
		});		

		$(".tabs a").click(function(e){
			e.preventDefault();
		});



		$(".projectfile").fileinput({
		initialPreview: [
            '../images/user1.jpg'
        ],
		initialPreviewAsData: true,
        
        deleteUrl: "/site/file-delete",
        overwriteInitial: true,
		showUpload: false,
        allowedFileExtensions : ['jpg', 'png','gif'],
        maxFileSize: 2000,
        maxFilesNum: 1,
		allowedPreviewTypes: ['image'],
        allowedFileTypes: ['image'],
		browseLabel: "选择图片",
        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        removeClass: "btn btn-danger",
        removeLabel: "删除",
        removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
		
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
		});
		$('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    	});
    	
		$("#submit-btn").click(function () {
			var useridText = <?php $userid=$_SESSION['userid'];echo $userid; ?>;
			var usernameText = $("#userName").val();
			var addressText = $("#userAddr").val();
			var introText = $("#userIntro").val();
			var birthdayText = $("#birthday").val();
			var genderText =  $("input[name='optionsRadiosinline']:checked").val();
			$.ajax({
				url:'../php/businesslogic/userbl/userServer.php',
				type:"POST",
				async:false,
				data:{"action":"saveinfo","userid":useridText,"username":usernameText,"address":addressText,"intro":introText,"birthday":birthdayText,"gender":genderText},
				dataType:"json",
				success:function (data) {
					if(data.status=="TRUE"){
						var tip = "保存成功"
						$("#saveinfo-tip").text(tip);
					}
				}
			});
		});
	</script>
	</body>
</html>