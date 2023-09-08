<?php
//特色缩略图
function ydcms_article_postimg(){
global $zbp,$article;
	echo "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/theme/ydcms/admin/js/lib.upload.js\"></script>";
	echo '<b>特色图片(<font color="red">缩略图</font>)</b><br><input name="meta_postpic" id="edtTitle" type="text" class="uplod_img" style="width:50%;" placeholder="点我！" value="'.$article->Metas->postpic.'" /><br /><br />';
}
//分类SEO
function ydcms_cate_seo(){
    global $zbp,$cate;
	echo '<div id="alias" class="editmod">
       <span class="title">当前分类标题、关键词、描述<font color="#FF0000">(不填写则按主题默认显示,注：此功能为当前模板自带)</font></span><br />
       <strong>标题</strong><br>
       <input type="text" style="width:75%;" name="meta_ydcms_catetitle" value="'.htmlspecialchars($cate->Metas->ydcms_catetitle).'"/><br>
       <strong>关键词</strong><br>
       <input type="text" style="width:75%;" name="meta_ydcms_catekeywords" value="'.htmlspecialchars($cate->Metas->ydcms_catekeywords).'"/><br>
       <strong>描述</strong><br>
       <input type="text" style="width:75%;" name="meta_ydcms_catedescription" value="'.htmlspecialchars($cate->Metas->ydcms_catedescription).'"/>
       </div>';
}
//tag SEO
function ydcms_tag_seo(){
    global $zbp,$tag;
	echo '<div id="alias" class="editmod">
       <span class="title">当前TAG标题、关键词、描述<font color="#FF0000">(不填写则按主题默认显示,注：此功能为当前模板自带)</font></span><br />
       <strong>标题</strong><br>
       <input type="text" style="width:75%;" name="meta_ydcms_tagtitle" value="'.htmlspecialchars($tag->Metas->ydcms_tagtitle).'"/><br>
       <strong>关键词</strong><br>
       <input type="text" style="width:75%;" name="meta_ydcms_tagkeywords" value="'.htmlspecialchars($tag->Metas->ydcms_tagkeywords).'"/><br>
       <strong>描述</strong><br>
       <input type="text" style="width:75%;" name="meta_ydcms_tagdescription" value="'.htmlspecialchars($tag->Metas->ydcms_tagdescription).'"/>
       </div>';
}
//延迟下载
function ydcms_ViewPost_Content(&$template){
    global $zbp;
    $article = $template->GetTags('article');
    $pattern = "/<img(.*?)src=('|\")([^>]*).(bmp|gif|jpeg|jpg|png|swf)('|\")(.*?)>/i";
    $replacement = '<img class="lazy" src=$2$3.$4$5 data-original=$2$3.$4$5 />';
    $content = preg_replace($pattern, $replacement, $article->Content);
    $article->Content = $content;
    $template->SetTags('article', $article);
}
//开关
function ydcms_post_onoff(){
	global $zbp,$article;
	if($article->Type=="0"){
		echo '<div id="islock" class="editmod"><label for="meta_mateoff" class="editinputname">XX开关</label><br><input type="text" class="checkbox" name="meta_mateoff" id="edtAlias" value="'.htmlspecialchars($article->Metas->mateoff).'">   </div>';
	}
}
//幻灯片
function ydcms_tags_set(&$template){
	global $zbp,$blogversion;
	if($blogversion>=150101){
		$array = $zbp->configs['ydcms']->GetData();
	}else{
		$array = $zbp->configs['ydcms']->Data;
	}
	foreach ($array as $key=>$val){
			$template->SetTags($key,$val);
	}
}
//选择性调用
function ydcms_Edit_Response()
{
	global $zbp,$article;
	ydcms_CustomMeta_Response($article);
}
function ydcms_CustomMeta_Response(&$object){
	global $zbp;
	$array=array('lbMeta');
	$lbMeta_intro = '其他选项';
	if(is_array($array)==false)return null;
	if(count($array)==0)return null;
	foreach ($array as $key => $value) {
		if($key==0) {
			$single_meta_intro = $lbMeta_intro;
		}
		if(!$single_meta_intro)$single_meta_intro='Metas.' . $value;
		if ($value=='lbMeta') {
			$single_meta_option='特荐|头条|推荐|版图|版头|版推';
			$ar=explode('|',$single_meta_option);
			echo '<div style="padding:0 0 5px 0; margin:0 0 10px 0;"><laber  class="editinputname">'. $single_meta_intro .'</laber><br />';
			if(!is_array($object->Metas->$value))$object->Metas->$value=array();
			foreach ($ar as $r) {
				echo '<label><input name="meta_' . $value . '[]" value="'.htmlspecialchars($r).'" type="checkbox" '.(in_array($r,$object->Metas->$value)?' checked="checked"':'').'/> '.$r.'</label> ';
				if($r=="推荐" || $r=="版推"){
					echo "<br />";
				}
			}
			echo '<label onclick="$(&quot;:checkbox[name=\'meta_' . $value . '[]\']&quot;).removeProp(&quot;checked&quot;);$(&quot;:text[name=\'meta_' . $value . '\']&quot;).prop(&quot;disabled&quot;, false);"><input type="text" name="meta_' . $value . '" value="" disabled="disabled" style="display:none;"/>【全不选】<label>';
			echo '</div>';
		}
	}
}
?>