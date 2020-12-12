<?php 
    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $n_gr = $_POST['n_gr'];

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

    if (gettype($n_gr) == 'string') {
        echo "<table>
        <thead>
            <tr>
                <th>Номер зачетки</th>
                <th for='stud__fio'>ФИО студента</th>
                <th>Курс</th>
                <th>Группа</th>
                <th>Специальность</th>
                <th>Факультет</th>";
                if ($_SESSION['access'] === 'admin') echo "<th>Действия</th>";
        echo "</tr>
        </thead>
        <tbody>";
                if ($_SESSION['access'] === 'admin') {
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row['number_group'] != $n_gr) continue;
                        echo "<tr>
                        <td id=\"number__zach\">$row[N_zachetki]</td>
                        <td id=\"stud__fio\">$row[full_fio]</td>
                        <td id=\"curs__num\">$row[kurs]</td>
                        <td id=\"number__group\">$row[number_group]</td> 
                        <td id=\"name__spec\">$row[name_spec]</td>
                        <td id=\"name__fac\">$row[name_fac]</td>
                        <td>
                            <div data-aim=\"changing\" class=\"ch__img\"><img src=\"icons/selection.svg\" data-aim=\"changing\"></div>
                            <div data-aim=\"deleting\" class=\"ch__img\"><img src=\"icons/delete.svg\" data-aim=\"deleting\"></div>
                        </td>
                    </tr>";
                    }
                } else {
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row['number_group'] != $n_gr) continue;
                        echo "<tr>
                        <td>$row[N_zachetki]</td>
                        <td id=\"stud__fio\">$row[full_fio]</td>
                        <td>$row[kurs]</td>
                        <td id=\"name__num\">$row[number_group]</td> 
                        <td>$row[name_spec]</td>
                        <td>$row[name_fac]</td>
                    </tr>";
                    }
                }
                $mysql->close();
        echo "</tbody>
        </table>";
    }

    $n_gr = false;
?>

