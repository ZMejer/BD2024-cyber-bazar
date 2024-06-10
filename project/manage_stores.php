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
<h1>Zarządzanie sklepami</h1>
<?php
if ($_GET['alter_stock'] == 'update') {
    echo '<div class="alert alert-success" role="alert">
    Liczba sztuk została zmieniona
  </div>';
} 
else if ($_GET['alter_stock'] == 'delete') {
    echo '<div class="alert alert-success" role="alert">
    Produkt został usunięty ze sklepu
  </div>';
} 
else if ($_GET['alter_stock'] == 'value_error') {
    echo '<div class="alert alert-danger" role="alert">
    Liczba sztuk nie może być mniejsza niż zero
  </div>';
} 
?>
<div class='d-flex flex-wrap'>
<?php
    include 'connection.php';
    $conn = connection();
    $stores_query = "SELECT * from sklepy ORDER BY adres";
    $result = mysqli_query($conn, $stores_query); 

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ids = "collapse".$row['ids'];
            echo '<div class="card w-25 mb-3 me-3">
            <div class="card-body">
                <h5 class="card-title">'.$row['adres'].'</h5>
                <p class="card-text">'.$row['miasto'].'</p>
                  <h6 class="card-text">Asortyment sklepu: </h6>';
                  $products_available = "SELECT * FROM produkty JOIN sklepy_produkty ON idp=p_id WHERE s_id=".$row['ids'];
                  $res = mysqli_query($conn, $products_available); 
                  if ($res) {
                      if(mysqli_num_rows($res) > 0) {
                          while ($row1 = mysqli_fetch_assoc($res)) {
                            
                              echo '<hr><p>'.$row1['nazwa'].', '.$row1['cena'].' zł, ilość: '.$row1['ilosc'].'</p>';
                              echo '
                              <form method="POST" action="./alter_stock.php">
                                <label>Zmień liczbę dostępnych produktów</label>
                                <input type="hidden" name="store_id" value="'.$row['ids'].'">
                                <input type="hidden" name="product_id" value="'.$row1['idp'].'">
                                <input class="form-control" type="number" name="product_count">
                                <button type="submit" class="btn btn-primary mt-2">Potwierdź</button>
                              </form>
                              
                              ';
                          }
                      } else {
                          echo '<p>Brak produktów</p>';
                      }
                  } else {
                      echo '<p>Błąd zapytania</p>';
                  }                  
                
                echo "<hr>
                <h5>Dodaj produkt do asortymentu</h5>
                <form method='POST' action='./add_stock.php'>
                  <input type='hidden' name='store_id' value='".$row['ids']."'>
                  <label>Nazwa</label>
                  <select class='form-control mb-3' name='product_id'>";
                  $all_products = "SELECT * from produkty";
                  $res1 = mysqli_query($conn, $all_products); 
                  if ($res1) {
                      if(mysqli_num_rows($res1) > 0) {
                          while ($row2 = mysqli_fetch_assoc($res1)) {
                            echo "<option value='".$row2['idp']."'>".$row2['nazwa']."</option>";
                          }
                        }
                    }

                echo " </select>
                <label>Ilość</label>
                <input type='number' class='form-control' name='product_count'>
                <button class='btn btn-outline-success mt-2'>Dodaj</button>
                </form>
                ";

            echo '</div>
            </div>';
        }
    }
?>
</div>
<h3 class='mt-5'>Dodaj sklep</h3>
<form method="POST" action="./add_store.php">
<label>Adres</label>
<input type="text" class="form-control mb-4" name="address" required>
<label>Miasto</label>
<input type="text" class="form-control mb-4" name="city" required>
<button type="submit" class="btn btn-primary mb-5">Dodaj sklep</button>
</form>
</div>
</body>
</html>