<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$mysqli=mysqli_connect("localhost", "a0528181_sdo_407", "14032000", "a0528181_sdo_407");

if ($mysqli == false){
    print("Error!");
}else{
    $inputValue=$_POST['value'];
    $item=$_POST['item'];
    $id=$_SESSION['id'];
    $mysqli->query("UPDATE `users` SET `$item`='$inputValue' WHERE `id`='$id'");
    $_SESSION[$item]=$inputValue;