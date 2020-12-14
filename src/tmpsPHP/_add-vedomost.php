<?php 
    
    // var_dump($_POST);
    // var_dump(count($_POST));


    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $n_zach = $_POST['num__zach'];

    $mysql = new mysqli($server, $name, $pass, $db); 

    $sql = 'SELECT predmet.id_predmet, predmet.predmet_name, plan_specialnosti.kolvo_chasov, 
            type_of_control.type_control,
            concat(prepod.p_l_name,\' \',left(prepod.p_f_name, 1),\'.\', left(prepod.p_patronymic, 1),\'.\') as fio
            FROM predmet 
            INNER JOIN plan_specialnosti ON predmet.id_predmet=plan_specialnosti.id_predmet
            INNER JOIN vedomost ON predmet.id_predmet=vedomost.id_predmet
            INNER JOIN type_of_control ON vedomost.id_control=type_of_control.id_control
            INNER JOIN prepod ON vedomost.id_prepod=prepod.id_prepod

            INNER JOIN specialnost ON plan_specialnosti.id_spec=specialnost.id_spec
            INNER JOIN grups ON specialnost.id_spec=grups.id_spec
            INNER JOIN student ON grups.id_group=student.id_group
            where vedomost.N_zachetki
            group BY predmet.id_predmet;
    ';

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    echo "<ul>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<li>$row[id_predmet] - $row[predmet_name] - $row[kolvo_chasov] - $row[type_control] - $row[fio]</li>";
    }
    echo "</ul>";


?>