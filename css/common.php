<?php
ob_start();
header('Content-type:text/css;charset=utf-8');  
//header("Content-type: text/html; charset=utf-8");
$direction=array("left","top","right","bottom");
$min=5;
?>
@charset "utf-8";
*{margin:0;padding:0;}
body{font-size:12px;font-family:"Microsoft Yahei"; line-height:normal; color:#000; background:#2b2b2b; position:relative;}
a{color:#000;text-decoration:none;}
a:hover{text-decoration:none;}
.wrap{position:relative;max-width:720px;margin:0 auto;background:#fff;}
dl, dt, dd, ul, ol, li{list-style:none;}
img{border:none; vertical-align:middle;}
input{vertical-align:middle;}
input:focus,textarea:focus{outline:none;}
.outnone:focus{outline:none;}
.clear{clear:both; height:0; overflow:hidden;}
.clearfix:after{content:' ';display:block;clear: both; visibility:hidden;line-height:0;height:0;}
.ellipsis{-o-text-overflow:ellipsis;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;}
.table0{border-collapse:collapse;border-spacing:0;}
.bs0{border-spacing:0;}
.collapse{border-collapse:collapse;}
.none, .hide, .dn{display:none;}
.block, .show, .db{display:block;}
.apn{-webkit-appearance:none;}
.zoom1{zoom:1;}
/*box-sizing*/
.content-box{box-sizing:content-box;}
.border-box{box-sizing:border-box;}
.padding-box{box-sizing:padding-box;}
/*显示隐藏*/
.vh{visibility:hidden;}
.vv{visibility:visible;}
.vat,.vt{vertical-align:top;}
.vam,.vm{vertical-align:middle;}
.vab,.vb{vertical-align:bottom;}
.oh{overflow:hidden;}
.oxh{overflow-x:hidden;}
.oyh{overflow-y:hidden;}
.oa{overflow:auto;}
.oxa{overflow-x:auto;}
.oya{overflow-y:auto;}
.os{overflow:scroll}
.oxs{overflow-x:scroll}
.oys{overflow-y:scroll}
.cp{cursor:pointer;}
.cd{cursor:default;}
.cm{cursor:move;}
.ti2{text-indent:2em;}
/*浮动*/
.fl{float:left;}
.fr{float:right;}
/*定位*/
.pf{position:fixed;}
.pr{position:relative;}
.pa{position:absolute;}
.ps{position:static;}
/*z-index,letter-spacing*/
<?php
for($i=0;$i<=10;$i++){
	echo ".zi{$i}{z-index:{$i}}";
	echo ".ls{$i}{letter-spacing:{$i}px}";
}
echo "\n";
?>
/*opacity*/
<?php
for($i=0;$i<=20;$i++){
	$n=$i*5;
	$n2=$n/100;
	echo ".opacity{$n},.Hopacity{$n}:hover{opacity:{$n2}}";
}
echo "\n";
?>
/*块状*/
.db{display:block;}
.di{display:inline;}
.dib{display:inline-block;}
/*宽高*/
.wauto{width:auto;}
.hauto{height:auto;}
<?php
//width 固定宽度
for($i=0;$i<=1200;$i++){
	if($i>50){
		if($i%$min==0)echo ".w{$i}{width:{$i}px}";
	}
	else echo ".w{$i}{width:{$i}px}";
}
echo "\n";
//width 百分比
for($i=0;$i<=100/$min;$i++){
	$n=$min*$i;
	echo ".wp$n{width:{$n}%}";
}
echo "\n";
//width平分
for($i=1;$i<=10;$i++){
	$n=100/$i;
	$n=$n-intval($n)!=0?number_format($n,2):$n;
	echo ".wpd$i{width:{$n}%}";
}
echo "\n";
//height 固定高度
for($i=0;$i<=1000;$i++){
	if($i>50){
		if($i%$min==0)echo ".h$i{height:{$i}px}";
	}
	else echo ".h$i{height:{$i}px}";
}
echo "\n";
//height 百分比
for($i=0;$i<=100/$min;$i++){
	$n=$min*$i;
	echo ".hp$n{height:{$n}%}";
}
echo "\n";
//height
for($i=1;$i<=10;$i++){
	$n=100/$i;
	$n=$n-intval($n)!=0?number_format($n,2):$n;
	echo ".hpd$i{height:{$n}%}";
}
echo "\n";
?>
/*line-height*/
.lhn{line-height:normal;}
<?php
//line-height
for($i=0;$i<=100;$i++){
	if($i>50){
		if($i%$min==0)echo ".lh{$i}{line-height:{$i}px}";
	}
	else if($i>=10||$i==0) echo ".lh{$i}{line-height:{$i}px}";
}
echo "\n";
for($i=10;$i<=30;$i++){
	$n=$i/10;
	$n2=number_format($i/10,1,"_","");
	echo ".lh{$n2}{line-height:{$n}}";
}
echo "\n";
?>
/*位移*/
.mc{margin:0 auto;}
<?php
for($i=0;$i<=100;$i++){
	if($i>50){
		if($i%$min==0){
			echo ".p{$i}{padding:{$i}px}";
			echo ".m{$i}{margin:{$i}px}";
		}
	}
	else{
		echo ".p{$i}{padding:{$i}px}";
		echo ".m{$i}{margin:{$i}px}";
	}
}
echo "\n";
//padding
foreach($direction as $d){
	$d1=substr($d,0,1);//取第一个字母
	for($i=0;$i<=500;$i++){
	if($i>50){
		if($i%$min==0){
			echo ".p{$d1}{$i}{padding-$d:{$i}px}";
		}
	}
	else{
		echo ".p{$d1}{$i}{padding-$d:{$i}px}";
	}
}
echo "\n";
}
//margin
foreach($direction as $d){
	$d1=substr($d,0,1);//取第一个字母
	for($i=-500;$i<=500;$i++){
	if(abs($i)>50){
		if($i%$min==0){
			echo ".m{$d1}{$i}{margin-$d:{$i}px}";
		}
	}
	else{
		echo ".m{$d1}{$i}{margin-$d:{$i}px}";
	}
}
echo "\n";
}
?>
/*left,top,right,bottom*/
<?php
foreach($direction as $d){
	for($i=-500;$i<=500;$i++){
		if(abs($i)>50){
			if($i%$min==0){
				echo ".{$d}{$i}{{$d}:{$i}px}";
			}
		}
		else{
			echo ".{$d}{$i}{{$d}:{$i}px}";
		}
	}
	echo "\n";
	//平分
	for($i=1;$i<=10;$i++){
		$n=100/$i;
		$n=$n-intval($n)!=0?number_format($n,2):$n;
		echo ".{$d}pd$i{{$d}:{$n}%}";
	}
	echo "\n";
	//百分比
	for($i=0;$i<=100/$min;$i++){
		$n=$min*$i;
		echo ".{$d}p$n{{$d}:{$n}%}";
	}
	echo "\n";
}

?>
/*文字*/
.songti{font-family:"宋体";}
.heiti{font-family:"黑体";}
.arial{font-family:Arial;}
.impact{font-family:Impact;}
.tahoma{font-family:Tahoma;}
<?php
//left
for($i=8;$i<=100;$i++){
	$n=$i;
	echo ".f$n{font-size:{$n}px}";
}
echo "\n";
?>
.fwn{font-weight:normal;}
.fwb{font-weight:bold;}
.tl{text-align:left;}
.tc{text-align:center;}
.tr{text-align:right;}
/*下划线*/
.tdn,.Htdn:hover{text-decoration:none!important;}
.tdu,.Htdu:hover{text-decoration:underline!important;}

/*背景background-repeat*/
.bgrn{background-repeat:no-repeat;}
.bgrx{background-repeat:repeat-x;}
.bgry{background-repeat:repeat-y;}
.bgn{background:none;}
<?php
/*背景background-position*/
$direction2=array("left","top","right","bottom","center");
foreach($direction2 as $d1){
	$d11=substr($d1,0,1);//取第一个字母
	foreach($direction2 as $d2){
		$d22=substr($d2,0,1);//取第一个字母
		echo ".bgp{$d11}{$d22}{background-position:{$d1} {$d2}}";
	}
}
for($i=0;$i<=100;$i++){
	$n=$i*10;
	echo ".bgpy{$n},.Hbgpy{$n}:hover{background-position:0 -{$n}px}";
	echo ".bgpx{$n},.Hbgpx{$n}:hover{background-position:-{$n}px 0}";
}
echo "\n";

?>
/*边框*/
.b{border-width:1px;border-style:solid;border-color:#000;}
.bs-dotted{border-style:dotted;}
.bs-solid{border-style:solid;}
.bs-double{border-style:double;}
.bs-dashed{border-style:dashed;}
.bln{border-left:none;}
.btn{border-top:none;}
.brn{border-right:none;}
.bbn{border-bottom:none;}
.bn{border:none;}
.bl{border-left-width:1px;border-left-style:solid;}
.bt{border-top-width:1px;border-top-style:solid;}
.br{border-right-width:1px;border-right-style:solid;}
.bb{border-bottom-width:1px;border-bottom-style:solid;}
<?php
for($i=0;$i<=20;$i++){
	$n=$i;
	echo ".bw{$n}{border-width:{$n}px}";
}
echo "\n";
$border_direction=array("left","top","right","bottom");
$border_style=array("solid","dotted","double","dashed");
foreach($border_direction as $direction){
	$d=substr($direction,0,1);//取第一个字母
	foreach($border_style as $style){
		echo ".b{$d}s_$style{border-$direction-style:$style}";
	}
	echo "\n";
	for($i=0;$i<=20;$i++){
		$n=$i;
		echo ".b{$d}w{$n}{border-$direction-width:{$n}px}";
	}
	echo "\n";
}
?>
/*border-radius*/
<?php
//固定值
for($i=0;$i<=100;$i++){
	if($i>50){
		if($i%$min==0){
			echo ".br$i{border-radius:{$i}px}";
		}
	}
	else{
		echo ".br$i{border-radius:{$i}px}";
	}
}
echo "\n";
//百分比
for($i=0;$i<=100/$min;$i++){
	$n=$min*$i;
	echo ".brp$n{border-radius:{$n}%}";
}
echo "\n";
?>
/*transition*/
<?php
//固定值
for($i=1;$i<=10;$i++){
	$n=$i;
	echo ".transition$n{transition:all .{$n}s ease-in}";
}
echo "\n";
?>

/*颜色 参考：http://www.w3school.com.cn/tags/html_ref_colornames.asp */
<?php
$colorArr=array(
	"AliceBlue"=>"#F0F8FF",	 
	"AntiqueWhite"=>"#FAEBD7",	 
	"Aqua"=>"#00FFFF",	 
	"Aquamarine"=>"#7FFFD4",	 
	"Azure"=>"#F0FFFF",	 
	"Beige"=>"#F5F5DC",	 
	"Bisque"=>"#FFE4C4",	 
	"Black"=>"#000000",	 
	"BlanchedAlmond"=>"#FFEBCD",	 
	"Blue"=>"#0000FF",	 
	"BlueViolet"=>"#8A2BE2",	 
	"Brown"=>"#A52A2A",	 
	"BurlyWood"=>"#DEB887",	 
	"CadetBlue"=>"#5F9EA0",	 
	"Chartreuse"=>"#7FFF00",	 
	"Chocolate"=>"#D2691E",	 
	"Coral"=>"#FF7F50",	 
	"CornflowerBlue"=>"#6495ED",	 
	"Cornsilk"=>"#FFF8DC",	 
	"Crimson"=>"#DC143C",	 
	"Cyan"=>"#00FFFF",	 
	"DarkBlue"=>"#00008B",	 
	"DarkCyan"=>"#008B8B",	 
	"DarkGoldenRod"=>"#B8860B",	 
	"DarkGray"=>"#A9A9A9",	 
	"DarkGreen"=>"#006400",	 
	"DarkKhaki"=>"#BDB76B",	 
	"DarkMagenta"=>"#8B008B",	 
	"DarkOliveGreen"=>"#556B2F",	 
	"Darkorange"=>"#FF8C00",	 
	"DarkOrchid"=>"#9932CC",	 
	"DarkRed"=>"#8B0000",	 
	"DarkSalmon"=>"#E9967A",	 
	"DarkSeaGreen"=>"#8FBC8F",	 
	"DarkSlateBlue"=>"#483D8B",	 
	"DarkSlateGray"=>"#2F4F4F",	 
	"DarkTurquoise"=>"#00CED1",	 
	"DarkViolet"=>"#9400D3",	 
	"DeepPink"=>"#FF1493",	 
	"DeepSkyBlue"=>"#00BFFF",	 
	"DimGray"=>"#696969",	 
	"DodgerBlue"=>"#1E90FF",	 
	"Feldspar"=>"#D19275",	 
	"FireBrick"=>"#B22222",	 
	"FloralWhite"=>"#FFFAF0",	 
	"ForestGreen"=>"#228B22",	 
	"Fuchsia"=>"#FF00FF",	 
	"Gainsboro"=>"#DCDCDC",	 
	"GhostWhite"=>"#F8F8FF",	 
	"Gold"=>"#FFD700",	 
	"GoldenRod"=>"#DAA520",	 
	"Gray"=>"#808080",	 
	"Green"=>"#008000",	 
	"GreenYellow"=>"#ADFF2F",	 
	"HoneyDew"=>"#F0FFF0",	 
	"HotPink"=>"#FF69B4",	 
	"IndianRed"=>"#CD5C5C",	 
	"Indigo"=>"#4B0082",	 
	"Ivory"=>"#FFFFF0",	 
	"Khaki"=>"#F0E68C",	 
	"Lavender"=>"#E6E6FA",	 
	"LavenderBlush"=>"#FFF0F5",	 
	"LawnGreen"=>"#7CFC00",	 
	"LemonChiffon"=>"#FFFACD",	 
	"LightBlue"=>"#ADD8E6",	 
	"LightCoral"=>"#F08080",	 
	"LightCyan"=>"#E0FFFF",	 
	"LightGoldenRodYellow"=>"#FAFAD2",	 
	"LightGrey"=>"#D3D3D3",	 
	"LightGreen"=>"#90EE90",	 
	"LightPink"=>"#FFB6C1",	 
	"LightSalmon"=>"#FFA07A",	 
	"LightSeaGreen"=>"#20B2AA",	 
	"LightSkyBlue"=>"#87CEFA",	 
	"LightSlateBlue"=>"#8470FF",	 
	"LightSlateGray"=>"#778899",	 
	"LightSteelBlue"=>"#B0C4DE",	 
	"LightYellow"=>"#FFFFE0",	 
	"Lime"=>"#00FF00",	 
	"LimeGreen"=>"#32CD32",	 
	"Linen"=>"#FAF0E6",	 
	"Magenta"=>"#FF00FF",	 
	"Maroon"=>"#800000",	 
	"MediumAquaMarine"=>"#66CDAA",	 
	"MediumBlue"=>"#0000CD",	 
	"MediumOrchid"=>"#BA55D3",	 
	"MediumPurple"=>"#9370D8",	 
	"MediumSeaGreen"=>"#3CB371",	 
	"MediumSlateBlue"=>"#7B68EE",	 
	"MediumSpringGreen"=>"#00FA9A",	 
	"MediumTurquoise"=>"#48D1CC",	 
	"MediumVioletRed"=>"#C71585",	 
	"MidnightBlue"=>"#191970",	 
	"MintCream"=>"#F5FFFA",	 
	"MistyRose"=>"#FFE4E1",	 
	"Moccasin"=>"#FFE4B5",	 
	"NavajoWhite"=>"#FFDEAD",	 
	"Navy"=>"#000080",	 
	"OldLace"=>"#FDF5E6",	 
	"Olive"=>"#808000",	 
	"OliveDrab"=>"#6B8E23",	 
	"Orange"=>"#FFA500",	 
	"OrangeRed"=>"#FF4500",	 
	"Orchid"=>"#DA70D6",	 
	"PaleGoldenRod"=>"#EEE8AA",	 
	"PaleGreen"=>"#98FB98",	 
	"PaleTurquoise"=>"#AFEEEE",	 
	"PaleVioletRed"=>"#D87093",	 
	"PapayaWhip"=>"#FFEFD5",	 
	"PeachPuff"=>"#FFDAB9",	 
	"Peru"=>"#CD853F",	 
	"Pink"=>"#FFC0CB",	 
	"Plum"=>"#DDA0DD",	 
	"PowderBlue"=>"#B0E0E6",	 
	"Purple"=>"#800080",	 
	"Red"=>"#FF0000",	 
	"RosyBrown"=>"#BC8F8F",	 
	"RoyalBlue"=>"#4169E1",	 
	"SaddleBrown"=>"#8B4513",	 
	"Salmon"=>"#FA8072",	 
	"SandyBrown"=>"#F4A460",	 
	"SeaGreen"=>"#2E8B57",	 
	"SeaShell"=>"#FFF5EE",	 
	"Sienna"=>"#A0522D",	 
	"Silver"=>"#C0C0C0",	 
	"SkyBlue"=>"#87CEEB",	 
	"SlateBlue"=>"#6A5ACD",	 
	"SlateGray"=>"#708090",	 
	"Snow"=>"#FFFAFA",	 
	"SpringGreen"=>"#00FF7F",	 
	"SteelBlue"=>"#4682B4",	 
	"Tan"=>"#D2B48C",	 
	"Teal"=>"#008080",	 
	"Thistle"=>"#D8BFD8",	 
	"Tomato"=>"#FF6347",	 
	"Turquoise"=>"#40E0D0",	 
	"Violet"=>"#EE82EE",	 
	"VioletRed"=>"#D02090",	 
	"Wheat"=>"#F5DEB3",	 
	"White"=>"#FFFFFF",	 
	"WhiteSmoke"=>"#F5F5F5",	 
	"Yellow"=>"#FFFF00",	 
	"YellowGreen"=>"#9ACD32"
);
?>
<?php
//color
for($i=0;$i<=15;$i++){
	$n=dechex($i);
	echo ".c{$n}{$n}{$n},.Hc{$n}{$n}{$n}:hover{color:#{$n}{$n}{$n}}";
}
echo "\n";
foreach($colorArr as $k=>$v){
	echo ".c{$k},.Hc{$k}:hover{color:{$v}}";
}
echo "\n";
?>
/* border颜色 */
<?php
//border-color
for($i=0;$i<=15;$i++){
	$n=dechex($i);
	echo ".bc{$n}{$n}{$n},.Hbc{$n}{$n}{$n}:hover{border-color:#{$n}{$n}{$n}}";
}
echo "\n";
foreach($colorArr as $k=>$v){
	echo ".bc$k,.Hbc$k:hover{border-color:{$v}}";
}
echo "\n";
?>
/*背景色*/
<?php
//background-color
for($i=0;$i<=15;$i++){
	$n=dechex($i);
	echo ".bgc{$n}{$n}{$n},.Hbgc{$n}{$n}{$n}:hover{background-color:#{$n}{$n}{$n}}";
}
echo "\n";
foreach($colorArr as $k=>$v){
	echo ".bgc{$k},.Hbgc{$k}:hover{background-color:{$v}}";
}
echo "\n";
?>
<?php
$temp=ob_get_contents(); 
$file="common.css";
//ob_end_clean(); 
if(filemtime(__file__)-filemtime($file)>=0){
	$fp=fopen($file,'w');
	fwrite($fp,$temp) or die('写文件错误'); 
}
?>
