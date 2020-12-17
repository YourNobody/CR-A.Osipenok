<?php 

    $server = 'localhost';
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $id_spec = intval($_POST['id_spec']);

    $mysql = new mysqli($server, $name, $pass, $db); 

    $curses = [
        '1' => 1,
        '2' => 1,
        '3' => 2,
        '4' => 2,
        '5' => 3,
        '6' => 3,
        '7' => 4,
        '8' => 4
    ];

    $i = 1;
    $j = 2;
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


        echo "<h3 class='mypage__title curs__bd'>Курс: $curses[$i]</h3>";
    
        echo "
        <table>
        <thead>
            <th>Предмет</th>
            <th>Количество часов</th>
            <th>Форма контроля</th>
        </thead>
        </tbody>
        ";
        
        if (($i % 2) != 0) {
            echo "<tr><td colspan='3' style='font-style: italic; text-align: left;background-color: rgb(216, 243, 255);'>Семестр: $i</td></tr>";
        } else {
            echo "<tr><td colspan='3' style='font-style: italic; text-align: left;background-color: rgb(216, 243, 255);'>Семестр: $i</td></tr>";
        }

        $t = 0;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                <td>$row[predmet_name]</td>
                <td>$row[kolvo_chasov]</td>
                <td>$row[type_control]</td>
            </tr>";
        }
        $t++;
        if (($t % 2) != 0) {
            $b = $i + 1;
            $qr = "SELECT predmet.predmet_name, plan_specialnosti.kolvo_chasov, type_of_control.type_control,
                        plan_specialnosti.N_semestra  
                FROM predmet
                INNER JOIN plan_specialnosti ON predmet.id_predmet=plan_specialnosti.id_predmet
                INNER JOIN vedomost ON predmet.id_predmet=vedomost.id_predmet
                INNER JOIN type_of_control ON vedomost.id_control=type_of_control.id_control
                WHERE plan_specialnosti.N_semestra=$b
                    AND substring(plan_specialnosti.id_plan, 1, 3) = $id_spec
                GROUP BY predmet.predmet_name;
            ";

            if (($i % 2) != 0) {
                echo "<tr><td colspan='3' style='font-style: italic; text-align: left;background-color: rgb(216, 243, 255);'>Семестр: $b</td></tr>";
            } else {
                echo "<tr><td colspan='3' style='font-style: italic; text-align: left;background-color: rgb(216, 243, 255);'>Семестр: $b</td></tr>";
            }

            $res = mysqli_query($mysql, $qr);
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>
                    <td>$row[predmet_name]</td>
                    <td>$row[kolvo_chasov]</td>
                    <td>$row[type_control]</td>
                </tr>";
    
            }
        }

        echo "</tbody></table>";

        $i = $i + 2;
    }

    $_POST=[];
    $mysql->close();
?>