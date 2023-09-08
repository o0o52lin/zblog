
<?php if ($module->FileName=='related_side') { ?>
<div class="widget widget_relates">
	<h3>相关推荐</h3>
	<?php if ($type=='article') { ?>
	<?php  $num=$zbp->Config('ydcms')->post_related_side_num;
	$array=GetList($num,null,null,null,null,null,array('is_related'=>$article->ID));;  ?>
	<?php  foreach ( $array as $related) { ?>
	<?php if (isset($related)) { ?>
	<a href="<?php  echo $related->Url;  ?>" title="<?php  echo $related->Title;  ?>">
		<div class="img"><img src="<?php  echo ydcms_thumbnail($related);  ?>" alt="<?php  echo $related->Title;  ?>"></div>
		<p><?php  echo $related->Title;  ?></p>
	</a>
	<?php } ?>
	<?php }   ?>
	<?php }else{  ?>
	侧栏相关推荐模块只能拖拽到文章页对应侧栏，当前页面不是文章页！
	<?php } ?>
</div>
<?php }elseif($module->FileName=='hotpost') {  ?>
<div class="widget widget_previous" >
	<h3>热门文章</h3>
	<ul>
		<?php 
    $stime = time();
    $ytime = 365*24*60*60;
    $ztime = $stime-$ytime;
    $order = array('log_ViewNums'=>'DESC');
    $where = array(array('=','log_Status','0'),array('>','log_PostTime',$ztime));
    $array = $zbp->GetArticleList(array('*'),$where,$order,array(10),'');
     ?>
    <?php  foreach ( $array as $key=>$hotpost) { ?>
		<li><a href="<?php  echo $hotpost->Url;  ?>" title="<?php  echo $hotpost->Title;  ?>" target="_blank"><i class="fa fa-angle-right"></i><?php  echo $hotpost->Title;  ?></a></li>
		<?php }   ?>
	</ul>
</div>
<?php }elseif($module->HtmlID=='divPrevious') {  ?>
<div class="widget widget_<?php  echo $module->FileName;  ?>">
	<?php if ((!$module->IsHideTitle)&&($module->Name)) { ?><h3><?php  echo $module->Name;  ?></h3><?php } ?>
	<ul>
		<?php  foreach ( GetList(10) as $newpost) { ?>
		<li><a href="<?php  echo $newpost->Url;  ?>" title="<?php  echo $newpost->Title;  ?>" target="_blank"><i class="fa fa-angle-right"></i><?php  echo $newpost->Title;  ?></a></li>
		<?php }   ?>
	</ul>
</div>
<?php }else{  ?>
<div class="widget widget_<?php  echo $module->FileName;  ?>">
  <?php if ((!$module->IsHideTitle)&&($module->Name)) { ?><h3><?php  echo $module->Name;  ?></h3><?php } ?>
  <?php if ($module->Type=='ul') { ?>
  <ul><?php  echo $module->Content;  ?></ul>
  <?php } ?>
  <?php if ($module->Type=='div') { ?>
  <div class="widgetdiv"><?php  echo $module->Content;  ?></div>
  <?php } ?>
</div>
<?php } ?>