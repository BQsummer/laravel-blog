<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Back to Admin &nbsp;&nbsp;&nbsp;&nbsp;BQsummer</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!-- <li><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;仪表盘</a></li> -->
                    <li><a href="/admin"  id="0"><span class="glyphicon glyphicon-pencil">&nbsp;文章</a></li>
                    <li><a href="/admin/reply" id="2"><span class="glyphicon glyphicon-comment">&nbsp;评论</a></li>
                    <li><a href="/admin/settings" id="1"><span class="glyphicon glyphicon-cog">&nbsp;设置</a></li>
                    <!-- <li><a href="#" class="selected"><span class="glyphicon glyphicon-film">&nbsp;多媒体管理</a></li>  -->     
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">{{$msg_count}}</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><a href="{{action('LoginController@logout')}}">{{$msg_count}} New Messages</a></li>
                            <!-- <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Go to Inbox <span class="badge">2</span></a></li> -->
                        </ul>
                    </li>
                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{$authName}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li> -->
                            <li><a href="{{action('LoginController@logout')}}"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>