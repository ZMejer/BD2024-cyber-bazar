<?php

session_start();
include 'connection.php';
$conn = connection();

$user_city = $_POST['user_city'];
$user_id = $_POST['user_id'];

$query = "UPDATE uzytkownicy SET miasto = '".$user_city."' WHERE idu=".$user_id;
$_SESSION['miasto'] = $user_city;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url");
?>