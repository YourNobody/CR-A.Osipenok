<?php 

    $servername = "localhost";
    $database = "kursach";
    $username = "root";
    $password = "root";

    $fio = trim($_POST['deletefio']);
	$d_group = trim($_POST['deletegroup']);

    $st_under_delete = false;

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(isset($fio)) {
        $sql = 'SELECT N_zachetki, st_f_name, st_l_name, st_patronymic FROM student';

        $result = mysqli_query($conn, $sql);

        if ($result == false) {
            print("Произошла ошибка при выполнении запроса");
            exit();
        }

        while ($row = mysqli_fetch_array($result)) {
            if ($fio == $row['st_f_name'].' '.$row['st_l_name'].' '.$row['st_patronymic']) {
                $st_under_delete = $row['N_zachetki'];
            }
        }
    }
         
    if($st_under_delete != false) {

        $id = mysqli_real_escape_string($conn, $st_under_delete);
        
        $query ="DELETE FROM student WHERE N_zachetki = '$st_under_delete'";
        $result = mysqli_query($conn, $query) or die("Ошибка " . mysqli_error($conn)); 
    
        mysqli_close($conn);
        header('Location: /src/home.php');
    }
?>