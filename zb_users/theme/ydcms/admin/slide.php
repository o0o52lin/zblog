<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydcms/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydcms_SubMenu(7);?>
</div>
<div id="divMain2">
<!---->
<?php
if ($_POST && isset($_POST)) {
	if ($_GET && isset($_GET['type'])) {
		if ($_GET['type'] == 'add') {
			if($zbp->Config('ydcms')->HasKey('homeSliderArray'))
			{
				$homeSliderArray = json_decode($zbp->Config('ydcms')->homeSliderArray,true);
			}
			$homeSliderArray[] = $_POST;
			foreach ($homeSliderArray as $key => $row) {
			    $order[$key] = $row['order'];
			    $title[$key]  = $row['title'];
			}
			array_multisort($order, SORT_ASC, $title, SORT_DESC, $homeSliderArray);
			$zbp->Config('ydcms')->homeSliderArray = json_encode($homeSliderArray);
			$zbp->SaveConfig('ydcms');
			Redirect('slide.php'); //添加后回到这里，避免刷新出现新增
		} elseif ($_GET['type'] == 'edit') {
			$homeSliderArray = json_decode($zbp->Config('ydcms')->homeSliderArray,true);
			$editid = $_POST['editid'];
			unset($_POST['editid']);
			$homeSliderArray[$editid] =$_POST;
			foreach ($homeSliderArray as $key => $row) {
			    $order[$key] = $row['order'];
			    $title[$key]  = $row['title'];
			}
			array_multisort($order, SORT_ASC, $title, SORT_DESC, $homeSliderArray);
			$zbp->Config('ydcms')->homeSliderArray = json_encode($homeSliderArray);
			$zbp->SaveConfig('ydcms');
			Redirect('slide.php'); //添加后回到这里，避免刷新出现新增
		}
	}
} elseif ($_GET && isset($_GET)) {
	if ($_GET['type'] == 'del') {
		$homeSliderArray = json_decode($zbp->Config('ydcms')->homeSliderArray,true);
		$editid = $_GET['id'];
		unset($homeSliderArray[$editid]);
		$zbp->Config('ydcms')->homeSliderArray = json_encode($homeSliderArray);
		$zbp->SaveConfig('ydcms');
		Redirect('slide.php'); //添加后回到这里，避免刷新出现新增
	}
}
if($zbp->Config('ydcms')->HasKey('homeSliderArray')){
	$homeSliderArray = json_decode($zbp->Config('ydcms')->homeSliderArray,true);
}else{
	$homeSliderArray = array();
}
?>
<!---->
	<div class="remind">幻灯片设置页面不要刷新，切记！</div>
	<div class="adminslide">
		<ul>
			<form action="?type=add" method="post">
			<li>
				<label for="title"><span>幻灯片标题：</span><input type="text" name="title" id="" value="" ></label>
				<label for="url"><span>幻灯片网址：</span><input type="text" name="url" id="" value="" ></label>
				<label for="img"><span>点击传图片：</span><input type="text" name="img" id="" placeholder="点我！点我！！" class="uplod_img" value="" ></label>
				<label for="order"><span>此幻灯排序：</span><input type="text" name="order" id="" value="" class="order"></label>
				<input type="submit" class="submit" value="OK 添加！">
			</li>
			</form>
			<!--//-->
<?php
foreach ($homeSliderArray as $key => $value) {
echo <<<eof
			<form action="?type=edit" method="post">
			<li>
				<label><span>序号：{$key}</span></label>
				<input type="hidden" name="editid" value="{$key}">
				<label><span>幻灯片标题：</span><input type="text" name="title" value="{$value['title']}" ></label>
				<label><span>幻灯片网址：</span><input type="text" name="url" value="{$value['url']}" ></label>
				<label><span>点击传图片：</span><input type="text" name="img" placeholder="点我！点我！！" class="uplod_img" value="{$value['img']}" ></label>
				<label><span>此幻灯排序：</span><input type="text" name="order" value="{$value['order']}" class="order"></label>
				<input type="submit" class="button revise" value="修改"/>
				<input type="button" class="button delete" value="删除" onclick="if(confirm('您确定要进行删除操作吗？')){location.href='?type=del&id={$key}'}"/>
				<div class="img"><img src="{$value['img']}" alt="{$value['title']}"></div>
			</li>
			</form>
eof;
}
?>
			<!--//-->
		</ul>
	</div>
