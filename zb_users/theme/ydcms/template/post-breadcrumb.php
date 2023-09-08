<?php echo'404';die();?>
{if $type!=='index'}
<div class="breadcrumb">
<a href="{$host}" title="{$name}">首页</a>
{if $type=='category'||$type=='article'}
{php}
$html='';
function navcate($id){
        global $html;
        $cate = new Category;
        $cate->LoadInfoByID($id);
        $html ='<i class="fa fa-angle-right"></i><a href="' .$cate->Url.'" title="' .$cate->Name. '">' .$cate->Name. '</a>'.$html;
        if(($cate->ParentID)>0){navcate($cate->ParentID);}
}
if($type=='category'){navcate($category->ID);}else{navcate($article->Category->ID);}
global $html;
echo $html;
{/php}{if $type=='article'}<i class="fa fa-angle-right"></i>正文{/if}
{elseif $type=='page'}<i class="fa fa-angle-right"></i>正文
{else}
 <i class="fa fa-angle-right"></i>{$title}
{/if}
{if $user.ID>0}<span>{if $type=='category'}<a href="{$host}zb_system/admin/category_edit.php?act=CategoryEdt&id={$category.ID}" target="_blank"><i class="fa fa-pencil-square-o"></i>编辑</a>
{elseif $type=='article'}<a href="{$host}zb_system/admin/edit.php?act=ArticleEdt&id={$article.ID}" target="_blank"><i class="fa fa-pencil-square-o"></i>编辑</a>{elseif $type=='page'}<a href="{$host}zb_system/admin/edit.php?act=PageEdt&id={$article.ID}" target="_blank"><i class="fa fa-pencil-square-o"></i>编辑</a>
{elseif $type=='tag'}<a href="{$host}zb_system/admin/tag_edit.php?act=TagEdt&id={$tag.ID}" target="_blank"><i class="fa fa-pencil-square-o"></i>编辑</a>
{else}{/if}</span>{/if}
</div>
{/if}