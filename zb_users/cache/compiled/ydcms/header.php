<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php if ($zbp->Config('ydcms')->seo) { ?><?php  include $this->GetTemplate('post-header-seo');  ?><?php }else{  ?><title><?php  echo $title;  ?> - <?php  echo $name;  ?></title><?php } ?>
<?php if ($zbp->Config('ydcms')->coloroff) { ?>
<link rel="stylesheet" type="text/css" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/style.ok.css?v=<?php  echo $zbp->themeapp->version;  ?>" />
<?php }else{  ?>
<link rel="stylesheet" type="text/css" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/style.min.css?v=<?php  echo $zbp->themeapp->version;  ?>" />
<?php } ?>
<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js" type="text/javascript"></script>
<script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php" type="text/javascript"></script>
<?php if ($zbp->Config( 'ydcms' )->favicon) { ?>
<link rel="shortcut icon" href="<?php  echo $zbp->Config( 'ydcms' )->favicon;  ?>" type="image/x-icon">
<link rel="icon" href="<?php  echo $zbp->Config( 'ydcms' )->favicon;  ?>" type="image/x-icon">
<?php } ?>
<?php if ($type=='index'&&$page=='1') { ?>
<link rel="alternate" type="application/rss+xml" href="<?php  echo $feedurl;  ?>" title="<?php  echo $name;  ?>" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php  echo $host;  ?>zb_system/xml-rpc/?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php  echo $host;  ?>zb_system/xml-rpc/wlwmanifest.xml" />
<?php } ?>
<?php if ($zbp->Config('ydcms')->head) { ?><?php  echo $zbp->Config('ydcms')->headhtml;  ?><?php } ?>
<?php  echo $header;  ?>
</head>