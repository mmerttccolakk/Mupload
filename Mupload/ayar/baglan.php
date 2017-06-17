<?php
################################################
$sunucu    = "localhost"; //mysql sunucu       #
$kullanici = "root";      //mysql kullanıcıadı #
$sifre     = "        ";  //mysql şifre        #
$veritabani= "mupload";	  //veritabanı adı     #
################################################

#############################################-baglantı#######################################################################################################################
@mysql_connect($sunucu,$kullanici,$sifre) or die ('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><center><h1>Mysql Baglanılamadı!!!</h1></center>'); #
@mysql_select_db($veritabani) or die ('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><center><h1>Mysql Veritabanına Bağlanılamadi!!!</h1></center>');#
#############################################################################################################################################################################

###############################
mysql_query("SET NAMES UTF8");#
###############################
?>