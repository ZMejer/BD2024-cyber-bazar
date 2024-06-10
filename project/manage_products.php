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
<h1>Zarządzanie produktami</h1>
<?php

if ($_GET['error'] == 'value_error') {
    echo '<div class="alert alert-danger" role="alert">
    Cena musi być większa od zera
  </div>';
} 
?>
<div class='d-flex flex-wrap mb-5'>
<?php
    include 'connection.php';
    $conn = connection();
    $products_query = "SELECT * FROM produkty";

    
    $result = mysqli_query($conn, $products_query); 

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card w-25 mb-3 me-3">
            <div class="card-body">
                <h5 class="card-title">'.$row['nazwa'].'</h5>
                <p class="card-text">'.$row['cena'].' zł</p>
                <form method="POST" action="./alter_product.php">
                <input type="hidden" name="product_id" value="'.$row['idp'].'">
                <label>Zmień cenę</label>
                <input class="form-control" type="number" step="0.01" name="price">
                <button type="submit" class="btn btn-primary mt-2 mb-4">Potwierdź zmianę</button>
                </form>
                <p class="card-text">Kategoria: '.$row['kategoria'].'</p>
                
                <form method="POST" action="./delete_product.php">
                <input type="hidden" name="product_id" value="'.$row['idp'].'">
                <button type="submit" class="btn btn-outline-danger mt-2">Usuń produkt</button>
                </form>
                ';
            echo '</div>
              </div>';
        }
    } else {
        echo "Błąd zapytania: " . mysqli_error($conn);
    }
?>
</div>
<h3>Dodaj produkt</h3>
<form method="POST" action="./add_product.php">
<label>Nazwa</label>
<input type="text" class="form-control mb-4" name="product_name" required>
<label>Cena</label>
<input class="form-control mb-4" type="number" step="0.01" name="price">
<label>Kategoria</label>
<select class="form-control mb-4" name="category">
<?php
$result = $conn->query("SHOW COLUMNS FROM produkty LIKE 'kategoria'");
if ($result) {
    $row = $result->fetch_assoc();
    $type = $row['Type'];
    $option_array = explode("','", preg_replace("/(enum|set)\('(.+?)'\)/", "\\2", $type));

    foreach ($option_array as $option) {
        echo "<option value='$option'>$option</option>";
    }
}
?>
</select>
<button type="submit" class="btn btn-primary mb-5">Dodaj produkt</button>
</form>
</div>
</body>
</html>