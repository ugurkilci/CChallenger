<?php include("ayar.php"); include("fon.php"); ?>
<html>
	<head>
		<title>CChallenger Beta - You Challenge Game</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" href="css/genel.css"/>
		
		<link rel="shortcut icon" href="resimler/cchallenger-icon.ico">
		<meta name="description" content="Soruları Doğru Cevaplayarak Meydan Okuma Oyununu Kazabilecek Misin? Senin Meydan Okuma Oyunun! CChallenger You Challenge Game!">
		<meta name="keywords" content="ekle, add, cchallenger, challenger, you, challenge, game, meydan okuma, oyun, site, web, internet, play, oyna, soru, cevap">
		<link rel="author" href="dipnot.txt">

		<link href="https://plus.google.com/+dusunenadamugur" rel="publisher">
	</head>
	<body>
		<?php include("header.php"); ?></header>
		<h1 class="text-center">Ekle</h1><br />
		<div class="col-sm-6 col-sm-offset-3 text-center">
			<?php
				
				if($_POST){
					$soru 		= strip_tags($_POST["soru"]);
					$cevap 		= strip_tags($_POST["cevap"]);
					$ceza 		= strip_tags($_POST["ceza"]);
					$adsoyad 	= strip_tags($_POST["adsoyad"]);
					$eposta 	= strip_tags($_POST["eposta"]);
					$fb 		= strip_tags($_POST["fb"]);
					$twt 		= strip_tags($_POST["twt"]);
					
					$url 		= $fb || $twt;

					if(empty($soru) || empty($cevap) || empty($ceza) || empty($adsoyad) || empty($eposta) || empty($fb) || empty($twt)){//boş mu
						echo "<font color='white'>Lütfen Boş Bırakmayınız! ):</font><br /><br />";
					}else{
						if(!mkon($eposta)){//eposta kontrolu
							echo "<font color='white'>Lütfen Geçerli Bir E-Posta Kullanın! ):</font><br /><br />";
						}else{
							if(!filter_var($url, FILTER_VALIDATE_URL)){//Geçerli link adresi
								$ekle = $vt->prepare("insert into sorular set soru=?, sorurep=?, cevap=?, ceza=?, adsoyad=?, eposta=?, fb=?, twt=?");
								$ekle->execute(array($soru, rep($soru), $cevap, $ceza, $adsoyad, $eposta, $fb, $twt));
						
								if($ekle){
									echo "<font color='white'>Başarılı Bir Şekilde Yollandı. :)</font><br /><br />";//oo süper gidiyor
								}else{
									echo "<font color='white'>Yollama Başarısız! :(</font>";//yollamada sıkıntı var
								}
							}else{
								echo "<font color='white'>Lütfen Geçerli Link Kullanın! ):</font><br /><br />";//geçersiz link adresi
							}
						}
					}
				}
				
			?>
			<form action="" method="POST">
				<input type="text" name="soru" class="form-control" placeholder="Soru"/><br />
				<input type="text" name="cevap" class="form-control" placeholder="Cevap"/><br />
				<input type="text" name="ceza" class="form-control" placeholder="Ceza"/><br />
				<input type="text" name="adsoyad" class="form-control" placeholder="Ad Soyad"/><br />
				<input type="text" name="eposta" class="form-control" placeholder="E-Posta @"/><br />
				<input type="text" name="fb" class="form-control" placeholder="http://facebook.com/"/><br />
				<input type="text" name="twt" class="form-control" placeholder="http://twitter.com/"/><br />
				<button type="submit" class="btn btn-success form-control"><span class="glyphicon glyphicon-bullhorn"></span> Yolla!</button>
			</form>
		</div>
	</body>
</html>