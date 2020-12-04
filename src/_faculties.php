<?php 

    $server = 'localhost';
    $name = 'root';
    $pass = 'root';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 
    $sql = 'SELECT name_fac FROM faculty ORDER BY name_fac';

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<li>$row[name_fac]</li>";
    }

    $mysql->close();

?>