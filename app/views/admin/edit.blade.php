@include('admin/admin_head')
    
<div id="wrapper">
    @include('admin/admin_nav',array('msg_count'=>$msg_count))
       
    <div id="page-wrapper">
        <h1 style="color:#000;display:inline;margin-right:10px;">撰写新文章</h1>
            {{ Form::open(array('action' => 'EditController@edit')) }}
            {{Form::token();}}
            <?php 
                $a = explode("/",URL::full());
                $l = count($a);
                echo "<input type='hidden' name='article_num' value='".$a[$l-1]."'>"
            ?>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <input class="edit-input" name="title" placeholder="在此输入标题"  value="<?php if($article){echo $article[0]->title;} ?>">
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-9"  style="margin-left:-16px;">
                        <textarea class="ckeditor" cols="80" id="editor" name="editor" rows="10" style="height:200px;"><?php if($article){echo $article[0]->content;}?></textarea>
                    </div>
                    <div class="col-md-3">
                        <div style="border:1px solid #cccccc;box-shadow: 0px 3px 30px rgba(0, 0, 0, 0.1);padding:20px;padding-right:-70px;margin-top:0px;color:#000;">
                            <p>形式</p>
                            <?php 
                                $arr = array(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
                                if($article){
                                    if($article[0]->lebal == "standard"){$arr[0] = "checked";}
                                    if($article[0]->lebal == "log"){$arr[1] = "checked";}
                                    if($article[0]->lebal == "music"){$arr[2] = "checked";}
                                    if($article[0]->lebal == "video"){$arr[3] = "checked";}
                                    if($article[0]->lebal == "photo"){$arr[4] = "checked";}
                                    if($article[0]->lebal == "link"){$arr[5] = "checked";}
                                    if($article[0]->lebal == "status"){$arr[6] = "checked";}
                                }
                            ?>
                            
                            <input name="lebal" type="radio" value="log" {{$arr[1]}} />&nbsp;日志<br>
                            <input name="lebal" type="radio" value="music" {{$arr[2]}} />&nbsp;音频<br>
                            <input name="lebal" type="radio" value="video" {{$arr[3]}} />&nbsp;视频<br>
                            <input name="lebal" type="radio" value="photo" {{$arr[4]}} />&nbsp;相册<br>
                            <input name="lebal" type="radio" value="links" {{$arr[5]}} />&nbsp;链接<br>
                            <input type="submit" name="sub" class="edit-bottom btn" value="确认" >
                        </div>
                        <div style="border:1px solid #cccccc;box-shadow: 0px 3px 30px rgba(0, 0, 0, 0.1);padding:20px;padding-right:-70px;margin-top:10px;color:#000;">
                            <p>标签</p>
                            <input type="text" name="tag" value="<?php if($article){echo $article[0]->tags;} ?>">
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
    </div>
</div>  


</body>
</html>
