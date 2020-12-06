<?php 
    $access = 'admin'
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
            <a class="log__out" href="log-in.php">
                Log out
            </a>
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
                <li><a class="aside__item" href="faculties.php">Факультеты</a></li>
                <li><a class="aside__item" href="specialities.php">Специальности</a></li>
                <li><a class="aside__item" href="teachers.php">Преподаватели</a></li>
                <li><a class="aside__item" href="groups.php">Группы</a></li>
                <li><a class="aside__item" href="students-btns.php">Студенты</a></li>
            </ul>
            <div class="show__aside">&#10095;</div>
        </aside>
        <main class="main">
            <div class="teachers" id="teachers">
                <h1 class="title">Преподавательский состав</h1>
                <div class="divider"></div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Преподаватель</th>
                                <th style='width:40%;'>Предмет</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require "tmpsPHP/_teachers.php"
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
    <div class="mypage hide">
        <div class="mypage__dialog">
            <div class="mypage__buttons">
                <div class="mypage__photo">
                    <img src="img/me.png" />
                </div>
                <input type="file" id="change__photo" name="change__photo" />
            </div>
            <div class="mypage__data">
                <div class="mypage__initals">
                    <p class="mypage__initials_lastname">Ф: <span>Осипенок</span></p>
                    <p class="mypage__initials_lastname">И: <span>Артем</span></p>
                    <p class="mypage__initials_lastname">О: <span>Отцовович</span></p>
                    <p class="mypage__group">Студент группы: <span>813802</span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>