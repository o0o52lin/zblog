<?php echo'404';die();?>
{if $zbp->Config( 'ydcms' )->headstyle=='2'}
<div id="miniheader" class="miniheader">
	<div class="container">
		{if $zbp->Config( 'ydcms' )->minilogo}
		<div class="minilogo">
			<a href="{$host}" title="{$name}"><img src="{if $zbp->Config( 'ydcms' )->minilogo}{$zbp->Config( 'ydcms' )->minilogo}{else}{$host}zb_users/theme/{$theme}/style/images/minilogo.png{/if}" alt="{$name}"></a>
		</div>
		{/if}
		<div id="mnav"><i class="fa fa-bars"></i></div>
        <div id="msearch"><i class="fa fa-search"></i></div>
		<div id="monavber" class="mininav" data-type="{$type}" data-infoid="{if $type=='category'}{if $category.RootID}{$category.RootID}{else}{$category.ID}{/if}{/if}{if $type=='article'}{if $article.Category.RootID}{$article.Category.RootID}{else}{$article.Category.ID}{/if}{/if}{if $type=='page'}{$article.ID}{/if}{if $type=='tag'}{$tag.ID}{/if}">
			<ul class="navbar">
			{if $zbp->Config('ydcms')->home}<li id="nvabar-item-index"><a href="{$host}">首页</a></li>{/if}
			{if $zbp->Config('ydcms')->catalog}{module:catalog}{/if}
			{if $zbp->Config('ydcms')->navbar}{module:navbar}{/if}
			{if $zbp->Config('ydcms')->nav}{$zbp->Config('ydcms')->navhtml}{/if}
			</ul>
		</div>
		<div class="miniright">
			<span id="minisearch"><i class="fa fa-search"></i></span>
			{if $user.ID>0}<a rel="nofollow" href="{$host}zb_system/admin/index.php?act=admin" target="_blank"><i class="fa fa-user-circle-o"></i></a>{else}<a rel="nofollow" href="{$host}zb_system/login.php" target="_blank"><i class="fa fa-user-circle-o"></i></a>{/if}
		</div>
	</div>
	
	<div class="minisearch container">
		<form name="search" method="get" action="{$host}search.php?act=search">
			<input type="text" name="q" class="text" size="11" placeholder="输入关键词" />
			<button type="submit" class="submit" value="搜索"><i class="fa fa-search"></i></button>
		</form>
	</div>
	
</div>
<div class="miniheader_bottom"></div>
{/if}
{if $zbp->Config( 'ydcms' )->headstyle=='1'}
<header>
	{if $zbp->Config('ydcms')->bordertop}<div class="bordertop"></div>{/if}
	<div id="header" class="container">
		<div class="logo fl">
			<h1><a href="{$host}" title="{$name}"><img src="{if $zbp->Config( 'ydcms' )->logo}{$zbp->Config( 'ydcms' )->logo}{else}{$host}zb_users/theme/{$theme}/style/images/logo.png{/if}" alt="{$name}"><img class="mlogo" src="{if $zbp->Config( 'ydcms' )->minilogo}{$zbp->Config( 'ydcms' )->minilogo}{else}{$host}zb_users/theme/{$theme}/style/images/minilogo.png{/if}" alt="{$name}"></a></h1>
		</div>
		<div id="mnav"><i class="fa fa-bars"></i></div>
        <div id="msearch"><i class="fa fa-search"></i></div>
		{if $zbp->Config('ydcms')->searchright}<style>#header .search{float: right;margin-left: 0;}</style>{/if}
		<div class="search">
			<form name="search" method="get" action="{$host}search.php?act=search">
				<input type="text" name="q" class="text" size="11" placeholder="输入关键词" />
				<button type="submit" class="submit" value="搜索"><i class="fa fa-search"></i></button>
			</form>
		</div>
		{if !$zbp->Config('ydcms')->searchright}
		<div class="logor fr">
			{if $zbp->Config('ydcms')->login}
			<div class="user fr mb-10">
				{if $user.ID>0}
				<a id="admin"><i class="fa fa-user"></i> 后台</a>
				{else}
				<a rel="nofollow" href="{$host}zb_system/login.php" target="_blank"><i class="fa fa-user"></i> 登陆</a>
				{/if}
			</div>
			<div class="admin">
				<a href="{$host}zb_system/admin/index.php?act=admin" target="_blank">进入后台</a>
				<a href="{$host}zb_system/admin/edit.php?act=ArticleEdt" target="_blank">发布文章</a>
				{if $type=="article"||$type=="page"}<a href="{$host}zb_system/admin/edit.php?act=ArticleEdt&id={$article.ID}">编辑文章</a>{/if}
				<a href="{$host}zb_system/admin/index.php?act=ArticleMng" target="_blank">文章管理</a>
				<a href="{$host}zb_system/admin/index.php?act=CategoryMng" target="_blank">分类管理</a>
				<a href="{$host}zb_system/admin/index.php?act=TagMng" target="_blank">标签管理</a>
				<a href="{$host}zb_system/admin/index.php?act=ModuleMng" target="_blank">模块管理</a>
				<a href="{$host}zb_users/theme/ydcms/admin/relevant.php" target="_blank">主题配置</a>
			</div>
			{/if}
			{if $zbp->Config( 'ydcms' )->loginbottom=='text'}<div class="text clear">{$zbp->Config( 'ydcms' )->loginbottomtext}</div>{/if}
			{if $zbp->Config( 'ydcms' )->loginbottom=='icon'}
			<div class="icon clear">
				<a rel="nofollow" href="http://wpa.qq.com/msgrd?v=3&uin={$zbp->Config( 'ydcms' )->icon_qq}&site=qq&menu=yes" target="_blank"><i class="fa fa-qq"></i></a>
				<a rel="nofollow" id="lbicon-wechat"><i class="fa fa-weixin"></i>
					<div class="lbicon-wechat"><img src="{$zbp->Config( 'ydcms' )->icon_wechat}" alt="微信号"></div>
				</a>
				<a href="{$zbp->Config( 'ydcms' )->icon_weibo}" target="_blank" rel="nofollow"><i class="fa fa-weibo"></i></a>
			</div>
			{/if}
		</div>
		{/if}
	</div>
	<div id="nav" class="clear {if $zbp->Config('ydcms')->topmenu}topmenu{/if}">
		<div id="monavber" class="container nav" data-type="{$type}" data-infoid="{if $type=='category'}{if $category.RootID}{$category.RootID}{else}{$category.ID}{/if}{/if}{if $type=='article'}{if $article.Category.RootID}{$article.Category.RootID}{else}{$article.Category.ID}{/if}{/if}{if $type=='page'}{$article.ID}{/if}{if $type=='tag'}{$tag.ID}{/if}">
			<ul class="navbar">
				{if $zbp->Config('ydcms')->home}<li id="nvabar-item-index"><a href="{$host}">首页</a></li>{/if}
				{if $zbp->Config('ydcms')->catalog}{module:catalog}{/if}
				{if $zbp->Config('ydcms')->navbar}{module:navbar}{/if}
				{if $zbp->Config('ydcms')->nav}{$zbp->Config('ydcms')->navhtml}{/if}
			</ul>
		</div>
	</div>
</header>
{/if}
<!--//header-->