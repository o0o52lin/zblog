<!DOCTYPE html>
<html lang="<?php  echo $lang['lang_bcp47'];  ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title><?php  echo $name;  ?>-<?php  echo $title;  ?></title>
	<meta name="generator" content="<?php  echo $zblogphp;  ?>" />
	<meta name="viewport" content="width=device-width" />

	<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/<?php  echo $style;  ?>.css?<?php  echo $themeinfo['modified'];  ?>" type="text/css" media="all"/>
	<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/fancybox.css?<?php  echo $themeinfo['modified'];  ?>" type="text/css" media="all"/>
	<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/swiper-bundle.min.css?<?php  echo $themeinfo['modified'];  ?>" type="text/css" media="all"/>
	<script src="<?php  echo $host;  ?>zb_system/script/jquery-latest.min.js?v=<?php  echo $version;  ?>"></script>
	<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js?v=<?php  echo $version;  ?>"></script>
	<script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php?<?php if (isset($html_js_hash)) { ?>hash=<?php  echo $html_js_hash;  ?>&<?php } ?>v=<?php  echo $version;  ?>"></script>

<?php  echo $header;  ?>
<?php if ($type=='index'&&$page=='1'&&$option['ZC_XMLRPC_ENABLE']) { ?>
	<link rel="alternate" type="application/rss+xml" href="<?php  echo $feedurl;  ?>" title="<?php  echo $name;  ?>" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php  echo $host;  ?>zb_system/xml-rpc/?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php  echo $host;  ?>zb_system/xml-rpc/wlwmanifest.xml" /> 
<?php } ?>
</head>
