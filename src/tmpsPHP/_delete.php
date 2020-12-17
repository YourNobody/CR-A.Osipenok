<?php 

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    $n_zach = $_POST["n__zach"];
    // $sql ="CREATE TRIGGER `deleting` BEFORE DELETE ON `student` 
    //         FOR EACH ROW BEGIN 
    //             DELETE FROM `vedomost` where `N_zachetki`=OLD.`N_zachetki`;
    //         END;

    //         DELETE FROM `student` WHERE `student.N_zachetki`='$n_zach';
    //     ";

    $sql = "DELETE from student where student.N_zachetki=$n_zach;";
    $result = mysqli_query($mysql, $sql);

    if ($result != false) {
        $sql = "DELETE from vedomost where vedomost.N_zachetki=$n_zach";
        $res = mysqli_query($mysql, $sql);
        if ($res == false) {
            print("Произошла ошибка при выполнении первичного запроса");
            exit();
        }
    }

    if ($result == false) {
        print("Произошла ошибка при выполнении первичного запроса");
        exit();
    }

    header('Location: /src/students-btns.php');
    $mysql->close();
?>