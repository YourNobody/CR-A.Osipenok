<?php 
    if ($_SESSION['access'] === 'student') {
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
            <h3 class='mypage__title'>Номер зачетки:<span style='color: rgb(0, 155, 226);'>$row[N_zachetki]</span></h3>
            <h3 class='mypage__title'>ФИО:<span style='color: rgb(0, 155, 226);'>$row[full_fio]</span></h3>
            <h3 class='mypage__title'>Курс:<span style='color: rgb(0, 155, 226);'>$row[kurs]</span></h3>
            <h3 class='mypage__title'>Группа:<span style='color: rgb(0, 155, 226);'>$row[number_group]</span></h3>
            <h3 class='mypage__title'>Специальность:<span style='color: rgb(0, 155, 226);'>$row[name_spec]</span></h3>
            <h3 class='mypage__title'>Факультет:<span style='color: rgb(0, 155, 226);'>$row[name_fac]</span></h3>
        ";
        }
    } else if ($_SESSION['access'] === 'admin') {
        echo "<h3>You're an $_SESSION[access]</h3>";
    }
?>