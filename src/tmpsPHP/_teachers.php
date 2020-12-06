<?php

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    $sql = 'SELECT concat_ws(\' \', p_l_name, p_f_name, p_patronymic) as full_fio_teacher, name_dol
            FROM prepod
            INNER JOIN dolznost ON prepod.id_dol = dolznost.id_dol
            ORDER BY full_fio_teacher; 
            ';

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>$row[full_fio_teacher]</td>
            <td style=''>$row[name_dol]</td>
        </tr>";
    }

    $mysql->close();

?>