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
<div class='container'>
    <h1>Rejestracja</h1>
    <?php
if ($_GET['signup'] == 'invalid') {
    echo '<div class="alert alert-danger" role="alert">
    Uzytkownik o danym loginie juz istnieje
  </div>';
} 
else if ($_GET['signup'] == 'valid') {
    echo '<div class="alert alert-success" role="alert">
    Udało się zarejestrować
  </div>';
}
?>
<form method="POST" action="signup_fun.php">
  <div class="form-group">
    <label>Login</label>
    <input type="text" class="form-control" name='login'>
  </div>
  <div class="form-group mt-3">
    <label>Hasło</label>
    <input type="password" class="form-control" name='password'>
  </div>
  <div class="form-group mt-3">
    <label>Imię</label>
    <input type="text" class="form-control" name='name'>
  </div>
  <div class="form-group mt-3">
    <label>Nazwisko</label>
    <input type="text" class="form-control" name='surname'>
  </div>
  <div class="form-group mt-3">
    <label>Adres</label>
    <input type="text" class="form-control" name='address'>
  </div>
  <div class="form-group mt-3">
    <label>Miasto</label>
    <input type="text" class="form-control" name='city'>
  </div>
  <div class="form-group mt-3">
    <label>Nr telefonu</label>
    <input type="text" class="form-control" name='phone'>
  </div>
  <button type="submit" class="btn btn-primary mt-4">Zarejestruj się</button>
</form>
</div>

</body>
</html>