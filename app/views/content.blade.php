<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
<title>BQsummer</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel='stylesheet' href="/assets/index/css/index-style.css"/>
</head>
	<body class="single single-post postid-1730 single-format-standard has-featured-image">
		<!-- canner -->
		<div class="header section">
			<div class="header-inner section-inner">
					<a href="/" rel="home" class="logo">
						<img src="/assets/index/img/011.png"  alt="Lingonberry">
					</a>
				<h1 class="blog-title">
					<a href="/"  rel="home">BQsummer's Blog</a>
				</h1>
				 <div class="clear"></div>
			</div>
		</div>

		<div class="content section-inner">
			<div class="posts">
				<div id="post-1730" class="post-1730 post type-post status-publish format-standard has-post-thumbnail hentry category-lifestyle tag-coffee tag-developers tag-food">
					<div class="content-inner">
					<!-- post-header是图片和标题 -->
						<div class="post-header">    
							<!-- <div class="featured-media">
								<a href="index.htm"  rel="bookmark" >
								<img width="766" height="510" src="http://127.0.0.1/laravel-blog/public/assets/index/img/00001.jpg"  class="attachment-post-image wp-post-image"  />					
								</a>
							</div>  --> 
	    					<h2 class="post-title"><a href="index.htm"  rel="bookmark" >{{$article[0]->title}}</a></h2>
							<div class="post-meta">
								<span class="post-date"><a href="index.htm" >{{$article[0]->created_at}}</a></span>
								<span class="date-sep"> / </span>
								<span class="post-author"><a href=""  rel="author">{{$article[0]->author}}</a></span>
								<span class="date-sep"> / </span>
								<a href=""  >{{$article[0]->reply_num}} Comments</a>			
							</div> 
    					</div> <!-- /post-header -->

    					<!-- 文章内容 -->
					    <div class="post-content">
							<p class="intro">{{$article[0]->content}}</p>
					    </div> <!-- /post-content -->

					    <!-- 文章标签 -->
						<div class="clear"></div>
						<div class="post-cat-tags">
							<p class="post-categories">Categories: <a href=""  rel="category tag">{{$article[0]->lebal}}</a></p>
						
							<p class="post-tags">Tags: <a href="" rel="tag">{{$article[0]->tags}}</a></p>
						</div>

					</div> <!-- /post content-inner -->

					<div class="clear"></div>
					<!-- 返回主页或上篇文章 -->
					<div class="post-nav">
							<?php
								if($pre_article == null){
									$address = "/";
									$title = "返回主页";
								}
								else{
									$address = "/article/".$pre_article->num;
									$title = "« ".$pre_article->title;
								}
							?>
							<a class="post-nav-older" href="{{$address}}">{{$title}}</a>
							<a class="post-nav-older post-nav-newer" href="#respond" onclick="post1(this)" id="{{$article[0]->num}}" name="{{$article[0]->num}}" >发表评论</a>
							<div class="clear"></div>
					</div> <!-- /post-nav -->

					
					<!-- 评论 -->
					
					<div class="comments">
						<h2 class="comments-title">{{$article[0]->reply_num}} Comments</h2>
						<ol class="commentlist">
						<?php foreach ($replies as $reply){ ?>
						<?php 
							if($reply->is_sub_reply == 0){
						?>
				    		<li class="comment byuser comment-author-anders bypostauthor even thread-even depth-1" id="li-comment-22">
								<div id="comment-22" class="comment">
									<div class="comment-meta comment-author vcard">
										<img alt='' src="/storage/uploads/head_portrait/othersHeadPortrait.jpg"  class='avatar avatar-120 photo' height='120' width='120' />
										<div class="comment-meta-content">
											<cite class="fn"><a href="" rel='external nofollow' class='url'>{{$reply->author}}</a> <span class="post-author"></span></cite>					
											<p><a href="index.htm#comment-22" >{{$reply->created_at}}</a></p>
										</div> <!-- /comment-meta-content -->
										<div class="comment-actions">
											<a class='comment-reply-link' href="#respond" onclick="post2(this)" id="{{$reply->id}}" name="{{$reply->id}}" >Reply</a>
										</div> <!-- /comment-actions -->
										<div class="clear"></div>
									</div> <!-- /comment-meta -->
									<div class="comment-content post-content">
										<p>{{$reply->content}}</p>
										<div class="comment-actions">
																
											<div class="clear"></div>
										</div> <!-- /comment-actions -->
									</div><!-- /comment-content -->
								</div><!-- /comment-## -->

								<?php
									if($reply->has_sub_reply == 1){
										foreach ($sub_replies as $sub_reply ) {
											if($sub_reply->main_reply == $reply->id){
								?>

								<ul class="children">
									<li class="comment odd alt depth-2" id="li-comment-23">

										<div id="comment-23" class="comment">
											<div class="comment-meta comment-author vcard">
												<img alt='' src="/storage/uploads/head_portrait/othersHeadPortrait.jpg"  class='avatar avatar-120 photo' height='120' width='120' />
												<div class="comment-meta-content">
													<cite class="fn">{{$sub_reply->author}}</cite>					
													<p><a href="index.htm#comment-23" >{{$sub_reply->created_at}}</a></p>
												</div> <!-- /comment-meta-content -->
												<div class="comment-actions">
													<a class='comment-reply-link' href="#respond" onclick="post3(this)" name="{{$reply->id}}" id="{{$sub_reply->author}}" >Reply</a>									
												</div> <!-- /comment-actions -->
												<div class="clear"></div>
											</div> <!-- /comment-meta -->
											<div class="comment-content post-content">
												<p>{{$sub_reply->content}}</p>
												<div class="comment-actions">
													<div class="clear"></div>
												</div> <!-- /comment-actions -->
											</div><!-- /comment-content -->
										</div><!-- /comment-## -->
									</li><!-- #comment-## -->
								</ul><!-- .children -->
								<?php }}} ?>
							</li><!-- #comment-## -->
						<?php }} ?>	
					
					</ol>
				</div><!-- /comments -->

				<!-- 发表回复 -->

				<div id="respond" name="respond" class="comment-respond">
					<h3 id="reply-title" class="comment-reply-title">发表评论 <small><a rel="nofollow" id="cancel-comment-reply-link" href=""  style="display:none;">Cancel reply</a></small></h3>
					<form action="/post" method="post" id="commentform" class="comment-form">
						{{Form::token();}}
						<p class="comment-notes">你的邮件将不会公布</p>							
						<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="Name" value="" size="30" />
						<label for="author">Author</label> 
						<span class="required">*</span></p>
						<p class="comment-form-email"><input id="email" name="email" type="text" placeholder="Email" value="" size="30" /><label for="email">Email</label> <span class="required">*</span></p>
						<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="6" required></textarea></p>						
						<p class="form-allowed-tags">你可以使用这些HTML标签和属性:  <code>&lt;a href=&quot;&quot; title=&quot;&quot;&gt; &lt;abbr title=&quot;&quot;&gt; &lt;acronym title=&quot;&quot;&gt; &lt;b&gt; &lt;blockquote cite=&quot;&quot;&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=&quot;&quot;&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=&quot;&quot;&gt; &lt;strike&gt; &lt;strong&gt; </code></p>						
						<p class="form-submit">
						<input name="submit" type="submit" id="submit" value="发表评论" />
						<input type='hidden' name='post_format' id='post_format' value=''  />
						<input type='hidden' name='post_num' id='post_num' value='' />
						<input type='hidden' name='article_num' id='article_num' value="{{$article[0]->num}}" />
						<input type='hidden' name='to_author' id='to_author' value='' />
						</p>
					</form>
				</div><!-- #respond -->
			</div> <!-- /post -->
		</div> <!-- /posts -->
	</div> <!-- /content section-inner -->

	<!-- 尾部 -->
	
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

	<script type="text/javascript">
	function post1(event) {
		document.getElementById('post_num').value=event.name;
		document.getElementById('post_format').value=1;
	}
	function post2(event) {
		document.getElementById('post_num').value=event.name;
		document.getElementById('post_format').value=2;
	}
	function post3(event) {
		document.getElementById('post_num').value=event.name;
		document.getElementById('post_format').value=3;
		document.getElementById('to_author').value=event.id;

	}
	</script>
</body>
</html>