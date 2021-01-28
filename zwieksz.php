<?php
    require_once "./redis_server.php";

        $minuta = date('s');
        if($minuta % 10 == 0){
            $p_kamieniolom = $redis -> HGET("hh:budynki",'kamieniolom');
            $p_huta= $redis -> HGET("hh:budynki",'huta');
            $p_tartak = $redis -> HGET("hh:budynki",'tartak');
    
            $o_ile_kamieniolom = $p_kamieniolom * 1.2;
            $o_ile_huta = $p_huta * 1.2;
            $o_ile_tartak = $p_tartak * 1.2;
            $redis -> HINCRBYFLOAT("hh:surowce",'kamien',$o_ile_kamieniolom);
            $redis -> HINCRBYFLOAT("hh:surowce",'zelazo',$o_ile_huta);
            $redis -> HINCRBYFLOAT("hh:surowce",'drewno',$o_ile_tartak);
            
        }
        $drewno = intval($redis -> hget("hh:surowce",'drewno'));
        $kamien = intval($redis -> hget("hh:surowce",'kamien'));
        $zelazo = intval($redis -> hget("hh:surowce",'zelazo'))  ;

    echo<<<HERE
            <li><img src="./zdj/drewno.png" alt="">Drewno <span id="Update">$drewno</span></li>	
            <li><img src="./zdj/kamien.png" alt="">Kamień <span id="Update">$kamien</span></li>
            <li><img src="./zdj/zelazo.png" alt="">Żelazo <span id="Update">$zelazo</span></li>
        HERE;
?>