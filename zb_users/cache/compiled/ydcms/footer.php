
<footer>
	<?php if ($zbp->Config('ydcms')->footbig) { ?>
	<div id="footer" class="container">
		<div class="footerl">
			<div class="flbox">
				<?php  echo $zbp->Config('ydcms')->flbox1;  ?>
			</div>
			<div class="flbox">
				<?php  echo $zbp->Config('ydcms')->flbox2;  ?>
			</div>
			<div class="flbox">
				<?php  echo $zbp->Config('ydcms')->flbox3;  ?>
			</div>
			<div class="flbox">
				<?php  echo $zbp->Config('ydcms')->flbox4;  ?>
			</div>
		</div>
		<div class="footerr">
			<div class="frbox">
				<?php  echo $zbp->Config( 'ydcms' )->frbox1;  ?>
			</div>
			<div class="frbox">
				<?php  echo $zbp->Config( 'ydcms' )->frbox2;  ?>
			</div>
			<?php if ($zbp->Config('ydcms')->ficon) { ?>
			<div class="ficon">
				<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $zbp->Config( 'ydcms' )->icon_qq;  ?>&site=qq&menu=yes" target="_blank"><i class="fa fa-qq"></i></a>
				<a class="ficon_wechat"><i class="fa fa-wechat"></i>
					<div class="ficon_wechat_img"><img src="<?php if ($zbp->Config( 'ydcms' )->icon_wechat) { ?><?php  echo $zbp->Config( 'ydcms' )->icon_wechat;  ?><?php }else{  ?><?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/images/qr.jpg<?php } ?>" alt="微信号"></div>
				</a>
				<a rel="nofollow" href="<?php  echo $zbp->Config( 'ydcms' )->icon_weibo;  ?>" target="_blank"><i class="fa fa-weibo"></i></a>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	<div class="copyright navTmp">
		<div class="container">
			<div class="cl"><?php  echo $copyright;  ?> Powered By <?php  echo $zblogphpabbrhtml;  ?> <?php  echo $zbp->Config('ydcms')->footblog;  ?></div>
			<div class="cr"><?php  echo $zbp->Config('ydcms')->foothtmls;  ?></div>
		</div>
	</div>
</footer>
<?php if ($zbp->Config( 'ydcms' )->gotop) { ?>
<div class="bottom_tools">
	<a id="scrollUp" href="javascript:;" title="返回顶部"><i class="fa fa-angle-up"></i></a> <?php if ($zbp->Config('ydcms')->goqrcode) { ?>
	<div class="qr_tool"><i class="fa fa-qrcode"></i>
	</div>
	<div class="qr_img"><img src="<?php if ($zbp->Config( 'ydcms' )->goqrcodeimg) { ?><?php  echo $zbp->Config( 'ydcms' )->goqrcodeimg;  ?><?php }else{  ?><?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/images/qr.jpg<?php } ?>"/>
	</div><?php } ?> <?php if ($type=='article'||$type=='page') { ?><?php if ($zbp->Config('ydcms')->gocomment) { ?><a class="topcomment" href="#comments" title="评论"><i class="fa fa-commenting"></i></a><?php } ?><?php } ?>
</div>
<?php } ?>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/common.min.js?v=1.2" type="text/javascript"></script>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/custom.js" type="text/javascript"></script>
<?php if ($zbp->Config('ydcms')->sidegs) { ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/theia-sticky-sidebar.min.js" type="text/javascript"></script><?php } ?>
<?php if ($zbp->Config('ydcms')->wxjz) { ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/wx.min.js" type="text/javascript"></script><?php } ?>
<?php if ($zbp->Config('ydcms')->slider) { ?>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/swiper.jq.min.js" type="text/javascript"></script>
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
<?php } ?>
<?php  echo $footer;  ?>
<!--//footer-->
</body>
</html>