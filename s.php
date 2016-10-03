<?php 
	include("ayar.php"); include("ushare.php"); $s = $_GET["s"]; /* sayfa adi */ $i = $_GET["i"]; /* id */ 
	$ve = $vt->prepare("select * from sorular where sorurep=?"); 
	$ve->execute(array($s)); 
	$vrow = $ve->fetch(PDO::FETCH_ASSOC);
?>
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
		<meta name="description" content="<?php echo $vrow["soru"]; ?>. Senin Meydan Okuma Oyunun! CChallenger You Challenge Game!"/>
		<meta name="keywords" content="sayfa, page, paylaşım, post, cchallenger, challenger, you, challenge, game, meydan okuma, oyun, site, web, internet, play, oyna, soru, cevap"/>
		<meta name="robots" content="index, follow"/>
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<title>CChallenger Beta - You Challenge Game</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" href="css/genel.css"/>
		
		<link rel="shortcut icon" href="resimler/cchallenger-icon.ico">
		<meta name="description" content="Soruları Doğru Cevaplayarak Meydan Okuma Oyununu Kazabilecek Misin? Senin Meydan Okuma Oyunun! CChallenger You Challenge Game!">
		<meta name="keywords" content="">
		<link rel="author" href="dipnot.txt">
		
		<link rel="canonical" href="http://cchallenger.tk/s?s=<?php echo $s; ?>&i=<?php echo $i; ?>" />
		
		<link href="https://plus.google.com/+dusunenadamugur" rel="publisher">
		
		<script src="js/jquery.min.js"></script>
	</head>
	<body>
		<?php include("header.php"); 
		
			$num_rec_per_page = 1; 
				 try { 
				   if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; }; 
				   $start_from = ($page-1) * $num_rec_per_page; 
				   $sql = "SELECT * FROM sorular where sorurep=? and id=? LIMIT $start_from, $num_rec_per_page"; 
				   $rs_result = $vt->prepare($sql); 
				   $rs_result->setFetchMode(PDO::FETCH_ASSOC); 
				   $rs_result->execute(array($s,$i)); 
				   if($rs_result->rowCount()>0){
				
				while($row=$rs_result->fetchObject()){
					
					echo'
						<a href="mailto:mail@mail.com" class="btn btn-label" alt="isim soyisim"><span class="glyphicon glyphicon-user"></span> <strong>'.$row->adsoyad.'</strong></a> 
						<a href="'.$row->fb.'" class="btn btn-label" target="_blank" title="'.$row->adsoyad.' Facebook"><span class="yazi">k</span></a> 
						<a href="'.$row->twt.'" class="btn btn-label" alt="twitter" target="_blank" title="'.$row->adsoyad.' Twitter"><span class="yazi">E</span></a> 
						<a href="sikayet-et" class="btn btn-xs btn-danger" alt="şikayet et" target="_blank" title="Şikayet Et">Soruyu Şikayet Et!</a> 
					</header>
					
					<div class="text-center dublein">
							<h2>Şimdi Challenge Vakti! :)</h2>
							<h1><a href="s?s='.$row->sorurep.'&i='.$row->id.'" title="'.$row->sorurep.'">'.$row->soru.'</a></h1><br /><br />
							
							<a href="index" class="btn btn-lg btn-warning" title="Yeni Soru"><span class="glyphicon glyphicon-refresh"></span> Yeni Soru</a>
							
							<!-- Trigger the modal with a button -->
							<button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-bullhorn"></span> Cevap Ne?</button>

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
											<a href="'.ushare("fb").'" class="btn btn-xs btn-primary" alt="Facebook">facebook</a>
											<a href="'.ushare("twt").'" class="btn btn-xs btn-info" alt="Twitter">twitter</a>
											<a href="'.ushare("gpls").'" class="btn btn-xs btn-danger" alt="Google Plus">google+</a>
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Kapat!</button>
									</div>
								</div>
							</div>
					</div><br /><div class="col-sm-6 col-sm-offset-3"><hr></div>
					<div class="col-sm-6 col-sm-offset-3 b">
						<h3>Yorumlar</h3><hr>
						disquis
					</div>
					';
					
				}} 
				else{ 
					header("refresh:0; url=p?p=404&i=a"); }
				} 
				catch(PDOException $pe){
					header("refresh:0; url=p?p=404&i=a");
				}
		?>		
	</body>
</html>