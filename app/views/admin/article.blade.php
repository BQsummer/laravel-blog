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
        <!-- 主体 -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 ">
                    <p>
                        <h1 style="color:#000;display:inline;margin-right:10px;">文章</h1>
                        <button type="button" class="btn btn-primary btn-sm" style="background:#66ccff;" onclick="location.href='http://127.0.0.1/myblog/public/edit';">写文章</button>
                    </p>
                    {{ Form::open(array('action' => 'ArticleController@index')) }}
                    {{Form::token();}}
                    <p>全部({{$exist}})&nbsp;丨&nbsp;回收站({{$deleted}})</p>
                    <div class="row">
                        <div class="col-md-3">
                            <input  class="btn btn-default btn-sm mybutton" style="margin-bottom:10px;" name="mysubmit" type="submit" value="删除">
                            <input  class="btn btn-default btn-sm mybutton" style="margin-bottom:10px;" name="mysubmit" type="submit" value="编辑">
                            <input  class="btn btn-default btn-sm mybutton" style="margin-bottom:10px;" name="mysubmit" type="submit" value="查看">
                        </div>
                        <div class="col-md-7"></div>
                        <div class="pagination article-li col-md-2"  id="pagination"> <?php echo $articles->links();?>  </div> 
                    </div>
                    <div class="article-border">
                        <div class="row article-menu">
                            <div class="col-xs-1 mg-l-50"></div>
                            <div class="col-xs-3" style="color:#000;">标题</div>
                            <div class="col-xs-1" style="color:#000;margin-left:-30px;">分类</div>
                            <div class="col-xs-2" style="color:#000;">标签</div>
                            <div class="col-xs-1" style="color:#000;">回复</div>
                            <div class="col-xs-2" style="color:#000;margin-left:-30px;">创建日期</div>
                            <div class="col-xs-2" style="color:#000;margin-left:-30px;">修改日期</div>
                            <div class="col-xs-1" style="color:#000;">状态</div>
                        </div>
                    
                    <?php foreach ($articles as $article): ?>
                    <?php 
                        $created_at = substr($article->created_at,2,14); 
                        $updated_at = substr($article->updated_at,2,14);
                        if($article->deleted == 0) {$status = "正常";}
                            else{$status = "已删除";}
                    ?>
                        <div class="row article-art">
                            <div class="col-xs-1 mg-l-50"><input type="checkbox" value="{{$article->num}}" name="article_num[]"></div>
                            <div class="col-xs-3 "><a href="{{URL::to('edit',array($article->num))}}">{{$article->title}}</a></div>
                            <div class="col-xs-1 " style="margin-left:-30px;">{{$article->lebal}}</div>
                            <div class="col-xs-2 ">{{$article->tags}}</div>
                            <div class="col-xs-1 ">{{$article->reply_num}}</div>
                            <div class="col-xs-2 " style="margin-left:-30px;">{{$created_at}}</div>
                            <div class="col-xs-2 " style="margin-left:-30px;">{{$updated_at}}</div>
                            <div class="col-xs-1 ">{{$status}}</div>
                        </div>

                    <?php endforeach;?>
                    
                    {{ Form::close() }}
                    </div>

                </div>
            </div><!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div>    

</body>
</html>