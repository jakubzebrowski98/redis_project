<?php
    require_once "./redis_server.php";
	session_start();
	$login = $_SESSION['login'];
        $minuta = date('s');
        if($minuta % 10 == 0){
            $p_kamieniolom = $redis -> HGET("$login:budynki",'kamieniolom');
            $p_huta= $redis -> HGET("$login:budynki",'huta');
            $p_tartak = $redis -> HGET("$login:budynki",'tartak');
    
            $o_ile_kamieniolom = $p_kamieniolom * 1;
            $o_ile_huta = $p_huta * 1;
            $o_ile_tartak = $p_tartak * 1;
            $redis -> HINCRBYFLOAT("$login:surowce",'kamien',$o_ile_kamieniolom);
            $redis -> HINCRBYFLOAT("$login:surowce",'zelazo',$o_ile_huta);
            $redis -> HINCRBYFLOAT("$login:surowce",'drewno',$o_ile_tartak);
            
        }
        $drewno = intval($redis -> hget("$login:surowce",'drewno'));
        $kamien = intval($redis -> hget("$login:surowce",'kamien'));
        $zelazo = intval($redis -> hget("$login:surowce",'zelazo'));

    echo<<<HERE
            <li><img src="./zdj/drewno.png" alt="">Drewno <span id="Update">$drewno</span></li>	
            <li><img src="./zdj/kamien.png" alt="">Kamień <span id="Update">$kamien</span></li>
            <li><img src="./zdj/zelazo.png" alt="">Żelazo <span id="Update">$zelazo</span></li>
        HERE;
?>