<?php 

    $server = 'localhost';
    $name = 'root';
    $pass = 'root';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    
    $sql = 'SELECT name_spec, name_fac  FROM specialnost, faculty ORDER BY name_fac';

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>$row[name_spec]</td>
            <td>$row[name_fac]</td>
            <td><span data-to=\"study-plan\">Перейти</span></td>
        </tr>";
    }

    $mysql->close();

?>