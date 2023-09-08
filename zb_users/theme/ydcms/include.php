<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/Add_Filter_Plugin.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/Common.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/RegBuildModule.php';

RegisterPlugin("ydcms","ActivePlugin_ydcms");
function ActivePlugin_ydcms(){
	global $zbp;
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','ydcms_AddMenu');//主题配置选项
	Add_Filter_Plugin('Filter_Plugin_Zbp_BuildModule','ydcms_rebuild_Main');//重新加载边栏
	if ($zbp->Config('ydcms')->seo=="true"){
	Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','ydcms_cate_seo');//分类自定义字段
	Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','ydcms_tag_seo');//tag自定义字段
	}
	//Add_Filter_Plugin('Filter_Plugin_Edit_Response3','ydcms_article_postimg');
	//Add_Filter_Plugin('Filter_Plugin_Edit_Response3','ydcms_post_onoff');//部分开关
	Add_Filter_Plugin('Filter_Plugin_ViewList_Template','ydcms_tags_set');//hdp
	//Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','ydcms_ViewPost_Content');//延迟
}

function ydcms_AddMenu(&$m){
	global $zbp;
	array_unshift($m, MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/$zbp->theme/admin/relevant.php","","topmenu_ydcms"));
}

function ydcms_SubMenu($id){
	$arySubMenu = array(		
		0 => array('主题说明', 'relevant', 'left', false),
	    1 => array('基本设置', 'config', 'left', false),
		3 => array('首页设置', 'index', 'left', false),
		//8 => array('分类页', 'category', 'left', false),
		4 => array('文章页', 'article', 'left', false),
		6 => array('头部+导航', 'nav', 'left', false),
		7 => array('幻灯片', 'slide', 'left', false),
		2 => array('SEO', 'seo', 'left', false),
		//9 => array('特有', 'special', 'left', false),
		11 => array('主题配色', 'color', 'left', false),
		10 => array('页脚', 'foot', 'left', false),
		//5 => array('广告', 'ad', 'left', false),
		
		
	);
	foreach($arySubMenu as $k => $v){
		echo '<a href="'.$v[1].'.php" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$k?'m-now':'').'">'.$v[0].'</span></a>';
	}
}

function InstallPlugin_ydcms(){
	global $zbp;
	if(!$zbp->Config('ydcms')->HasKey('Version')){
		$zbp->Config('ydcms')->Version = '1.0';
		$zbp->Config('ydcms')->timestyle = '1';
		$zbp->Config('ydcms')->topmenu = 'true';
		$zbp->Config('ydcms')->wxjz = 'true';
		$zbp->Config('ydcms')->sharehtml = '第三方分享代码';
		// $zbp->Config('ydcms')->share = 'true';
		$zbp->Config('ydcms')->post_mate = 'true';
		$zbp->Config('ydcms')->post_related = 'true';
		$zbp->Config('ydcms')->imgradio = '1';
		$zbp->Config('ydcms')->MoreimgpostID = '1,2,3';
		$zbp->Config('ydcms')->MoreimgcateID = '3,2,1';
		$zbp->Config('ydcms')->bordertop = 'true';
		$zbp->Config('ydcms')->navbar = 'true';
		// $zbp->Config('ydcms')->seo = 'true';
		$zbp->Config('ydcms')->loginbottom = 'icon';
		$zbp->Config('ydcms')->loginbottomtext = 'zblogPHP主题<br>承接zblogPHP模板修改、仿站、定制';
		
		$zbp->Config( 'ydcms' )->headstyle = '1';
		$zbp->Config('ydcms')->navhtml = '<li id="nvabar-item-index"><a href="http://www.52fb.cn/">首页</a></li>
<li id="navbar-category-16"><a href="http://www.52fb.cn/zblogzhizuo/">zblog模板制作</a></li>
<li id="navbar-category-17"><a href="http://www.52fb.cn/zblogphp/">zblogphp主题模板</a></li>
<li id="navbar-category-18"><a href="http://www.52fb.cn/zblogfree/">zblog免费模板</a></li>
<li id="navbar-category-28"><a href="http://www.52fb.cn/qianduan/">前端技术</a></li>';
		$zbp->Config('ydcms')->footbig = 'true';
		$zbp->Config('ydcms')->flbox1 = '<h4>产品</h4>
<a href="#">云存储a</a>
<a href="#">CDN</a>
<a href="#">云处理</a>
<a href="#">直播云</a>
<a href="#">点播云</a>';
		$zbp->Config('ydcms')->flbox2 = '<h4>支持</h4>
<a href="#">新手入门</a>
<a href="#">常见问题</a>
<a href="#">产品文档</a>
<a href="#">API文档</a>
<a href="#">服务条款</a>';
		$zbp->Config('ydcms')->flbox3 = '<h4>活动</h4>
<a href="#">买一送一</a>
<a href="#">联盟行动</a>
<a href="#">Open开放</a>';
		$zbp->Config('ydcms')->flbox4 = '<h4>关于</h4>
<a href="#">公司简介</a>
<a href="#">加入我们</a>
<a href="#">联系我们</a>
<a href="#">合作伙伴</a>
<a href="#">媒体报道</a>';
		$zbp->Config('ydcms')->frbox1 = '<h4>售前</h4>
QQ：1000000<br>
Tel：0371-1000000<br>
Email：10000@qq.com';
		$zbp->Config('ydcms')->frbox2 = '<h4>售后</h4>
点击在线咨询<br>
Tel：0371-100000000<br>
Email：100001@qq.com';
		$zbp->Config('ydcms')->ficon = 'true';
		$zbp->Config('ydcms')->foothtmls = '<a href="#" target="_blank">菜单</a>
<a href="#" target="_blank">菜单</a>';
		$zbp->Config('ydcms')->footblog = 'Theme By <a href="https://www.52fb.cn/" target="_blank">FB编程</a>';
		// $zbp->Config('ydcms')->coloroff = 'true';
		$zbp->Config('ydcms')->color = '#0073c6';
		$zbp->Config('ydcms')->color2 = '#e84807';
		$zbp->Config('ydcms')->color3 = '#eee';
		$zbp->Config('ydcms')->color4 = '#555';
		$zbp->Config('ydcms')->ydcms_clearSetting ='';//清配置
		$zbp->SaveConfig('ydcms');
	}
	if(!$zbp->Config('ydcms')->Haskey("footblog")){
    	$zbp->Config('ydcms')->footblog ='Theme By <a href="https://www.52fb.cn/" target="_blank">FB编程</a>';
    	$zbp->SaveConfig('ydcms');
    }
    if(!$zbp->Config('ydcms')->Haskey("foothtmls")){
    	$zbp->Config('ydcms')->foothtmls = '<a href="#" target="_blank">菜单</a>
<a href="#" target="_blank">菜单</a>';
		$zbp->SaveConfig('ydcms');
    }
}

    
    
    

//升级时执行=============
function UpdatePlugin_ydcms()
{
    global $zbp;
    //升级加入
    if(!$zbp->Config('ydcms')->Haskey("footblog")){
    	$zbp->Config('ydcms')->footblog ='Theme By <a href="https://www.52fb.cn/" target="_blank">FB编程</a>';
    	$zbp->SaveConfig('ydcms');
    }
}
//旧版升级兼容
function ydcms_Updated()
{
    UpdatePlugin_ydcms();
}

function UninstallPlugin_ydcms(){
	global $zbp;
	//清空主题配置
	if ($zbp->Config('ydcms')->ydcms_clearSetting){
		$zbp->DelConfig('ydcms');		
	}
	$zbp->SetHint('good','OK');
}


?>