<?php 
    session_start();
?>

<?php

    require "tmpsPHP/_head.php";

?>


<body>
    <header class="header">
        <div class="container">
            <?php 
                require "tmpsPHP/_log-btn.php";
            ?>
            <?php if($_SESSION['access'] === 'admin' || $_SESSION['access'] === 'student'): ?>
            <div class="personal">
                <?php 
                    if ($_SESSION['access'] === 'admin') {
                        echo "<div class='admin'>
                        <div class='admin__trig'>&#9660;</div>
                        <ul class='admin__setts hide'>
                            <li data-to='students'>Изменить</li>
                            <li data-to='vedomost'>Создать ведомость</li>
                        </ul>
                        </div>";
                    }
                ?>
                <div class="personal__initials">
                    Артем Осипенок
                </div>
                <div class="personal__photo">
                    <img src="img/me.png" />
                </div>
            </div>
            <?php endif ?>
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
                <?php 
                if ($_SESSION['access'] === 'admin' || $_SESSION['access'] === 'student') {
                    echo "<li><a class='aside__item' href='vedomost.php'>Создать ведомость</a>";
                }
                ?>
            </ul>
            <div class="show__aside">&#10095;</div>
        </aside>
        <main class="main">
            <h1 class="title">Ведомость</h1>
            <div class="divider"></div>
            <div class="ved__btns hide">
                <div class="ved__btn" data-aim="create-ved">Создать</div>
                <div class="ved__btn" data-aim="change-ved">Изменить</div>
            </div>
            <div class="create__ved hide">
                <label>Студент для которого создается ведомость</label>
                <input type='text' name="find__stud" id="find__stud" placeholder="Информация о студенте" />
                <div class="find__search">
                    <img src="icons/search.svg" />
                </div>
            </div>
            <div class="ved__table hide">
                <h2 style="font-weight: 400;">Список студентов по запросу <span class="request__stud"></span></h2>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Номер зачетки</th>
                                <th for='stud__fio'>ФИО студента</th>
                                <th>Курс</th>
                                <th>Группа</th>
                                <th>Специальность</th>
                                <th>Факультет</th>
                                <th>Ведомость</th>
                        </thead>
                        <tbody>
                            <?php 
                                require "tmpsPHP/_students-without.php";
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ved__template">
                <h2 style="font-weight: 400;">Номер зачетки: </h2>
                <div class="ved__add-row">
                    <input id="ved-subject" placeholder="Дисциплина">
                    <input type="text" id="ved-hours" placeholder="Часы">
                    <input id="ved-control" placeholder="Ф-ма к-ля">
                    <input id="ved-mark" placeholder="Оценка">
                    <input id="ved-date" placeholder="Дата">
                    <input id="ved-teacher" placeholder="Преподаватель">   
                    <div id="add_button">Добавить</div>
                    <div id="clear_button">Очистить</div>
                </div>
            </div>
            <form class="ved__table">
                <span style="font-size: 17px;">Номер семестра:</span>
                <select class="choose__sem">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
                <table>
                    <thead>
                        <th>Дисциплина</th>
                        <th style='width:50px'>Часы</th>
                        <th>Ф-ма контроля</th>
                        <th style='width:80px'>Оценка</th>
                        <th>Дата</th>
                        <th>Преподаватель</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" id="ved__subject-1" name="ved__subject-1" value="Subject" readonly/></td>
                            <td><input type="text" id="ved__subject-1" name="ved__subject-1" readonly/></td>
                            <td><input type="text" id="ved__subject-1" name="ved__subject-1" readonly/></td>
                            <td><input type="text" id="ved__subject-1" name="ved__subject-1" readonly/></td>
                            <td><input type="text" id="ved__subject-1" name="ved__subject-1" readonly/></td>
                            <td><input type="text" id="ved__subject-1" name="ved__subject-1" readonly/></td>
                        </tr>
                    </tbody>
                </table>
                <button class="ved__btn" type="submit">Создать ведомость</button>
            </form>
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