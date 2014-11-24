<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
<title>BQsummer</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/admin/css/local.css" />
<link rel="stylesheet" type="text/css" href="assets/admin/css/main.css" />
<script src="http://lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js" ></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>  
</head>
<body style="background-color:#FFFBE0;">
    
<div id="wrapper">
        @include('admin/admin_head',array('msg_count'=>$msg_count))
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 ">
                    <p>
                        <h1 style="color:#000;display:inline;margin-right:10px;">文章</h1>
                        <button type="button" class="btn btn-primary btn-sm" style="background:#66ccff;" onclick="location.href='http://127.0.0.1/myblog/public/edit';">写文章</button>
                    </p>
                    
                    <p>全部({{$num}})&nbsp;丨&nbsp;待审({{$approve}})&nbsp;丨&nbsp;回收站({{$delete}})</p>
                    <div class="row">
                        <div class="col-md-3">
                            <input  class="btn btn-default btn-sm mybutton" style="margin-bottom:10px;" name="mysubmit" type="submit" value="删除">
                            <input  class="btn btn-default btn-sm mybutton" style="margin-bottom:10px;" name="mysubmit" type="submit" value="批准">
                            <input  class="btn btn-default btn-sm mybutton" style="margin-bottom:10px;" name="mysubmit" type="submit" value="驳回">
                        </div>
                        <div class="col-md-7"></div>
                        <div class="pagination article-li col-md-2"  id="pagination"> <?php ?>  </div> 
                    </div>
                    <div class="article-border">
                        <div class="row article-menu">
                            <div class="col-xs-1 mg-l-50"></div>
                            <div class="col-xs-3" style="color:#000;">内容</div>
                            <div class="col-xs-2" style="color:#000;">时间</div>
                            <div class="col-xs-2" style="color:#000;">作者/邮箱</div>
                            <div class="col-xs-2" style="color:#000;">文章</div>
                            <div class="col-xs-1" style="color:#000;">回复给</div>
                            <div class="col-xs-1" style="color:#000;">状态</div>
                        </div>
                    
                    <?php foreach ($replies as $reply): ?>
                    <?php 
                        $time = substr($reply->created_at,2,14); 
                        $article_num = $reply->num;
                        $article = DB::table('article')->select('title')->where('num','=',$article_num)->get();
                        $replyTo = NULL;
                        if($reply->is_sub_reply == 1){
                        	$replyTo = DB::table('reply')->select('content')->where('id','=',$reply->main_reply)->get();
                        	$replyTo = "“" + $replyTo + "”";
                        }
                        else{
                        	$replyTo = "文章"+$articel;
                        }
                        $status = "正常";
                        if()
                    ?>

                        <div class="row article-art">
                            <div class="col-xs-1 mg-l-50"><input type="checkbox" value="" name=""></div>
                            <div class="col-xs-3" style="color:#000;">{{$reply->content}}</div>
                            <div class="col-xs-2" style="color:#000;">{{$time}}</div>
                            <div class="col-xs-2" style="color:#000;">{{$reply->email}}<br>{{$reply->author}}</div>
                            <div class="col-xs-2" style="color:#000;">{{$article[0]->title}}</div>
                            <div class="col-xs-1" style="color:#000;">{{$replyTo}}</div>
                            <div class="col-xs-1" style="color:#000;">{{$reply->content}}</div>
                        </div>
                        <?php endforeach;?>

                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div>    

</body>
</html>