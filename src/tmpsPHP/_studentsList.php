<?php 
    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    $sql = 'SELECT grups.id_group, grups.number_group, specialnost.name_spec 
            FROM grups
            INNER JOIN student ON grups.id_group = student.id_group
            INNER JOIN specialnost ON grups.id_spec=specialnost.id_spec
            GROUP BY number_group; 
            ';

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    while($row = mysqli_fetch_array($result)) {
        echo "<form action='./students.php' method='post' class='formlist' style='display:inline-block;'>
            <input type='hidden' name='n_gr'value='$row[number_group]'>
            <input type='hidden' name='id_gr'value='$row[id_group]'>
            <button class='groups__btn'>$row[number_group]($row[name_spec])</button>
        </form>";
    }

    $mysql->close();
?>