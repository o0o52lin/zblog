	$(function(){
		if($.cookie("isClose") != 'yes'){
			var winWid = $(window).width()/2 - $('.popup').width()/2;
			var winHig = $(window).height()/2 - $('.popup').height()/2;
			$(".popup").css({"left":winWid,"top":-winHig*2});	//自上而下
			$(".popup").show();
			$(".popup").animate({"left":winWid,"top":winHig},1000);
			$(".popup span").click(function(){
				$(this).parent().fadeOut(500);
				//$.cookie("isClose",'yes',{ expires:1/8640});	//测试十秒
				$.cookie("isClose",'yes',{ expires:1});
			});
		}
	});