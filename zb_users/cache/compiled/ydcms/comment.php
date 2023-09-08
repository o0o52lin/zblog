<label id="cmt<?php  echo $comment->ID;  ?>"></label><ul>
<li id="comment-$comment.ID">
	<?php $randimg=rand(1,36);$randimg=$zbp->host."zb_users/theme/$theme/include/avator/$randimg.jpg"; ?>
	<?php if ($zbp->CheckPlugin('Gravatar') || $zbp->CheckPlugin('GravatarCache')) { ?>
	<img src="<?php if ($comment->Author->Level<4) { ?><?php  echo $host;  ?>zb_users/avatar/0.png<?php }elseif($comment->Author->Email) {  ?><?php  echo $comment->Author->Avatar;  ?><?php }else{  ?><?php  echo $randimg;  ?><?php } ?>">
	<?php }else{  ?>
	<img src="<?php if ($comment->Author->Level<4) { ?><?php  echo $host;  ?>zb_users/avatar/0.png<?php }else{  ?><?php  echo $randimg;  ?><?php } ?>">
	<?php } ?>
	<div class="title">
		<span><a rel="nofollow" href="<?php  echo $comment->Author->HomePage;  ?>"><?php  echo $comment->Author->StaticName;  ?></a></span>
		<span><?php  echo $comment->Time();  ?></span>
		<span class="rp"><a rel="nofollow" href="#comments" onclick="zbp.comment.reply('<?php  echo $comment->ID;  ?>')">回复</a></span>
	</div>
	<p>
		<?php if ($comment->ParentID!=0) { ?>
		<?php 
			$newc=$zbp->GetCommentByID($comment->ParentID);
			$atid=$newc->ID;
			$atname=$newc->Name;
		 ?>
		<a href="#comment-<?php  echo $atid;  ?>" class="comment_at" rel="nofollow">@<?php  echo $atname;  ?></a>
		<?php } ?><?php  echo $comment->Content;  ?>
	</p>
	<div class="floor"></div>
	<?php  foreach ( $comment->Comments as $comment) { ?>
		<?php  include $this->GetTemplate('comment');  ?>
	<?php }   ?>
</li></ul>