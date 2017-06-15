function alertBox(obj){
	if(typeof(obj)!="object"){
		obj={html:obj};
	}
	var df={width:400,height:150};
	for(var k in df){ 
		obj[k]=typeof(obj[k])=="undefined"?df[k]:obj[k];
	}
	obj.html=typeof(obj.html)=="undefined"?"":obj.html;
	obj.style=typeof(obj.style)=="undefined"?"":obj.style;
	obj.width=parseInt(obj.width);
	obj.height=parseInt(obj.height);
	var head='<tr>\
					<td class="pr h35 tc">\
						'+obj.head+'\
					</td>\
				</tr>';
	var foot='<tr>\
					<td class="pr h35 tc">\
						'+obj.foot+'\
					</td>\
				</tr>';
	var cover='<div class="pa left0 top0 wp100 hp100 bgn" style="background:#000;opacity:0.2;filter:alpha(opacity=20)" onclick="popbox_close(this)"></div>';
	head=typeof(obj.head)=="undefined"?"":head;	
	foot=typeof(obj.foot)=="undefined"?"":foot;	
	cover=typeof(obj.cover)=="undefined"?cover:"";	
	$(".popbox").remove();
	var html='<div class="pf left0 top0 wp100 hp100 popbox zi5">\
				'+cover+'\
				<div class="popmain pa leftp50 topp50 br5 transition3" style="transform: scale(1.2);opacity:0;width:'+obj.width+'px;margin-left:-'+obj.width/2+'px;height:'+obj.height+'px;margin-top:-'+obj.height/2+'px;display:none;'+obj.style+'">\
					<div class="pa wp100 hp100 br5" style="background:rgba(255,255,255,1);">\
						<table class="pa left0 top0 wp100 hp100 tc" cellspacing="0" cellpadding="0">\
							'+head+'\
							<tr>\
								<td class="vm pr">'+obj.html+'</td>\
							</tr>\
							'+foot+'\
						</table>\
					</div>\
					</div>\
				</div>\
			</div>';
	$("body").append(html);	
	popboxFun(".popbox");
}

function popbox_close(obj){
	var popbox=typeof(obj)=="undefined"?$(".popbox"):$(obj).closest(".popbox");
	var popmain=popbox.find(".popmain");
	popmain.css({"opacity":0,"transform":"scale(0.8)"});
	setTimeout(function(){
		popbox.hide().remove();
		if(typeof(popbox_close_callback)=="function")popbox_close_callback();
	},300);
}

function popboxFun(obj){
	var popmain=$(obj).find(".popmain");
	popmain.show().css({"opacity":1,"transform":"scale(1)"});
	//popmain.movebox(".bar");
}

$.fn.movebox = function(bar){
//div拖曳	
	var $this = $(this);
	var $bar = $this.find(bar);
	if($bar.length==0)$bar=$this;
	$bar.mousedown(function(e)//e鼠标事件
			{
				$bar.css("cursor","move");//改变鼠标指针的形状
				var scrolltop=$(document).scrollTop();//网页被卷去的高度
				var viwidth=$(window).width(); //浏览器时下窗口可视区域宽
				var viheight=$(window).height(); //浏览器时下窗口可视区域高
				var offset = $this.offset();//DIV在页面的位置
				var offsetleft = offset.left;
				var offsettop = offset.top;
				var marginleft =  parseInt($this.css("margin-left"));     // 计算margin-left
				var margintop =  parseInt($this.css("margin-top"));   // 计算margin-top
				var x = e.pageX - offsetleft + marginleft;//获得鼠标指针离DIV元素左边界的距离
				var y = e.pageY - offsettop  + margintop;//获得鼠标指针离DIV元素上边界的距离
				//if($this.css("position")=="fixed")
				y = e.pageY - offset.top + scrolltop + margintop;
				//alert(e.pageX);
				$(document).bind("mousemove",function(ev)//绑定鼠标的移动事件，因为光标在DIV元素外面也要有效果，所以要用doucment的事件，而不用DIV元素的事件
				{
					$this.stop();//加上这个之后
					var _x = ev.pageX - x;//获得X轴方向移动的值
					var _y = ev.pageY - y;//获得Y轴方向移动的值
					//alert(_x);
					if(_x<-marginleft)_x=-marginleft;
					if(_y<-margintop)_y=-margintop;
					if(_x>viwidth - $this.width() - marginleft)_x=viwidth - $this.width() - marginleft;
					if(_y>viheight - $this.height() - margintop)_y=viheight - $this.height() - margintop;
					$this.css({left:_x+"px",top:_y+"px"});
				});
				
			});
			$(document).mouseup(function()
			{
				$bar.css("cursor","default");
				$(this).unbind("mousemove");
			});
}
//$("#selectcmty").movebox(".bar");	

var $$={}
$$.confirm=function(obj){
	var foot='<table class="wp100 bs0 h38">\
			<tr>\
				<td onclick="confirm_callback(0)" class="wp50 Hopacity80 cp" style="background:#38a9ed;">\
					<span class="cfff f16">确认</span>\
				</td>\
				<td onclick="confirm_callback(1)" class="wp50 Hopacity80 cp" style="background:#e5e5e5;">\
					<span class="c666 f16">取消</span>\
				</td>\
			</tr>\
		</table>';
	var html=obj.html;
	if(!obj.msg)obj.msg="";
	if(!html){
		var html='<div class="pl10 pr10 f18 c333">'+obj.msg+'</div>';
	}
	alertBox({
		html:html,
		foot:foot,
		width:obj.width?obj.width:$(".wrap").width()*0.6,
		height:obj.height?obj.height:160,
		style:"box-shadow: 0 5px 5px rgba(0,0,0,.2);overflow:hidden",
		nohead:true
	});
	window.confirm_callback=function(i){
		popbox_close();
		obj.callback&&obj.callback(i);
	}
}
/*
$(function(){
	$$.confirm(function(i){
		if(i==0)alert("确认");
		else if(i==1)alert("取消");
	});
	
});
*/

/*
function alert1(){
	var html='<span class="pa right10 top-30 w25 cp f16 bgceee Hbgcccc br5 c999" onclick="popbox_close(this)">✖</span>\
				<div class="mb10"><img class="w60" src="images/passenger/car2.png"/></div>\
				<div class="f16 c666">司机已接单</div>';
	alertBox({
		html:html,
		width:$(".wrap").width()*0.6,
		height:120,
		nohead:true
	});
}
alert1();

//取消行程
function alert2(text){
	var html='<div class="f13 c666 plf10 lh30 mb10">您确定要取消用车吗？</div>\
		<a href="javascript:;" class="dib mr10 w90 h30 lh30 bgGreen HbgcSpringGreen cfff br10 f12 tc" onclick="popbox_close(this)">重新叫车</a>\
		<a href="javascript:;" class="dib w90 h30 lh30 bgcaaa Hbgcccc cfff br10 f12 tc" onclick="popbox_close(this)">确定取消</a>';
	alertBox({
		title:"取消用车",
		html:html,
		width:220,
		height:140,
	});
}

*/