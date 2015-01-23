@include('admin/admin_head')
    
<div id="wrapper">
        @include('admin/admin_nav',array('msg_count'=>$msg_count))
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
                        <div class="pagination article-li col-md-2"  id="pagination"> <?php echo $replies->links();?>  </div> 
                    </div>
                    <div class="article-border">
                        <div class="row article-menu">
                            <div class="col-xs-1 mg-l-50"></div>
                            <div class="col-xs-2" style="color:#000;">作者/邮箱</div>
                            <div class="col-xs-6" style="color:#000;">内容</div>
                            <div class="col-xs-2" style="color:#000;">文章标题/恢复给</div>
                            <div class="col-xs-1" style="color:#000;">状态</div>
                        </div>
                    
                    <?php foreach ($replies as $reply): ?>
                    <?php 
                        $time = substr($reply->created_at,2,14);      //时间
                        $article_num = $reply->article_num;           //回复属于的文章号
                        $article_info = DB::table('article')->select('title','author')->where('num',$article_num)->get(); //文章标题
                        $reply_to = "";      //回复给
                        if($reply->is_sub_reply == 1){
                        	$reply_info = DB::table('reply')->select('content','author')->where('id','=',$reply->main_reply)->get();
                        	$reply_to = $reply_info[0]->author;
                        }
                        else{
                        	$reply_to = $article_info[0]->author;
                        }
                        $status = "正常";
                        if($reply->is_deleted == 1){$status = "已删除";}
                        else{
                                if($reply->is_approved == 1){$status = "未批准";}
                                else if($reply->is_read == 1){$status = "未读";}
                            }
                    ?>

                        <div class="row article-art">
                            <div class="col-xs-1 mg-l-50"><input type="checkbox" value="" name=""></div>
                            <div class="col-xs-2" style="color:#000;">{{$reply->author}}<br>{{$reply->email}}</div>
                            <div class="col-xs-6" style="color:#000;">{{$reply->content}}</div>
                            <div class="col-xs-2" style="color:#000;">{{$article_info[0]->title}}<br>{{$reply_to}}</div>
                            <div class="col-xs-1" style="color:#000;">{{$status}}</div>
                        </div>
                        <?php endforeach;?>

                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div>    

</body>
</html>