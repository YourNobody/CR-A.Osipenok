<?php 

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    $sql = "SELECT predmet.id_predmet, predmet.predmet_name, plan_specialnosti.kolvo_chasov, plan_specialnosti.id_spec
        FROM predmet 
        INNER JOIN plan_specialnosti ON predmet.id_predmet=plan_specialnosti.id_predmet
        ORDER BY predmet.id_predmet;
    ";

    $sql_control = "SELECT type_of_control.type_control, type_of_control.id_control
        FROM type_of_control
        ORDER BY type_of_control.id_control;
    ";

    $sql_prepod = "SELECT concat(prepod.p_l_name,' ',left(prepod.p_f_name, 1),'.', left(prepod.p_patronymic, 1),'.') as fio, 
            prepod.id_prepod
        FROM prepod
        ORDER BY prepod.id_prepod;
    ";

    $result = mysqli_query($mysql, $sql);
    $result_control = mysqli_query($mysql, $sql_control); 
    $result_prepod = mysqli_query($mysql, $sql_prepod); 

    if ($result == false || $result_control == false || $result_prepod == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    echo "<ul data-bd='ved-all-subj' class='hide'>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<li><span data-bd='vedid'>$row[id_predmet]</span>-<span data-bd='vedsubj'>$row[predmet_name]</span>-<span data-bd='vedhours'>$row[kolvo_chasov]</span>-<span data-bd='vedspec'>$row[id_spec]</span></li>";
    }
    echo "</ul>";

    echo "<ul data-bd='ved-all-control' class='hide'>";
    while ($row = mysqli_fetch_array($result_control)) {
        echo "<li><span data-bd='vedidcontrol'>$row[id_control]</span><span data-bd='vedcontrol'>$row[type_control]</span></li>";
    }
    echo "</ul>";

    echo "<ul data-bd='ved-all-prepod' class='hide'>";
    while ($row = mysqli_fetch_array($result_prepod)) {
        echo "<li><span data-bd='vedidprepod'>$row[id_prepod]</span><span data-bd='vedprepod'>$row[fio]</span></li>";
    }
    echo "</ul>";

?>