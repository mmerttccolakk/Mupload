<?php
ini_set('max_execution_time',999999);
include('ayar/baglan.php');
include('ayar/ayar.php');
include('ayar/function.php');
include('eklenti/hotfile.php');
include('eklenti/depositfiles.php');
include('eklenti/netload.php');
include('eklenti/dosyatc.php');

@$dosya[0] = $_FILES['dosya']['name'];
@$dosya[1] = $_FILES['dosya']['size'];
@$dosya[2] = $_FILES['dosya']['tmp_name'];

if($dosya[1]>$boyut*1024*1024){
echo '<div class="kirmizi">Dosya boyutunuz çok büyük en fazla '.$boyut.' Mb kadar dosya yolluyabilirsiniz.!</div>';
}elseif(empty($dosya[0])){
echo '<div class="kirmizi">Boş dosya gönderemessiniz.!</div>';
}else{
$say	=	0;
if(isset($_POST['hotfile'])){$say++;}
if(isset($_POST['netload'])){$say++;}
if(isset($_POST['depositfiles'])){$say++;}
if(isset($_POST['dosyatc'])){$say++;}
	if($say<1 or $say>4){
	echo '<div class="sari">En az 1 en fazla 4 tane dosya sitesi seçmelisiniz!</div>';
	}else{
	$kopyalama = @copy($dosya[2],"gecici/".$dosya[0]);
	$link = "gecici/".$dosya[0];
		if(!$kopyalama){ echo '<div class="kirmizi">Dosya copyalanamadı hata.!</div>';}else{
		$token		=	rasgele(225);
		$dosya[1]	=	boyut_hesapla($dosya[1]);
		$dossya		=	$dosya[0].' ( '.$dosya[1].' )';
		$time		=	time();
		$ip			=	$_SERVER['REMOTE_ADDR'];
		$islem	=	mysql_query("INSERT INTO `sayfa` (`id` ,`dosya_adi` ,`goruntulenme` ,`token` ,`ip` ,`time`)VALUES (NULL , '$dossya', '0', '$token', '$ip', '$time')");
			if(!$islem){
			echo '<div class="kirmizi">Mysql Hatası.!</div>';
			unlink($link);
			}else{
				
				if(isset($_POST['netload'])){
				$netload	=	netload($link);
					if(isset($netload)){
					mysql_query("INSERT INTO `linkler` (`id` ,`tur` ,`link` ,`tik` ,`token`)VALUES (NULL ,  'netload',  '$netload',  '0',  '$token')");
					}
				}
				if(isset($_POST['dosyatc'])){
				$dosyatc	=	dosyatc($link);
					if(isset($dosyatc)){
					mysql_query("INSERT INTO `linkler` (`id` ,`tur` ,`link` ,`tik` ,`token`)VALUES (NULL ,  'dosyatc',  '$dosyatc',  '0',  '$token')");
					}
				}
				if(isset($_POST['depositfiles'])){
				$depositfiles	=	depositfiles($link);
					if(isset($depositfiles)){
					mysql_query("INSERT INTO `linkler` (`id` ,`tur` ,`link` ,`tik` ,`token`)VALUES (NULL ,  'depositfiles',  '$depositfiles',  '0',  '$token')");
					}
				}
				if(isset($_POST['hotfile'])){
				$hotfile	=	hotfile($link);
					if(isset($hotfile)){
					mysql_query("INSERT INTO `linkler` (`id` ,`tur` ,`link` ,`tik` ,`token`)VALUES (NULL ,  'hotfile',  '$hotfile',  '0',  '$token')");
					}
				}
			unlink($link);
			$sor	=	mysql_query("select * from sayfa where token='$token'");
			$bak	=	mysql_fetch_array($sor);
			$link	=	$site.'indir-'.$bak['id'].'.html';
			echo oku($link);
			}
		}
	}
}

?>