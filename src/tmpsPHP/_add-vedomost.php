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

    $sql = "INSERT INTO `kursach`.`vedomost` (`N_zachetki`, `N_semestra`, `id_predmet`, `id_control`, `mark`, `data`, `id_prepod`) VALUES ('$num_zach', '$num_sem', '$ved_idsubject[0]', '$ved_idcontrol[0]', '$ved_mark[0]', '$ved_date[0]', '$ved_idprepod[0]');
    ";

    if (mysqli_query($mysql, $sql)) {
        header('Location: http://my-first-project/src/mypage.php');
        $mysql->close();
        exit();
    } else {
        header('Location: http://my-first-project/src/mypage.php');
    }

    
    // var_dump($num_zach);
    // var_dump($num_sem);
    // var_dump($ved_idsubject);
    // var_dump($ved_mark);
    // var_dump($ved_idcontrol);
    // var_dump($ved_prepod);
    // var_dump($ved_date);





















    
    
    // $mysql = new mysqli($server, $name, $pass, $db); 

    // $result = mysqli_query($mysql, $sql);

    // if ($result == false) {
    //     print("Произошла ошибка при выполнении запроса");
    //     exit();
    // }

?>