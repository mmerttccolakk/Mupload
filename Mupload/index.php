<?php include('ayar/ayar.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mupload - Çoklu Upload</title>
<link href="css/genel.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#form").bind("submit", function(){
			
			$("#sonuclar").empty();
			$(this).attr("target","gelenBilgi");
			$("<img />").attr("src","rsm/bekle.gif").appendTo($("#sonuclar"));
			
			$("#gelenBilgi").bind("load", function(){
				
				var deger = $("#gelenBilgi").contents().find("body").html();
				$("#sonuclar").html(deger);
			});
			
		});
});
</script>

</head>

<body>
<div id="banner">
<div class="ortala">
<a href="index.html"><img src="rsm/logo.png" align="left" border="0" style="margin-top:15px;" alt="reklam alanı"/></a><img src="rsm/<?php echo $banner;?>" align="right" border="0" style="margin-top:20px;" alt="reklam alanı"/></div>
<div id="panel" align="center"><h3 align="center">Çoklu Upload Alpha v3</h3>
<h4 align="center" style="margin-top:-20px;">Max 10Mb</h4><hr />
<form action="islem.html" method="post" enctype="multipart/form-data" id="form"><input type="file" name="dosya"><input type="submit" value="Yükle" id="yuklebuton">
<br><br />
	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" >

	<tr align="left" bgcolor="#F3F3F3">

		<td align="center"><img src="rsm/hotfile.png"/></td>

		<td width="10"><input type="checkbox" name="hotfile"></td>

		<td align="center"><img src="rsm/netload.png"/></td>

		<td width="10"><input name="netload" type="checkbox"></td>

		<td align="center"><img src="rsm/depositfiles.png"/></td>

		<td width="10"><input type="checkbox" name="depositfiles"></td>

		<td align="center" bgcolor="#F3F3F3"><img src="rsm/dosyatc.png"/></td>

		<td width="10" bgcolor="#F3F3F3"><input name="dosyatc" type="checkbox"></td>

	</tr>
</table></form><br /><hr />
<br>
<iframe id="gelenBilgi" name="gelenBilgi" src="" style="display: none"></iframe>
<div id="sonuclar" align="center"></div>
<br>
<div id="copyright" align="center">&copy; 2011-2012 Mert Çolak</div>
</div>
</body>
</html>