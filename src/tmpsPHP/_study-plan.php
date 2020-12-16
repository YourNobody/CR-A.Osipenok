<?php 

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $id_spec = intval($_POST['id_spec']);

    $mysql = new mysqli($server, $name, $pass, $db); 

    $i = 1;
    while($i < 9) {
        $sql = "SELECT predmet.predmet_name, plan_specialnosti.kolvo_chasov, type_of_control.type_control,
                        plan_specialnosti.N_semestra  
                FROM predmet
                INNER JOIN plan_specialnosti ON predmet.id_predmet=plan_specialnosti.id_predmet
                INNER JOIN vedomost ON predmet.id_predmet=vedomost.id_predmet
                INNER JOIN type_of_control ON vedomost.id_control=type_of_control.id_control
                WHERE plan_specialnosti.N_semestra=$i
                    AND substring(plan_specialnosti.id_plan, 1, 3) = $id_spec
                GROUP BY predmet.predmet_name;
        ";

        $result = mysqli_query($mysql, $sql);

        if ($result->num_rows == 0 || $result->num_rows == NULL) {
            $i++;
            continue;
        }

        if ($result == false) {
            print "Произошла ошибка при запросе";
        }
    
        echo "$i";
        echo "<ul style='margin: 0 0 10px 0; ' data-order='sem-$i'>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<li>$row[predmet_name]-$row[kolvo_chasov]-$row[type_control]</li>";
                }
        echo "</ul>";

        $i++;
    }
?>