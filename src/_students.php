<?php 

$server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $n_gr = $_POST['n_gr'];

    $mysql = new mysqli($server, $name, $pass, $db); 

    $sql = 'SELECT N_zachetki, concat_ws(\' \', st_l_name, st_f_name, st_patronymic) as full_fio, 
            kurs, number_group, name_spec, name_fac  
            FROM student INNER JOIN faculty ON student.id_fac=faculty.id_fac
            INNER JOIN grups ON student.id_group=grups.id_group
            INNER JOIN specialnost ON grups.id_spec=specialnost.id_spec
            ORDER BY N_zachetki  
            ';


if ($result == false) {
    print("Произошла ошибка при выполнении запроса");
    exit();
}

    $result = mysqli_query($mysql, $sql);

?>

