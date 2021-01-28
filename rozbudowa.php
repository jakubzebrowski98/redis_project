<?php
    require_once "./redis_server.php";
    session_start();
    $login = $_SESSION['login'];
    $budynek_poziom = $_POST['buduj_wartosc'];
    $budynek_nazwa = $_POST['nazwa_wartosc'];

    //wymagania
    $czas = $_POST['czas_wartosc'];
    $drewno = $_POST['drewno_wartosc'];
    $kamien = $_POST['kamien_wartosc'];
    $zelazo = $_POST['zelazo_wartosc'];

    $drewno = strval( $drewno );
    $kamien = strval( $kamien );
    $zelazo = strval( $zelazo );
    $drewno2 = '-';
    $kamien2 = '-';
    $zelazo2 = '-';
    $drewno2 .= $drewno;
    $kamien2 .= $kamien;
    $zelazo2 .= $zelazo;

	$drewno_dostepne = $redis -> hget("$login:surowce",'drewno');
	$kamien_dostepne = $redis -> hget("$login:surowce",'kamien');
    $zelazo_dostepne = $redis -> hget("$login:surowce",'zelazo');
    
    if ($drewno > $drewno_dostepne || $kamien > $kamien_dostepne || $zelazo > $zelazo_dostepne){
        header('Location: home.php');
    } else {
        $redis -> HINCRBY("$login:surowce", 'drewno', $drewno2);
        $redis -> HINCRBY("$login:surowce", 'kamien', $kamien2);
        $redis -> HINCRBY("$login:surowce", 'zelazo', $zelazo2);

        sleep($czas);
        switch ($budynek_nazwa) {
            case 'ratusz':
                $redis -> HINCRBY("$login:budynki", 'ratusz', '1');
                $redis -> HINCRBY("$login:dane", 'punkty', '40');
                break;
            case 'koszary':
                $redis -> HINCRBY("$login:budynki", 'koszary', '1');
                $redis -> HINCRBY("$login:dane", 'punkty', '20');
                break;
            case 'spichlerz':
                $redis -> HINCRBY("$login:budynki", 'spichlerz', '1');
                $redis -> HINCRBY("$login:dane", 'punkty', '42');
                break;
            case 'zagroda':
                $redis -> HINCRBY("$login:budynki", 'zagroda', '1');
                $redis -> HINCRBY("$login:dane", 'punkty', '12');
                break;
            case 'tartak':
                $redis -> HINCRBY("$login:budynki", 'tartak', '1');
                $redis -> HINCRBY("$login:dane", 'punkty', '6');
                break;
            case 'huta':
                $redis -> HINCRBY("$login:budynki", 'huta', '1');
                $redis -> HINCRBY("$login:dane", 'punkty', '6');
                break;
            case 'cegielnia':
                $redis -> HINCRBY("$login:budynki", 'kamieniolom', '1');
                $redis -> HINCRBY("$login:dane", 'punkty', '8');
                break;
        }
        header('Location: home.php');
    }

?>