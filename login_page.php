

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <title>login_page</title>
</head>
<body class = "main_page">
    <div class="login_box">
        <form class="login-form" action="./logowanie.php" method="post">
            <h1 class="logo" >The Witcher</h1>
            <input type="login" name="login" class="login-username" autofocus="true" required="true" placeholder="Login" />
            <input type="password" name= "password" class="login-password" required="true" placeholder="Hasło" />
            <a href="./home.php"><input type="submit" name="Login" value="Login" class="login-submit" /></a>
            <a href="./register_page.php"><input type="button" name="Sign in" value="Sign in" class="login-submit sign-in" /></a>
        </form>
    </div>
</body>
</html>