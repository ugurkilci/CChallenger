<?php include("ayar.php"); include("fon.php"); ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>CChallenger Beta - You Challenge Game</title>
		
		<link rel="alternate" href="cchallenger.tk" hreflang="tr-TR" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="shortcut icon" href="resimler/cchallenger-icon.ico"/>
		<link rel="author" href="dipnot.txt"/>
		<link href="https://plus.google.com/+dusunenadamugur" rel="publisher"/>
		
		<meta name="author" content="Uğur KILCI, ugurbocugu8@gmail.com" />
		<meta name="designer" content="Uğur KILCI - CChallenger Challenge Oyunu Sitesi" />
		<meta name="description" content="Kötü Amaçlaya Yayınlanmış Soruları Şikayet Et! Senin Meydan Okuma Oyunun! CChallenger You Challenge Game!"/>
		<meta name="keywords" content="şikayet, et, complaint, complain, cchallenger, challenger, you, challenge, game, meydan okuma, oyun, site, web, internet, play, oyna, soru, cevap"/>
		<meta name="robots" content="index, follow"/>
		
		<script src="js/jquery.min.js"></script>
	</head>
	<body>
		<?php include("header.php"); ?></header>
		
		<div class="col-sm-6 col-sm-offset-3 text-center">
			<h1>Soruyu Şikayet Et!</h1><br />
			<?php
				if($_POST){
					
					$kime 	= strip_tags($_POST["kime"]); //kime
					$mail	= strip_tags($_POST["mail"]); //mail
					$mesaj 	= strip_tags($_POST["mesaj"]); //mesaj
					
					if(empty($kime) || empty($mail) || empty($mesaj)){
						echo "<font color='white'>Lütfen Boş Bırakmayınız! ):</font><br /><br />";
					}else{
						if(!mkon($mail)){
							echo "<font color='white'>Lütfen Geçerli Bir E-Posta Kullanın! ):</font><br /><br />";
						}else{
							header("REFRESH:0; URL=http://umailer.tk/m?kime=$kime&mail=$mail&mesaj=$mesaj&kod=3c7d4d");
						}
					}
					
				}
			?>
			<form action="" method="POST">
				<input type="text" name="kime" class="form-control" placeholder="Ad Soyad"/><br />
				<input type="text" name="mail" class="form-control" placeholder="Mail"/><br />
				<textarea name="mesaj" class="form-control" placeholder="Mesaj"></textarea><br />
				<button type="submit" name="kod" class="btn btn-danger form-control" value="3c7d4d"><span class="glyphicon glyphicon-remove"></span> Şikayet Et!</button>
			</form>
		</div>
	</body>
</html>