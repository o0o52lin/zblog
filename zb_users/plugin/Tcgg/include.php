<?php   	    	  			 	  
RegisterPlugin('Tcgg', 'ActivePlugin_Tcgg');    		 	   	
function ActivePlugin_Tcgg(){       	 			   			  	
	Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','Tcgg_tcgg');    	 		 			
}     	  		 	
function Tcgg_SubMenu($id){
	$arySubMenu = array(
		1 => array('插件设置', 'main', 'left', false),
	
	);
		foreach($arySubMenu as $k => $v){
		echo '<a href="'.$v[1].'.php" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$k?'m-now':'').'">'.$v[0].'</span></a>';
	}
}
function InstallPlugin_Tcgg(){    				  		
	global $zbp;     		  	    	   		 	
		$zbp->Config('Tcgg')->ys = 'cornflowerblue';
		$zbp->Config('Tcgg')->putitle='欢迎来访！';	    		   	 	
		$zbp->Config('Tcgg')->pucenter='<p>欢迎访问本站，345网址导航网（www.go345.cn）提供最好技术导航平台,打造不一样的导航网、找软件,找资源就上345网址导航网吧。
</p><p><a href="https://www.go345.cn/2325.html" target="_blank">请给我留言吧！</a></p>';
		$zbp->Config('Tcgg')->styles='1';
		$zbp->SaveConfig('Tcgg');       		 		
	    	 		  	  	 	  
}    				  	 
function Tcgg_tcgg(&$template) {    		 	   	
	global $zbp;  
	$zbp->header .=  '<link rel="stylesheet" type="text/css" href="'.$zbp->host.'zb_users/plugin/Tcgg/css/style.css"/>' . "\r\n";
    $zbp->header .=  '' ; 
    $zbp->footer .=  '
<div class="popup" style="left:298px; top:208px;display:block;border:1px solid '.$zbp->Config('Tcgg')->ys.' ">
	<span class="iconfont">&#xe61b;</span>
    <div class="putitle">'.$zbp->Config('Tcgg')->putitle.'</div>
     <div class="pucenter">'.$zbp->Config('Tcgg')->pucenter.'
    </div>
</div>
' ; 
	$zbp->footer .=  '<script src="'.$zbp->host.'zb_users/plugin/Tcgg/js/hnysnet.js"></script><script src="'.$zbp->host.'zb_users/plugin/Tcgg/js/'.$zbp->Config('Tcgg')->styles.'.js"></script>' . "\r\n";     		
}    			 	  	
function UninstallPlugin_Tcgg(){
	global $zbp;     	  		 	
		$zbp->DelConfig('Tcgg');       		 		    	    
}       				 
?>