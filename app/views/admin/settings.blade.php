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
<script src="/laravel-blog/public/assets/ckeditor/ckeditor.js"></script>    
</head>
<body style="background-color:#FFFBE0;">
    
<div id="wrapper">
        @include('admin/admin_head',array('msg_count'=>$msg_count))
        <!-- 主体 -->
        {{ Form::open(array('action' => 'SettingsController@index', 'files' => true)) }}
        {{Form::token()}}
        <div id="page-wrapper">
                <div>
                    <h2 style="color:#000;display:inline;margin-right:10px;">常规选项</h2><br>
                    <div style="margin-top:30px;">
                        <div class="row">
                            <div class="col-md-1" style="margin-left:60px;"></div>
                            <div class="col-md-2"><h4 style="display:inline;color:#000;">title</h4></div>
                            <div class="col-md-6"><input name="title" type="text" style="width:300px;color:#000;" value="{{$settings[0]->title}}"></div>
                        </div>
                    </div>
                    <div style="margin-top:30px;">
                        <div class="row">
                            <div class="col-md-1" style="margin-left:60px;"></div>
                            <div class="col-md-2"><h4 style="display:inline;color:#000;">description</h4></div>
                            <div class="col-md-6"><input name="description" type="text" style="width:300px;color:#000;" value="{{$settings[0]->description}}"></div>
                        </div>
                    </div>
                    <div style="margin-top:30px;">
                        <div class="row">
                            <div class="col-md-1" style="margin-left:60px;"></div>                           
                            <div class="col-md-2"><h4 style="display:inline;color:#000;">keyword</h4></div>
                            <div class="col-md-6"><input name="keyword" type="text" style="width:300px;color:#000;" value="{{$settings[0]->keyword}}"></div>
                        </div>
                    </div>
                </div>    
                
                <div style="margin-top:20px;">
                    <h2 style="color:#000;display:inline;margin-right:10px;">回复设置</h2><br>
                    <div style="margin-top:30px;">
                        <?php 
                            $is_reply = NULL;
                            $is_approve = NULL;
                            if($settings[0]->is_reply == 1){$is_reply = "checked";}
                            if($settings[0]->is_approve == 1){$is_approve = "checked";}
                        ?>
                        <div class="row">
                            <div class="col-md-1" style="margin-left:60px;"></div> 
                            <div class="col-md-3" style="color:#000;font-size:20px;"><input type="checkbox" value="1" name="is_reply" {{$is_reply}}>允许其他人在文章中评论</div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-1" style="margin-left:60px;"></div> 
                            <div class="col-md-3" style="color:#000;font-size:20px;"><input type="checkbox" value="1" name="is_approve" {{$is_approve}}>评论必须经过人工批准</div>
                        </div>
                        <!-- <div class="row" style="margin-top:20px;">
                            <div class="col-md-1" style="margin-left:-30px;"></div> 
                            <div class="col-md-3" style="color:#000;font-size:20px;"><input type="checkbox" value="1" name="">回复头像随机</div>
                        </div> -->
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-1" style="margin-left:60px;"></div> 
                            <div class="col-md-3"  style="color:#000;font-size:20px;">选择自己的头像</div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-1" style="margin-left:60px;"></div> 
                            <div class="col-md-3">
                                <img src="{{ URL::asset('storage/uploads/head_portrait/myHeadPortrait.jpg' )}}" class="img-thumbnail" alt="picture">
                            </div>
                        </div>
                        <div style="margin-top:20px;">
                            <div class="col-md-1" style="margin-left:60px;"></div> 
                            <input type="file" name="my_head_portrait" style="margin-left:40px;" >
                        </div>

                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-1" style="margin-left:60px;"></div> 
                            <div class="col-md-3"  style="color:#000;font-size:20px;">选择其他人的的头像</div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-1" style="margin-left:60px;"></div> 
                            <div class="col-md-3">
                                <img src="{{ URL::asset('storage/uploads/head_portrait/othersHeadPortrait.jpg' )}}" class="img-thumbnail" alt="picture">
                            </div>
                        </div>
                        <div style="margin-top:20px;">
                            <div class="col-md-1" style="margin-left:60px;"></div> 
                            <input type="file" name="others_head_portrait" style="margin-left:40px;" enctype="muitipart/form-data">
                        </div>
                        
                    </div>
                </div>
                
                <input type="submit" name="sub" class="edit-bottom btn" value="保存" >
            {{ Form::close() }}
        </div>
        <!-- /#page-wrapper -->
    </div>    

</body>
</html>