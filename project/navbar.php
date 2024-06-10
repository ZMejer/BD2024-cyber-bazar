<?php 
function navbar() {
    session_start();
    echo 
    '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand ms-4" href="./home.php">Cyber Bazar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./products.php">Produkty</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sklepy</a>
      </li>';
    if(isset($_SESSION['idu']) && $_SESSION['rola']=='admin') {
        echo '<li class="nav-item">
        <a class="nav-link" href="#">Zarządzanie zamówieniami</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Zarządzanie użytkownikami</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Zarządzanie produktami</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Zarządzanie sklepami</a>
      </li>';
    }
    else if (isset($_SESSION['idu']) && $_SESSION['rola']=='klient'){
        echo '<li class="nav-item">
        <a class="nav-link" href="./orders.php">Moje zamówienia</a>
      </li>';
    }
    echo '</ul>';
    if(isset($_SESSION['idu'])) {
        echo '<a href="./logout.php" class="ms-auto me-3"><button class="btn btn-outline-secondary" type="submit">Wyloguj się</button></a>';
    }
    else {
        echo '<a href="./signup.php" class="ms-auto me-3"><button class="btn btn-outline-primary" type="submit">Zarejestruj się</button></a>
        <a href="./login.php"><button class="btn btn-outline-primary me-3" type="submit">Zaloguj się</button></a>';
    }
    echo '</div>
    </nav>';
}
?>