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
            </ul>
            <div class="show__aside">&#10095;</div>
        </aside>
        <main class="main">
        <div class="groups" id="groups">
                <h1 class="title">Группы</h1>
                <div class="divider"></div>
                <div class="filters">
                    <div class="filters__btn filters__set" data-aim="set">Фильтр</div>
                    <div class="filters__choose">
                        <div class="filters__btn filters__reset" data-aim="reset">Сбросить</div>
                        <div class="filters__btn filters__hide" data-aim="hide">Скрыть</div>
                        <div class="filters__btns">
                            <div>
                                <span>По курсу: </span>
                                <input type="radio" class="radio" data-aim="course" id="filt__course" name="filt__table"/>
                                <label for="filt__course"></label>
                            </div>
                            <div>
                                <span>По специльностям: </span>
                                <input type="radio" class="radio" data-aim="spec" id="filt__spec" name="filt__table"/>
                                <label for="filt__spec"></label>
                            </div>
                            <div>
                                <span>По факультетам: </span>
                                <input type="radio" class="radio" data-aim="fac" id="filt__fac" name="filt__table"/>
                                <label for="filt__fac"></label>
                            </div>
                            <input type="text" name="filt__bytext" id="filt__bytext"/>
                        </div>
                    </div>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Номер группы</th>
                                <th>Специальность</th>
                                <th>Факультет</th>
                                <?php 
                                    if ($_SESSION['access'] === 'admin' || $_SESSION['access'] === 'student') {
                                        echo "<th>Список студентов</th>";
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require "tmpsPHP/_groups.php"
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