<!DOCTYPE html>

<html lang="zh-CN"
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		<title>BQsummer</title>
		<link rel='stylesheet' id='lingonberry_style-css'  href="/assets/index/css/index-style.css"  type='text/css' media='all' />
		<script src="http://lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js" ></script>
	</head>
	
	<body class="home blog">
		<div class="header section">
			<div class="header-inner section-inner">
					<a href=""  rel="home" class="logo noimg" ><img src="assets/index/img/011.png"></a>		        				
				<h1 class="blog-title">
					<a href=""  rel="home">BQsummer's Blog</a>
				</h1>
				 <div class="clear"></div>
			</div>
		</div> 

		<div class="content section-inner">
			<div class="posts">

			<?php foreach ($articles as $article): ?>
				<?php
					$imgClass = "format-".$article->lebal;
					$introduction = mb_substr($article->content,0,200);
				?>
			<!-- 标准文章 -->
				<div id={{$article->num}} class="post type-post {{$imgClass}} status-publish hentry category-uncategorized">
		    		<div class="post-bubbles">
						<a href="/article/{{$article->num}}"  class="format-bubble"></a>
					</div>
					<div class="content-inner">
						<div class="post-header">
						<!-- 主标题 -->
	    					<h2 class="post-title"><a href="/article/{{$article->num}}"  rel="bookmark">{{$article->title}}</a></h2>     
	    					 <div class="post-meta">
	    			 	<!-- 副标题 -->
									<span class="post-date"><a href="/article/{{$article->num}}">发表于{{$article->created_at}} 作者 {{$article->author}}</a></span>
							</div>
    					</div>
	    				<div class="post-content">
	    				<!-- 内容 -->
		    	    		<p>{{$introduction}}<span>......</span></p>
	    				</div> 
						<div class="clear"></div>
					</div>
					<div class="clear"></div>			    		
			    	<div class="clear"></div>
		    	</div> 
		    <?php endforeach;?>
		    <!-- 含音频文章 -->
				<!-- <div id="post-27" class="post-27 post type-post status-publish format-audio hentry category-uncategorized">
					<div class="post-bubbles">
						<a href="-p=27.htm"  class="format-bubble"></a>
					</div>
					<div class="content-inner">
					
						<div class="">
							<audio controls="controls" id="audio-player">
								<source src="file:///D:/test.mp3" />
							</audio>
						</div>

						<div class="post-header">
	   						<h2 class="post-title"><a href="-p=27.htm">sfsadf</a></h2>
	    					<div class="post-meta">
									<span class="post-date"><a href="-p=27.htm"  ><span></span></a></span>
									<span class="post-author"><a href="-author=1.htm"  rel="author">BQsummer</a></span>
							</div>
						</div>
   						<div class="post-content">
							<p>dsfafdsaf</p>
    					</div>
    					<div class="clear"></div>
					</div>		
			    	<div class="clear"></div>
		    	</div> --> 
		    	
		    	<!-- 翻页 -->
		    	<div class="post-nav archive-nav"><?php echo $articles->links();?></div>
		    	<!-- <div class="post-nav archive-nav"> -->
					
					<!-- <a href=""  class="post-nav-older">&laquo; 较旧文章</a>								
						 <a href=""  class="post-nav-newer">较新文章&raquo;</a> -->					
					<div class="clear"></div>
					
				<!-- </div> -->
				<div class="clear"></div>

			</div> 
		</div> 

		

		<div class="credits section">
			<div class="credits-inner section-inner">
				<p class="credits-left">
					<span>Copyright</span> &copy; 2014 BQsummer's Blog
				</p>
				<p class="credits-right">
					<span>Theme by Anders Noren &mdash; </span><a title="To the top" class="tothetop" href="javascript:scroll(0,0)">Up &uarr;</a>
				</p>
				<div class="clear"></div>
			</div> <!-- /credits-inner -->
		</div> <!-- /credits -->



</body>
</html>