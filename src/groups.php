<?php 
    session_start();
?>

<?php

    require "tmpsPHP/_head.php";

?>


<body>
<?php 
        require "tmpsPHP/_header.php";
    ?>
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
                if ($_SESSION['access'] === 'admin') {
                    echo "<li><a class='aside__item' href='vedomost.php'>Создать ведомость</a>";
                }
                ?>
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
                            <input type="text" name="filt__bytext" id="filt__bytext" placeholder="Введите информацию о группе"/>
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
    <?php 
    require "tmpsPHP/_footer.php";
?>

</body>
</html>