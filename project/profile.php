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
<h1>Mój profil</h1>
<?php
session_start();
if(!isset($_SESSION['idu'])){
        echo '<div class="alert alert-danger" role="alert">
        Zaloguj się aby wyświetlić profil
      </div>';
}
else {
    if ($_GET['password'] == 'changed') {
        echo '<div class="alert alert-success" role="alert">
        Hasło zostało zmienione
      </div>';
    } 
    echo "<div style='display: flex; align-items: center;'>
        <p style='margin: 0; margin-right: 10px;'>Imię: ".$_SESSION['imie']."</p>
        <form style='display: flex; align-items: center;' method='POST' action='./alter_name.php'>
            <input type='hidden' name='user_id' value='".$_SESSION['idu']."'>
            <input type='text' name='user_name' class='form-control' placeholder='Edytuj imię' style='width: 150px; margin-right: 10px;'>
            <button class='btn btn-primary' type='submit'>Potwierdź</button>
        </form>
      </div>
    
      <div style='display: flex; align-items: center;' class='mt-3'>
        <p style='margin: 0; margin-right: 10px;'>Nazwisko: ".$_SESSION['nazwisko']."</p>
        <form style='display: flex; align-items: center;' method='POST' action='./alter_surname.php'>
        <input type='hidden' name='user_id' value='".$_SESSION['idu']."'>
            <input type='text' name='user_surname' class='form-control' placeholder='Edytuj nazwisko' style='width: 150px; margin-right: 10px;'>
            <button class='btn btn-primary' type='submit'>Potwierdź</button>
        </form>
      </div>

      <div style='display: flex; align-items: center;' class='mt-3'>
        <p style='margin: 0; margin-right: 10px;'>Adres: ".$_SESSION['adres']."</p>
        <form style='display: flex; align-items: center;' method='POST' action='./alter_address.php'>
        <input type='hidden' name='user_id' value='".$_SESSION['idu']."'>
            <input type='text' name='user_address' class='form-control' placeholder='Edytuj adres' style='width: 150px; margin-right: 10px;'>
            <button class='btn btn-primary' type='submit'>Potwierdź</button>
        </form>
      </div>

      <div style='display: flex; align-items: center;' class='mt-3'>
        <p style='margin: 0; margin-right: 10px;'>Miasto: ".$_SESSION['miasto']."</p>
        <form style='display: flex; align-items: center;' method='POST' action='./alter_city.php'>
        <input type='hidden' name='user_id' value='".$_SESSION['idu']."'>
            <input type='text' name='user_city' class='form-control' placeholder='Edytuj miasto' style='width: 150px; margin-right: 10px;'>
            <button class='btn btn-primary' type='submit'>Potwierdź</button>
        </form>
      </div>

      <div style='display: flex; align-items: center;' class='mt-3'>
        <p style='margin: 0; margin-right: 10px;'>Telefon: ".$_SESSION['telefon']."</p>
        <form style='display: flex; align-items: center;' method='POST' action='./alter_phone.php'>
        <input type='hidden' name='user_id' value='".$_SESSION['idu']."'>
            <input type='text' name='user_phone' class='form-control' placeholder='Edytuj numer telefonu' style='width: 200px; margin-right: 10px;'>
            <button class='btn btn-primary' type='submit'>Potwierdź</button>
        </form>
      </div>

      <div style='display: flex; align-items: center;' class='mt-3'>
        <p style='margin: 0; margin-right: 10px;'>Login: ".$_SESSION['login']."</p>
        <form style='display: flex; align-items: center;' method='POST' action='./alter_login.php'>
        <input type='hidden' name='user_id' value='".$_SESSION['idu']."'>
            <input type='text' name='user_login' class='form-control' placeholder='Edytuj login' style='width: 150px; margin-right: 10px;'>
            <button class='btn btn-primary' type='submit'>Potwierdź</button>
        </form>
      </div>
      
      <form method='POST' action='./change_password.php' class='mt-3'>
      <input type='hidden' name='user_id' value='".$_SESSION['idu']."'>
      <label>Zmień hasło</label>
      <input type='password' name='password' class='form-control'>
      <button class='btn btn-primary mt-2' type='submit'>Potwierdź</button>
      </form>";
}
?>
</div>
</body>
</html>