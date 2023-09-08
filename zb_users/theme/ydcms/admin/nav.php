<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydcms/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydcms_SubMenu(6);?>
</div>
<div id="divMain2">
<!--菜单-->
<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydcms' )->navhtml = $_POST[ 'navhtml' ];
		$zbp->Config( 'ydcms' )->headstyle = $_POST[ 'headstyle' ];//头部样式
		
		
		if(GetVars('bordertop')){
			$zbp->Config('ydcms')->bordertop = $_POST['bordertop'];
		}else{
			$zbp->Config('ydcms')->bordertop = '';
		}
		
		//searchright
		if(GetVars('searchright')){
			$zbp->Config('ydcms')->searchright = $_POST['searchright'];
		}else{
			$zbp->Config('ydcms')->searchright = '';
		}
		
		
		if(GetVars('catalog')){
			$zbp->Config('ydcms')->catalog = $_POST['catalog'];
		}else{
			$zbp->Config('ydcms')->catalog = '';
		}
		if(GetVars('home')){
			$zbp->Config('ydcms')->home = $_POST['home'];
		}else{
			$zbp->Config('ydcms')->home = '';
		}
		if(GetVars('navbar')){
			$zbp->Config('ydcms')->navbar = $_POST['navbar'];
		}else{
			$zbp->Config('ydcms')->navbar = '';
		}
		if(GetVars('nav')){
			$zbp->Config('ydcms')->nav = $_POST['nav'];
		}else{
			$zbp->Config('ydcms')->nav = '';
		}
		$zbp->SaveConfig( 'ydcms' );
		$zbp->ShowHint( 'good' );
	}
?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<h3>网站头部样式选择</h3>
			
			<div class="lbimport">
				<span>头部样式选择</span>
				<div class="radio">
					<label>
						<input type="radio" id="headstyle" name="headstyle" value="1" <?php if($zbp->Config('ydcms')->headstyle == '1') echo 'checked'?> />传统样式
					</label>
					<label>
						<input type="radio" id="headstyle" name="headstyle" value="2" <?php if($zbp->Config('ydcms')->headstyle == '2') echo 'checked'?> />精简样式
					</label>
				</div>
			</div>
			<div class="lbimport">
				<span>传统样式顶部线条</span>
				<input type="checkbox" name="bordertop" id="bordertop" value="true" <?php if($zbp->Config('ydcms')->bordertop) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>传统样式搜索右移</span>
				<input type="checkbox" name="searchright" id="searchright" value="true" <?php if($zbp->Config('ydcms')->searchright) echo 'checked="checked"'?> />
			</div>
			<h3>菜单选择(可多选)</h3>
			<div class="lbimport">
				<span>首页</span>
				<input type="checkbox" name="home" id="home" value="true" <?php if($zbp->Config('ydcms')->home) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>下拉分类</span>
				<input type="checkbox" name="catalog" id="catalog" value="true" <?php if($zbp->Config('ydcms')->catalog) echo 'checked="checked"'?> />
				<i class="red">如果要开启下拉菜单，需要有子分类，且去设置：后台 - 模块管理 - 网站分类 - UL嵌套 - 保存</i>
			</div>
			<div class="lbimport">
				<span>导航栏</span>
				<input type="checkbox" name="navbar" id="navbar" value="true" <?php if($zbp->Config('ydcms')->navbar) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>使用DIY自定义</span>
				<input type="checkbox" name="nav" id="nav" value="true" <?php if($zbp->Config('ydcms')->nav) echo 'checked="checked"'?> />
				<i>导航菜单加入自定义代码，可单独或者配合使用，选择后请修改下方代码框内代码！</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>DIY导航菜单代码</span>
				<textarea name="navhtml" type="text"  id="navhtml" rows="12"><?php echo $zbp->Config('ydcms')->navhtml;?></textarea>
				<i>请按格式修改，不懂的话，就选择其它项，前台得到代码，复制粘贴过来自行修改</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydcms/admin/footer.php'; ?>