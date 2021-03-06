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

</body>

</html>