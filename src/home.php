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
                    Pavel Yurchenko
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
                <li class="aside__item" data-to="faculties">Факультеты</li>
                <li class="aside__item" data-to="specialities">Специальности</li>
                <li class="aside__item" data-to="teachers">Преподаватели</li>
                <li class="aside__item" data-to="groups">Группы</li>
                <li class="aside__item" data-to="students">Студенты</li>
            </ul>
            <div class="show__aside">&#10095;</div>
        </aside>
        <main class="main">
            <div class="faculties hide" id="faculties">
                <div class="title">
                    <h1 class="title">Факультеты</h1>
                    <!-- <div class="loader">
                        <div class="lds-dual-ring"></div>
                    </div> -->
                </div>
                <div class="divider"></div>
                <ul class="faculties__list">
                    <?php 
                        require "_faculties.php"
                    ?>
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
                            <?php 
                                require "_specialnost.php"
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="teachers hide" id="teachers">
                <h1 class="title">Преподавательский состав</h1>
                <div class="divider"></div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Преподаватель</th>
                                <th>Предмет</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="groups hide" id="groups">
                <h1 class="title">Группы</h1>
                <div class="divider"></div>
                <div class="choose__course">
                    <label>1</label><input class="radio" type="radio" id="choose__course_radio" name="choose__course_radio"/>
                    <label>2</label><input class="radio" type="radio" id="choose__course_radio" name="choose__course_radio"/>
                    <label>3</label><input class="radio" type="radio" id="choose__course_radio" name="choose__course_radio"/>
                    <label>4</label><input class="radio" type="radio" id="choose__course_radio" name="choose__course_radio"/>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Номер группы</th>
                                <th>Специальность</th>
                                <th>Факультет</th>
                                <th>Список студентов</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require "_groups.php"
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="students hide" id="students">
                <?php
                    require "_students.php"
                ?>
                <h1 class="title"><span>Студенты <div data-aim="adding" style="top: 6px;" class="ch__img"><img data-aim="adding" src="icons/add.svg" id="change-stud"></div>  
                </span></h1>
                <div class="divider"></div>
                <?php 
                    $server = 'localhost';
                    $name = 'kp';
                    $pass = 'kp';
                    $db = 'kursach';
                
                    $mysql = new mysqli($server, $name, $pass, $db); 
                
                    $sql = 'SELECT number_group, name_spec 
                            FROM grups
                            INNER JOIN student ON grups.id_group = student.id_group
                            INNER JOIN specialnost ON grups.id_spec=specialnost.id_spec
                            GROUP BY number_group 
                            ';
                
                    $result = mysqli_query($mysql, $sql);
                
                    if ($result == false) {
                        print("Произошла ошибка при выполнении запроса");
                        exit();
                    }

                    while($row = mysqli_fetch_array($result)) {
                        echo "<form action=\"_buttons.php\" method=\"post\"><input type='hidden' name='n_gr' value='$row[number_group]'><button>$row[number_group]($row[name_spec])</button><form>, ";
                    }
                ?>
                
            </div>
            <div class="change__info hide" id="change__info">
                <h1 class="title">Данные о студенте</h1>
                <div class="divider"></div>
                <form action="_add.php" method="post" class="change__info_form">
                    <label for="firstname">Имя: </label><input type="text" id="firstname" name="firstname" placeholder="Введите имя"/>
                    <label for="lastname">Фамилия: </label><input type="text" id="lastname" name="lastname" placeholder="Введите фамилию"/>
                    <label for="patronymic">Отчество: </label><input type="text" id="patronymic" name="patronymic" placeholder="Введите отчество"/>
                    <label for="curs">Курс</label>
                    <select id="curses" name="curs">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                    <label for="facs">Факультет</label>
                    <select id="facs" name="fac">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                    <button type="submit">Принять</button>
                </form>
            </div>
            <div id="deleting__info" class="deleting__info hide">
                <form method="post" action="_delete.php">
                </form>
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