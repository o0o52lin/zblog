<?php echo'404';die();?>
<li class="wx_li">
	<h3><a href="{$article.Url}" title="{$article.Title}" target="_blank">{$article.Title}</a></h3>
	<div class="img">
		<a href="{$article.Url}" title="{$article.Title}" target="_blank"><img src="{ydcms_thumbnail($article)}" alt="{$article.Title}"/></a>
	</div>
	{if $zbp->Config('ydcms')->listinfo}
	<div class="sub">
		<span><i class="fa fa-user-o"></i>{$article.Author.StaticName}</span>
		<span><i class="fa fa-clock-o"></i>{if $zbp->Config( 'ydcms' )->timestyle=='1'}{$article.Time('Y-m-d')}{else}{ydcms_TimeAgo($article.Time())}{/if}</span>
		<span><a href="{$article.Category.Url}" title="{$article.Category.Name}"><i class="fa fa-folder-open-o"></i>{$article.Category.Name}</a></span>
		<span><i class="fa fa-eye"></i>{$article.ViewNums}</span>
	</div>
	{/if}
	<p>{ydcms_intro($article,1,250,'...')}</p>
	{if $zbp->Config('ydcms')->listtag}
	{if $article.Tags}
	<div class="tag">
		{foreach $article.Tags as $tag}<a href="{$tag.Url}" title="{$tag.Name}" target="_blank">{$tag.Name}</a>{/foreach}
	</div>
	{/if}
	{/if}
	{if $zbp->Config('ydcms')->listmore}<div class="more"><a rel="nofollow" href="{$article.Url}" target="_blank">Read More></a></div>{/if}
</li>