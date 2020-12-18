<?php 

    $server = 'localhost';  
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    
    $sql = 'SELECT number_group, name_spec, name_fac 
            FROM grups 
            INNER JOIN specialnost ON grups.id_spec=specialnost.id_spec
            INNER JOIN student ON grups.id_group=student.id_group
            INNER JOIN faculty ON student.id_fac=faculty.id_fac
            GROUP BY number_group
            ';

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    if ($_SESSION['access'] === 'admin' || $_SESSION['access'] === 'student') {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                <td id='number_group'>$row[number_group]</td>
                <td id='name_spec'>$row[name_spec]</td>
                <td id='name_fac'>$row[name_fac]</td>
                <td data-to=\"show-in-window\"><a href='http://my-first-project/src/students-btns.php'>Открыть</a></td>
            </tr>
            ";
        }
    } else {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                <td id='number__group'>$row[number_group]</td>
                <td id='name__spec'>$row[name_spec]</td>
                <td id='name__fac'>$row[name_fac]</td>
            </tr>
            ";
        }
    }

    $mysql->close();
?>