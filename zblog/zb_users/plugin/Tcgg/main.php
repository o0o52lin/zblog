<?php 
//by www.hnysnet.com  
require '../../../zb_system/function/c_system_base.php';      		  	 
require '../../../zb_system/function/c_system_admin.php';    	 	 			 
$zbp->Load();    			  	  
$action='root';      				  
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}    		    		
if (!$zbp->CheckPlugin('Tcgg')) {$zbp->ShowError(48);die();}     	 	  		
require $blogpath . 'zb_system/admin/admin_header.php';     		 	 	 
require $blogpath . 'zb_system/admin/admin_top.php';    	 	 	 		 		 	 	 	
?>
<style type="text/css">
p{color:#555555;}
strong { background-color: #3a6ea5; padding: 5px 10px; color: #ffffff; }
input{margin:0;line-height:30px;padding:0 5px;}
strong { background-color: #3a6ea5; padding: 5px 10px; color: #ffffff; }
b {padding: 0.5em 0 0.5em 0;
    line-height: 1.5em;}
td { padding:5px 10px; }
h3{margin:5px 0;}
.red{color:#ff0000;}
textarea{vertical-align: middle;}
option{color:#1d4c7d;}
input.button{ padding:0 18px;     height: 30px;}
</style>
<div id="divMain">
	  <div class="divHeader">弹窗设置</div>
  <div class="SubMenu">
	 <?php Tcgg_SubMenu(1);?> 
  <a target="_blank" href="https://www.go345.cn/"><span class="m-right">作者官网</span></a>
  </div>
  <div id="divMain2">	
		<?php
	if(count($_POST)>0){
    if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
		$zbp->Config('Tcgg')->ys = $_POST['ys'];
	    $zbp->Config('Tcgg')->putitle = $_POST['putitle']; 
	    $zbp->Config('Tcgg')->pucenter = $_POST['pucenter']; 
		$zbp->Config('Tcgg')->styles = $_POST['styles']; 
		$zbp->SaveConfig( 'Tcgg' );
	    $zbp->ShowHint( 'good' );
	}
?>
		<form id="form1" name="form1" method="post">
			  <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
			<table width="100%" style='padding:0px;margin:0px;' cellspacing='0' cellpadding='0' class="tableBorder">			
			<tr>
				<td><b>弹窗标题</b></td>
				<td><p><textarea name="putitle" type="text" cols="70"><?php echo $zbp->Config('Tcgg')->putitle;?></textarea></p>
             </td>
			</tr>
			<tr>
				<td><b>弹窗文字</b></td>
				<td><p><textarea name="pucenter" type="text" rows="10" cols="70"><?php echo $zbp->Config('Tcgg')->pucenter;?></textarea></p>            
             </td>
			</tr>
			<tr>
				<td><b>边框颜色</b></td>
				<td><p><input name="ys" type="text" value="<?php echo $zbp->Config('Tcgg')->ys;?>" /><a href="https://www.go345.cn/post/3037.html">二进制颜色表</a></p>
			     </td>
			</tr>
				 <tr>
				<td><b>弹窗周期</b></td>
				<td> <p><input type="radio" name="styles" value="1" <?php if($zbp->Config('Tcgg')->styles == '1') echo 'checked'?> />一天&nbsp;&nbsp;&nbsp;<input type="radio" name="styles" value="2" <?php if($zbp->Config('Tcgg')->styles == '2') echo 'checked'?> />三天&nbsp;&nbsp;&nbsp;<input type="radio" name="styles" value="3" <?php if($zbp->Config('Tcgg')->styles == '3') echo 'checked'?> />七天</p>
                     </td>
			</tr>
			</table><br/>
      <input name="" type="Submit" class="button" value="保存"/>
		</form>
	</div>
</div>
<?php      		 	 
require $blogpath . 'zb_system/admin/admin_footer.php';    				 	  
RunTime();    		  	  	
?>