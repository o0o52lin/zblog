<?php echo'404';die();?>
<div class="mainimg">
	{if $zbp->Config('ydcms')->imgradio=='1'}
	<ul>
		{php}$array = explode(',',$zbp->Config('ydcms')->MoreimgpostID);{/php}
		{foreach $array as $key=>$id}
		{$post=GetPost((int)$id);}
		<li>
			<a href="{$post.Url}" title="{$post.Title}" target="_blank">
				<img src="{ydcms_thumbnail($post)}" alt="{$post.Title}">
				<h3>{$post.Title}</h3>
			</a>
			{if $zbp->Config('ydcms')->yszoff}<span><a href="###">{$zbp->Config('ydcms')->ysztext}</a></span>{/if}
		</li>
		{/foreach}
	</ul>
	{/if}
	<!--///-->
	{if $zbp->Config('ydcms')->imgradio=='2'}
	{php}$array = explode(',',$zbp->Config('ydcms')->MoreimgcateID);{/php}
	{foreach $array as $key=>$id}
	{if isset($categorys[$id])}
	<h2>{$categorys[$id].Name}</h2>	
	<ul>
		{foreach GetList(4,$id,null,null,null,null,array('has_subcate'=>'ture')) as $key=>$post}
		<li>
			<a href="{$post.Url}" title="{$post.Title}" target="_blank">
				<img src="{ydcms_thumbnail($post)}" alt="{$post.Title}">
				<h3>{$post.Title}</h3>
			</a>
			{if $zbp->Config('ydcms')->yszoff}<span><a href="###">{$zbp->Config('ydcms')->ysztext}</a></span>{/if}
		</li>
		{/foreach}
	</ul>
	{/if}
	{/foreach}
	{/if}
</div>
<!--//-->