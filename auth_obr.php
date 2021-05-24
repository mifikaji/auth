<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$mysqli=mysqli_connect("localhost", "a0528181_sdo_407", "14032000", "a0528181_sdo_407");


if ($mysqli == false){
    print("Error!");
}else{
    $email = trim(mb_strtolower($_POST['email']));
    $pass = trim($_POST['pass']);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $result = $result->fetch_assoc();
    
    if(password_verify($pass, $result["pass"])){
        echo "ok";

        $_SESSION['name']=$result{'name'};
        $_SESSION['lastname']=$result{'lastname'};
        $_SESSION['email']=$result{'email'};
        $_SESSION['id']=$result{'id'};
    }else{
        echo "user_not_found";
    }
}
