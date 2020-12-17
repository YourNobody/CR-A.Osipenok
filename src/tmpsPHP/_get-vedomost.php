<?php

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $n_zach_session = $_SESSION['n_zach'];

    $mysql = new mysqli($server, $name, $pass, $db);

    $result = mysqli_query($mysql, $sql);

    $i = 1;
    while ($i < 9) {
        $sql = "SELECT predmet.predmet_name, plan_specialnosti.kolvo_chasov, type_of_control.type_control,
                       vedomost.mark, vedomost.data, 
                       concat(prepod.p_l_name,' ',left(prepod.p_f_name, 1),'.', left(prepod.p_patronymic, 1),'.') as fio     
                FROM predmet
                INNER JOIN plan_specialnosti ON predmet.id_predmet=plan_specialnosti.id_predmet
                INNER JOIN vedomost ON predmet.id_predmet=vedomost.id_predmet
                INNER JOIN type_of_control ON vedomost.id_control=type_of_control.id_control
                INNER JOIN prepod ON vedomost.id_prepod=prepod.id_prepod
                WHERE vedomost.N_semestra='$i' AND vedomost.N_zachetki='$n_zach_session'
                AND substring(plan_specialnosti.id_plan, 1, 3) = substring(vedomost.N_zachetki, 3, 3)
        ";

        $result = mysqli_query($mysql, $sql);

        if ($result == false) {
            print "Произошла ошибка при запросе";
        }

        echo "
        <table class='mypage__table hide' data-name='table__sem-$i' data-id='$i'>
            <thead>
                <th>Дисциплина</th>
                <th style='width:50px'>Часы</th>
                <th>Ф-ма контроля</th>
                <th style='width:80px'>Оценка</th>
                <th>Дата</th>
                <th>Преподаватель</th>
            </thead>
            <tbody>";
                
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>
            <td>$row[predmet_name]</td>
            <td>$row[kolvo_chasov]</td>
            <td>$row[type_control]</td>
            <td>$row[mark]</td>
            <td>$row[data]</td>
            <td>$row[fio]</td>
            </tr>
            ";
        }

        echo "</tbody>
        </table>";

        $i++;
    }

 ?>