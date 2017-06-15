function bottomBox(obj){
	if(typeof(obj)!="object"){
		obj={html:obj};
	}
	var df={time:300};
	for(var k in df){ 
		obj[k]=typeof(obj[k])=="undefined"?df[k]:obj[k];
	}
	obj.html=typeof(obj.html)=="undefined"?"":obj.html;
	obj.style=typeof(obj.style)=="undefined"?"":obj.style;
	obj.time=parseInt(obj.time);
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
	head=typeof(obj.head)=="undefined"?"":head;	
	foot=typeof(obj.foot)=="undefined"?"":foot;	
	$(".bottombox").remove();
	var html='<div data-time="'+obj.time+'" class="pf left0 top0 wp100 hp100 bottombox zi5">\
				<div class="pa left0 top0 wp100 hp100 bgn" style="background:#000;opacity:0.2;filter:alpha(opacity=20)" onclick="bottombox_close(this)"></div>\
				<div class="bottommain pa left0 bottom0 wp100 bgcfff zi2" style="opacity:0;transition:all '+(obj.time/1000).toFixed(1)+'s ease-in;'+obj.style+'">\
					'+obj.html+'\
					</div>\
				</div>\
			</div>';
	$("body").append(html);	
	bottombox_open(".bottombox");
	if(typeof(obj.callback)=="function")obj.callback();
}

function bottombox_close(el){
	var bottombox=typeof(el)=="undefined"?$(".bottombox"):$(el).closest(".bottombox");
	var time=bottombox.attr("data-time");
	var bottommain=bottombox.find(".bottommain");
	var hei=bottommain.height();
	bottommain.css({"opacity":0,bottom:-hei});
	setTimeout(function(){
		bottombox.hide().remove();
		if(typeof(bottombox_close_callback)=="function")bottombox_close_callback();
	},time);
}

function bottombox_open(el){
	var bottombox=typeof(el)=="undefined"?$(".bottombox"):$(el).closest(".bottombox");
	var time=bottombox.attr("data-time");
	var bottommain=$(el).find(".bottommain");
	var hei=bottommain.height();
	bottommain.css({bottom:-hei,opacity:0}).show();
	setTimeout(function(){
		bottommain.show().css({"opacity":1,"bottom":0});
	},time);
	//bottommain.movebox(".bar");
}

