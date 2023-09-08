
<?php if ($type=='article') { ?>
<title><?php  echo $title;  ?> - <?php  echo $name;  ?></title>
<?php 
$aryTags = array();
foreach($article->Tags as $key){$aryTags[] = $key->Name;}
if(count($aryTags)>0){$keywords = implode(',',$aryTags);} else {$keywords = $zbp->name;}
$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...';
 ?>
<meta name="keywords" content="<?php  echo $keywords;  ?>" />
<meta name="description" content="<?php  echo $description;  ?>" />
<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>" />
<?php if ($article->Prev) { ?><link rel='prev' title='<?php  echo $article->Prev->Title;  ?>' href='<?php  echo $article->Prev->Url;  ?>'/><?php } ?>
<?php if ($article->Next) { ?><link rel='next' title='<?php  echo $article->Next->Title;  ?>' href='<?php  echo $article->Next->Url;  ?>'/><?php } ?>
<link rel="canonical" href="<?php  echo $article->Url;  ?>"/>
<link rel='shortlink' href='<?php  echo $article->Url;  ?>'/>
<?php }elseif($type=='page') {  ?>
<title><?php  echo $title;  ?> - <?php  echo $name;  ?></title>
<meta name="keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>" />
<?php 
$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...';
 ?>
<meta name="description" content="<?php  echo $description;  ?>" />
<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>" />
<?php }elseif($type=='index') {  ?>
<title><?php if ($zbp->Config('ydcms')->hometitle&&$page=='1') { ?><?php  echo $zbp->Config('ydcms')->hometitle;  ?><?php }else{  ?><?php  echo $name;  ?><?php if ($page>'1') { ?>_第<?php  echo $pagebar->PageNow;  ?>页<?php } ?>_<?php  echo $subname;  ?><?php } ?></title>
<?php if ($zbp->Config('ydcms')->homekeywords) { ?><meta name="Keywords" content="<?php  echo $zbp->Config('ydcms')->homekeywords;  ?>" /><?php } ?>
<?php if ($zbp->Config('ydcms')->homedescription) { ?><meta name="description" content="<?php  echo $zbp->Config('ydcms')->homedescription;  ?>" /><?php } ?>
<meta name="author" content="<?php  echo $zbp->members[1]->StaticName;  ?>" />
<?php }elseif($type=='tag') {  ?>
<title><?php if ($tag->Metas->ydcms_tagtitle) { ?><?php  echo $tag->Metas->ydcms_tagtitle;  ?><?php if ($page>'1') { ?>_第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php }else{  ?><?php  echo $tag->Name;  ?> - <?php  echo $name;  ?><?php if ($page>'1') { ?>_第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php } ?></title>
<meta name="Keywords" content="<?php if ($tag->Metas->ydcms_tagkeywords) { ?><?php  echo $tag->Metas->ydcms_tagkeywords;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?>">
<?php if ($tag->Intro || $tag->Metas->ydcms_tagdescription) { ?><meta name="description" content="<?php if ($tag->Metas->ydcms_tagdescription) { ?><?php  echo $tag->Metas->ydcms_tagdescription;  ?><?php }else{  ?><?php  echo $tag->Intro;  ?><?php } ?>"><?php } ?>
<?php }elseif($type=='category') {  ?>
<title><?php if ($category->Metas->ydcms_catetitle) { ?><?php  echo $category->Metas->ydcms_catetitle;  ?><?php if ($page>'1') { ?>_第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php }else{  ?><?php  echo $title;  ?> - <?php  echo $name;  ?><?php } ?></title>
<meta name="Keywords" content="<?php if ($category->Metas->ydcms_catekeywords) { ?><?php  echo $category->Metas->ydcms_catekeywords;  ?><?php }else{  ?><?php  echo $title;  ?>,<?php  echo $name;  ?><?php } ?>" />
<meta name="description" content="<?php if ($category->Metas->ydcms_catedescription) { ?><?php  echo $category->Metas->ydcms_catedescription;  ?><?php }else{  ?><?php  echo $title;  ?>_<?php  echo $name;  ?><?php } ?>" />
<?php }else{  ?>
<title><?php  echo $title;  ?> - <?php  echo $name;  ?></title>
<meta name="Keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>" />
<meta name="description" content="<?php  echo $title;  ?>_<?php  echo $name;  ?><?php if ($page>'1') { ?>_当前是第<?php  echo $pagebar->PageNow;  ?>页<?php } ?>" />
<?php } ?>