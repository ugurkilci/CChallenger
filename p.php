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
		<meta name="description" content="Soruları Doğru Cevaplayarak Meydan Okuma Oyununu Kazabilecek Misin? Senin Meydan Okuma Oyunun! CChallenger You Challenge Game!"/>
		<meta name="keywords" content="ne, bu, hakkımızda, about, cchallenger, challenger, you, challenge, game, meydan okuma, oyun, site, web, internet, play, oyna, soru, cevap"/>
		<meta name="robots" content="index, follow"/>
		
		<script src="js/jquery.min.js"></script>
	</head>
	<body>
		<?php include("header.php"); ?></header>
		
		<div class="col-sm-6 col-sm-offset-3">
			<?php
				
				$i = @$_GET["i"]; // tip :D
				$p = @$_GET["p"]; // sayı
				
				switch($i){
					case"ne-bu":
						echo '
							<div class="b">
								<center><img src="resimler/cchallenger-logo-buyuk.png" class="img-responsive"/></center>
								<h1>CChallenger</h1>
								
								Bu sitenin mantığı oldukça basittir. Siteye girer girmez bir soru ile karşılaşırsınız. Soruyu doğru bilen ve ya soruya yaklaşan kişi kazanır. Kaybeden ise soruyu ekleyen kişinin cezası ile yüzleşir. Bu kadar basit.<br /><br />
								
								CChallenger, fikrini bulan ve yapan Uğur KILCI isimli insan evladı bu siteyi YouTube canlı yayınında yapmaya başlamıştır. <a href="https://www.youtube.com/watch?v=xXX4kqkDex4" title="Youtube Canlı Yayın Soru Cevap Sitesi Yapma">Videoyu izlemek istiyorsanız..</a><br /><br />
								
								İyi çelınçlar! :)<br /><br />
								<a href="https://www.facebook.com/CChallenger-1809203992696383/" class="btn btn-primary" title="CChallenger Facebook">Facebookta Takip Et!</a>
								<a href="https://www.twitter.com/CChallenger" class="btn btn-info" title="CChallenger Twitter">Twitterda Takip Et!</a><br /><br />
								CChallenger Copyright &copy; 2016<br /><br />
							</div>
						';
					break;
					
					case"a":
						echo '
							<center>
								<a href="index">Anasayfa</a> / 
								<a href="p?p='.$p.'&i=a">HATA</a>
								<img src="resimler/hata.gif" class="img-responsive"/>
							</center>
							<h1 class="text-center b1">'.$p.' HATA!</h1>
						';
					break;
					
					default:
						header("refresh:0; url=p?p=404&i=a");
					break;
				}
				
			?>
		</div>
	</body>
</html>