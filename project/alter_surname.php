<?php

session_start();
include 'connection.php';
$conn = connection();

$user_surname = $_POST['user_surname'];
$user_id = $_POST['user_id'];

$query = "UPDATE uzytkownicy SET nazwisko = '".$user_surname."' WHERE idu=".$user_id;
$_SESSION['nazwisko'] = $user_surname;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url");
?>