<?php
//调取图片
function ydcms_thumbnail($related) {
    global $zbp;	
	$temp=mt_rand(1,10);
	$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
	$content = $related->Content; 
	preg_match_all($pattern,$content,$matchContent);
	if(isset($matchContent[1][0])){
		$thumb=$matchContent[1][0]; 
	}else{		
		$thumb=$zbp->host . "zb_users/theme/" .$zbp->theme. "/include/random/" .$temp. ".jpg";
	}
    return $thumb;
}
//摘要
function ydcms_intro($as,$type,$long,$other) {
    global $zbp;
    $str = '';
    if ($type=='0') {
	$str .= trim(SubStrUTF8(TransferHTML($as->Intro,'[nohtml]'),$long)).$other;
    } else {
	$str .= trim(SubStrUTF8(TransferHTML($as->Content,'[nohtml]'),$long)).$other;
    }
    return $str;
}
//友好时间
function ydcms_TimeAgo( $ptime ) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return '刚刚';
    $interval = array (
        12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y-m-d', $ptime).')',
        30 * 24 * 60 * 60       =>  '个月前 ('.date('m-d', $ptime).')',
        7 * 24 * 60 * 60        =>  '周前 ('.date('m-d', $ptime).')',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}

?>