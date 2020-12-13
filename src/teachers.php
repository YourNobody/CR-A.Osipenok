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
    <?php
        require "tmpsPHP/_mypage.php";
    ?>
</body>

</html>