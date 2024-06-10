<?php
session_start();
include 'connection.php';
$conn = connection();

$user_login = $_POST['user_login'];
$user_id = $_POST['user_id'];

$query = "UPDATE uzytkownicy SET login = '".$user_login."' WHERE idu=".$user_id;
$_SESSION['login'] = $user_login;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url");
?>