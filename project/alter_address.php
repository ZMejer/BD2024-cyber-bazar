<?php

session_start();
include 'connection.php';
$conn = connection();

$user_address = $_POST['user_address'];
$user_id = $_POST['user_id'];

$query = "UPDATE uzytkownicy SET adres = '".$user_address."' WHERE idu=".$user_id;
$_SESSION['adres'] = $user_address;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url");
?>