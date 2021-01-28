<?php
    session_start();

    require_once "./redis_server.php";
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $is_login = 0;

    if($password == $re_password){
        if($is_login == 0){
            $redis -> SADD('username', $login);
            $redis -> HMSET("$login:dane",'username',$login,'email',$email,'password',$password,'punkty',0);
            $redis -> HMSET("$login:surowce",'drewno',200.0,'kamien',200.0,'zelazo',200.0);
            $redis -> HMSET("$login:jednostki",'miecznik',10,'pikinier',10,'zwiadowca',0,'szlachcic',0);
            $redis -> HMSET("$login:budynki",'ratusz',1,'tartak',1,'kamieniolom',1,'huta',1,'mur',0,'koszary',0,'spichlerz',0, 'zagroda', 1);
            $redis -> HMSET("$login:wymagania_ratusz", 'nazwa', 'ratusz', 'drewno',80,'kamien',150,'zelazo',100,'ludnosc',10,'czas', 3);
            $redis -> HMSET("$login:wymagania_koszary", 'nazwa', 'koszary','drewno',40,'kamien',50,'zelazo',20,'ludnosc',5,'czas', 5);
            $redis -> HMSET("$login:wymagania_zagroda", 'nazwa', 'zagroda','drewno',50,'kamien',50,'zelazo',100,'ludnosc',0,'czas', 10);
            $redis -> HMSET("$login:wymagania_spichlerz", 'nazwa', 'spichlerz','drewno',280,'kamien',120,'zelazo',130,'ludnosc',15,'czas', 7);
            $redis -> HMSET("$login:wymagania_tartak", 'nazwa', 'tartak','drewno',80,'kamien',90,'zelazo',100,'ludnosc',8,'czas', 12);
            $redis -> HMSET("$login:wymagania_cegielnia", 'nazwa', 'cegielnia','drewno',90,'kamien',80,'zelazo',100,'ludnosc',6,'czas', 12);
            $redis -> HMSET("$login:wymagania_huta", 'nazwa', 'huta','drewno',100,'kamien',90,'zelazo',80,'ludnosc',12,'czas', 12);
            header('Location: login_page.php');
        }else{
            header('Location: register_page.php');
        }
    }else{
        header('Location: register_page.php');
    }
?>