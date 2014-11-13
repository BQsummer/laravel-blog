<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>admin-BQsummer</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="assets/admin/css/main.css" />
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script src="http://lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js" ></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="assets/admin/js/main.js"></script>
</head>
<body style="background:#f1f1f1;">
	<input type="hidden" id="hide-input" value="{{$err}}">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			{{ Form::open(array('action' => 'LoginController@check')) }}
         	{{Form::token();}}
			<div class="col-md-4" style="padding-top:60px;">
				<div class="alert alert-danger myhide" role="alert" id="err">用户名或密码不正确</div>
			    <div style="border:1px solid #cccccc;box-shadow: 0 1px 3px rgba(0,0,0,.13); padding:20px;margin-top:20px;background:#fff;">
			    	<div style="margin:10px;">
			    		<p style="color:#000;">用户名</p>
			    		<input type="text" name="name" style="width:100%;height:40px;font-size:25px;color:#000;"></input>
			    	</div>
			    	<div style="margin:10px;">
			    		<p style="color:#000;">密码</p>
			    		<input type="password" name="password" style="width:100%;height:40px;font-size:35px;color:#000;"></input>
			    	</div>
			    	<div style="margin:15px;margin-bottom:30px;">
			    		<input name="" type="checkbox" style="display:inline;"></input>
			    		<p style="display:inline;color:#000;">记住我的登录信息</p>
			    		<input name=""   value="登录" type="submit" class="btn btn-info btn-sm" style="width:60px;height:30px;margin-left:95px;"></input>
			    	</div>
			    </div>
			    <div style="margin-top:30px;">
			    	<a href="" >忘记密码?</a>
			    </div>
			    <div style="margin-top:20px;">
			    	<a href="" >←回到BQsummer的blog</p>
			    </div>
		    </div>
		    {{ Form::close() }}
		    <div class="col-md-4"></div>
	    </div>
    </div>
</body>
</html>