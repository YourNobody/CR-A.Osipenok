<?php 

 session_start();

 $server = 'localhost';
 $name = 'kp';
 $pass = 'kp';
 $db = 'kursach';

 $link = new mysqli($server, $name, $pass, $db);

 $login = $_POST['login'];
 $password = md5($_POST['password']);

 if ($login == 'admin' && $_POST['password'] == 'admin') {
    $_SESSION['access'] = 'admin';
    header('Location: ../home.php');
 } else {

 $query = "SELECT * FROM `student` WHERE `N_zachetki`=$login AND `N_zachetki`=$_POST[password]";
 
 $result = mysqli_query($link, $query);

 $user = mysqli_fetch_assoc($result);

 if ($user != false) {
    $_SESSION['access'] = 'student';
    $_SESSION['n_zach'] = $login;
    header('Location: ../home.php');
    $link->close();
} else {
    $_SESSION['access'] = 'guest';
    header('Location: ../log-in.php');
    $link->close();
}  
}

?>