<?php echo'404';die();?>
{if $socialcomment}
{$socialcomment}
{else}
<div id="comments">
	<h4>网友评论</h4>
	{if !$article.IsLock}{template:commentpost}{/if}
	<h4>最新评论</h4>
	<div class="comment">
		<label id="AjaxCommentBegin"></label>
		{foreach $comments as $key => $comment}
			{template:comment}
		{/foreach}
		{template:pagebar}<label id="AjaxCommentEnd"></label>
	</div>
</div>
{/if}