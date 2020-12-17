<?php 

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    $num_zach = intval($_POST['num__zach']);
    $num_sem = intval($_POST['num__sem']);
    $ved_idsubject = [];
    $ved_mark = [];
    $ved_idcontrol = [];
    $ved_idprepod = [];
    $ved_date = [];

    $j = 0;
    while ($_POST["ved__subject-$j"] != NULL) {
        $ved_idsubject[$j] = intval($_POST["ved__subject-$j"]);
        $j++;
    }
    

    $j = 0;
    while ($_POST["ved__mark-$j"] != NULL) {
        $ved_mark[$j] = intval($_POST["ved__mark-$j"]);
        $j++;
    }

    $j = 0;
    while ($_POST["ved__control-$j"] != NULL) {
        $ved_idcontrol[$j] = intval($_POST["ved__control-$j"]);
        $j++;
    }

    $j = 0;
    while ($_POST["ved__teacher-$j"] != NULL) {
        $ved_idprepod[$j] = intval($_POST["ved__teacher-$j"]);
        $j++;
    }

    $j = 0;
    while ($_POST["ved__date-$j"] != NULL) {
        $ved_date[$j] = $_POST["ved__date-$j"];
        $j++;
    }

    $len = count($ved_date);
    $j = 0;
    $temp = 0;

    while($j < $len) {
        $sql = "INSERT INTO `kursach`.`vedomost` (`N_zachetki`, `N_semestra`, `id_predmet`, `id_control`, `mark`, `data`, `id_prepod`) VALUES ('$num_zach', '$num_sem', '$ved_idsubject[$j]', '$ved_idcontrol[$j]', '$ved_mark[$j]', '$ved_date[$j]', '$ved_idprepod[$j]');
        ";
        $j++;
        if (mysqli_query($mysql, $sql)) {
            $temp++;
        }
    }

    if ($temp == $len) {
        header('Location: http://my-first-project/src/mypage.php');
        $mysql->close();
    } else {
        "Произошла ошибка в запросе";
    }

?>