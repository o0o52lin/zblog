
<?php if ($type!=='index') { ?>
<div class="breadcrumb">
<a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>">首页</a>
<?php if ($type=='category'||$type=='article') { ?>
<?php 
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
 ?><?php if ($type=='article') { ?><i class="fa fa-angle-right"></i>正文<?php } ?>
<?php }elseif($type=='page') {  ?><i class="fa fa-angle-right"></i>正文
<?php }else{  ?>
 <i class="fa fa-angle-right"></i><?php  echo $title;  ?>
<?php } ?>
<?php if ($user->ID>0) { ?><span><?php if ($type=='category') { ?><a href="<?php  echo $host;  ?>zb_system/admin/category_edit.php?act=CategoryEdt&id=<?php  echo $category->ID;  ?>" target="_blank"><i class="fa fa-pencil-square-o"></i>编辑</a>
<?php }elseif($type=='article') {  ?><a href="<?php  echo $host;  ?>zb_system/admin/edit.php?act=ArticleEdt&id=<?php  echo $article->ID;  ?>" target="_blank"><i class="fa fa-pencil-square-o"></i>编辑</a><?php }elseif($type=='page') {  ?><a href="<?php  echo $host;  ?>zb_system/admin/edit.php?act=PageEdt&id=<?php  echo $article->ID;  ?>" target="_blank"><i class="fa fa-pencil-square-o"></i>编辑</a>
<?php }elseif($type=='tag') {  ?><a href="<?php  echo $host;  ?>zb_system/admin/tag_edit.php?act=TagEdt&id=<?php  echo $tag->ID;  ?>" target="_blank"><i class="fa fa-pencil-square-o"></i>编辑</a>
<?php }else{  ?><?php } ?></span><?php } ?>
</div>
<?php } ?>