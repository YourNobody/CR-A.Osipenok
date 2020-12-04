<?php 

    $server = 'localhost';  
    $name = 'root';
    $pass = 'root';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    
    $sql = 'SELECT number_group, name_spec, name_fac FROM grups, specialnost, faculty ORDER BY number_group';

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>$row[number_group]</td>
            <td>$row[name_spec]</td>
            <td>$row[name_fac]</td>
            <td data-to=\"show-in-window\">Открыть</td>
        </tr>
        ";
    }

    $mysql->close();
?>