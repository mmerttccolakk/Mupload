<?php 
include('ayar/baglan.php');
include('ayar/function.php');
include('ayar/ayar.php');
$id	=	get('id');
$sor	=	mysql_query("select * from linkler where id='$id'");
$bak	=	mysql_fetch_array($sor);
$url	=	$bak['link'];
if(empty($url)){
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mupload - Yönlendirme</title>
<link href="css/genel.css" rel="stylesheet" type="text/css" /></head>
<body>
<div id="banner">
<div class="ortala">
<a href="index.html"><img src="rsm/logo.png" align="left" border="0" style="margin-top:15px;" alt="reklam alanı"/></a><img src="rsm/'.$banner.'" align="right" border="0" style="margin-top:20px;" alt="reklam alanı"/></div>
<div id="panel" align="center"><br><hr /><br>
<div class="kirmizi">Bu dosya linki silinmiş veya sistemde kayıtlı değil.!</div>
<br /><hr />
<br>
<div id="copyright" align="center">&copy; 2011-2012 Mert Çolak</div>
</div>
</body>
</html>';
}else{
$say	=	$bak['tik']+1;
mysql_query("UPDATE linkler SET tik='$say' WHERE id='$id';");
header( "Location: $url" ); 
}
?>