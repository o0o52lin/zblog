<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydcms/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydcms_SubMenu(2);?>
</div>
<div id="divMain2">
<!--首页设置-->
	<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydcms' )->hometitle = $_POST[ 'hometitle' ];
		$zbp->Config( 'ydcms' )->homekeywords = $_POST[ 'homekeywords' ];
		$zbp->Config( 'ydcms' )->homedescription = $_POST['homedescription'];
		if(GetVars('seo')){//开关
			$zbp->Config('ydcms')->seo = $_POST['seo'];
		}else{
			$zbp->Config('ydcms')->seo = '';
		}
		$zbp->SaveConfig( 'ydcms' );
		$zbp->ShowHint( 'good' );
	}
	?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<!--///-->
			<h3>SEO</h3>
			<div class="lbimport">
				<span>模板自带SEO(非插件)</span>
				<input type="checkbox" name="seo" id="seo" value="true" <?php if($zbp->Config('ydcms')->seo) echo 'checked="checked"'?> />
				<i class="red">使用了SEO插件，并且开启了标题优化，需关闭这里的模块自带SEO！<br>注：模板自带SEO数据只在当前模板有效！</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>首页标题</span>
				<input type="text" name="hometitle" id="hometitle" value="<?php echo $zbp->Config('ydcms')->hometitle;?>">
			</div>
			<!--///-->
			<div class="lbimport">
				<span>首页关键词</span>
				<input type="text" name="homekeywords" id="homekeywords" value="<?php echo $zbp->Config('ydcms')->homekeywords;?>">
			</div>
			<!--///-->
			<div class="lbimport">
				<span>首页描述</span>
				<textarea style="text" name="homedescription" id="homedescription" rows="4"><?php echo $zbp->Config('ydcms')->homedescription;?></textarea>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
		
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydcms/admin/footer.php'; ?>