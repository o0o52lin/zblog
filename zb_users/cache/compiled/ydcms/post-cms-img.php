
<div class="mainimg">
	<?php if ($zbp->Config('ydcms')->imgradio=='1') { ?>
	<ul>
		<?php $array = explode(',',$zbp->Config('ydcms')->MoreimgpostID); ?>
		<?php  foreach ( $array as $key=>$id) { ?>
		<?php  $post=GetPost((int)$id);;  ?>
		<li>
			<a href="<?php  echo $post->Url;  ?>" title="<?php  echo $post->Title;  ?>" target="_blank">
				<img src="<?php  echo ydcms_thumbnail($post);  ?>" alt="<?php  echo $post->Title;  ?>">
				<h3><?php  echo $post->Title;  ?></h3>
			</a>
			<?php if ($zbp->Config('ydcms')->yszoff) { ?><span><a href="###"><?php  echo $zbp->Config('ydcms')->ysztext;  ?></a></span><?php } ?>
		</li>
		<?php }   ?>
	</ul>
	<?php } ?>
	<!--///-->
	<?php if ($zbp->Config('ydcms')->imgradio=='2') { ?>
	<?php $array = explode(',',$zbp->Config('ydcms')->MoreimgcateID); ?>
	<?php  foreach ( $array as $key=>$id) { ?>
	<?php if (isset($categorys[$id])) { ?>
	<h2><?php  echo $categorys[$id]->Name;  ?></h2>	
	<ul>
		<?php  foreach ( GetList(4,$id,null,null,null,null,array('has_subcate'=>'ture')) as $key=>$post) { ?>
		<li>
			<a href="<?php  echo $post->Url;  ?>" title="<?php  echo $post->Title;  ?>" target="_blank">
				<img src="<?php  echo ydcms_thumbnail($post);  ?>" alt="<?php  echo $post->Title;  ?>">
				<h3><?php  echo $post->Title;  ?></h3>
			</a>
			<?php if ($zbp->Config('ydcms')->yszoff) { ?><span><a href="###"><?php  echo $zbp->Config('ydcms')->ysztext;  ?></a></span><?php } ?>
		</li>
		<?php }   ?>
	</ul>
	<?php } ?>
	<?php }   ?>
	<?php } ?>
</div>
<!--//-->