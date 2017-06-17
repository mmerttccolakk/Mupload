<?php
function dosyatc($dosya){
$post		=	'kullanici=kullaniciadin&sifre=sifren';
$cookiefile	=	dirname(__FILE__).'/cookie.txt';

		
		$postdata = array();
		$postdata['imbedded_progress_bar'] = "0";
		$postdata['upload_range'] = "1";
		$postdata['upfile_0'] = "@" . getcwd() . "/" . $dosya;
		$postdata['no_script'] = "1";
		$postdata['no_script_submit'] = "Upload";

		
	$ch = curl_init();
    curl_setopt($ch , CURLOPT_URL, 'http://s2.dosya.tc/uyegiris.php');
    curl_setopt($ch , CURLOPT_SSL_VERIFYPEER , FALSE);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER , TRUE);
    curl_setopt($ch , CURLOPT_FOLLOWLOCATION , TRUE);
	curl_setopt($ch , CURLOPT_TIMEOUT,0);
    curl_setopt($ch , CURLOPT_COOKIEFILE , $cookiefile);
    curl_setopt($ch , CURLOPT_COOKIEJAR , $cookiefile);
    curl_setopt($ch , CURLOPT_REFERER , 'http://s2.dosya.tc/uye.php');
	curl_setopt($ch , CURLOPT_USERAGENT, "Opera/9.80 (Windows NT 5.1; U; tr) Presto/2.9.168 Version/11.51");
    curl_setopt($ch , CURLOPT_POST , TRUE);
    curl_setopt($ch , CURLOPT_POSTFIELDS , $post);
	curl_exec($ch);
	curl_setopt($ch , CURLOPT_URL, 'http://dosya.tc/cgi-bin/uu_upload.pl?tmp_sid=5d8915c30830401f1513b3db86f87c97');
	curl_setopt($ch , CURLOPT_POST, TRUE);
	curl_setopt($ch , CURLOPT_POSTFIELDS, $postdata);
	$page	=	curl_exec($ch);
	curl_close($ch);
	
$veri = explode('<textarea name="textarea" cols="60" rows="2" readonly="readonly">',$page);
$veri = explode('</textarea>',$veri[1]);
return $veri[0];
}
?>