
<div id="respond" class="commentpost">
	<form id="frmSumbit" target="_self" method="post" action="<?php  echo $article->CommentPostUrl;  ?>" >
		<input type="hidden" name="inpId" id="inpId" value="<?php  echo $article->ID;  ?>" />
		<input type="hidden" name="inpRevID" id="inpRevID" value="0" />
		<div class="com-name">
			<?php if ($user->ID>0) { ?><?php  echo $user->StaticName;  ?><?php } ?> <a rel="nofollow" id="cancel-reply" href="#comments" style="display:none;">取消回复</a>
		</div>
		<div class="com-box">
			<textarea placeholder="你的评论可以一针见血" class="textarea" name="txaArticle" id="txaArticle" cols="100%" rows="3" tabindex="1"></textarea>
			<button name="sumbit" type="submit" id="submit" tabindex="5" onclick="return zbp.comment.post()">提交评论</button>
		</div>
		<?php if ($user->ID>0) { ?>
		<input type="hidden" name="inpName" id="inpName" value="<?php  echo $user->StaticName;  ?>" />
		<input type="hidden" name="inpEmail" id="inpEmail" value="<?php  echo $user->Email;  ?>" />
		<input type="hidden" name="inpHomePage" id="inpHomePage" value="<?php  echo $user->HomePage;  ?>" />
		<?php }else{  ?>
		<div class="com-info">
			<ul>
				<li>
					<label class="hide" for="author"></label>
					<input class="ipt" type="text" name="inpName" id="inpName" value="访客" tabindex="2" placeholder="昵称">
					<span class="text">(*)</span>
				</li>
				<li>
					<label class="hide" for="email"></label>
					<input class="ipt" type="text" name="inpEmail" id="inpEmail" value="" tabindex="3" placeholder="邮箱">
					<span class="text"></span>
				</li>
				<li>
					<label class="hide" for="url"></label>
					<input class="ipt" type="text" name="inpHomePage" id="inpHomePage" value="" tabindex="4" placeholder="网址">
					<span class="text"></span>
				</li>
				<?php if ($option['ZC_COMMENT_VERIFY_ENABLE']) { ?>
				<li>
					<label class="hide" for="inpVerify"></label>
					<input class="ipt" type="text" name="inpVerify" id="inpVerify" tabindex="4" placeholder="输入验证码"><br>
					<span class="text">
						<img src="<?php  echo $article->ValidCodeUrl;  ?>" class="verifyimg" onclick="javascript:this.src='<?php  echo $article->ValidCodeUrl;  ?>&amp;tm='+Math.random();" />
					</span>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
	</form>
</div>