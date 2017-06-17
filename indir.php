<?php 
include('ayar/ayar.php');
include('ayar/baglan.php');
include('ayar/function.php');
$id	=	get('id');
$sor	=	mysql_query("select * from sayfa where id='$id'");
$bak	=	mysql_fetch_array($sor);
$num	=	mysql_num_rows($sor);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mupload - <? echo $bak['dosya_adi']; ?></title>
<link href="css/genel.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="banner">
<div class="ortala">
<a href="index.html"><img src="rsm/logo.png" align="left" border="0" style="margin-top:15px;" alt="reklam alanı"/></a><img src="rsm/<?php echo $banner;?>" align="right" border="0" style="margin-top:20px;" alt="reklam alan�"/></div>
<div id="panel" align="center"><?php if($num>0){ echo '<h3 align="center">'.$bak['dosya_adi'].'</h3>
<h4 align="center" style="margin-top:-20px;">Görüntülenme ( '.$bak['goruntulenme'].' )</h4>'; } ?><hr />
<?php

if($num>0){

$say	=	$bak['goruntulenme'] + 1;
mysql_query("UPDATE sayfa SET goruntulenme='$say' WHERE id='$id';");
$token	=	$bak['token'];
$sor	=	mysql_query("select * from linkler where token='$token'");
	echo '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr bgcolor="#E0E0E0" align="center">
    <td>Site</td>
    <td>Link</td>
    <td>Tık</td>
  </tr>';
  $say=0;
	while($bak	=	mysql_fetch_array($sor)){
	if($say%2==0){
	echo '<tr bgcolor="#F3F3F3" align="center">';
	}else{
	echo '<tr bgcolor="#E0E0E0" align="center">';
	}
	echo '
    <td><img src="rsm/'.$bak['tur'].'.png"></td>
    <td><a class="git yavas" href="'.$site.'git-'.$bak['id'].'.html">'.$site.'git-'.$bak['id'].'.html</a></td>
    <td>'.$bak['tik'].'</td>
  </tr>';
  $say++;
	}
	echo '</table>';
	}else{
	echo '<br><div class="kirmizi">Böyle bir sayfa bulunmuyor hata.!</div><br>';
	}
?>
<hr>
</div>
<div id="copyright" align="center">&copy; 2011-2012 Mert Çolak</div>
</div>
</body>
</html>