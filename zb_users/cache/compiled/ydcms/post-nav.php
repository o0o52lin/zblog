
<?php if ($zbp->Config( 'ydcms' )->headstyle=='2') { ?>
<div id="miniheader" class="miniheader">
	<div class="container">
		<?php if ($zbp->Config( 'ydcms' )->minilogo) { ?>
		<div class="minilogo">
			<a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>"><img src="<?php if ($zbp->Config( 'ydcms' )->minilogo) { ?><?php  echo $zbp->Config( 'ydcms' )->minilogo;  ?><?php }else{  ?><?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/images/minilogo.png<?php } ?>" alt="<?php  echo $name;  ?>"></a>
		</div>
		<?php } ?>
		<div id="mnav"><i class="fa fa-bars"></i></div>
        <div id="msearch"><i class="fa fa-search"></i></div>
		<div id="monavber" class="mininav" data-type="<?php  echo $type;  ?>" data-infoid="<?php if ($type=='category') { ?><?php if ($category->RootID) { ?><?php  echo $category->RootID;  ?><?php }else{  ?><?php  echo $category->ID;  ?><?php } ?><?php } ?><?php if ($type=='article') { ?><?php if ($article->Category->RootID) { ?><?php  echo $article->Category->RootID;  ?><?php }else{  ?><?php  echo $article->Category->ID;  ?><?php } ?><?php } ?><?php if ($type=='page') { ?><?php  echo $article->ID;  ?><?php } ?><?php if ($type=='tag') { ?><?php  echo $tag->ID;  ?><?php } ?>">
			<ul class="navbar">
			<?php if ($zbp->Config('ydcms')->home) { ?><li id="nvabar-item-index"><a href="<?php  echo $host;  ?>">首页</a></li><?php } ?>
			<?php if ($zbp->Config('ydcms')->catalog) { ?><?php  if(isset($modules['catalog'])){echo $modules['catalog']->Content;}  ?><?php } ?>
			<?php if ($zbp->Config('ydcms')->navbar) { ?><?php  if(isset($modules['navbar'])){echo $modules['navbar']->Content;}  ?><?php } ?>
			<?php if ($zbp->Config('ydcms')->nav) { ?><?php  echo $zbp->Config('ydcms')->navhtml;  ?><?php } ?>
			</ul>
		</div>
		<div class="miniright">
			<span id="minisearch"><i class="fa fa-search"></i></span>
			<?php if ($user->ID>0) { ?><a rel="nofollow" href="<?php  echo $host;  ?>zb_system/admin/index.php?act=admin" target="_blank"><i class="fa fa-user-circle-o"></i></a><?php }else{  ?><a rel="nofollow" href="<?php  echo $host;  ?>zb_system/login.php" target="_blank"><i class="fa fa-user-circle-o"></i></a><?php } ?>
		</div>
	</div>
	
	<div class="minisearch container">
		<form name="search" method="get" action="<?php  echo $host;  ?>search.php?act=search">
			<input type="text" name="q" class="text" size="11" placeholder="输入关键词" />
			<button type="submit" class="submit" value="搜索"><i class="fa fa-search"></i></button>
		</form>
	</div>
	
</div>
<div class="miniheader_bottom"></div>
<?php } ?>
<?php if ($zbp->Config( 'ydcms' )->headstyle=='1') { ?>
<header>
	<?php if ($zbp->Config('ydcms')->bordertop) { ?><div class="bordertop"></div><?php } ?>
	<div id="header" class="container">
		<div class="logo fl">
			<h1><a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>"><img src="<?php if ($zbp->Config( 'ydcms' )->logo) { ?><?php  echo $zbp->Config( 'ydcms' )->logo;  ?><?php }else{  ?><?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/images/logo.png<?php } ?>" alt="<?php  echo $name;  ?>"><img class="mlogo" src="<?php if ($zbp->Config( 'ydcms' )->minilogo) { ?><?php  echo $zbp->Config( 'ydcms' )->minilogo;  ?><?php }else{  ?><?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/images/minilogo.png<?php } ?>" alt="<?php  echo $name;  ?>"></a></h1>
		</div>
		<div id="mnav"><i class="fa fa-bars"></i></div>
        <div id="msearch"><i class="fa fa-search"></i></div>
		<?php if ($zbp->Config('ydcms')->searchright) { ?><style>#header .search{float: right;margin-left: 0;}</style><?php } ?>
		<div class="search">
			<form name="search" method="get" action="<?php  echo $host;  ?>search.php?act=search">
				<input type="text" name="q" class="text" size="11" placeholder="输入关键词" />
				<button type="submit" class="submit" value="搜索"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<?php if (!$zbp->Config('ydcms')->searchright) { ?>
		<div class="logor fr">
			<?php if ($zbp->Config('ydcms')->login) { ?>
			<div class="user fr mb-10">
				<?php if ($user->ID>0) { ?>
				<a id="admin"><i class="fa fa-user"></i> 后台</a>
				<?php }else{  ?>
				<a rel="nofollow" href="<?php  echo $host;  ?>zb_system/login.php" target="_blank"><i class="fa fa-user"></i> 登陆</a>
				<?php } ?>
			</div>
			<div class="admin">
				<a href="<?php  echo $host;  ?>zb_system/admin/index.php?act=admin" target="_blank">进入后台</a>
				<a href="<?php  echo $host;  ?>zb_system/admin/edit.php?act=ArticleEdt" target="_blank">发布文章</a>
				<?php if ($type=="article"||$type=="page") { ?><a href="<?php  echo $host;  ?>zb_system/admin/edit.php?act=ArticleEdt&id=<?php  echo $article->ID;  ?>">编辑文章</a><?php } ?>
				<a href="<?php  echo $host;  ?>zb_system/admin/index.php?act=ArticleMng" target="_blank">文章管理</a>
				<a href="<?php  echo $host;  ?>zb_system/admin/index.php?act=CategoryMng" target="_blank">分类管理</a>
				<a href="<?php  echo $host;  ?>zb_system/admin/index.php?act=TagMng" target="_blank">标签管理</a>
				<a href="<?php  echo $host;  ?>zb_system/admin/index.php?act=ModuleMng" target="_blank">模块管理</a>
				<a href="<?php  echo $host;  ?>zb_users/theme/ydcms/admin/relevant.php" target="_blank">主题配置</a>
			</div>
			<?php } ?>
			<?php if ($zbp->Config( 'ydcms' )->loginbottom=='text') { ?><div class="text clear"><?php  echo $zbp->Config( 'ydcms' )->loginbottomtext;  ?></div><?php } ?>
			<?php if ($zbp->Config( 'ydcms' )->loginbottom=='icon') { ?>
			<div class="icon clear">
				<a rel="nofollow" href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $zbp->Config( 'ydcms' )->icon_qq;  ?>&site=qq&menu=yes" target="_blank"><i class="fa fa-qq"></i></a>
				<a rel="nofollow" id="lbicon-wechat"><i class="fa fa-weixin"></i>
					<div class="lbicon-wechat"><img src="<?php  echo $zbp->Config( 'ydcms' )->icon_wechat;  ?>" alt="微信号"></div>
				</a>
				<a href="<?php  echo $zbp->Config( 'ydcms' )->icon_weibo;  ?>" target="_blank" rel="nofollow"><i class="fa fa-weibo"></i></a>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
	<div id="nav" class="clear <?php if ($zbp->Config('ydcms')->topmenu) { ?>topmenu<?php } ?>">
		<div id="monavber" class="container nav" data-type="<?php  echo $type;  ?>" data-infoid="<?php if ($type=='category') { ?><?php if ($category->RootID) { ?><?php  echo $category->RootID;  ?><?php }else{  ?><?php  echo $category->ID;  ?><?php } ?><?php } ?><?php if ($type=='article') { ?><?php if ($article->Category->RootID) { ?><?php  echo $article->Category->RootID;  ?><?php }else{  ?><?php  echo $article->Category->ID;  ?><?php } ?><?php } ?><?php if ($type=='page') { ?><?php  echo $article->ID;  ?><?php } ?><?php if ($type=='tag') { ?><?php  echo $tag->ID;  ?><?php } ?>">
			<ul class="navbar">
				<?php if ($zbp->Config('ydcms')->home) { ?><li id="nvabar-item-index"><a href="<?php  echo $host;  ?>">首页</a></li><?php } ?>
				<?php if ($zbp->Config('ydcms')->catalog) { ?><?php  if(isset($modules['catalog'])){echo $modules['catalog']->Content;}  ?><?php } ?>
				<?php if ($zbp->Config('ydcms')->navbar) { ?><?php  if(isset($modules['navbar'])){echo $modules['navbar']->Content;}  ?><?php } ?>
				<?php if ($zbp->Config('ydcms')->nav) { ?><?php  echo $zbp->Config('ydcms')->navhtml;  ?><?php } ?>
			</ul>
		</div>
	</div>
</header>
<?php } ?>
<!--//header-->