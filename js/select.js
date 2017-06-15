function selectbox(obj){
	var opt="";
	var arr=obj.arr;
	if(!arr)return;
	for(var i=0;i<arr.length;i++){
		opt+='<table class="option wp100 bb bcddd h45">\
				<tr>\
					<td class="pr10">'+arr[i].text+'</td>\
					<td class="tr w15">\
						<img class="select w15" style="display:none;" src="images/select.png"/>\
					</td>\
				</tr>\
			</table>';
	}
	var left=$(".wrap").width()/2-4;
	if(obj.left){
		left=parseInt(obj.left);
	}
	var headhei=$("#head").height();
	var html='<div class="selectbox pa left0 right0 bottom0 wp100 zi2" style="top:'+headhei+'px; background:rgba(0,0,0,0.2);">\
		<div class="pa top-5 w8 h8 bgcfff" style="transform:rotate(-45deg);left:'+left+'px"></div>\
		<div class="selectmain bgcfff pl15 pr15 f13 c333 pb10" style="min-height:100px;max-height:300px;overflow-y:auto;">\
			'+opt+'\
		</div>\
	</div>';
	$(document).unbind("click");
	$(".selectbox").remove();
	$(".wrap").append(html);
	$(".selectbox .option").each(function(i){
		$(this).click(function(){
			$(obj.select).val(arr[i].value).trigger("change");
			//alert($(obj.select).val());
			$(".selectbox").remove();
			$(document).unbind("click");
		});
	});
	setTimeout(function(){
		$(document).unbind("click").bind("click",function(event){
			if($(".selectbox").length==0)return;
			var target = $(event.target);
			if(target.closest(".selectmain").length == 0){
				$(".selectbox").remove();
				$(document).unbind("click");
			}
		});
	},100);
}