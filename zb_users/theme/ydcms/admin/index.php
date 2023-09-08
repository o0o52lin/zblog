<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydcms/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydcms_SubMenu(3);?>
</div>
<div id="divMain2">
<!--首页设置-->
	<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydcms' )->MoreimgpostID = $_POST[ 'MoreimgpostID' ];
		$zbp->Config( 'ydcms' )->MoreimgcateID = $_POST[ 'MoreimgcateID' ];
		$zbp->Config( 'ydcms' )->imgradio = $_POST[ 'imgradio' ];
		
		if(GetVars('slider')){//幻灯片
			$zbp->Config('ydcms')->slider = $_POST['slider'];
		}else{
			$zbp->Config('ydcms')->slider = '';
		}
		
		if(GetVars('Moreimg')){//开关
			$zbp->Config('ydcms')->Moreimg = $_POST['Moreimg'];
		}else{
			$zbp->Config('ydcms')->Moreimg = '';
		}
		$zbp->SaveConfig( 'ydcms' );
		$zbp->ShowHint( 'good' );
	}
	?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<!--///-->
			<h3>图文调用</h3>
			<!--///-->
			<div class="lbimport">
				<span>幻灯片</span>
				<input type="checkbox" name="slider" id="slider" value="true" <?php if($zbp->Config('ydcms')->slider) echo 'checked="checked"'?> />
				<i class="red">请到 幻灯片 项去设置图片！</i>
			</div>
			
			<div class="lbimport">
				<span>首页多图开启</span>
				<input type="checkbox" name="Moreimg" id="Moreimg" value="true" <?php if($zbp->Config('ydcms')->Moreimg) echo 'checked="checked"'?> />
				<i class="red">可关闭</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>多图调用</span>
				<div class="radio">
					<label class="imgtogglepost">
						<input type="radio" id="imgradio" name="imgradio" value="1" <?php if($zbp->Config('ydcms')->imgradio == '1') echo 'checked'?> />调用文章ID
					</label>
					<label class="imgtogglecate">
						<input type="radio" id="imgradio" name="imgradio" value="2" <?php if($zbp->Config('ydcms')->imgradio == '2') echo 'checked'?> />调用分类ID
					</label>
				</div>
				<i>单选项</i>
			</div>
			<!--///-->
			<div id="imgtogglepost" class="lbimport" <?php if($zbp->Config('ydcms')->imgradio == '2') echo 'style="display: none;"'?>>
				<span>图片文章ID</span>
				<input type="text" name="MoreimgpostID" id="MoreimgpostID" value="<?php echo $zbp->Config('ydcms')->MoreimgpostID;?>">
				<i class="red">图片文章ID，多ID英文小逗号隔开</i>
			</div>
			<!--///-->
			<div id="imgtogglecate" class="lbimport" <?php if($zbp->Config('ydcms')->imgradio == '1') echo 'style="display: none;"'?>>
				<span>调用多分类ID</span>
				<input type="text" name="MoreimgcateID" id="MoreimgcateID" value="<?php echo $zbp->Config('ydcms')->MoreimgcateID;?>">
				<i class="red">分类ID，多ID英文小逗号隔开</i>
			</div>
			
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
		
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydcms/admin/footer.php'; ?>