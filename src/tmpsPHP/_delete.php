<?php 

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    $n_zach = $_POST["n__zach"];
    
    $sql ="DELETE
           FROM `student` 
           WHERE `N_zachetki` = '$n_zach';
        ";

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении первичного запроса");
        exit();
    }

    header('Location: /src/home.php');
    $mysql->close();
?>