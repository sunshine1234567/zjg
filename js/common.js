$(function(){
	viewport();
	wrapFun();
});

function viewport(){
	var winwid=$(window).width();
	var minwid=360;
	if(winwid<minwid){
		var viewport = document.querySelector("meta[name=viewport]");
		viewport.setAttribute('content', 'width='+minwid+', user-scalable=no');
		window.setTimeout(function(){
		//viewport.setAttribute('content', 'width='+minwid+', user-scalable=yes');
		},1000);
	}
}

function wrapFun(){
	$(window).resize(function(){
		var winwid=$(window).width();
		var winhei=$(window).height();
		$(".wrap").css("min-height",winhei);
		var wrapwid=$(".wrap").width();
		if(winwid<=wrapwid)$("#headfixed").removeAttr("style");
		else $("#headfixed").css({"left":"50%","width":wrapwid,"margin-left":-wrapwid/2})
	}).trigger("resize");
}

function commontab(tab,tabb,c,c2){
	$(tab).each(function(i){
		$(this).click(function(){
			$(tab).removeClass(c).eq(i).addClass(c);
			if(c2)$(tab).addClass(c2).eq(i).removeClass(c2);
			$(tabb).hide().eq(i).show();
		});
	});
}