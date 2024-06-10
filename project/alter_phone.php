<?php

session_start();
include 'connection.php';
$conn = connection();

$user_phone = $_POST['user_phone'];
$user_id = $_POST['user_id'];

$query = "UPDATE uzytkownicy SET telefon = '".$user_phone."' WHERE idu=".$user_id;
$_SESSION['telefon'] = $user_phone;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url");
?>