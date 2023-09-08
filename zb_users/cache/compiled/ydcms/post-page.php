
<body>
<?php  include $this->GetTemplate('post-nav');  ?>
<main>
	<div id="main" class="container clear">
		<div class="mainright">
			<?php  include $this->GetTemplate('post-breadcrumb');  ?>
			<div class="mainpost">
				<div class="title">
					<h1><?php  echo $article->Title;  ?></h1>
					<?php if ($zbp->Config('ydcms')->share) { ?><span><?php  echo $zbp->Config('ydcms')->sharehtml;  ?></span><?php } ?>
				</div>
				<!--//-->
				<?php if ($zbp->Config('ydcms')->post_mate) { ?>
				<div class="sub">
					<span><i class="fa fa-user-o"></i><?php  echo $article->Author->StaticName;  ?></span>
					<span><i class="fa fa-clock-o"></i><?php if ($zbp->Config( 'ydcms' )->time=='1') { ?><?php  echo $article->Time('Y-m-d');  ?><?php }else{  ?><?php  echo ydcms_TimeAgo($article->Time());  ?><?php } ?></span>
					<span><i class="fa fa-eye"></i><?php  echo $article->ViewNums;  ?></span>
					<span><i class="fa fa-comment-o"></i><?php  echo $article->CommNums;  ?></span>
					<?php if ($user->ID>0) { ?><span><a href="<?php  echo $host;  ?>zb_system/admin/edit.php?act=ArticleEdt&id=<?php  echo $article->ID;  ?>"><i class="fa fa-pencil-square-o"></i>编辑</a></span><?php } ?>
				</div>
				<!--//-->
				<?php } ?>
				<div class="blog-content">
					<?php  echo $article->Content;  ?>
				</div>
				<!--//-->
				
				<?php if (!$article->IsLock) { ?><?php  include $this->GetTemplate('comments');  ?><?php } ?>
				<!--//-->
			</div>
		</div>
		<?php  include $this->GetTemplate('post-left');  ?>
	</div>
</main>
<!--//main-->

