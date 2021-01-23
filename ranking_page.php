<?php
    require_once "./redis_server.php";
    session_start();
    $len = $redis -> SCARD('username');
    $x = 0;
    for($x ;$x < $len;$x++){
        $user = $redis -> SMEMBERS('username')[$x];
        $punkty = $redis -> HGET("$user:dane",'punkty');
        $redis -> ZADD("plemiona:ranking",$punkty,$user);
    }

    if(isset($_POST['wyszukaj'])){
        $szukany_gracz = $_POST['wyszukaj'];
    }else{ $szukany_gracz = "";}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ranking.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <title>login_page</title>
</head>
<body style="background: url(./zdj/982990.jpg) no-repeat 20% 20%;">
    <div class="top-navbar">
		<ul class="nav">
            <a href="./home.php"class="wyloguj"><li>Wioska <?php echo $_SESSION['login']?></li></a>
			<li>Wiadomosci</li>
			<li>Budowa</li>
			<a href="./ranking_page.php"><li class="wyloguj">Ranking</li></a>
			<li>Profil</li>
			<a href="./login_page.php"><li class="wyloguj">Wyloguj</li></a>
		</ul>
	</div>
    <div class="ranking_box">
        <main>
            <table>
                <tr style="font-size: 20px;font-weight: bold;font-family: 'Quicksand', sans-serif;">
                    <td >Pozycja</td>
                    <td class ="name" style="padding: 0 12em;">Nazwa Użytkownika</td>
                    <td>punkty</td>
                </tr>
        <?php
        $ile = $redis -> ZCARD("plemiona:ranking");
            if($szukany_gracz == ""){
                if($ile < 10){
                    $y = $ile;
                }else{$y = 10;}
                for($x = 0;$x < $y;$x++){
                    $name = $redis -> ZREVRANGE("plemiona:ranking",$x,$x)[0];
                    $punkty = $redis -> HGET("$name:dane",'punkty');
                    $rank = $redis -> ZREVRANK("plemiona:ranking",$name) +1;
                    echo<<<RANK
                            <tr>
                                <td>$rank</td>
                                <td class ="name">$name</td>
                                <td>$punkty</td>
                            </tr>
                        RANK;
                }
            }else{
                $ktory = $redis -> ZREVRANK("plemiona:ranking",$szukany_gracz);
                if($ktory < 4){$g = 0;$max = 10;}else{$g = $ktory -5;}
                if($ktory+5 > $ile){$max = $ile;}else{$max = $ktory+5;}
                for($z = $g;$z < $max;$z++){
                    $name = $redis -> ZREVRANGE("plemiona:ranking",$z,$z)[0];
                    $punkty = $redis -> HGET("$name:dane",'punkty');
                    $rank = $redis -> ZREVRANK("plemiona:ranking",$name) +1;
                    if(!isset($name)){
                        $name ="";
                        $punkty = "";
                        $rank = "";
                    }
                    if($ktory == $rank-1){
                        echo<<<ktory
                                <tr>
                                    <td style="font-weight: 900;color: #55ff00;">$rank</td>
                                    <td class ="name" style="font-weight: 900;color: #55ff00;">$name</td>
                                    <td style="font-weight: 900;color: #55ff00;">$punkty</td>
                                </tr>
                            ktory;
                    }else{                    
                        echo<<<ktory
                            <tr>
                                <td>$rank</td>
                                <td class ="name">$name</td>
                                <td>$punkty</td>
                            </tr>
                            ktory;
                    }
                }
            }
        ?>
            </table>
        </main>
        <div class="menu">
            <form action="" method="POST">
                <input type="text" name="wyszukaj" class="login-username" placeholder="Wyszukaj gracza"/>
                <input type="submit" value="szukaj" name="mybutton" class="login-submit sign-in">
            </form>
        </div>
    </div>
    
</body>
</html>