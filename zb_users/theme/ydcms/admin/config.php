<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydcms/admin/header.php';
?>
<!--主题配置开始-->
<div id="admin-header" class="SubMenu">
	<?php ydcms_SubMenu(1);?>
</div>
<div id="divMain2">
<!--基本设置-->
	<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydcms' )->logo = $_POST[ 'logo' ];//logo
		$zbp->Config( 'ydcms' )->minilogo = $_POST[ 'minilogo' ];//minilogo
		$zbp->Config( 'ydcms' )->wechat = $_POST[ 'wechat' ];//wechat
		$zbp->Config( 'ydcms' )->favicon = $_POST[ 'favicon' ];//favicon
		$zbp->Config( 'ydcms' )->loginbottom = $_POST[ 'loginbottom' ];//loginbottom
		$zbp->Config( 'ydcms' )->loginbottomtext = $_POST[ 'loginbottomtext' ];//loginbottom文字
		$zbp->Config( 'ydcms' )->icon_qq = $_POST[ 'icon_qq' ];//QQ
		$zbp->Config( 'ydcms' )->icon_wechat = $_POST[ 'icon_wechat' ];//微信
		$zbp->Config( 'ydcms' )->icon_weibo = $_POST[ 'icon_weibo' ];//微博
		
		$zbp->Config( 'ydcms' )->timestyle = $_POST['timestyle'];//time
		$zbp->Config( 'ydcms' )->headhtml = $_POST[ 'headhtml' ];//headhtml
		$zbp->Config( 'ydcms' )->goqrcodeimg = $_POST[ 'goqrcodeimg' ];//goqrcodeimg
		
		if(GetVars('head')){//开关
			$zbp->Config('ydcms')->head = $_POST['head'];
		}else{
			$zbp->Config('ydcms')->head = '';
		}

		if(GetVars('listinfo')){//listinfo
			$zbp->Config('ydcms')->listinfo = $_POST['listinfo'];
		}else{
			$zbp->Config('ydcms')->listinfo = '';
		}
		if(GetVars('listtag')){//listinfo
			$zbp->Config('ydcms')->listtag = $_POST['listtag'];
		}else{
			$zbp->Config('ydcms')->listtag = '';
		}
		if(GetVars('listmore')){//listinfo
			$zbp->Config('ydcms')->listmore = $_POST['listmore'];
		}else{
			$zbp->Config('ydcms')->listmore = '';
		}
		
		
		if(GetVars('login')){//开关
			$zbp->Config('ydcms')->login = $_POST['login'];
		}else{
			$zbp->Config('ydcms')->login = '';
		}
		//
		if(GetVars('topmenu')){//开关
			$zbp->Config('ydcms')->topmenu = $_POST['topmenu'];
		}else{
			$zbp->Config('ydcms')->topmenu = '';
		}
		//无限加载
		if(GetVars('wxjz')){//开关
			$zbp->Config('ydcms')->wxjz = $_POST['wxjz'];
		}else{
			$zbp->Config('ydcms')->wxjz = '';
		}
		//侧栏跟随
		if(GetVars('sidegs')){//开关
			$zbp->Config('ydcms')->sidegs = $_POST['sidegs'];
		}else{
			$zbp->Config('ydcms')->sidegs = '';
		}
		
		//返回顶部
		if(GetVars('gotop')){//gotop
			$zbp->Config('ydcms')->gotop = $_POST['gotop'];
		}else{
			$zbp->Config('ydcms')->gotop = '';
		}
		if(GetVars('goqrcode')){//goqrcode
			$zbp->Config('ydcms')->goqrcode = $_POST['goqrcode'];
		}else{
			$zbp->Config('ydcms')->goqrcode = '';
		}
		if(GetVars('gocomment')){//gocomment
			$zbp->Config('ydcms')->gocomment = $_POST['gocomment'];
		}else{
			$zbp->Config('ydcms')->gocomment = '';
		}
		
		if(GetVars('ydcms_clearSetting')){//清空配置
			$zbp->Config('ydcms')->ydcms_clearSetting = $_POST['ydcms_clearSetting'];
		}else{
			$zbp->Config('ydcms')->ydcms_clearSetting = '';
		}
		
		
		$zbp->SaveConfig( 'ydcms' );
		$zbp->ShowHint( 'good' );
	}
	?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<h3>图片上传</h3>
			<!--///-->
			<div class="lbimport">
				<span>头部传统LOGO上传</span>
				<input type="text" name="logo" id="logo" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydcms')->logo;?>">
				<i class="red">280x60px图片 - 头部传统样式时logo</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>头部精简LOGO上传</span>
				<input type="text" name="minilogo" id="minilogo" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydcms')->minilogo;?>">
				<i class="red">高度52px内 - 头部精简样式时logo<br><b>重点：</b>留空可以不显示logo，菜单自动左移</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>二维码</span>
				<input type="text" name="wechat" id="wechat" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydcms')->wechat;?>">
				<i>上传二维码，正方形最佳</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>favicon</span>
				<input type="text" name="favicon" id="favicon" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydcms')->favicon;?>">
			</div>
			
			<!--///-->
			<h3>传统样式头部右侧</h3>
			<div class="lbimport">
				<span>登陆/后台 是否显示</span>
				<input type="checkbox" name="login" id="login" value="true" <?php if($zbp->Config('ydcms')->login) echo 'checked="checked"'?> />
				<i>可关闭</i>
			</div>
			<div class="lbimport">
				<span>登陆下方</span>
				<div class="radios">
					<label id="loginbottom_text">
						<input type="radio" id="loginbottom" name="loginbottom" value="text" <?php if($zbp->Config('ydcms')->loginbottom == 'text') echo 'checked'?> /> 说明文字
					</label>
					<label id="loginbottom_icon">
						<input type="radio" id="loginbottom" name="loginbottom" value="icon" <?php if($zbp->Config('ydcms')->loginbottom == 'icon') echo 'checked'?> /> 联系图标
					</label>
				</div>
			</div>
			<div class="lbimport loginbottom_text" <?php if($zbp->Config('ydcms')->loginbottom == 'icon') echo 'style="display:none"'?>>
				<span>文字说明</span>
				<textarea name="loginbottomtext" type="text" id="loginbottomtext" rows="2"><?php echo $zbp->Config('ydcms')->loginbottomtext;?></textarea>
			</div>
			<div class="lbimport loginbottom_icon" <?php if($zbp->Config('ydcms')->loginbottom == 'text') echo 'style="display:none"'?>>
				<span>联系图标</span>
				<div class="sub">
					<span>QQ号</span><input type="text" name="icon_qq" id="icon_qq" value="<?php echo $zbp->Config('ydcms')->icon_qq;?>">
					<span>微信图片</span><input type="text" name="icon_wechat" id="icon_wechat" class="uplod_img" placeholder="点我！"  value="<?php echo $zbp->Config('ydcms')->icon_wechat;?>">
					<span>微博地址</span><input type="text" name="icon_weibo" id="icon_weibo" value="<?php echo $zbp->Config('ydcms')->icon_weibo;?>">
				</div>
			</div>
			<!--///-->
			<h3>侧栏设置</h3>
			<div class="lbimport">
				<span>侧栏跟随</span>
				<input type="checkbox" name="sidegs" id="sidegs" value="true" <?php if($zbp->Config('ydcms')->sidegs) echo 'checked="checked"'?> />
				<i>是否开启侧边栏下拉时跟随</i>
			</div>
			<!--///-->
			<h3>返回顶部</h3>
			<div class="lbimport">
				<span>是否开启</span>
				<input type="checkbox" name="gotop" id="gotop" value="true" <?php if($zbp->Config('ydcms')->gotop) echo 'checked="checked"'?> />
				<i>可关闭模板自带，去使用返回顶部插件！</i>
			</div>
			<div class="lbimport">
				<span>二维码</span>
				<div class="sub">
					<span>开关二维码</span>
					<input type="checkbox" name="goqrcode" id="goqrcode" value="true" <?php if($zbp->Config('ydcms')->goqrcode) echo 'checked="checked"'?> /><br><br>
					<span>上传二维码</span>
					<input type="text" name="goqrcodeimg" id="goqrcodeimg" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydcms')->goqrcodeimg;?>">
				</div>
				<i>可以关闭掉二维码功能</i>
			</div>
			<div class="lbimport">
				<span>评论快捷</span>
				<input type="checkbox" name="gocomment" id="gocomment" value="true" <?php if($zbp->Config('ydcms')->gocomment) echo 'checked="checked"'?> />
				<i>返回顶部文章页的第三个快捷回复</i>
			</div>
			
			
			
			
			<!--///-->
			<h3>时间格式</h3>
			<div class="lbimport">
				<span>所有文章时间格式</span>
				<div class="radios">
					<label>
						<input type="radio" id="timestyle" name="timestyle" value="1" <?php if($zbp->Config('ydcms')->timestyle == '1') echo 'checked'?> />传统格式
					</label>
					<label>
						<input type="radio" id="timestyle" name="timestyle" value="2" <?php if($zbp->Config('ydcms')->timestyle == '2') echo 'checked'?> />"多久前"格式
					</label>
				</div>
			</div>
			<!--///-->
			<h3>标题下信息</h3>
			<div class="lbimport">
				<span>文章列表时间等行</span>
				<input type="checkbox" name="listinfo" id="listinfo" value="true" <?php if($zbp->Config('ydcms')->listinfo) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>文章列表tag标签</span>
				<input type="checkbox" name="listtag" id="listtag" value="true" <?php if($zbp->Config('ydcms')->listtag) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>文章列表Read more</span>
				<input type="checkbox" name="listmore" id="listmore" value="true" <?php if($zbp->Config('ydcms')->listmore) echo 'checked="checked"'?> />
			</div>
			<!--///-->
			<h3>其它全局</h3>
			<div class="lbimport">
				<span>文章列表无限加载</span>
				<input type="checkbox" name="wxjz" id="wxjz" value="true" <?php if($zbp->Config('ydcms')->wxjz) echo 'checked="checked"'?> />
				<i>首页、分类页的文章列表下方执行无限加载，可开启/关闭</i>
			</div>
			<div class="lbimport">
				<span>导航跟随</span>
				<input type="checkbox" name="topmenu" id="topmenu" value="true" <?php if($zbp->Config('ydcms')->topmenu) echo 'checked="checked"'?> />
			</div>
			<!--///-->
			<h3>Head</h3>
			<div class="lbimport">
				<span>Head加入代码</span>
				<input type="checkbox" name="head" id="head" value="true" <?php if($zbp->Config('ydcms')->head) echo 'checked="checked"'?> />
				<i class="red">需要在head中加入代码的开启，慎重！</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>加入head的代码</span>
				<textarea name="headhtml" type="text" id="headhtml" rows="6"><?php echo $zbp->Config('ydcms')->headhtml;?></textarea>
			</div>
			<!--///-->
			
			<div class="lbimport">
				<span>清空主题配置内设置</span>
				<input type="checkbox" name="ydcms_clearSetting" id="ydcms_clearSetting" value="true" <?php if($zbp->Config('ydcms')->ydcms_clearSetting) echo 'checked="checked"'?> />
				<i class="red">不要选！不到万不得已不要选这里，否则，切换其它主题后，当前主题的配置将恢复初始状态！不开玩笑的！</i>
			</div>
			<!--///-->

			<input name="" type="Submit" class="button" value="保存"/>
		</div>
	</form>
	<!---->
</div>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/plugin/UEditor/ueditor.config.php"></script>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/plugin/UEditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/ydcms/admin/js/lib.upload.js"></script>
<?php require $blogpath . 'zb_users/theme/ydcms/admin/footer.php'; ?>