<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydcms/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydcms_SubMenu(9);?>
</div>
<div id="divMain2">
<!--首页设置-->
	<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydcms' )->ysztext = $_POST[ 'ysztext' ];//演示站文字
		if(GetVars('yszoff')){//开关
			$zbp->Config('ydcms')->yszoff = $_POST['yszoff'];
		}else{
			$zbp->Config('ydcms')->yszoff = '';
		}
		
		$zbp->ShowHint( 'good' );
		$zbp->SaveConfig( 'ydcms' );
	}
	?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<!--///-->
			<h3>演示站</h3>
			<div class="lbimport">
				<span>图片是否带演示站链接</span>
				<input type="checkbox" name="yszoff" id="yszoff" value="true" <?php if($zbp->Config('ydcms')->yszoff) echo 'checked="checked"'?> />
				<i>图片列表上是否开启演示站，包括首页、相关文章等</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>“演示站”三个字修改</span>
				<input type="text" name="ysztext" id="ysztext" value="<?php echo $zbp->Config('ydcms')->ysztext ?>" />
				<i>可以修改为任意文字，三字最佳</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
		
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydcms/admin/footer.php'; ?>