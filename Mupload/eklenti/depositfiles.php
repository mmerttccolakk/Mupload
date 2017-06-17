<?php
function depositfiles($dosya){
$post		=	'login=conficker94&password=mert1994';
$cookiefile	=	dirname(__FILE__).'/cookie.txt';

		$postdata = array();
		$postdata['imbedded_progress_bar'] = "0";
		$postdata['upload_range'] = "1";
		$postdata['files'] = "@" . getcwd() . "/" . $dosya;
		$postdata['MAX_FILE_SIZE'] = "2097152000";
		$postdata['UPLOAD_IDENTIFIER'] = "13163336632827d4f119d9a72554c7c2e87df0af4e";
		$postdata['go'] = "1";
		$postdata['agree'] = "1";
		
	$ch = curl_init();
    curl_setopt($ch , CURLOPT_URL, 'http://depositfiles.com/login.php');
    curl_setopt($ch , CURLOPT_SSL_VERIFYPEER , FALSE);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER , TRUE);
    curl_setopt($ch , CURLOPT_FOLLOWLOCATION , TRUE);
	curl_setopt($ch , CURLOPT_TIMEOUT,0);
    curl_setopt($ch , CURLOPT_COOKIEFILE , $cookiefile);
    curl_setopt($ch , CURLOPT_COOKIEJAR , $cookiefile);
    curl_setopt($ch , CURLOPT_REFERER , 'http://depositfiles.com/');
	curl_setopt($ch , CURLOPT_USERAGENT, "Opera/9.80 (Windows NT 5.1; U; tr) Presto/2.9.168 Version/11.51");
    curl_setopt($ch , CURLOPT_POST , TRUE);
    curl_setopt($ch , CURLOPT_POSTFIELDS , $post);
	curl_exec($ch);
	curl_setopt($ch, CURLOPT_URL, 'http://fileshare308.depositfiles.com/en/FS308-5u/?X-Progress-ID=');
	curl_setopt($ch, CURLOPT_USERAGENT, "Opera/9.80 (Windows NT 5.1; U; tr) Presto/2.9.168 Version/11.51");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$page = curl_exec($ch);
	curl_close($ch);
		
$veri = explode("parent.ud_download_url = '",$page);
$veri = explode("';",$veri[1]);
return $veri[0];
}
?>