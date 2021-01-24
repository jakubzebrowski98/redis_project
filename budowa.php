<?php
require_once "./redis_server.php";
	session_start();
	$login = $_SESSION['login'];
	$drewno = $redis -> hget("$login:surowce",'drewno');
	$kamien = $redis -> hget("$login:surowce",'kamien');
    $zelazo = $redis -> hget("$login:surowce",'zelazo');
    $ratusz = $redis -> hget("$login:budynki", 'ratusz');
    $koszary = $redis -> hget("$login:budynki", 'koszary');
    $spichlerz = $redis -> hget("$login:budynki", 'spichlerz');
    $zagroda = $redis -> hget("$login:budynki", 'zagroda');
    $tartak = $redis -> hget("$login:budynki", 'tartak');
    $huta = $redis -> hget("$login:budynki", 'huta');
    $kamieniolom = $redis -> hget("$login:budynki", 'kamieniolom');
    $wymagania_drewno = $redis -> hget("$login:wymagania",'drewno');
    $wymagania_kamien = $redis -> hget("$login:wymagania",'kamien');
    $wymagania_zelazo = $redis -> hget("$login:wymagania",'zelazo');
    $wymagania_ludnosc = $redis -> hget("$login:wymagania",'ludnosc');
    $wymagania_czas = $redis -> hget("$login:wymagania",'czas');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="budowa.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <title>budowa</title>
</head>
<body class = "main_page">
    <div id='building_wrapper'>
        <table id='buildings'>
            <tbody>
                <tr id='ratusz'>
                    <td><img src=""><span>Ratusz </span><span><?php echo 'poziom '.$ratusz;?></span></td>
                    <td><img src="./zdj/drewno.png"><span><?php echo $wymagania_drewno;?></span></td>
                    <td><img src="./zdj/kamien.png"><span><?php echo $wymagania_kamien;?></span></td>
                    <td><img src="./zdj/zelazo.png"><span><?php echo $wymagania_zelazo;?></span></td>
                    <td><img src="./zdj/czas.png"><?php echo $wymagania_czas.' min';?></td>
                    <td><img src="./zdj/ludnosc.png"><?php echo $wymagania_ludnosc;?></td>
                    <td><img src=""><a href="./rozbudowa.php"><span>Rozbuduj</span></a></td>
                </tr>
                <tr id='koszary'>
                    <td><img src=""><span>Koszary </span><span><?php echo 'poziom '.$koszary;?></span></td>
                    <td><img src="./zdj/drewno.png"><span><?php echo $wymagania_drewno;?></span></td>
                    <td><img src="./zdj/kamien.png"><span><?php echo $wymagania_kamien;?></span></td>
                    <td><img src="./zdj/zelazo.png"><span><?php echo $wymagania_zelazo;?></span></td>
                    <td><img src="./zdj/czas.png"><?php echo $wymagania_czas.' min';?></td>
                    <td><img src="./zdj/ludnosc.png"><?php echo $wymagania_ludnosc;?></td>
                    <td><img src=""><a href="./rozbudowa.php"><span>Rozbuduj</span></a></td>
                </tr>
                <tr id='zagroda'>
                    <td><img src=""><span>Zagroda </span><span><?php echo 'poziom '.$zagroda;?></span></td>
                    <td><img src="./zdj/drewno.png"><span><?php echo $wymagania_drewno;?></span></td>
                    <td><img src="./zdj/kamien.png"><span><?php echo $wymagania_kamien;?></span></td>
                    <td><img src="./zdj/zelazo.png"><span><?php echo $wymagania_zelazo;?></span></td>
                    <td><img src="./zdj/czas.png"><?php echo $wymagania_czas.' min';?></td>
                    <td><img src="./zdj/ludnosc.png"><?php echo $wymagania_ludnosc;?></td>
                    <td><img src=""><a href="./rozbudowa.php"><span>Rozbuduj</span></a></td>
                </tr>
                <tr id='spichlerz'>
                <td><img src=""><span>Spichlerz </span><span><?php echo 'poziom '.$spichlerz;?></span></td>
                    <td><img src="./zdj/drewno.png"><span><?php echo $wymagania_drewno;?></span></td>
                    <td><img src="./zdj/kamien.png"><span><?php echo $wymagania_kamien;?></span></td>
                    <td><img src="./zdj/zelazo.png"><span><?php echo $wymagania_zelazo;?></span></td>
                    <td><img src="./zdj/czas.png"><?php echo $wymagania_czas.' min';?></td>
                    <td><img src="./zdj/ludnosc.png"><?php echo $wymagania_ludnosc;?></td>
                    <td><img src=""><a href="./rozbudowa.php"><span>Rozbuduj</span></a></td>
                </tr>
                <tr id='tartak'>
                    <td><img src=""><span>Tartak </span><span><?php echo 'poziom '.$tartak;?></span></td>
                    <td><img src="./zdj/drewno.png"><span><?php echo $wymagania_drewno;?></span></td>
                    <td><img src="./zdj/kamien.png"><span><?php echo $wymagania_kamien;?></span></td>
                    <td><img src="./zdj/zelazo.png"><span><?php echo $wymagania_zelazo;?></span></td>
                    <td><img src="./zdj/czas.png"><?php echo $wymagania_czas.' min';?></td>
                    <td><img src="./zdj/ludnosc.png"><?php echo $wymagania_ludnosc;?></td>
                    <td><img src=""><a href="./rozbudowa.php"><span>Rozbuduj</span></a></td>
                </tr>
                <tr id='cegielnia'>
                    <td><img src=""><span>Cegielnia </span><span><?php echo 'poziom '.$kamieniolom;?></span></td>
                    <td><img src="./zdj/drewno.png"><span><?php echo $wymagania_drewno;?></span></td>
                    <td><img src="./zdj/kamien.png"><span><?php echo $wymagania_kamien;?></span></td>
                    <td><img src="./zdj/zelazo.png"><span><?php echo $wymagania_zelazo;?></span></td>
                    <td><img src="./zdj/czas.png"><?php echo $wymagania_czas.' min';?></td>
                    <td><img src="./zdj/ludnosc.png"><?php echo $wymagania_ludnosc;?></td>
                    <td><img src=""><a href="./rozbudowa.php"><span>Rozbuduj</span></a></td>
                </tr>
                <tr id='huta'>
                    <td><img src=""><span>Huta Żelaza </span><span><?php echo 'poziom '.$huta;?></span></td>
                    <td><img src="./zdj/drewno.png"><span><?php echo $wymagania_drewno;?></span></td>
                    <td><img src="./zdj/kamien.png"><span><?php echo $wymagania_kamien;?></span></td>
                    <td><img src="./zdj/zelazo.png"><span><?php echo $wymagania_zelazo;?></span></td>
                    <td><img src="./zdj/czas.png"><?php echo $wymagania_czas.' min';?></td>
                    <td><img src="./zdj/ludnosc.png"><?php echo $wymagania_ludnosc;?></td>
                    <td><img src=""><a href="./rozbudowa.php"><span>Rozbuduj</span></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>