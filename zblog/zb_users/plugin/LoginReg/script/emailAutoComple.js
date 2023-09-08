jQuery.lrEmailAutoComplete = function(selector){
  var elt = $(selector);
  var strHtml = '<div class="emailAutoComple">'+
        '    <ul>'+
        '      <li suf="@qq.com"></li>'+
        '      <li suf="@163.com"></li>'+
        '      <li suf="@126.com"></li>'+
        '      <li suf="@139.com"></li>'+
        '      <li suf="@sina.cn"></li>'+
        '      <li suf="@sohu.com"></li>'+
        '      <li suf="@hotmail.com"></li>'+
        '      <li suf="@gmail.com"></li>'+
        '      <li suf="@aliyun.com"></li>'+
        '    </ul>'+
        '  </div>';
  if(!$('.emailAutoComple').length && !/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)){
      $('body').append(strHtml);
  }
  var autoComplete, autoLi;
  autoComplete = $('.emailAutoComple');
  autoComplete.data('elt', elt);
  autoLi = autoComplete.find('li');
  autoLi.mouseover(function(){
    $(this).siblings().filter('.hover').removeClass('hover');
    $(this).addClass('hover');
  }).mouseout(function(){
    $(this).removeClass('hover');
  }).mousedown(function(){
    autoComplete.data('elt').val($(this).text()).change();
    autoComplete.hide();
  });
  elt.keyup(function(e){
    if(/13|38|40|116/.test(e.keyCode) || this.value==''){
      return false;
    }
    var username = this.value;
    if(username.indexOf('@')==-1){
      autoComplete.hide();
      return false;
    }
    autoLi.each(function(){
      this.innerHTML = username.replace(/\@+.*/,'')+$(this).attr('suf');
      if(this.innerHTML.indexOf(username)>=0){
        $(this).show();
      }else{
        $(this).hide();  
      }
    }).filter('.hover').removeClass('hover');
    autoComplete.show().css({
      left : $(this).offset().left,
      top : $(this).offset().top + $(this).outerHeight(true),
      width: elt.outerWidth()
    });
    if(autoLi.filter(':visible').length==0){
      autoComplete.hide();
    }else{
      autoLi.filter(':visible').eq(0).addClass('hover');      
    }
  }).keydown(function(e){
    if(e.keyCode==38){ //上
      autoLi.filter('.hover').prev().addClass('hover').next().removeClass('hover');
    }else if(e.keyCode==40){ //下
      autoLi.filter('.hover').next().addClass('hover').prev().removeClass('hover');
    }else if(e.keyCode==13){ //确定
      autoLi.filter('.hover').mousedown();
    }
  }).focus(function(){
    autoComplete.data('elt',$(this));
  }).blur(function(){
    autoComplete.hide();
  });
};