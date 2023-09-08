<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydcms/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydcms_SubMenu(10);?>
</div>
<div id="divMain2">
<!--菜单-->
<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydcms' )->flbox1 = $_POST[ 'flbox1' ];//flbox
		$zbp->Config( 'ydcms' )->flbox2 = $_POST[ 'flbox2' ];//flbox
		$zbp->Config( 'ydcms' )->flbox3 = $_POST[ 'flbox3' ];//flbox
		$zbp->Config( 'ydcms' )->flbox4 = $_POST[ 'flbox4' ];//flbox
		$zbp->Config( 'ydcms' )->frbox1 = $_POST[ 'frbox1' ];//frbox
		$zbp->Config( 'ydcms' )->frbox2 = $_POST[ 'frbox2' ];//frbox
		$zbp->Config( 'ydcms' )->foothtmls = $_POST[ 'foothtmls' ];//foothtml
		//大页脚开关
		if(GetVars('footbig')){//开关
			$zbp->Config('ydcms')->footbig = $_POST['footbig'];
		}else{
			$zbp->Config('ydcms')->footbig = '';
		}
		//图标开关
		if(GetVars('ficon')){//开关
			$zbp->Config('ydcms')->ficon = $_POST['ficon'];
		}else{
			$zbp->Config('ydcms')->ficon = '';
		}
		
		$zbp->SaveConfig( 'ydcms' );
		$zbp->ShowHint( 'good' );
	}
?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<h3>页脚设置</h3>
			<div class="lbimport">
				<span>大页脚</span>
				<input type="checkbox" name="footbig" id="footbig" value="true" <?php if($zbp->Config('ydcms')->footbig) echo 'checked="checked"'?> />
			</div>
			<!--////-->
			<div class="lbimport">
				<span>大页脚左侧</span>
				<div class="sub">
					<textarea type="text" name="flbox1" id="flbox1" rows="6"><?php echo $zbp->Config('ydcms')->flbox1;?></textarea>
					<textarea type="text" name="flbox2" id="flbox2" rows="6"><?php echo $zbp->Config('ydcms')->flbox2;?></textarea>
					<textarea type="text" name="flbox3" id="flbox3" rows="6"><?php echo $zbp->Config('ydcms')->flbox3;?></textarea>
					<textarea type="text" name="flbox4" id="flbox4" rows="6"><?php echo $zbp->Config('ydcms')->flbox4;?></textarea>
				</div>
				<i>按既有格式书写</i>
			</div>
			<!--////-->
			<div class="lbimport">
				<span>大页脚右侧</span>
				<div class="sub">
					<textarea type="text" name="frbox1" id="frbox1" rows="4"><?php echo $zbp->Config('ydcms')->frbox1;?></textarea>
					<textarea type="text" name="frbox2" id="frbox2" rows="4"><?php echo $zbp->Config('ydcms')->frbox2;?></textarea>
				</div>
				<i>按既有格式书写</i>
			</div>
			<div class="lbimport">
				<span>图标联系方式</span>
				<input type="checkbox" name="ficon" id="ficon" value="true" <?php if($zbp->Config('ydcms')->ficon) echo 'checked="checked"'?> />
				<i class="red">具体请到：基本设置 - 页头右侧 - 联系图标中设置</i>
			</div>
			<!--////-->
			<div class="lbimport">
				<span>页脚最底右侧自定义菜单</span>
				<textarea name="foothtmls" type="text" id="foothtmls" rows="6"><?php echo $zbp->Config('ydcms')->foothtmls;?></textarea>
				<i>按既有格式修改</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydcms/admin/footer.php'; ?>