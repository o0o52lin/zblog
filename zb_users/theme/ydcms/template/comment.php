<?php echo'404';die();?><ul>
<li id="comment-$comment.ID">
	{php}$randimg=rand(1,36);$randimg=$zbp->host."zb_users/theme/$theme/include/avator/$randimg.jpg";{/php}
	{if $zbp->CheckPlugin('Gravatar') || $zbp->CheckPlugin('GravatarCache')}
	<img src="{if $comment.Author.Level<4}{$host}zb_users/avatar/0.png{elseif $comment.Author.Email}{$comment.Author.Avatar}{else}{$randimg}{/if}">
	{else}
	<img src="{if $comment.Author.Level<4}{$host}zb_users/avatar/0.png{else}{$randimg}{/if}">
	{/if}
	<div class="title">
		<span><a rel="nofollow" href="{$comment.Author.HomePage}">{$comment.Author.StaticName}</a></span>
		<span>{$comment.Time()}</span>
		<span class="rp"><a rel="nofollow" href="#comments" onclick="zbp.comment.reply('{$comment.ID}')">回复</a></span>
	</div>
	<p>
		{if $comment.ParentID!=0}
		{php}
			$newc=$zbp->GetCommentByID($comment->ParentID);
			$atid=$newc->ID;
			$atname=$newc->Name;
		{/php}
		<a href="#comment-{$atid}" class="comment_at" rel="nofollow">@{$atname}</a>
		{/if}{$comment.Content}
	</p>
	<div class="floor"></div>
	{foreach $comment.Comments as $comment}
		{template:comment}
	{/foreach}
</li></ul>