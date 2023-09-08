<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydcms/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydcms_SubMenu(11);?>
</div>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/ydcms/admin/color/farbtastic.js"></script>
<link rel="stylesheet" href="<?php echo $bloghost?>zb_users/theme/ydcms/admin/color/farbtastic.css" type="text/css" />
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
    	$('#picker').farbtastic('#color');
		$('#picker2').farbtastic('#color2');
		$('#picker3').farbtastic('#color3');
		$('#picker4').farbtastic('#color4');
	});
</script>
<div id="divMain2">
<!--首页设置-->
	<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydcms' )->color = $_POST[ 'color' ];
		$zbp->Config( 'ydcms' )->color2 = $_POST[ 'color2' ];
		$zbp->Config( 'ydcms' )->color3 = $_POST[ 'color3' ];
		$zbp->Config( 'ydcms' )->color4 = $_POST[ 'color4' ];

		$ydcms_css = @file_get_contents($zbp->path.'zb_users/theme/ydcms/style/style.css');
		$ydcms_css = str_replace("#0073c6", $zbp->Config('ydcms')->color, $ydcms_css);
		$ydcms_css = str_replace("#e84807", $zbp->Config('ydcms')->color2, $ydcms_css);
		$ydcms_css = str_replace("#eee", $zbp->Config('ydcms')->color3, $ydcms_css);
		$ydcms_css = str_replace("#555555", $zbp->Config('ydcms')->color4, $ydcms_css);
//		if($zbp->Config('ydcms')->searchright=='true'){
//		$ydcms_css .='';//自定义css
//		}
		@file_put_contents($zbp->path.'zb_users/theme/ydcms/style/style.ok.css', $ydcms_css);
		
		if(GetVars('coloroff')){//开关
			$zbp->Config('ydcms')->coloroff = $_POST['coloroff'];
		}else{
			$zbp->Config('ydcms')->coloroff = '';
		}
		$zbp->SaveConfig( 'ydcms' );
		$zbp->ShowHint( 'good' );
	}
	?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin" id="lbcolor">
			<!--///-->
			<h3>主题配色</h3>
			<div class="lbimport">
				<span>自定义配色需开启</span>
				<input type="checkbox" name="coloroff" id="coloroff" value="true" <?php if($zbp->Config('ydcms')->coloroff) echo 'checked="checked"'?> />
				<i class="red">自定义配色请开启，否则默认<br>如果修改CSS文件，请修zb_user/theme/ydcms/style/style.css</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>颜色1</span>
				<input type="text" name="color" id="color" value="<?php echo $zbp->Config('ydcms')->color;?>">
				<div id="picker"></div>
				<i>改变后保存，自行判断</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>颜色2</span>
				<input type="text" name="color2" id="color2" value="<?php echo $zbp->Config('ydcms')->color2;?>">
				<div id="picker2"></div>
				<i>改变后保存，自行判断</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>颜色3</span>
				<input type="text" name="color3" id="color3" value="<?php echo $zbp->Config('ydcms')->color3;?>">
				<div id="picker3"></div>
				<i>改变后保存，自行判断</i>
			</div>
			<div class="lbimport">
				<span>头部传统样式<br>菜单文字颜色</span>
				<input type="text" name="color4" id="color4" value="<?php echo $zbp->Config('ydcms')->color4;?>">
				<div id="picker4"></div>
				<i>注意，在使用传统样式头部时有效！</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
		
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydcms/admin/footer.php'; ?>