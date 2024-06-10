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
    <h1>Logowanie</h1>
<?php
if ($_GET['login'] == 'invalid') {
    echo '<div class="alert alert-danger" role="alert">
    Niepoprawny login lub hasło
  </div>';
} 
else if ($_GET['login'] == 'valid') {
    echo '<div class="alert alert-success" role="alert">
    Udało się zalogować
  </div>';
}
?>
<form method="POST" action="login_fun.php">
  <div class="form-group">
    <label>Login</label>
    <input type="text" class="form-control" name='login'>
  </div>
  <div class="form-group mt-3">
    <label>Hasło</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name='password'>
  </div>
  <button type="submit" class="btn btn-primary mt-4">Zaloguj się</button>
</form>
</div>
</body>
</html>