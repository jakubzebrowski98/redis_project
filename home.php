<?php
require_once "./redis_server.php";
	session_start();
	$login = $_SESSION['login'];
	$drewno = $redis -> hget("$login:surowce",'drewno');
	$kamien = $redis -> hget("$login:surowce",'kamien');
	$zelazo = $redis -> hget("$login:surowce",'zelazo');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="home1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<title>Document</title>
</head>
<body style="background: url(./zdj/982990.jpg) no-repeat 20% 20%;">
	<div class="top-navbar">
		<ul class="nav">
			<a href="./home.php"class="wyloguj"><li>Wioska <?php echo $_SESSION['login']?></li></a>
			<li>Wiadomosci</li>

			<li><a href="./budowa.php">Budowa</a></li>
			<a href="./ranking_page.php"><li class="wyloguj">Ranking</li></a>

			<li>Profil</li>
			<a href="./login_page.php"><li class="wyloguj">Wyloguj</li></a>
		</ul>
	</div>
	<div class="game">
		<div class="left-bar">
			<div class="kategoria">
				<span class="tytul-kategori">Surowce</span> 
				<ul class="surowce">
					<li><img src="./zdj/drewno.png" alt="">Drewno <span><?php echo $drewno;?></span></li>	
					<li><img src="./zdj/kamien.png" alt="">Kamień <span><?php echo $kamien;?></span></li>
					<li><img src="./zdj/zelazo.png" alt="">Żelazo <span><?php echo $zelazo;?></span></li>
				</ul>
			</div> 
			<div class="kategoria">
				<span class="tytul-kategori">Jednostki</span> 
				<ul class="surowce">
					<?php 
						$pikinier = $redis -> HGET("$login:jednostki",'pikinier');
						$miecznik = $redis -> HGET("$login:jednostki",'miecznik');
						$zwiadowca = $redis -> HGET("$login:jednostki",'zwiadowca');
						$szlachcic = $redis -> HGET("$login:jednostki",'szlachcic');
						if($pikinier != 0){
							echo<<<PIK
								<li><img src="https://dspl.innogamescdn.com/asset/34fb11bc/graphic/unit/unit_spear.png" alt="">Pikinier<span>$pikinier</span></li>
							PIK;
						}
						if($miecznik != 0){
							echo<<<PIK
								<li><img src="https://dspl.innogamescdn.com/asset/34fb11bc/graphic/unit/unit_sword.png" alt="">miecznik<span>$miecznik</span></li>
							PIK;
						}
						if($zwiadowca != 0){
							echo<<<PIK
								<li><img src="https://dspl.innogamescdn.com/asset/34fb11bc/graphic/unit/unit_spy.png" alt="">zwiadowca<span>$zwiadowca</span></li>
							PIK;
						}
						if($szlachcic != 0){
							echo<<<PIK
								<li><img src="https://dspl.innogamescdn.com/asset/34fb11bc/graphic/unit/unit_snob.png" alt="">szlachcic<span>$szlachcic</span></li>
							PIK;
						}

						
					?>

				</ul>
			</div>
			<div class="kategoria">
				<span class="tytul-kategori">Pozostałe</span> 
				<ul class="surowce">
					<li><img src="./zdj/drewno.png" alt="">Ludnosc <span>400/2000</span></li>
					<li><img src="./zdj/kamien.png" alt="">Spichlerz <span>4000</span></li>
				</ul>
			</div> 
		</div>
		<div class="border">
			<img class="tartak" src="./zdj/tartak.png" alt="" >
			<img class="ratusz" src="https://dspl.innogamescdn.com/asset/34fb11bc/graphic/big_buildings/main1.png" >
			<img class="spichlerz" src="https://dspl.innogamescdn.com/asset/34fb11bc/graphic/big_buildings/storage3.png" >
			<img class="kamieniolom" src="https://dspl.innogamescdn.com/asset/34fb11bc/graphic/big_buildings/stone3.png">
			<img class="huta" src="https://dspl.innogamescdn.com/asset/34fb11bc/graphic/big_buildings/iron3.png">
			<img class="koszary" src="https://dspl.innogamescdn.com/asset/34fb11bc/graphic/big_buildings/barracks3.png">
			<img src="./zdj/game.jpg" class="background-game">
			
		</div>
		
		
	</div>
</body>
</html>