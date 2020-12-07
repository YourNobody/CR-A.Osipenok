<?php 
    if ($_SESSION['access'] === 'guest') {
        echo "<a class='log__out' href='log-in.php'>
            Авторизация
        </a>";
    } else if ($_SESSION['access'] === 'student') {
        echo "<a class='log__out' href='log-in.php'>
            Выйти
        </a>";
    } else if ($_SESSION['access'] === 'admin') {
        echo "<a class='log__out' href='log-in.php'>
            Выйти
        </a>";
    }
?>