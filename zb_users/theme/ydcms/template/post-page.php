<?php echo'404';die();?>
<body>
{template:post-nav}
<main>
	<div id="main" class="container clear">
		<div class="mainright">
			{template:post-breadcrumb}
			<div class="mainpost">
				<div class="title">
					<h1>{$article.Title}</h1>
					{if $zbp->Config('ydcms')->share}<span>{$zbp->Config('ydcms')->sharehtml}</span>{/if}
				</div>
				<!--//-->
				{if $zbp->Config('ydcms')->post_mate}
				<div class="sub">
					<span><i class="fa fa-user-o"></i>{$article.Author.StaticName}</span>
					<span><i class="fa fa-clock-o"></i>{if $zbp->Config( 'ydcms' )->time=='1'}{$article.Time('Y-m-d')}{else}{ydcms_TimeAgo($article.Time())}{/if}</span>
					<span><i class="fa fa-eye"></i>{$article.ViewNums}</span>
					<span><i class="fa fa-comment-o"></i>{$article.CommNums}</span>
					{if $user.ID>0}<span><a href="{$host}zb_system/admin/edit.php?act=ArticleEdt&id={$article.ID}"><i class="fa fa-pencil-square-o"></i>编辑</a></span>{/if}
				</div>
				<!--//-->
				{/if}
				<div class="blog-content">
					{$article.Content}
				</div>
				<!--//-->
				
				{if !$article.IsLock}{template:comments}{/if}
				<!--//-->
			</div>
		</div>
		{template:post-left}
	</div>
</main>
<!--//main-->

