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
            <div class="students" id="students">
                <h1 class="title"><span>Студенты
                        <?php
                if($_SESSION['access'] == 'admin') echo "<div data-aim='adding' style='top: 6px;' class='ch__img'><img data-aim='adding' src='icons/add.svg' id='change-stud'></div>";?>
                    </span></h1>
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
                    <?php 
                        require "tmpsPHP/_students.php";
                    ?>
                </div>
            </div>
            <div class="add__info hide" id="add__info">
                <h1 class="title">Добавить студента</h1>
                <div class="divider"></div>
                <form action="tmpsPHP/_add.php" method="post" class="change__info_form">
                    <label for="num__zuch">Номер зачетки: </label><input type="text" id="num__zach" name="num__zach"
                        placeholder="Введите номер зачетки" />
                    <label for="firstname">Имя: </label><input type="text" id="firstname" name="firstname"
                        placeholder="Введите имя" />
                    <label for="lastname">Фамилия: </label><input type="text" id="lastname" name="lastname"
                        placeholder="Введите фамилию" />
                    <label for="patronymic">Отчество: </label><input type="text" id="patronymic" name="patronymic"
                        placeholder="Введите отчество" />
                    <label for="id__group">ID группы: </label><input type="text" id="id__group" name="id__group"
                        placeholder="Введите ID группы" />

                    <label for="curses">Курс:</label>
                    <select id="curses" name="curs">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>

                    <label for="facs">Факультет</label>
                    <select id="facs" name="fac">
                        <?php 

                $server = 'localhost';
                $name = 'kp';
                $pass = 'kp';
                $db = 'kursach';

                $mysql = new mysqli($server, $name, $pass, $db); 
                $sql = 'SELECT name_fac, id_fac FROM faculty ORDER BY id_fac';

                $result = mysqli_query($mysql, $sql);

                if ($result == false) {
                    print("Произошла ошибка при выполнении запроса");
                    exit();
                }

                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>$row[name_fac]</option>";
                }

                $mysql->close();

            ?>
                    </select>

                    <label for="specs">Специльность:</label>
                    <select id="specs" name="spec">
                        <?php 

                $server = 'localhost';
                $name = 'kp';
                $pass = 'kp';
                $db = 'kursach';

                $mysql = new mysqli($server, $name, $pass, $db); 
                $sql = 'SELECT id_spec, name_spec FROM specialnost ORDER BY id_spec';

                $result = mysqli_query($mysql, $sql);

                if ($result == false) {
                    print("Произошла ошибка при выполнении запроса");
                    exit();
                }

                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>$row[name_spec]</option>";
                }

                $mysql->close();

            ?>
                    </select>
                    <button type="submit" class="btn">Принять</button>
                </form>
            </div>
            <div id="deleting__info" class="deleting__info hide">
                <form method="post" action="tmpsPHP/_delete.php">
                </form>
            </div>
            <div class="change__info hide" id="change__info">
                <h1 class="title">Изменить данные о студенте</h1>
                <div class="divider"></div>
                <form action="tmpsPHP/_change.php" method="post" class="change__info_form">
                    <label for="num__zuch">Номер зачетки: </label><input type="text" id="num__zach" name="num__zach" data-ref="number__zach"
                        placeholder="Введите номер зачетки"/>
                    <label for="firstname">Имя: </label><input type="text" id="firstname" name="firstname" data-ref="stud__fio"
                        placeholder="Введите имя" />
                    <label for="lastname">Фамилия: </label><input type="text" id="lastname" name="lastname" data-ref="stud__fio"
                        placeholder="Введите фамилию" />
                    <label for="patronymic">Отчество: </label><input type="text" id="patronymic" name="patronymic" data-ref="stud__fio" 
                        placeholder="Введите отчество" />
                    <label for="id__group">ID группы: </label><input type="text" id="id__group" name="id__group" data-ref="number__group"
                        placeholder="Введите ID группы" />

                    <label for="curses">Курс:</label>
                    <select id="curses" name="curs" data-ref="curs__num">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>

                    <label for="facs">Факультет</label>
                    <select id="facs" name="fac" data-ref="number__zach" data-ref="name__fac">
                        <?php 

                $server = 'localhost';
                $name = 'kp';
                $pass = 'kp';
                $db = 'kursach';

                $mysql = new mysqli($server, $name, $pass, $db); 
                $sql = 'SELECT name_fac, id_fac FROM faculty ORDER BY id_fac';

                $result = mysqli_query($mysql, $sql);

                if ($result == false) {
                    print("Произошла ошибка при выполнении запроса");
                    exit();
                }

                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>$row[name_fac]</option>";
                }

                $mysql->close();

            ?>
                    </select>

                    <label for="specs">Специльность:</label>
                    <select id="specs" name="spec" data-ref="name__spec">
                        <?php 

                $server = 'localhost';
                $name = 'kp';
                $pass = 'kp';
                $db = 'kursach';

                $mysql = new mysqli($server, $name, $pass, $db); 
                $sql = 'SELECT id_spec, name_spec FROM specialnost ORDER BY id_spec';

                $result = mysqli_query($mysql, $sql);

                if ($result == false) {
                    print("Произошла ошибка при выполнении запроса");
                    exit();
                }

                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>$row[name_spec]</option>";
                }

                $mysql->close();

            ?>
                    </select>
                    <button type="submit" class="btn">Изменить</button>
                </form>
        </main>
    </div>
    <?php 
    require "tmpsPHP/_footer.php";
?>

</body>

</html>