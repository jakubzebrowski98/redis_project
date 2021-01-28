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
    //
    $ratusz_nazwa = $redis -> hget("$login:wymagania_ratusz", 'nazwa');
    $koszary_nazwa = $redis -> hget("$login:wymagania_koszary", 'nazwa');
    $spichlerz_nazwa = $redis -> hget("$login:wymagania_spichlerz", 'nazwa');
    $zagroda_nazwa = $redis -> hget("$login:wymagania_zagroda", 'nazwa');
    $tartak_nazwa = $redis -> hget("$login:wymagania_tartak", 'nazwa');
    $huta_nazwa = $redis -> hget("$login:wymagania_huta", 'nazwa');
    $kamieniolom_nazwa = $redis -> hget("$login:wymagania_cegielnia", 'nazwa');
    //
    $wymagania_ratusz_drewno = $redis -> hget("$login:wymagania_ratusz",'drewno');
    $wymagania_ratusz_kamien = $redis -> hget("$login:wymagania_ratusz",'kamien');
    $wymagania_ratusz_zelazo = $redis -> hget("$login:wymagania_ratusz",'zelazo');
    $wymagania_ratusz_ludnosc = $redis -> hget("$login:wymagania_ratusz",'ludnosc');
    $wymagania_ratusz_czas = $redis -> hget("$login:wymagania_ratusz",'czas');
    //
    $wymagania_koszary_drewno = $redis -> hget("$login:wymagania_koszary",'drewno');
    $wymagania_koszary_kamien = $redis -> hget("$login:wymagania_koszary",'kamien');
    $wymagania_koszary_zelazo = $redis -> hget("$login:wymagania_koszary",'zelazo');
    $wymagania_koszary_ludnosc = $redis -> hget("$login:wymagania_koszary",'ludnosc');
    $wymagania_koszary_czas = $redis -> hget("$login:wymagania_koszary",'czas');
    //
    $wymagania_spichlerz_drewno = $redis -> hget("$login:wymagania_spichlerz",'drewno');
    $wymagania_spichlerz_kamien = $redis -> hget("$login:wymagania_spichlerz",'kamien');
    $wymagania_spichlerz_zelazo = $redis -> hget("$login:wymagania_spichlerz",'zelazo');
    $wymagania_spichlerz_ludnosc = $redis -> hget("$login:wymagania_spichlerz",'ludnosc');
    $wymagania_spichlerz_czas = $redis -> hget("$login:wymagania_spichlerz",'czas');
    //
    $wymagania_zagroda_drewno = $redis -> hget("$login:wymagania_zagroda",'drewno');
    $wymagania_zagroda_kamien = $redis -> hget("$login:wymagania_zagroda",'kamien');
    $wymagania_zagroda_zelazo = $redis -> hget("$login:wymagania_zagroda",'zelazo');
    $wymagania_zagroda_ludnosc = $redis -> hget("$login:wymagania_zagroda",'ludnosc');
    $wymagania_zagroda_czas = $redis -> hget("$login:wymagania_zagroda",'czas');
    //
    $wymagania_tartak_drewno = $redis -> hget("$login:wymagania_tartak",'drewno');
    $wymagania_tartak_kamien = $redis -> hget("$login:wymagania_tartak",'kamien');
    $wymagania_tartak_zelazo = $redis -> hget("$login:wymagania_tartak",'zelazo');
    $wymagania_tartak_ludnosc = $redis -> hget("$login:wymagania_tartak",'ludnosc');
    $wymagania_tartak_czas = $redis -> hget("$login:wymagania_tartak",'czas');
    //
    $wymagania_cegielnia_drewno = $redis -> hget("$login:wymagania_cegielnia",'drewno');
    $wymagania_cegielnia_kamien = $redis -> hget("$login:wymagania_cegielnia",'kamien');
    $wymagania_cegielnia_zelazo = $redis -> hget("$login:wymagania_cegielnia",'zelazo');
    $wymagania_cegielnia_ludnosc = $redis -> hget("$login:wymagania_cegielnia",'ludnosc');
    $wymagania_cegielnia_czas = $redis -> hget("$login:wymagania_cegielnia",'czas');
    //
    $wymagania_huta_drewno = $redis -> hget("$login:wymagania_huta",'drewno');
    $wymagania_huta_kamien = $redis -> hget("$login:wymagania_huta",'kamien');
    $wymagania_huta_zelazo = $redis -> hget("$login:wymagania_huta",'zelazo');
    $wymagania_huta_ludnosc = $redis -> hget("$login:wymagania_huta",'ludnosc');
    $wymagania_huta_czas = $redis -> hget("$login:wymagania_huta",'czas');

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
            <?php
                echo "<tr id='ratusz'>";
                    echo '<form action="./rozbudowa.php" class = "budynki" method="post">';
                    echo "<td><img src=><span>Ratusz </span><span>poziom $ratusz</span></td>";
                    echo "<td><img src=./zdj/drewno.png><span>$wymagania_ratusz_drewno</span></td>";
                    echo "<td><img src=./zdj/kamien.png><span> $wymagania_ratusz_kamien</span></td>";
                    echo "<td><img src=./zdj/zelazo.png><span> $wymagania_ratusz_zelazo</span></td>";
                    echo "<td><img src=./zdj/czas.png> $wymagania_ratusz_czas sec</td>";
                    echo "<td><img src=./zdj/ludnosc.png>$wymagania_ratusz_ludnosc</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='buduj_wartosc' value='$ratusz'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='nazwa_wartosc' value='$ratusz_nazwa'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='czas_wartosc' value='$wymagania_ratusz_czas'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='drewno_wartosc' value='$wymagania_ratusz_drewno'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='kamien_wartosc' value='$wymagania_ratusz_kamien'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='zelazo_wartosc' value='$wymagania_ratusz_zelazo'</td>";
                    echo "<td><input type='submit' class = 'przycisk_rozbuduj' name='buduj' value='Rozbuduj'</td>";
                    echo "</form>";
                echo "</tr>";
                
                echo "<tr id='koszary'>";
                    echo '<form action="./rozbudowa.php" class = "budynki" method="post">';
                    echo "<td><img src=><span>Koszary </span><span>poziom $koszary</span></td>";
                    echo "<td><img src=./zdj/drewno.png><span>$wymagania_koszary_drewno</span></td>";
                    echo "<td><img src=./zdj/kamien.png><span> $wymagania_koszary_kamien</span></td>";
                    echo "<td><img src=./zdj/zelazo.png><span> $wymagania_koszary_zelazo</span></td>";
                    echo "<td><img src=./zdj/czas.png> $wymagania_koszary_czas sec</td>";
                    echo "<td><img src=./zdj/ludnosc.png>$wymagania_koszary_ludnosc</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='buduj_wartosc' value='$koszary'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='nazwa_wartosc' value='$koszary_nazwa'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='czas_wartosc' value='$wymagania_koszary_czas'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='drewno_wartosc' value='$wymagania_ratusz_drewno'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='kamien_wartosc' value='$wymagania_ratusz_kamien'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='zelazo_wartosc' value='$wymagania_ratusz_zelazo'</td>";
                    echo "<td><input type='submit' class = 'przycisk_rozbuduj' name='buduj' value='Rozbuduj'</td>";
                    echo "</form>";
                echo "</tr>";

                echo "<tr id='spichlerz'>";
                    echo '<form action="./rozbudowa.php" class = "budynki" method="post">';
                    echo "<td><img src=><span>Spichlerz </span><span>poziom $spichlerz</span></td>";
                    echo "<td><img src=./zdj/drewno.png><span>$wymagania_spichlerz_drewno</span></td>";
                    echo "<td><img src=./zdj/kamien.png><span> $wymagania_spichlerz_kamien</span></td>";
                    echo "<td><img src=./zdj/zelazo.png><span> $wymagania_spichlerz_zelazo</span></td>";
                    echo "<td><img src=./zdj/czas.png> $wymagania_spichlerz_czas sec</td>";
                    echo "<td><img src=./zdj/ludnosc.png>$wymagania_spichlerz_ludnosc</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='buduj_wartosc' value='$spichlerz'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='nazwa_wartosc' value='$spichlerz_nazwa'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='czas_wartosc' value='$wymagania_spichlerz_czas'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='drewno_wartosc' value='$wymagania_spichlerz_drewno'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='kamien_wartosc' value='$wymagania_spichlerz_kamien'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='zelazo_wartosc' value='$wymagania_spichlerz_zelazo'</td>";
                    echo "<td><input type='submit' class = 'przycisk_rozbuduj' name='buduj' value='Rozbuduj'</td>";
                    echo "</form>";
                echo "</tr>";

                echo "<tr id='zagroda'>";
                    echo '<form action="./rozbudowa.php" class = "budynki" method="post">';
                    echo "<td><img src=><span>Zagroda </span><span>poziom $zagroda</span></td>";
                    echo "<td><img src=./zdj/drewno.png><span>$wymagania_zagroda_drewno</span></td>";
                    echo "<td><img src=./zdj/kamien.png><span> $wymagania_zagroda_kamien</span></td>";
                    echo "<td><img src=./zdj/zelazo.png><span> $wymagania_zagroda_zelazo</span></td>";
                    echo "<td><img src=./zdj/czas.png> $wymagania_zagroda_czas sec</td>";
                    echo "<td><img src=./zdj/ludnosc.png>$wymagania_zagroda_ludnosc</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='buduj_wartosc' value='$zagroda'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='nazwa_wartosc' value='$zagroda_nazwa'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='czas_wartosc' value='$wymagania_zagroda_czas'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='drewno_wartosc' value='$wymagania_zagroda_drewno'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='kamien_wartosc' value='$wymagania_zagroda_kamien'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='zelazo_wartosc' value='$wymagania_zagroda_zelazo'</td>";
                    echo "<td><input type='submit' class = 'przycisk_rozbuduj' name='buduj' value='Rozbuduj'</td>";
                    echo "</form>";
                echo "</tr>";

                echo "<tr id='tartak'>";
                    echo '<form action="./rozbudowa.php" class = "budynki" method="post">';
                    echo "<td><img src=><span>Tartak </span><span>poziom $tartak</span></td>";
                    echo "<td><img src=./zdj/drewno.png><span>$wymagania_tartak_drewno</span></td>";
                    echo "<td><img src=./zdj/kamien.png><span> $wymagania_tartak_kamien</span></td>";
                    echo "<td><img src=./zdj/zelazo.png><span> $wymagania_tartak_zelazo</span></td>";
                    echo "<td><img src=./zdj/czas.png> $wymagania_tartak_czas sec</td>";
                    echo "<td><img src=./zdj/ludnosc.png>$wymagania_tartak_ludnosc</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='buduj_wartosc' value='$tartak'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='nazwa_wartosc' value='$tartak_nazwa'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='czas_wartosc' value='$wymagania_tartak_czas'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='drewno_wartosc' value='$wymagania_tartak_drewno'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='kamien_wartosc' value='$wymagania_tartak_kamien'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='zelazo_wartosc' value='$wymagania_tartak_zelazo'</td>";
                    echo "<td><input type='submit' class = 'przycisk_rozbuduj' name='buduj' value='Rozbuduj'</td>";
                    echo "</form>";
                echo "</tr>";

                echo "<tr id='huta'>";
                    echo '<form action="./rozbudowa.php" class = "budynki" method="post">';
                    echo "<td><img src=><span>Huta Żelaza </span><span>poziom $huta</span></td>";
                    echo "<td><img src=./zdj/drewno.png><span>$wymagania_huta_drewno</span></td>";
                    echo "<td><img src=./zdj/kamien.png><span> $wymagania_huta_kamien</span></td>";
                    echo "<td><img src=./zdj/zelazo.png><span> $wymagania_huta_zelazo</span></td>";
                    echo "<td><img src=./zdj/czas.png> $wymagania_huta_czas sec</td>";
                    echo "<td><img src=./zdj/ludnosc.png>$wymagania_huta_ludnosc</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='buduj_wartosc' value='$huta'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='nazwa_wartosc' value='$huta_nazwa'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='czas_wartosc' value='$wymagania_huta_czas'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='drewno_wartosc' value='$wymagania_huta_drewno'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='kamien_wartosc' value='$wymagania_huta_kamien'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='zelazo_wartosc' value='$wymagania_huta_zelazo'</td>";
                    echo "<td><input type='submit' class = 'przycisk_rozbuduj' name='buduj' value='Rozbuduj'</td>";
                    echo "</form>";
                echo "</tr>";

                echo "<tr id='cegielnia'>";
                    echo '<form action="./rozbudowa.php" class = "budynki" method="post">';
                    echo "<td><img src=><span>Kamieniolom </span><span>poziom $kamieniolom</span></td>";
                    echo "<td><img src=./zdj/drewno.png><span>$wymagania_cegielnia_drewno</span></td>";
                    echo "<td><img src=./zdj/kamien.png><span> $wymagania_cegielnia_kamien</span></td>";
                    echo "<td><img src=./zdj/zelazo.png><span> $wymagania_cegielnia_zelazo</span></td>";
                    echo "<td><img src=./zdj/czas.png> $wymagania_cegielnia_czas sec</td>";
                    echo "<td><img src=./zdj/ludnosc.png>$wymagania_cegielnia_ludnosc</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='buduj_wartosc' value='$kamieniolom'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='nazwa_wartosc' value='$kamieniolom_nazwa'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='czas_wartosc' value='$wymagania_cegielnia_czas'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='drewno_wartosc' value='$wymagania_cegielnia_drewno'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='kamien_wartosc' value='$wymagania_cegielnia_kamien'</td>";
                    echo "<td><input type='hidden' class = 'przycisk_rozbuduj' name='zelazo_wartosc' value='$wymagania_cegielnia_zelazo'</td>";
                    echo "<td><input type='submit' class = 'przycisk_rozbuduj' name='buduj' value='Rozbuduj'</td>";
                    echo "</form>";
                echo "</tr>";
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>