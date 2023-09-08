<?php echo'404';die();?>
{if $module.FileName=='related_side'}
<div class="widget widget_relates">
	<h3>相关推荐</h3>
	{if $type=='article'}
	{$num=$zbp->Config('ydcms')->post_related_side_num;
	$array=GetList($num,null,null,null,null,null,array('is_related'=>$article->ID));}
	{foreach $array as $related}
	{if isset($related)}
	<a href="{$related.Url}" title="{$related.Title}">
		<div class="img"><img src="{ydcms_thumbnail($related)}" alt="{$related.Title}"></div>
		<p>{$related.Title}</p>
	</a>
	{/if}
	{/foreach}
	{else}
	侧栏相关推荐模块只能拖拽到文章页对应侧栏，当前页面不是文章页！
	{/if}
</div>
{elseif $module.FileName=='hotpost'}
<div class="widget widget_previous" >
	<h3>热门文章</h3>
	<ul>
		{php}
    $stime = time();
    $ytime = 365*24*60*60;
    $ztime = $stime-$ytime;
    $order = array('log_ViewNums'=>'DESC');
    $where = array(array('=','log_Status','0'),array('>','log_PostTime',$ztime));
    $array = $zbp->GetArticleList(array('*'),$where,$order,array(10),'');
    {/php}
    {foreach $array as $key=>$hotpost}
		<li><a href="{$hotpost.Url}" title="{$hotpost.Title}" target="_blank"><i class="fa fa-angle-right"></i>{$hotpost.Title}</a></li>
		{/foreach}
	</ul>
</div>
{elseif $module.HtmlID=='divPrevious'}
<div class="widget widget_{$module.FileName}">
	{if (!$module.IsHideTitle)&&($module.Name)}<h3>{$module.Name}</h3>{/if}
	<ul>
		{foreach GetList(10) as $newpost}
		<li><a href="{$newpost.Url}" title="{$newpost.Title}" target="_blank"><i class="fa fa-angle-right"></i>{$newpost.Title}</a></li>
		{/foreach}
	</ul>
</div>
{else}
<div class="widget widget_{$module.FileName}">
  {if (!$module.IsHideTitle)&&($module.Name)}<h3>{$module.Name}</h3>{/if}
  {if $module.Type=='ul'}
  <ul>{$module.Content}</ul>
  {/if}
  {if $module.Type=='div'}
  <div class="widgetdiv">{$module.Content}</div>
  {/if}
</div>
{/if}