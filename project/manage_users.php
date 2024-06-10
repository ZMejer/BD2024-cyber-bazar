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
    include 'connection.php';
    $conn = connection();
    $users_query = "SELECT * from uzytkownicy WHERE rola='klient'";
    $result = mysqli_query($conn, $users_query); 

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo'
            <div class="card w-25 mb-3 me-3">
            <div class="card-body">
                <h5 class="card-title">'.$row['imie'].' '.$row['nazwisko'].'</h5>
                <p class="card-text">Adres: '.$row['adres'].'</p>';
                echo'<p class="card-text">Miasto: '.$row['miasto'].'</p>';
                echo'<p class="card-text">Telefon: '.$row['telefon'].'</p>';
                echo '<form method="POST" action="./delete_user.php">
                    <input type="hidden" name="user_id" value='.$row['idu'].'>
                    <button type="submit" class="btn btn-outline-danger">Usuń użytkownika</button>
                    </form>';
            echo '</div>
            </div>';
        }
    }
}
?>
</body>
</html>