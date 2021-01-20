<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class = "main_page">
    <div class="login_box">
        <form class="login-form" action="./rejestracja.php" method="post">
            <a href="./login_page.php" class="logo"><h1>The Witcher</h1></a>
            <input type="login" name="login" class="login-username" autofocus="true" required="true" placeholder="login" />
            <input type="email"  name="email" class="login-username" autofocus="true" required="true" placeholder="Email" />
            <input type="password" name="password" class="login-password" required="true" placeholder="hasło" />
            <input type="password" name="re_password" class="login-password" required="true" placeholder="Powtórz hasło" />
            <a href="./login_page.php"><input type="submit" class="login-submit sign-in" name="Login" value="Zarejesruj"  /></a>
        </form>
    </div>
</body>
</html>