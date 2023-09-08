<?php
//重新加载
function ydcms_rebuild_Main() {
	global $zbp;
	$zbp->RegBuildModule('comments','ydcms_side_comm');
	$zbp->RegBuildModule('tags','ydcms_hotTags');
		$zbp->RegBuildModule('catalog','ydcms_catalog');
}

function ydcms_hotTags(){
    global $zbp,$str;
    $str = '';
    $array = $zbp->GetTagList('','',array('tag_Count'=>'DESC'),array(25),'');
    foreach ($array as $key=>$tag) {
	$i = $key;
		$str .= '<li><a target="_blank" href="' .$tag->Url. '">' .$tag->Name. '</a></li>';
    }
    return $str;
}
function ydcms_side_comm() {
    global $zbp;
	
	$i = $zbp->modulesbyfilename['comments']->MaxLi;
	if ($i == 0) $i = 8;
	$comments = $zbp->GetCommentList('*', array(array('=', 'comm_RootID', 0)), array('comm_PostTime' => 'DESC'), $i, null);
	$s = '';
	foreach ($comments as $comment) {
		$randimg=rand(1,36);$randimg=$zbp->host."zb_users/theme/ydcms/include/avator/$randimg.jpg";
		if ($comment->Author->Email){
			$s .='<li>
				<a href="' . $comment->Post->Url .'#cmt' . $comment->ID .'" target="_black">
					<img src="'.$comment->Author->Avatar.'" alt="' .$comment->Author->StaticName. '">
					<p>评：' . TransferHTML($comment->Content, '[noenter]') . '</p>
					<span>'.$comment->Time().'</span>
				</a>
			</li>';
		}
		else{
			$s .='<li>
				<a href="' . $comment->Post->Url .'#cmt' . $comment->ID .'" target="_black">
					<img src="'.$randimg.'" alt="' .$comment->Author->StaticName. '">
					<p>评：' . TransferHTML($comment->Content, '[noenter]') . '</p>
					<span>'.$comment->Time().'</span>
				</a>
			</li>';
		}

	}

	return $s;
}
//顶部导航菜单下拉
function ydcms_catalog() {
	global $zbp;
	$s = '';
	if ($zbp->option['ZC_MODULE_CATALOG_STYLE'] == '2') {
		foreach ($zbp->categorysbyorder as $key => $value) {
			if ($value->Level == 0) {
				$s .= '<li id="navbar-category-'.$value->ID.'" class="submenu li-cate-'.$value->ID.'"><a href="' . $value->Url . '">' . $value->Name . '</a><!--' . $value->ID . 'begin--><!--' . $value->ID . 'end--></li>';
			}
		}
		foreach ($zbp->categorysbyorder as $key => $value) {
			if ($value->Level == 1) {
				$s = str_replace('<!--' . $value->ParentID . 'end-->', '<li id="navbar-category-'.$value->ID.'" class="li-subcate-'.$value->ID.'"><a href="' . $value->Url . '">' . $value->Name . '</a><!--' . $value->ID . 'begin--><!--' . $value->ID . 'end--></li><!--' . $value->ParentID . 'end-->', $s);
			}
		}
		foreach ($zbp->categorysbyorder as $key => $value){
			if($value->Level == 2) {
				$s = str_replace('<!--' . $value->ParentID . 'end-->', '<li id="navbar-category-'.$value->ID.'" class="li-subcate-'.$value->ID.'"><a href="' . $value->Url . '">' . $value->Name . '</a><!--' . $value->ID . 'begin--><!--' . $value->ID . 'end--></li><!--' . $value->ParentID . 'end-->', $s);
			}
		}foreach($zbp->categorysbyorder as $key => $value){
			if ($value->Level == 3) {
				$s = str_replace('<!--' . $value->ParentID . 'end-->', '<li id="navbar-category-'.$value->ID.'" class="li-subcate-'.$value->ID.'"><a href="' . $value->Url . '">' . $value->Name . '</a><!--' . $value->ID . 'begin--><!--' . $value->ID . 'end--></li><!--' . $value->ParentID . 'end-->', $s);
			}
		}foreach($zbp->categorysbyorder as $key => $value){
			$s = str_replace('<!--' . $value->ID . 'begin--><!--' . $value->ID . 'end-->', '', $s);
		}foreach($zbp->categorysbyorder as $key => $value){
			$s = str_replace('<!--' . $value->ID . 'begin-->', '<ul class="sub-menu">', $s);
			$s = str_replace('<!--' . $value->ID . 'end-->', '</ul>', $s);
		}
	}elseif($zbp->option['ZC_MODULE_CATALOG_STYLE'] == '1'){
		foreach ($zbp->categorysbyorder as $key => $value){
			$s .= '<li id="navbar-category-'.$value->ID.'">' . $value->Symbol . '<a href="' . $value->Url . '">' . $value->Name . '</a></li>';
		}
	}else{
		foreach ($zbp->categorysbyorder as $key => $value){
			$s .= '<li id="navbar-category-'.$value->ID.'"><a href="' . $value->Url . '">' . $value->Name . '</a></li>';
		}
	}
	return $s;
}


//
?>