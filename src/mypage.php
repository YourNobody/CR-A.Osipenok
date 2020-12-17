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
            <h1 class="title">Персональная страница студента</h1>
            <div class="divider"></div>
            <?php
                require "tmpsPHP/_mypage.php";
            ?>

            <?php if ($_SESSION['access'] === 'student'): ?>
            <ul class="filters__choose sem__choose">
                <li>
                    <h3 class="mypage__title">Семестр:</h3>
                <li>
                <li>
                    <span>1</span>
                    <input type="radio" class="radio" data-aim="sem-1" id="sem-1" name="sem"/>
                    <label for="sem-1"></label>
                </li>
                <li>
                    <span>2</span>
                    <input type="radio" class="radio" data-aim="sem-2" id="sem-2" name="sem"/>
                    <label for="sem-2"></label>
                </li>
                <li>
                    <span>3</span>
                    <input type="radio" class="radio" data-aim="sem-3" id="sem-3" name="sem"/>
                    <label for="sem-3"></label>
                </li>
                <li>
                    <span>4</span>
                    <input type="radio" class="radio" data-aim="sem-4" id="sem-4" name="sem"/>
                    <label for="sem-4"></label>
                </li>
                <li>
                    <span>5</span>
                    <input type="radio" class="radio" data-aim="sem-5" id="sem-5" name="sem"/>
                    <label for="sem-5"></label>
                </li>
                <li>
                    <span>6</span>
                    <input type="radio" class="radio" data-aim="sem-6" id="sem-6" name="sem"/>
                    <label for="sem-6"></label>
                </li>
                <li>
                    <span>7</span>
                    <input type="radio" class="radio" data-aim="sem-7" id="sem-7" name="sem"/>
                    <label for="sem-7"></label>
                </li>
                <li>
                    <span>8</span>
                    <input type="radio" class="radio" data-aim="sem-8" id="sem-8" name="sem"/>
                    <label for="sem-8"></label>
                </li>
            </ul>
            <?php endif ?>
            <div class="table">
                <?php 
                    if ($_SESSION['access'] === 'student') 
                        require "tmpsPHP/_get-vedomost.php";
                ?>
            </div>
        </main>
    </div>
    <script defer src="js/mypage.js"></script>
    <?php 
    require "tmpsPHP/_footer.php";
?>

</body>
</html>