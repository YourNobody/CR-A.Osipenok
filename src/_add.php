<?php

    $f_name = $_POST['firstname'];
    $l_name = $_POST['lastname'];
    $p_name = $_POST['patronymic'];
    $curs = $_POST['curs'];
    $fac = $_POST['fac'];

    $servername = "localhost";
    $database = "kursach";
    $username = "root";
    $password = "root";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    if (mb_strlen($f_name) < 2) {
        exit();
    }

    $sql = "INSERT INTO `student`(`N_zachetki`, `st_f_name`, `st_l_name`, `st_patronymic`, `kurs`, `id_group`, `id_fac`, `id_spec`) VALUES (101111,'$f_name','$l_name','$p_name','$curs',99,'$fac',23)";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: http://my-first-project/src/home.php');
        mysqli_close($conn);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>