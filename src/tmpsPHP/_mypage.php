<?php 

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    $n_zach_session = $_SESSION['n_zach'];

    $sql = "SELECT N_zachetki, concat_ws(' ', st_l_name, st_f_name, st_patronymic) as full_fio, 
                   kurs, number_group, name_spec, name_fac  
            FROM student 
            INNER JOIN faculty ON student.id_fac=faculty.id_fac
            INNER JOIN grups ON student.id_group=grups.id_group
            INNER JOIN specialnost ON grups.id_spec=specialnost.id_spec
            WHERE student.N_zachetki=$n_zach_session;
    ";

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print "Произошла ошибка в запросе";
        exit();
    }

    while($row = mysqli_fetch_array($result)) {
        echo "
        <h3 style='font-weight: 400;'>$row[N_zachetki]</h3>
        <h3 style='font-weight: 400;'>$row[full_fio]</h3>
        <h3 style='font-weight: 400;'>$row[kurs]</h3>
        <h3 style='font-weight: 400;'>$row[number_group]</h3>
        <h3 style='font-weight: 400;'>$row[name_spec]</h3>
        <h3 style='font-weight: 400;'>$row[name_fac]</h3>
    ";
    }

?>