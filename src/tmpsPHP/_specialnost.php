<?php 

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    $sql = 'SELECT specialnost.id_spec, specialnost.name_spec, faculty.name_fac
            FROM specialnost 
            INNER JOIN grups ON specialnost.id_spec=grups.id_spec
            INNER JOIN student ON grups.id_group=student.id_group
            INNER JOIN faculty ON student.id_fac=faculty.id_fac
            GROUP BY specialnost.name_spec
            ORDER BY specialnost.name_spec;
        ';

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>$row[name_spec]</td>
            <td>$row[name_fac]</td>
            <td><form action='study-plan.php' method='post'>
            <input type='text' name='id_spec' value='$row[id_spec]' hidden><button data-to='study-plan'>Перейти</button></form></ащкь>
        </tr>";
    }

    $mysql->close();

?>