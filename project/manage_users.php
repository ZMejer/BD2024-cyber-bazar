<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Bazar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
</head>
<body>
<?php
include 'navbar.php';
navbar();
?>
<div class="container">
<h1>Zarządzanie użytkownikami</h1>
<div class='d-flex flex-wrap'>
<?php
session_start();
if($_SESSION['rola']=='klient' || !isset($_SESSION['rola'])){
    echo '<div class="alert alert-danger" role="alert">
    Brak uprawnień do zarządzania użytkownikami.
    </div>';
} else {

}
?>
</body>
</html>