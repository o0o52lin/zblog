<?php echo'404';die();?>
{if $type=='article'}
<title>{$title} - {$name}</title>
{php}
$aryTags = array();
foreach($article->Tags as $key){$aryTags[] = $key->Name;}
if(count($aryTags)>0){$keywords = implode(',',$aryTags);} else {$keywords = $zbp->name;}
$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...';
{/php}
<meta name="keywords" content="{$keywords}" />
<meta name="description" content="{$description}" />
<meta name="author" content="{$article.Author.StaticName}" />
{if $article.Prev}<link rel='prev' title='{$article.Prev.Title}' href='{$article.Prev.Url}'/>{/if}
{if $article.Next}<link rel='next' title='{$article.Next.Title}' href='{$article.Next.Url}'/>{/if}
<link rel="canonical" href="{$article.Url}"/>
<link rel='shortlink' href='{$article.Url}'/>
{elseif $type=='page'}
<title>{$title} - {$name}</title>
<meta name="keywords" content="{$title},{$name}" />
{php}
$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...';
{/php}
<meta name="description" content="{$description}" />
<meta name="author" content="{$article.Author.StaticName}" />
{elseif $type=='index'}
<title>{if $zbp->Config('ydcms')->hometitle&&$page=='1'}{$zbp->Config('ydcms')->hometitle}{else}{$name}{if $page>'1'}_第{$pagebar.PageNow}页{/if}_{$subname}{/if}</title>
{if $zbp->Config('ydcms')->homekeywords}<meta name="Keywords" content="{$zbp->Config('ydcms')->homekeywords}" />{/if}
{if $zbp->Config('ydcms')->homedescription}<meta name="description" content="{$zbp->Config('ydcms')->homedescription}" />{/if}
<meta name="author" content="{$zbp.members[1].StaticName}" />
{elseif $type=='tag'}
<title>{if $tag->Metas->ydcms_tagtitle}{$tag.Metas.ydcms_tagtitle}{if $page>'1'}_第{$pagebar.PageNow}页{/if}{else}{$tag.Name} - {$name}{if $page>'1'}_第{$pagebar.PageNow}页{/if}{/if}</title>
<meta name="Keywords" content="{if $tag->Metas->ydcms_tagkeywords}{$tag.Metas.ydcms_tagkeywords}{else}{$tag.Name}{/if}">
{if $tag.Intro || $tag->Metas->ydcms_tagdescription}<meta name="description" content="{if $tag->Metas->ydcms_tagdescription}{$tag.Metas.ydcms_tagdescription}{else}{$tag.Intro}{/if}">{/if}
{elseif $type=='category'}
<title>{if $category->Metas->ydcms_catetitle}{$category->Metas->ydcms_catetitle}{if $page>'1'}_第{$pagebar.PageNow}页{/if}{else}{$title} - {$name}{/if}</title>
<meta name="Keywords" content="{if $category->Metas->ydcms_catekeywords}{$category.Metas.ydcms_catekeywords}{else}{$title},{$name}{/if}" />
<meta name="description" content="{if $category->Metas->ydcms_catedescription}{$category.Metas.ydcms_catedescription}{else}{$title}_{$name}{/if}" />
{else}
<title>{$title} - {$name}</title>
<meta name="Keywords" content="{$title},{$name}" />
<meta name="description" content="{$title}_{$name}{if $page>'1'}_当前是第{$pagebar.PageNow}页{/if}" />
{/if}