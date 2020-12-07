<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link href="css/null.css" rel="stylesheet" />
    <link href="css/header.css" rel="stylesheet" />
    <link href="css/footer.css" rel="stylesheet" />
    <link href="css/sidebar.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/mypage.css" rel="stylesheet" />
    <link href="css/loader.css" rel="stylesheet" />
    <script defer type="module" src="js/mypage.js"></script>
    <script defer src="js/sidebar.js"></script>
    <script defer src="js/main.js"></script>
    <script defer type="module" src="js/admin.js"></script>
    <style>
        .content {
            margin: 10px 0 0 0;
            padding: 0 20px 35px 0;
            min-height: 83%;
            display: flex;
            justify-content: space-between;
        }

        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
        <?php 
                require "tmpsPHP/_log-btn.php";
            ?>
            <div class="personal">
                <div class="admin">
                    <div class="admin__trig">&#9660;</div>
                    <ul class="admin__setts hide">
                        <li data-to="students">Изменить</li>
                        <li data-to="vedomost">Создать ведомость</li>
                </div>
                </ul>
                <div class="personal__initials">
                Артем Осипенок
                </div>
                <div class="personal__photo">
                    <img src="img/me.png" />
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <aside class="aside" data-mode="open">
            <ul class="aside__list">
                <li><a class="aside__item" href="home.php">Главная</a></li>
                <li><a class="aside__item" href="faculties.php">Факультеты</a></li>
                <li><a class="aside__item" href="specialities.php">Специальности</a></li>
                <li><a class="aside__item" href="teachers.php">Преподаватели</a></li>
                <li><a class="aside__item" href="groups.php">Группы</a></li>
                <li><a class="aside__item" href="students-btns.php">Студенты</a></li>
            </ul>
            <div class="show__aside">&#10095;</div>
        </aside>
        <main class="main">
        <div class="specialities" id="specialities">
                <h1 class="title">Специальности</h1>
                <div class="divider"></div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Специальность</th>
                                <th>Факультет</th>
                                <th>Учебный план</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require "tmpsPHP/_specialnost.php"
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="logo">
                &copy; BSU of Informatics and Radioelectronics
            </div>
        </div>
    </footer>
    <?php
        require "tmpsPHP/_mypage.php";
    ?>
</body>

</html>