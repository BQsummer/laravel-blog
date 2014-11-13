<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
<title>BQsummer</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/myblog/public/assets/admin/css/local.css" />
<link rel="stylesheet" type="text/css" href="/myblog/public/assets/admin/css/main.css" />
<script src="http://lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js" ></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> 
<script src="/myblog/public/assets/ckeditor/ckeditor.js"></script>    
</head>
<body style="background-color:#FFFBE0;">
    
<div id="wrapper">
        @include('admin/admin_head',array('msg_count'=>$msg_count))
        <!-- 主体 -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 ">
                    <h2 style="color:#000;display:inline;margin-right:10px;">常规选项</h2><br>
                    <div style="margin-top:30px;">
                        <div class="row">
                            <div class="col-md-2"><h4 style="display:inline;color:#000;">title</h4></div>
                            <div class="col-md-10"><input name="" type="text"></div>
                        </div>
                    </div>
                    <div style="margin-top:30px;">
                        <div class="row">
                            <div class="col-md-2"><h4 style="display:inline;color:#000;">description</h4></div>
                            <div class="col-md-10"><input name="" type="text"></div>
                        </div>
                    </div>
                    <div style="margin-top:30px;">
                        <div class="row">
                            <div class="col-md-2"><h4 style="display:inline;color:#000;">keyword</h4></div>
                            <div class="col-md-10"><input name="" type="text"></div>
                        </div>
                    </div>
                    
                    <h2 style="color:#000;display:inline;margin-right:10px;">常规选项</h2><br>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>    

</body>
</html>