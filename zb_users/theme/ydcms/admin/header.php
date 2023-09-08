<?php
require '../../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if ( !$zbp->CheckRights( $action ) ) {
	$zbp->ShowError( 6 );
	die();
}
if ( !$zbp->CheckPlugin( 'ydcms' ) ) {
	$zbp->ShowError( 48 );
	die();
}
$blogtitle = '主题配置';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<link rel="stylesheet" type="text/css" href="<?php echo $bloghost?>zb_users/theme/ydcms/admin/css/style.css">
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/ydcms/admin/js/common.js"></script>
<div id="divMain">
	<div class="divHeader">
		<?php echo $blogtitle;?>
	</div>
	