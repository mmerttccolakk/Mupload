<?php
function boyut_hesapla($size){
if($size >= 1073741824){ 
$size=round($size/1073741824)."Gb"; 
} 
elseif($size >= 1048576){ 
$size=round($size/1048576)."Mb"; 
} 
elseif($size >= 1024){ 
$size=round($size/1024)."Kb"; 
} 
return $size; 
} 

function rasgele($uzunluk){
		$karakterler = "1234567890abcdefghijklmnoprstuwvyzqxABCDEFGHIJKLMNOPRSTUVWYZQX-*#^_+%&/()[]=@";
			for($i=0;$i<$uzunluk;$i++){
				$uzunluk .= substr($karakterler,mt_rand(0,strlen($karakterler)-1),1);
			}
	return $uzunluk;
	}
function get($get){
$get = trim(strip_tags(mysql_real_escape_string($_GET[$get])));
return $get;
}
function oku($link){
return '<div style="background: #f5f5f5; border: 1px solid #e5e5e5;">

						<div style="font-size: 0.8em; margin: 5px 5px 1px 5px;">

							<div>

								<label style="display: inline-block; width: 130px;">Web Siteleri: <span style="font-size: 0.8em;">(<abbr title="Zengin Metin Ýþaret Dili">html</abbr>)</span></label>

								<input style="width: 68%; font-size: 0.8em;" onclick=this.select(); value="&lt;a href=&quot;'.$link.'&quot;&gt;'.$link.'&quot; /&gt;&lt;/a&gt;">

							</div>

							<div style="margin-top: 5px;">

								<label style="display: inline-block; width: 130px;">Forumlar: <span style="font-size: 0.8em;">(<abbr title="Mesaj Panosu Kodu">bbcode</abbr>)</span></label>

								<input style="width: 68%; font-size: 0.8em;" onclick=this.select(); value="[url='.$link.']'.$link.'[/url]">

							</div>
							<div style="margin-top: 5px;">

								<label style="display: inline-block; width: 130px;">DoÄŸrudan EriÅŸim:</label>

								<input style="width: 68%; font-size: 0.8em;" onclick=this.select(); value="'.$link.'">

							</div></div></div></div>';
}
?>