<?php
    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    $smallsql = 'SELECT N_zachetki, concat_ws(\' \', st_l_name, st_f_name, st_patronymic) as full_fio, 
        kurs, number_group, name_spec, name_fac  
        FROM student INNER JOIN faculty ON student.id_fac=faculty.id_fac
        INNER JOIN grups ON student.id_group=grups.id_group
        INNER JOIN specialnost ON grups.id_spec=specialnost.id_spec
        ORDER BY N_zachetki  
    ';

    $result = mysqli_query($mysql, $smallsql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td id=\"number__zach\">$row[N_zachetki]</td>
            <td id=\"stud__fio\">$row[full_fio]</td>
            <td id=\"curs__num\">$row[kurs]</td>
            <td id=\"number__group\">$row[number_group]</td> 
            <td id=\"name__spec\">$row[name_spec]</td>
            <td id=\"name__fac\">$row[name_fac]</td>
            <td id='create__ved'>Создать</td>
        </tr>";
    }

    $mysql->close();
?>