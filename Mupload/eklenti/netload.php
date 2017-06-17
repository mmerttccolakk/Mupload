<?php
function netload($dosya){

function kes($bir,$iki,$page){
$veri = explode($bir,$page);
$veri = explode($iki,$veri[1]);
return $veri[0];
}
$post		=	'txtuser=738331&txtpass=hvFLUY&txtcheck=login&txtlogin=Giriþ';
$cookiefile	=	dirname(__FILE__).'/cookie.txt';

		
		$postdata = array();
		$postdata['upload_range'] = "1";
		$postdata['file'] = "@" . getcwd() . "/" . $dosya;
		$postdata['no_script'] = "1";
		$postdata['no_script_submit'] = "Upload";

		
	$ch = curl_init();
    curl_setopt($ch , CURLOPT_URL, 'http://netload.in/index.php');
    curl_setopt($ch , CURLOPT_SSL_VERIFYPEER , FALSE);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER , TRUE);
    curl_setopt($ch , CURLOPT_FOLLOWLOCATION , TRUE);
	curl_setopt($ch , CURLOPT_TIMEOUT,0);
    curl_setopt($ch , CURLOPT_COOKIEFILE , $cookiefile);
    curl_setopt($ch , CURLOPT_COOKIEJAR , $cookiefile);
    curl_setopt($ch , CURLOPT_REFERER , 'http://netload.in/index.php');
	curl_setopt($ch , CURLOPT_USERAGENT, "Opera/9.80 (Windows NT 5.1; U; tr) Presto/2.9.168 Version/11.51");
    curl_setopt($ch , CURLOPT_POST , TRUE);
    curl_setopt($ch , CURLOPT_POSTFIELDS , $post);
	$page	=	curl_exec($ch);
	$url	=	kes('method="post" action="','"',$page);
	$postdata['upload_hash']	=	kes('name="upload_hash" value="','"',$page);
	curl_setopt($ch , CURLOPT_URL, $url);
	curl_setopt($ch , CURLOPT_POST, TRUE);
	curl_setopt($ch , CURLOPT_POSTFIELDS, $postdata);
	$page	=	curl_exec($ch);
	curl_close($ch);
	return kes('<input type="text" id="txtField" value="','" style="width: 95%" />',$page);
	}
?>