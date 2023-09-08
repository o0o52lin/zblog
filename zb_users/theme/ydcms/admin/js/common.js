//主题配置内相关JQ
$(function(){
//跟随
var nav=$("#admin-header");
var win=$(window);
var sc=$(document);
win.scroll(function(){
  if(sc.scrollTop()>=110){
    nav.addClass("fixednav");
   $(".navTmp").fadeIn();
  }else{
   nav.removeClass("fixednav");
   $(".navTmp").fadeOut();
  }
});

	//首页多图输入切换
	$(".imgtogglepost").click(function(){
		$("#imgtogglepost").show(100);
		$("#imgtogglecate").hide(100);
	});
	$(".imgtogglecate").click(function(){
		$("#imgtogglecate").show(100);
		$("#imgtogglepost").hide(100);
	});
	//登陆框下文字、图标切换
	$("#loginbottom_text").click(function(){
		$(".loginbottom_text").show(100);
		$(".loginbottom_icon").hide(100);
	});
	$("#loginbottom_icon").click(function(){
		$(".loginbottom_icon").show(100);
		$(".loginbottom_text").hide(100);
	});
	

});