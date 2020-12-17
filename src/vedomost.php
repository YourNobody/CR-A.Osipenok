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
            <h1 class="title">Ведомость</h1>
            <div class="divider"></div>
            <div class="ved__btns">
                <div class="ved__btn" data-aim="create-ved">Создать</div>
            </div>
            <div class="search__create-ved hide">
                <div class="create__ved">
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
            </div>
            <div class="creating__ved hide">
                <div class="ved__template">
                    <div class="ved__add-row">
                        <input data-to="ved-id" placeholder="ID дисциплины"/>
                        <input type="text" data-to="ved-hours" placeholder="Часы" readonly/>
                        <input data-to="ved-control" placeholder="Ф-ма к-ля"/>
                        <input data-to="ved-mark" placeholder="Оценка"/>
                        <input data-to="ved-date" placeholder="Дата"/>
                        <input data-to="ved-teacher" placeholder="Преподаватель"/>   
                        <div id="add__button" class="btn" data-aim="add">Добавить</div>
                        <div id="clear__button" class="btn" data-aim="clear">Очистить</div>
                    </div>
                </div>
                <form action="tmpsPHP/_add-vedomost.php" method="post" class="ved__table-form">
                    <span style="font-size: 17px;">Номер семестра:</span>
                    <select class="choose__sem" name="num__sem">
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
                            <?php require "tmpsPHP/_get-hours.php" ?>
                        </tbody>
                    </table>
                    <button class="ved__btn" type="submit">Создать ведомость</button>
                </form>
            </div>
        </main>
    </div>
    <script defer src="js/vedomost.js"></script>
<?php 
    require "tmpsPHP/_footer.php";
?>
</body>

</html>