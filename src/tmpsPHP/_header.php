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
        <a href="mypage.php" class="log__out">
            Артем Осипенок
        </a>
    </div>
    <?php endif ?>
    </div>
</header>