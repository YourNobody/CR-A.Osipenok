<?php 

    $num_zach = intval($_POST['num__zach']);
    $f_name = $_POST['firstname'];
    $l_name = $_POST['lastname'];
    $p_name = $_POST['patronymic'];
    $curs = intval($_POST['curs']);
    $name_fac = $_POST['fac'];
    $name_spec = $_POST['spec'];
    $id_group = intval($_POST['id__group']);

    $id_fac;
    $id_spec;

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    $id_fac_sql = "SELECT `id_fac`
                   FROM `faculty`
                   WHERE `name_fac`='$name_fac';
    ";

    $id_spec_sql = "SELECT `id_spec`
                    FROM `specialnost`
                    WHERE `name_spec`='$name_spec';
    ";

    $result_fac = mysqli_query($mysql, $id_fac_sql);
    $result_spec = mysqli_query($mysql, $id_spec_sql);

    if ($result_fac==false || $result_spec==false) {
        print("Произошла ошибка при выполнении первичного запроса");
        exit();
    }

    while($row = mysqli_fetch_array($result_fac)) {
        $id_fac = intval($row['id_fac']);
        break;
    }
    while($row = mysqli_fetch_array($result_spec)) {
        $id_spec = intval($row['id_spec']);
        break;
    }

    $sql = "UPDATE `student`
            SET `st_f_name`='$f_name', `st_l_name`='$l_name', `st_patronymic`='$p_name', `kurs`=$curs, 
                `id_group`=$id_group, `id_fac`=$id_fac, `id_spec`=$id_spec
            WHERE `N_zachetki`=$num_zach;";

    if (mysqli_query($mysql, $sql)) {
        $_POST = [];
        header('Location: http://my-first-project/src/students-btns.php');
        $mysql->close();
    } else {
        print("Произошла ошибка при выполнении главного запроса");
    }

?>
