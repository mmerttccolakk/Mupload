<?php
function hotfile($dosya){

$post		=	'returnto=/&user=kullaniciadin&pass=sifren';
$cookiefile	=	dirname(__FILE__).'/cookie.txt';

		$postdata = array();
		$postdata['imbedded_progress_bar'] = "0";
		$postdata['upload_range'] = "1";
		$postdata['uploads[]'] = "@" . getcwd() . "/" . $dosya;
		$postdata['iagree'] = "on";
		$postdata['submit'] = "Upload";
		
	$ch = curl_init();
    curl_setopt($ch , CURLOPT_URL, 'http://hotfile.com/login.php');
    curl_setopt($ch , CURLOPT_SSL_VERIFYPEER , FALSE);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER , TRUE);
    curl_setopt($ch , CURLOPT_FOLLOWLOCATION , TRUE);
	curl_setopt($ch , CURLOPT_TIMEOUT,0);
    curl_setopt($ch , CURLOPT_COOKIEFILE , $cookiefile);
    curl_setopt($ch , CURLOPT_COOKIEJAR , $cookiefile);
    curl_setopt($ch , CURLOPT_REFERER , 'http://hotfile.com/');
	curl_setopt($ch , CURLOPT_USERAGENT, "Opera/9.80 (Windows NT 5.1; U; tr) Presto/2.9.168 Version/11.51");
    curl_setopt($ch , CURLOPT_POST , TRUE);
    curl_setopt($ch , CURLOPT_POSTFIELDS , $post);
	curl_exec($ch);
	curl_setopt($ch , CURLOPT_URL, 'http://u15.hotfile.com/upload.cgi?13470232498673265');
	curl_setopt($ch , CURLOPT_POST, TRUE);
	curl_setopt($ch , CURLOPT_POSTFIELDS, $postdata);
	$page	=	curl_exec($ch);
	curl_close($ch);
		
$veri = explode('<input type="text" name="url" id="url" class="textfield" value="',$page);
$veri = explode('" onfocus="this.select();" />',$veri[1]);
return $veri[0];
}
?>