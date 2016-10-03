<?php include("ayar.php"); include("fon.php"); include("ushare.php"); ?>
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
		<meta name="keywords" content="cchallenger, challenger, you, challenge, game, meydan okuma, oyun, site, web, internet, play, oyna, soru, cevap"/>
		<meta name="robots" content="index, follow"/>
		
		<script src="js/jquery.min.js"></script>
	</head>
	<body>
		<?php include("header.php"); 
			
			$num_rec_per_page = 1; 
				 try { 
				   if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; }; 
				   $start_from = ($page-1) * $num_rec_per_page; 
				   $sql = "SELECT * FROM sorular ORDER BY RAND() LIMIT $start_from, $num_rec_per_page"; 
				   $rs_result = $vt->prepare($sql); 
				   $rs_result->setFetchMode(PDO::FETCH_ASSOC); 
				   $rs_result->execute(); 
				   if($rs_result->rowCount()>0){
				
				while($row=$rs_result->fetchObject()){
					
					echo'
						<a href="mailto:'.$row->eposta.'" class="btn btn-label" title="'.$row->adsoyad.'"><span class="glyphicon glyphicon-user"></span> <strong>'.$row->adsoyad.'</strong></a> 
						<a href="'.$row->fb.'" class="btn btn-label" title="facebook" target="_blank"><span class="yazi">k</span></a> 
						<a href="'.$row->twt.'" class="btn btn-label" title="twitter" target="_blank"><span class="yazi">E</span></a> 
						<a href="sikayet-et" class="btn btn-xs btn-danger" title="şikayet et" target="_blank">Soruyu Şikayet Et!</a> 
					</header>
					
					<div class="text-center dublein">
							<h2>Şimdi Challenge Vakti! :)</h2>
							<h1><a href="s?s='.$row->sorurep.'&i='.$row->id.'" rel="bookmark">'.$row->soru.'</a></h1><br /><br />
							
							<a href="index" class="btn btn-lg btn-warning" title="Yeni Soru"><span class="glyphicon glyphicon-refresh"></span> Yeni Soru</a>
							
							<!-- Trigger the modal with a button -->
							<button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-bullhorn"></span> Cevap Ne?</button>
							<br /><br /><p class="b1"><strong>Nasıl Çalışır?</strong><br />Yukarıdaki soruyu bilen veya yaklaşan kazanır. Soruda ki cezayı uygular.</p>

							<!-- Modal -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Cevap Ne?</h4>
									</div>
									<div class="modal-body">
										<p>
											<strong>Cevap:</strong> '.$row->cevap.'<br />
											<strong>Ceza:</strong> '.$row->ceza.'<br />
											<hr>
											<strong>Paylaş:</strong>
											<a href="'.ushare("f:b").'http://cchallenger.tk/s?s='.$row->sorurep.'&i='.$row->id.''.$row->ceza.'" class="btn btn-xs btn-primary" title="'.$row->soru.' Sorusunu Facebook ta Paylaş">facebook</a>
											<a href="'.ushare("t:wt").'http://cchallenger.tk/s?s='.$row->sorurep.'&i='.$row->id.'" class="btn btn-xs btn-info" title="'.$row->soru.' Sorusunu Twitter da Paylaş">twitter</a>
											<a href="'.ushare("g:pls").'http://cchallenger.tk/s?s='.$row->sorurep.'&i='.$row->id.'" class="btn btn-xs btn-danger" title="'.$row->soru.' Sorusunu Google Plus ta Paylaş">google+</a>
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Kapat!</button>
									</div>
								</div>
							</div>
					</div>
					';
					
				}} 
				else{ 
					header("refresh:0; url=p?p=404&i=a"); }
				} 
				catch(PDOException $pe){
					header("refresh:0; url=p?p=404&i=a");
				}
				
			$sayhelea = $vt->prepare("select * from ayarlar where ayarlar_isim=?"); 
			$sayhelea->execute(array("tiklanma-sayisi")); 
			$sayhele = $sayhelea->fetch(PDO::FETCH_ASSOC);
			
			$tik = $sayhele["ayarlar_deger"]+1; 
			$gtik = $vt->prepare("update ayarlar set ayarlar_deger=? where ayarlar_isim=?"); 
			$gtik->execute(array($tik,"tiklanma-sayisi"));
		?>		
	</body>
</html>