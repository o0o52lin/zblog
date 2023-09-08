/*-------------------
*Description:        By www.yiwuku.com
*Website:            https://app.zblogcn.com/?id=1558
*Author:             尔今 erx@qq.com
*update:             2017-11-28(Last:2022-04-28)
-------------------*/
var lrDelay = 1, lrCkey = 0, lrCookie = 7, lrGoto = "1", lrGiway = "3", lrRmail = 0, lrTools = 0, lrMinis = 3;
$(function(){

		var LoginRegDom = '\
<style>#navbar-item-lrlogout{display:none;}#lr_mainbar .lr_mbg,.lr_arrow::after{background:#062e56;}</style>\
	<div id="lr_mainbar"><span class="lr_tip">本站会员尊享VIP特权，现在就加入我们吧！</span><span class="lr_acto"><span class="lr_btn lr_btn_lg xylogin">登录</span><span class="lr_btn lr_btn_rg xyreg">注册</span></span><span class="lr_btn_close"><i class="lr-icon icon-lr-close"></i></span><div class="lr_arrow" title="登录/注册"><i class="lr-icon icon-lr-double-arrow-right"></i></div></div>\
	<div id="lr_mform">\
	<dl class="lr_login">\
		<dt>登录</dt>\
		<dd>\
			<i class="lr-icon icon-lr-nickname1"></i>\
			<input type="text" name="UserName" class="lr_int">\
			<div class="tip">用户名</div>\
		</dd>\
		<dd>\
			<i class="lr-icon icon-lr-password1"></i>\
			<input type="password" name="PassWord" class="lr_int">\
			<div class="tip">密码</div>\
		</dd>\
		\
		<dd class="lr_more">\
			<div class="lr_l"><input type="checkbox" id="Remember" name="Remember" value="7" class="lr_chk"><label for="Remember">7天内自动登录</label></div><div class="lr_r"><a href="javascript:;" class="lr_to_find" target="_self">忘记密码</a><a href="javascript:;" class="lr_to_reg" target="_self">注册</a></div>\
		</dd>\
		<dd class="lr_act"><button type="button" class="lr_post">登录</button></dd>\
			</dl>\
		<dl class="lr_reg">\
		<dt>注册</dt>\
		<dd>\
			<i class="lr-icon icon-lr-nickname1"></i>\
			<input type="text" name="UserName" maxlength="20" autocomplete="off" class="lr_int">\
			<div class="tip">用户名</div>\
		</dd>\
		<dd>\
			<i class="lr-icon icon-lr-password"></i>\
			<input type="password" name="PassWord" maxlength="20" class="lr_int">\
			<div class="tip">密码<em>(至少8位)</em></div>\
		</dd>\
		<dd>\
			<i class="lr-icon icon-lr-cfmpassword"></i>\
			<input type="password" name="PassWord2" maxlength="20" class="lr_int">\
			<div class="tip">确认密码</div>\
		</dd>\
		\
		<dd><i class="lr-icon icon-lr-webmail"></i><input type="text" name="Email" maxlength="50" class="lr_int"><div class="tip">邮箱<em>(将用于接收邀请码)</em></div></dd>\
		\
		<dd class="lr_icode"><i class="lr-icon icon-lr-invite2"></i><input type="text" name="Icode" maxlength="22" class="lr_int"><a href="javascript:;" class="geticode">获取邀请码</a><div class="tip">邀请码</div></dd>\
		\
		<dd class="lr_more"><div class="lr_l"><input type="checkbox" id="agreement" name="agreement" class="lr_chk"><label for="agreement">已读并同意《<a href="#" target="_blank">用户注册协议</a>》</label></div><div class="lr_r"><a href="javascript:;" class="lr_reset" target="_self">重填</a><a href="javascript:;" target="_self" class="lr_to_login">登录</a></div></dd>\
		<dd class="lr_act"><button type="button" class="lr_post">提交</button></dd>\
	</dl>\
			<dl class="lr_password_find">\
		<dt>找回密码</dt>\
		<dd>\
			<i class="lr-icon icon-lr-nickname1"></i>\
			<input type="text" name="UserName" maxlength="20" class="lr_int">\
			<div class="tip">用户名</div>\
		</dd>\
		<dd>\
			<i class="lr-icon icon-lr-webmail"></i>\
			<input type="text" name="Email" maxlength="50" class="lr_int">\
			<div class="tip">邮箱</div>\
		</dd>\
		<dd class="lr_more">\
			<div class="lr_l">※ 重置链接将发送到邮箱</div>\
			<div class="lr_r"><a href="javascript:;" target="_self" class="lr_to_login">登录</a><a href="javascript:;" class="lr_to_reg" target="_self">注册</a></div>\
		</dd>\
		<dd class="lr_act"><button type="button" class="lr_post">提交</button></dd>\
	</dl>\
		</div>\
';
	$("body").append(LoginRegDom);




	//erx:Ctrl
	$("#lr_mform dl").each(function(){
		var $lrmcd = $(this);
		if(!$lrmcd.children(".lr_btn_close").length){
			$lrmcd.append('<dd class="lr_btn_close" title="关闭"><i class="lr-icon icon-lr-close"></i></dd><dd class="lr_tips"><div><i class="lr-icon icon-lr-xinxi"></i><span>未知错误</span></div></dd>');
		}
		if(!$lrmcd.find(".lr_manual").length){
			$lrmcd.children(".lr_act").append('<div class="lr_manual"><span>若未跳转，可<em>点击这里</em>刷新重试</span></div>');
		}
	});
	$(".lr_manual em").click(function() {
		window.location.reload(true);
	});
	var lrsbar = zbp.cookie.get("lrsbar");
	if(lrsbar == 1){
		$("#lr_mainbar").css({left:"-100%"});
		$(".lr_arrow").show();
	}
	$("#lr_mainbar").delay(lrDelay*1000).animate({bottom:"0"},900).append('<div class="lr_mbg"></div>');
	$("#lr_mainbar .lr_btn_close").click(function() {
		lrmBar("-100%", 1);
		zbp.cookie.set("lrsbar", 1, lrCookie);
	});
	$(".lr_arrow").click(function() {
		lrmBar(0, 0);
		zbp.cookie.set("lrsbar", 0, lrCookie);
	});
	function lrmBar(n, c){
		$("#lr_mainbar").animate({left:n},300);
		if(c == 1){
			$(".lr_arrow").delay(300).fadeIn(200);
		}else{
			$(".lr_arrow").fadeOut(200);
		}
	}
	document.addEventListener("keydown", function(e){
		if(e.keyCode == 13 && $(".lr_login:visible").length){
			lrLogin(".lr_login .lr_post");
		}
		if(e.keyCode == 13 && $(".lr_reg:visible").length){
			lrReg(".lr_reg .lr_post");
		}
		if(e.keyCode == 13 && $(".lr_password_find:visible").length){
			lrPasswordFind(".lr_password_find .lr_post");
		}
		if(e.keyCode == 13 && $(".lr_password_reset:visible").length){
			lrPasswordReset(".lr_password_reset .lr_post");
		}
		if(e.altKey && e.keyCode==76 && lrCkey){
			lrShow(".lr_login");
		}
		if(e.altKey && e.keyCode==82 && lrCkey){
			lrShow(".lr_reg");
		}
		if(e.altKey && e.keyCode==88 && lrCkey){
			lrFormHide();
		}
	});
	function lrTips(t){
		var jt = 3, $tip = $(".lr_tips");
		if($tip.is(":visible")){
			$tip.find("span").text(t);
			jt += 6;
		}else{
			$tip.show().addClass("animated bounceIn").find("span").text(t);
		}
		setTimeout(function(){
			$tip.removeClass("animated bounceIn").fadeOut();
		}, jt * 1000);
	}
	//erx:OpenLayer
	$("body").on("click", ".xylogin", function() {
		lrShow(".lr_login");
		return false;
	});
	$("a[href*='#xylogin'], #navbar-item-lrlogin a").click(function(){
		lrShow(".lr_login");
		return false;
	});
	$("body").on("click", ".xyreg", function() {
		lrShow(".lr_reg");
		return false;
	});
	$("a[href*='#xyreg']").click(function(){
		lrShow(".lr_reg");
		return false;
	});
	if(location.hash=='#xylogin'){
		console.log($("#lr_mform"))
		lrShow(".lr_login");
	}
	if(location.hash=='#xyreg'){
		lrShow(".lr_reg");
	}
	if ((navigator.userAgent.match(/(iPhone|ios|Android|iPad)/i))) {
		$("#lr_mform .lr_int").focus(function(){
			$("#lr_mform").addClass("erxmbs");
		}).blur(function(){
			$("#lr_mform").removeClass("erxmbs");
		});
	}
	function lrShow(c){
		if(!$(c).length){return false;}
		lrmBar("-100%", 1);
		$("#lr_mform").addClass("erxact");

		$(c).siblings().addClass("animated flipOutY").fadeOut();
		$(c).fadeIn().removeClass("flipOutY").addClass("animated flipInY");
		lrInput(c);
		lrUnScroll();
	}
	function lrInput(c){
		$(c).find(".lr_int").each(function(){
			var iv = $(this).val(), $tip = $(this).parent().children(".tip"),
				iwt = $(this).outerWidth(), twt = $tip.outerWidth();
			if(iv != ''){
				$tip.addClass("cu").css({left:(iwt-twt)+"px"});
			}
			$(this).focus(function(){
				$tip.addClass("cu").css({left:(iwt-twt)+"px"});
		    }).blur(function(){
				if($(this).val() == ''){
					$tip.removeClass("cu").css({left:"30px"});
				}else{
					$tip.addClass("cu").css({left:(iwt-twt)+"px"});
				}
		    });
	    });
	}
	//erx:Close
	$("#lr_mform").on("click", ".lr_btn_close", function() {
		lrFormHide();
	});
	function lrFormHide(){
		$("#lr_mform").removeClass("erxact");
		$("#lr_mform dl").addClass("animated flipOutY").fadeOut();
		if(lrsbar != 1){
			lrmBar(0, 0);
		}
		lrRemoveUnScroll();
	}
	function lrUnScroll() {
		var top = $(document).scrollTop();
		$(document).on('scroll.unable',function (e) {
			$(document).scrollTop(top);
		})
	}
	function lrRemoveUnScroll() {
		$(document).unbind("scroll.unable");
	}
	//erx:FormChange
	$(".lr_to_reg").click(function() {
		lrFormChange(".lr_reg");
	});
	$(".lr_to_login").click(function() {
		lrFormChange(".lr_login");
	});
	$(".lr_to_find").click(function() {
		var lrfound = zbp.cookie.get("lrfound");
		if(lrfound != null){
			lrTips("您刚刚操作过了！请稍后再试");
		}else{
			lrFormChange(".lr_password_find");
		}
	});
	function lrFormChange(s){
		$("#lr_mform dl").hide();
		$(s).fadeIn().removeClass("flipOutY").addClass("animated flipInY");
		$(s).parents("dl").find(".verfiycode").click();
		lrInput(s);
	}
	//erx:Login
	$(".lr_login .lr_post").click(function() {
		lrLogin(this);
	});
	function lrLogin(self){
		var name = $(".lr_login input[name='UserName']").val(),
		pswd = $(".lr_login input[name='PassWord']").val(),
		$vcode = $(".lr_login input[name='Vcode']");
		if(name.length < 2){
			lrTips("请正确填写用户名！");
			$(".lr_login input[name='UserName']").focus();
			return false;
		}
		if(pswd.length < 6){
			lrTips("请正确填写密码！");
			$(".lr_login input[name='PassWord']").focus();
			return false;
		}
		if($vcode.length && $vcode.val().length != 5){
			lrTips("请正确填写5位验证码！");
			$vcode.focus();
			return false;
		}
		if(zbp.cookie.get("lgfail")*1 > 5 && !$vcode.length){
			alert("错误次数过多！请确认用户信息后再操作");
			window.location.reload();
		}
		$(self).addClass("act").attr("disabled",true).next(".lr_manual").delay(6000).fadeIn();
		$.post(bloghost+'zb_users/plugin/LoginReg/act.php?act=login',{
			"username":name,
			"password":pswd,
			"verifycode":$vcode.val(),
			"savedate":$(".lr_login #Remember:checked").val(),
			},function(data){
				var s =data;
				if((s.search("faultCode")>0)&&(s.search("faultString")>0)){
					lrTips(s.match("<string>.+?</string>")[0].replace("<string>","").replace("</string>",""));
					$(self).removeClass("act").attr("disabled",false).next(".lr_manual").remove();
					$(self).parents("dl").find(".verfiycode").click();
					zbp.cookie.get("lgfail") == null?zbp.cookie.set("lgfail", 1, 0.125):zbp.cookie.set("lgfail", zbp.cookie.get("lgfail")*1+1, 0.125);
				}else{
					if(lrGoto == "1" || lrGoto == ""){
						window.location.reload();
					}else if(lrGoto == "2"){
						location.href = bloghost;
					}else{
						location.href = lrGoto;
					}
					if(lrTools){
						lrmBar("-100%", 1);
						zbp.cookie.set("lrsbar", 1, lrCookie);
					}
					lrFormHide();
				}
			}
		);
	}
	//erx:Reg
	$(".lr_reg .lr_post").click(function() {
		lrReg(this);
	});
	function lrReg(self){
		var $name = $(".lr_reg input[name='UserName']"),
		$pswd = $(".lr_reg input[name='PassWord']"),
		$pswd2 = $(".lr_reg input[name='PassWord2']"),
		$pname = $(".lr_reg input[name='PersonName']"),
		$email = $(".lr_reg input[name='Email']"),
		$qq = $(".lr_reg input[name='qq']"),
		$icode = $(".lr_reg input[name='Icode']"),
		$vcode = $(".lr_reg input[name='Vcode']"),
		$agreement = $(".lr_reg input[name='agreement']"),
		icodemail = zbp.cookie.get("lricode");
		if($name.val().length < lrMinis){
			lrTips("用户名需"+lrMinis+"个以上字符！");
			$name.focus();
			return false;
		}
		if($pswd.val().length < 8){
			lrTips("请填写密码且至少8位！");
			$pswd.focus();
			return false;
		}
		if($pswd.val() != $pswd2.val()){
			lrTips("两次输入密码不一样！");
			$pswd2.focus();
			return false;
		}
		if($pname.length && $pname.val().length < 1){
			lrTips("昵称不能为空！");
			$pname.focus();
			return false;
		}
		if($email.length && !RegExp(/^\w+@[a-z0-9A-Z]+\.[a-z]+$/).test($email.val())){
			lrTips("请正确填写邮箱！");
			$email.focus();
			return false;
		}
		if($email.length && icodemail != null && icodemail != $email.val()){
			lrTips("邮箱填写异常！");
			$email.focus();
			return false;
		}
		if($qq.length && !RegExp(/^[1-9]\d{5,15}$/).test($qq.val())){
			lrTips("请正确填写QQ号！");
			$qq.focus();
			return false;
		}
		if($icode.length && $icode.val().length != 22){
			lrTips("请正确填写22位邀请码！");
			$icode.focus();
			return false;
		}
		if($vcode.length && $vcode.val().length != 5){
			lrTips("请正确填写5位验证码！");
			$vcode.focus();
			return false;
		}
		if($agreement.length && !$agreement.is(':checked')){
			lrTips("请阅读并同意注册协议！");
			$agreement.focus();
			return false;
		}
		$(self).addClass("act").attr("disabled",true).next(".lr_manual").delay(6000).fadeIn();
		$.post(bloghost+'zb_users/plugin/LoginReg/act.php?act=reg',{
			"username":$name.val(),
			"qq":$qq.val(),
			"password":$pswd.val(),
			"repassword":$pswd2.val(),
			"personname":$pname.val(),
			"email":$email.val(),
			"invitecode":$icode.val(),
			"verifycode":$vcode.val(),
			},function(data){
				var s =data;
				if((s.search("faultCode")>0)&&(s.search("faultString")>0)){
					lrTips(s.match("<string>.+?</string>")[0].replace("<string>","").replace("</string>",""));
					$(self).parents("dl").find(".verfiycode").click();
					$(self).removeClass("act").attr("disabled",false).next(".lr_manual").remove();
				}else{
					if($email.length && lrRmail){
						lrTips('注册成功！正在发送邮件……');
						$.post(bloghost+'zb_users/plugin/LoginReg/erxmailto.php',{
							"email":$email.val(),
							"username":$name.val(),
							"password":$pswd.val(),
							"type":'reg',
							"action":lrRmail,
							},function(data){
								var s =data;
								if((s.search("faultCode")>0)&&(s.search("faultString")>0)){
									lrTips(s.match("<string>.+?</string>")[0].replace("<string>","").replace("</string>",""));
								}else{
									lrTips(s);
								}
							}
						);
					}else{
						lrTips(s);
					}
					$(".lr_reg .lr_int").val("");
					$(self).removeClass("act").attr("disabled",false);
					setTimeout(function(){
						lrFormChange(".lr_login");
					}, 2000);
				}
			}
		);
	}
	$(".lr_reg input[name='Email']").focus(function() {
		$.getScript(bloghost+'zb_users/plugin/LoginReg/script/emailAutoComple.js',function() {
			$.lrEmailAutoComplete(".lr_reg input[name='Email']");
		});
	});
	$(".lr_reset").click(function() {
		$(".lr_reg .lr_int").val("").attr("placeholder","");
		$("#lr_mform dd .tip").removeClass("cu").css("left","30px");
		$(".lr_post").removeClass("act").attr("disabled",false);
	});
	$(".verfiycode").click(function() {
		let c = $(this).attr("src"), t = c.split("&t=");
		$(this).attr("src", (t[1]?t[0]:c) + "&t=" + Math.random());
	});
	//erx:Logout
	$(".lr_logout, .xylogout, a[href*='#xylogout'], #navbar-item-lrlogout a").click(function() {
		$.get(bloghost+'zb_users/plugin/LoginReg/act.php?act=logout',{
			},function(data){
				var s =data;
				if(s){
					window.location.reload();
				}
			}
		);
		return false;
	});
	//erx:GetIcode
	$(".geticode").click(function() {
		if(lrGiway == "" || lrGiway == "0"){
			$("input[name='Icode']").val("正在获取……");
			$.post(bloghost+'zb_users/plugin/LoginReg/act.php?act=icode',{
				"action":1,
				},function(data){
					var s =data;
					if(s){
						$("input[name='Icode']").val(s);
					}
				}
			);
		}else{
			if(lrGiway == "3"){
				var name = $(".lr_reg input[name='UserName']").val(),
					email = $(".lr_reg input[name='Email']").val(),
					lricode = zbp.cookie.get("lricode");
				if($(".lr_reg input[name='Email']").length && !RegExp(/^\w+@[a-z0-9A-Z]+\.[a-z]+$/).test(email)){
					lrTips("请正确填写邮箱！");
					$(".lr_reg input[name='Email']").focus();
					return false;
				}
				if(lricode == email){
					lrTips("请勿重复获取邀请码！");
					return false;
				}
				$("input[name='Icode']").attr("placeholder","正发送到邮箱...");
				$.post(bloghost+'zb_users/plugin/LoginReg/erxmailto.php',{
					"email":email,
					"username":name,
					"type":'icode',
					"action":1,
					},function(data){
						var s =data;
						if((s.search("faultCode")>0)&&(s.search("faultString")>0)){
							lrTips(s.match("<string>.+?</string>")[0].replace("<string>","").replace("</string>",""));
							$("input[name='Icode']").attr("placeholder","邮件未能发送");
						}else{
							lrTips(s);
							$("input[name='Icode']").attr("placeholder","请注意查收邮件");
							zbp.cookie.set("lricode", email, 0.25);
						}
					}
				);
			}else{
				$(this).attr({href:lrGiway,target:"_blank"});
				$("input[name='Icode']").attr("placeholder","请留意新打开窗口");
			}
		}
		$(this).next().hide();
	});
	//erx:Find
	$(".lr_password_find .lr_post").click(function() {
		lrPasswordFind(this);
	});
	function lrPasswordFind(self){
		var name = $(".lr_password_find input[name='UserName']").val(),
		email = $(".lr_password_find input[name='Email']").val();
		if(name.length < 2){
			lrTips("请正确填写用户名！");
			$(".lr_password_find input[name='UserName']").focus();
			return false;
		}
		if(!RegExp(/^\w+@[a-z0-9A-Z]+\.[a-z]+$/).test(email)){
			lrTips("请正确填写邮箱！");
			$(".lr_password_find input[name='Email']").focus();
			return false;
		}
		$(self).addClass("act").attr("disabled",true).next(".lr_manual").delay(6000).fadeIn();
		$.post(bloghost+'zb_users/plugin/LoginReg/act.php?act=passwordfind',{
			"username":name,
			"email":email,
			"action":1,
			},function(data){
				var s =data;
				if((s.search("faultCode")>0)&&(s.search("faultString")>0)){
					lrTips(s.match("<string>.+?</string>")[0].replace("<string>","").replace("</string>",""));
					$(self).removeClass("act").attr("disabled",false).next(".lr_manual").remove();
				}else{
					$.post(bloghost+'zb_users/plugin/LoginReg/erxmailto.php',{
						"username":name,
						"email":email,
						"type":'reset',
						"action":1,
						},function(data){
							var s =data;
							if((s.search("faultCode")>0)&&(s.search("faultString")>0)){
								lrTips(s.match("<string>.+?</string>")[0].replace("<string>","").replace("</string>",""));
								$(self).removeClass("act").attr("disabled",false).next(".lr_manual").remove();
							}else{
								lrTips(s);
								zbp.cookie.set("lrfound", 1, 0.125);
								$(self).removeClass("act").attr("disabled",false);
								setTimeout(function(){
									window.location.reload();
								}, 2000);
							}
						}
					);
				}
			}
		);
	}
	//erx:Reset
	if($(".lr_password_reset").length){
		PasswordResetShow();
	}
	function PasswordResetShow(){
		lrShow(".lr_password_reset");
		lrmBar("-100%", 1);
		var nint = $(".lr_password_reset").find("input[name='UserName']");
		if(nint.val() != ""){
			nint.next().addClass("tip2 cu");
		}
	}
	$(".lr_password_reset .lr_post").click(function() {
		lrPasswordReset(this);
	});
	function lrPasswordReset(self){
		var name = $(".lr_password_reset input[name='UserName']").val(),
		pswd = $(".lr_password_reset input[name='PassWord']").val(),
		pswd2 = $(".lr_password_reset input[name='PassWord2']").val(),
		hash = $(".lr_password_reset input[name='hash']").val();
		if(name.length < 2){
			lrTips("用户名错误！");
			$(".lr_password_reset input[name='UserName']").focus();
			return false;
		}
		if(pswd.length < 6){
			lrTips("请填写密码且至少8位！");
			$(".lr_password_reset input[name='PassWord']").focus();
			return false;
		}
		if(pswd != pswd2){
			lrTips("两次输入密码不一样！");
			$(".lr_password_reset input[name='PassWord2']").focus();
			return false;
		}
		$(self).addClass("act").attr("disabled",true).next(".lr_manual").delay(6000).fadeIn();
		$.post(bloghost+'zb_users/plugin/LoginReg/act.php?act=passwordreset',{
			"username":name,
			"password":pswd,
			"hash":hash,
			},function(data){
				var s =data;
				if((s.search("faultCode")>0)&&(s.search("faultString")>0)){
					lrTips(s.match("<string>.+?</string>")[0].replace("<string>","").replace("</string>",""));
					$(self).removeClass("act").attr("disabled",false).next(".lr_manual").remove();
				}else{
					lrTips(s);
					$(".lr_password_reset .lr_int").val("");
					$(self).removeClass("act").attr("disabled",false);
					setTimeout(function(){
						location.href = bloghost;
					}, 2000);
				}
			}
		);
	}
});