
<li class="wx_li">
	<h3><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank"><?php  echo $article->Title;  ?></a></h3>
	<div class="img">
		<a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank"><img src="<?php  echo ydcms_thumbnail($article);  ?>" alt="<?php  echo $article->Title;  ?>"/></a>
	</div>
	<?php if ($zbp->Config('ydcms')->listinfo) { ?>
	<div class="sub">
		<span><i class="fa fa-user-o"></i><?php  echo $article->Author->StaticName;  ?></span>
		<span><i class="fa fa-clock-o"></i><?php if ($zbp->Config( 'ydcms' )->timestyle=='1') { ?><?php  echo $article->Time('Y-m-d');  ?><?php }else{  ?><?php  echo ydcms_TimeAgo($article->Time());  ?><?php } ?></span>
		<span><a href="<?php  echo $article->Category->Url;  ?>" title="<?php  echo $article->Category->Name;  ?>"><i class="fa fa-folder-open-o"></i><?php  echo $article->Category->Name;  ?></a></span>
		<span><i class="fa fa-eye"></i><?php  echo $article->ViewNums;  ?></span>
	</div>
	<?php } ?>
	<p><?php  echo ydcms_intro($article,1,250,'...');  ?></p>
	<?php if ($zbp->Config('ydcms')->listtag) { ?>
	<?php if ($article->Tags) { ?>
	<div class="tag">
		<?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" title="<?php  echo $tag->Name;  ?>" target="_blank"><?php  echo $tag->Name;  ?></a><?php }   ?>
	</div>
	<?php } ?>
	<?php } ?>
	<?php if ($zbp->Config('ydcms')->listmore) { ?><div class="more"><a rel="nofollow" href="<?php  echo $article->Url;  ?>" target="_blank">Read More></a></div><?php } ?>
</li>