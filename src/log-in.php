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
            <form class="form" method="post">
                <h1>Welcome</h1>
                <div class="username">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"/>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password"/>
                </div>
                <button type="submit">LOGIN</button>
            </form>
            <p class="forget">&#149; Forgot <a href="_help.php">Username/Password</a>?</p>
        </div>
    </div>

    <script src="js/log-in.js"></script>
</body>
</html>