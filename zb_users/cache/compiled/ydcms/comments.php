
<?php if ($socialcomment) { ?>
<?php  echo $socialcomment;  ?>
<?php }else{  ?>
<div id="comments">
	<h4>网友评论</h4>
	<?php if (!$article->IsLock) { ?><?php  include $this->GetTemplate('commentpost');  ?><?php } ?>
	<h4>最新评论</h4>
	<div class="comment">
		<label id="AjaxCommentBegin"></label>
		<?php  foreach ( $comments as $key => $comment) { ?>
			<?php  include $this->GetTemplate('comment');  ?>
		<?php }   ?>
		<?php  include $this->GetTemplate('pagebar');  ?><label id="AjaxCommentEnd"></label>
	</div>
</div>
<?php } ?>