<!---->
</div>

<script type="text/javascript" src="<?php echo $bloghost?>zb_users/plugin/UEditor/ueditor.config.php"></script>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/plugin/UEditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/<?php echo $zbp->theme;?>/admin/js/lib.upload.js"></script>
<script language="javascript">
//禁止用F5键
function document.onkeydown()
{   
 if ( event.keyCode==116)
  {   
    event.keyCode = 0;
    event.cancelBubble = true;
    return false;
  }
}
//禁止右键弹出菜单 
function document.oncontextmenu()
{   
   return false;   
}
//下面代码实现全屏显示 
function window.onload(){ 
   var Request = new Array();//保存参数 
   var s = location.search.substring(1); 
   if (s && s!=""){ 
    var list = s.split("&");
    for (var i=0; i < list.length; i++){
    var pair = list[i].split("=");
    if (pair[0] && pair[0] !=""){
    Request[unescape(pair[0])] = unescape(pair[1]);
    }
    }
   }
   var fullscreen=Request["fullscreen"];
   if(fullscreen!="yes"){
    var file =self.location;
    var a = window.open("about:blank","","fullscreen=yes");
    self.opener=null;
    self.close();
    a.location=file + "?fullscreen=yes";
   }
}
</script>
<script language="Javascript"><!--
//屏蔽鼠标右键、Ctrl+N、Shift+F10、F11、F5刷新、退格键  
//Author: meizz(梅花雨) 2002-6-18  
function document.oncontextmenu(){event.returnValue=false;}
//屏蔽鼠标右键
function window.onhelp(){return false}
//屏蔽F1帮助  
function document.onkeydown()  
{  
if ((window.event.altKey)&&  
((window.event.keyCode==37)|| //屏蔽 Alt+ 方向键 ←  
(window.event.keyCode==39))) //屏蔽 Alt+ 方向键 →  
{  
alert("不准你使用ALT+方向键前进或后退网页！");  
event.returnValue=false;  
}  
/* 注：这还不是真正地屏蔽 Alt+ 方向键， 
因为 Alt+ 方向键弹出警告框时，按住 Alt 键不放， 
用鼠标点掉警告框，这种屏蔽方法就失效了。以后若 
有哪位高手有真正屏蔽 Alt 键的方法，请告知。*/ 
if ((event.keyCode==8) || //屏蔽退格删除键  
(event.keyCode==116)|| //屏蔽 F5 刷新键  
(event.ctrlKey && event.keyCode==82)){ //Ctrl + R  
event.keyCode=0;  
event.returnValue=false;  
}  
if (event.keyCode==122){event.keyCode=0;event.returnValue=false;}
//屏蔽F11  
if (event.ctrlKey && event.keyCode==78) event.returnValue=false; 
//屏蔽 Ctrl+n  
if (event.shiftKey && event.keyCode==121)event.returnValue=false;
//屏蔽 shift+F10  
if (window.event.srcElement.tagName == "A" && window.event.shiftKey)  
window.event.returnValue = false; 
//屏蔽 shift 加鼠标左键新开一网页  
if ((window.event.altKey)&&(window.event.keyCode==115)) 
//屏蔽Alt+F4  
{  
window.showModelessDialog("about:blank","","dialogWidth:1px;dialogheight:1px");  
return false;  
}  
}  
</script>

<?php require $blogpath . 'zb_users/theme/ydcms/admin/footer.php'; ?>