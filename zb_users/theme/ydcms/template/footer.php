<?php echo'404';die();?>
<footer>
	{if $zbp->Config('ydcms')->footbig}
	<div id="footer" class="container">
		<div class="footerl">
			<div class="flbox">
				{$zbp->Config('ydcms')->flbox1}
			</div>
			<div class="flbox">
				{$zbp->Config('ydcms')->flbox2}
			</div>
			<div class="flbox">
				{$zbp->Config('ydcms')->flbox3}
			</div>
			<div class="flbox">
				{$zbp->Config('ydcms')->flbox4}
			</div>
		</div>
		<div class="footerr">
			<div class="frbox">
				{$zbp->Config( 'ydcms' )->frbox1}
			</div>
			<div class="frbox">
				{$zbp->Config( 'ydcms' )->frbox2}
			</div>
			{if $zbp->Config('ydcms')->ficon}
			<div class="ficon">
				<a href="http://wpa.qq.com/msgrd?v=3&uin={$zbp->Config( 'ydcms' )->icon_qq}&site=qq&menu=yes" target="_blank"><i class="fa fa-qq"></i></a>
				<a class="ficon_wechat"><i class="fa fa-wechat"></i>
					<div class="ficon_wechat_img"><img src="{if $zbp->Config( 'ydcms' )->icon_wechat}{$zbp->Config( 'ydcms' )->icon_wechat}{else}{$host}zb_users/theme/{$theme}/style/images/qr.jpg{/if}" alt="微信号"></div>
				</a>
				<a rel="nofollow" href="{$zbp->Config( 'ydcms' )->icon_weibo}" target="_blank"><i class="fa fa-weibo"></i></a>
			</div>
			{/if}
		</div>
	</div>
	{/if}
	<div class="copyright navTmp">
		<div class="container">
			<div class="cl">{$copyright} Powered By {$zblogphpabbrhtml} {$zbp->Config('ydcms')->footblog}</div>
			<div class="cr">{$zbp->Config('ydcms')->foothtmls}</div>
		</div>
	</div>
</footer>
{if $zbp->Config( 'ydcms' )->gotop}
<div class="bottom_tools">
	<a id="scrollUp" href="javascript:;" title="返回顶部"><i class="fa fa-angle-up"></i></a> {if $zbp->Config('ydcms')->goqrcode}
	<div class="qr_tool"><i class="fa fa-qrcode"></i>
	</div>
	<div class="qr_img"><img src="{if $zbp->Config( 'ydcms' )->goqrcodeimg}{$zbp->Config( 'ydcms' )->goqrcodeimg}{else}{$host}zb_users/theme/{$theme}/style/images/qr.jpg{/if}"/>
	</div>{/if} {if $type=='article'||$type=='page'}{if $zbp->Config('ydcms')->gocomment}<a class="topcomment" href="#comments" title="评论"><i class="fa fa-commenting"></i></a>{/if}{/if}
</div>
{/if}
<script src="{$host}zb_users/theme/{$theme}/script/common.min.js?v=1.2" type="text/javascript"></script>
<script src="{$host}zb_users/theme/{$theme}/script/custom.js" type="text/javascript"></script>
{if $zbp->Config('ydcms')->sidegs}<script src="{$host}zb_users/theme/{$theme}/script/theia-sticky-sidebar.min.js" type="text/javascript"></script>{/if}
{if $zbp->Config('ydcms')->wxjz}<script src="{$host}zb_users/theme/{$theme}/script/wx.min.js" type="text/javascript"></script>{/if}
{if $zbp->Config('ydcms')->slider}
<script src="{$host}zb_users/theme/{$theme}/script/swiper.jq.min.js" type="text/javascript"></script>
<script>
	var swiper = new Swiper( '.swiper-container', {
		loop:'true',
		pagination: '.swiper-pagination',
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		paginationClickable: true,
		spaceBetween: 30,
		centeredSlides: true,
		autoplay: 5500,
		autoplayDisableOnInteraction: false
	} );
</script>
{/if}
{$footer}
<!--//footer-->
</body>
</html>