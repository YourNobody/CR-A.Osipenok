<?php 
session_start();
$_SESSION['access'] = 'guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="css/null.css" rel="stylesheet"/>
    <link href="css/log-in.css" rel="stylesheet"/>
</head>
<body>
    <div class="wrapper">
        <div class="log__in">
            <form class="form" action="tmpsPHP/_signin.php" method="post">
                <h1>Авторизация</h1>
                <div class="username">
                    <input type="text" name="login" id="login" placeholder="Логин" required/>
                </div>
                <div class="password">
                    <input type="password" name="password" id="password" placeholder="Пароль" required/>
                </div>
                <button type="submit">Войти</button>
            </form>
            <a class="guest" href="home.php">Войти как гость</a>
            <p class="forget">&#149; Забыли <a href="tmpsPHP/_help.php">Логин/Пароль</a>?</p>
        </div>
    </div>

</body>
</html>