<header class="header">
    <div class="container">
    <?php 
            require "tmpsPHP/_log-btn.php";
        ?>
    <?php if($_SESSION['access'] === 'admin' || $_SESSION['access'] === 'student'): ?>
    <div class="personal">
        <a href="mypage.php" class="log__out">
            <?php 
                if ($_SESSION['access'] === 'student') {
                    $server = 'localhost';
                    $name = 'kp';
                    $pass = 'kp';
                    $db = 'kursach';
                
                    $n_zach_session = $_SESSION['n_zach'];
                
                    $mysql = new mysqli($server, $name, $pass, $db);

                    $sql = "SELECT `st_f_name`, `st_l_name`
                            FROM `student`
                            WHERE `N_zachetki`=$n_zach_session;
                    ";

                    $result = mysqli_query($mysql, $sql);

                    if ($result == false) {
                        print ("Произошла ошибка при выполнении запроса");
                        exit();
                    }

                    while ($row = mysqli_fetch_array($result)) {
                        echo "$row[st_f_name] $row[st_l_name]";
                    }

                    $mysql->close();
                } else if ($_SESSION['access'] === 'admin') {
                    echo "admin"; 
                }
            ?>
        </a>
    </div>
    <?php endif ?>
    </div>
</header>