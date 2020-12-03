<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link href="css/null.css" rel="stylesheet" />
    <link href="css/header.css" rel="stylesheet" />
    <link href="css/footer.css" rel="stylesheet" />
    <link href="css/sidebar.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <script defer src="js/mypage.js"></script>
    <script defer src="js/sidebar.js"></script>
    <style>
        .content {
            margin: 10px 0 0 0;
            min-height: 83%;
            display: flex;
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
                <div class="personal__initials">
                    Pavel Yurchenko
                </div>
                <div class="personal__photo">
                    <img src="img/me.png" />
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <aside class="aside">
            <ul class="aside__list">
                <li class="aside__item" data-to="faculties">Факультеты</li>
                <li class="aside__item" data-to="specialities">Специальности</li>
                <li class="aside__item" data-to="plans">Учебные планы</li>
                <li class="aside__item" data-to="teachers">Преподаватели</li>
                <li class="aside__item" data-to="groups">Группы</li>
                <li class="aside__item" data-to="students">Студенты</li>
            </ul>
        </aside>
        <main class="main">
            <div class="faculties hide" id="faculties">
                <h1 class="title">Факультеты</h1>
                <div class="divider"></div>
                <ul class="faculties__list">
                </ul>
            </div>
            <div class="specialities hide" id="specialities">
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td><a href="#"></a></td>
                            </tr>
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
                            <p class="mypage__initials_lastname">Ф: <span>Юрченко</span></p>
                            <p class="mypage__initials_lastname">И: <span>Павел</span></p>
                            <p class="mypage__initials_lastname">О: <span>Дмитриевич</span></p>
                            <p class="mypage__group">Студент группы: <span>912601</span></p>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>