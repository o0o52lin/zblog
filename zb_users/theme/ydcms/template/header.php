<?php echo'404';die();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
{if $zbp->Config('ydcms')->seo}{template:post-header-seo}{else}<title>{$title} - {$name}</title>{/if}
{if $zbp->Config('ydcms')->coloroff}
<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/style.ok.css?v={$zbp->themeapp->version}" />
{else}
<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/style.min.css?v={$zbp->themeapp->version}" />
{/if}
<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
{if $zbp->Config( 'ydcms' )->favicon}
<link rel="shortcut icon" href="{$zbp->Config( 'ydcms' )->favicon}" type="image/x-icon">
<link rel="icon" href="{$zbp->Config( 'ydcms' )->favicon}" type="image/x-icon">
{/if}
{if $type=='index'&&$page=='1'}
<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" />
{/if}
{if $zbp->Config('ydcms')->head}{$zbp->Config('ydcms')->headhtml}{/if}
{$header}
</head>