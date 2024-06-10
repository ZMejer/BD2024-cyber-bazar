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
    <h1>Produkty</h1>
    <?php
    if ($_GET['order'] == 'success') {
        echo '<div class="alert alert-success" role="alert">
        Zamówienie zostało złożone
    </div>';
} else if ($_GET['order'] == 'error') {
    echo '<div class="alert alert-danger" role="alert">
    Wystąpił błąd podczas składania zamówienia
</div>';
} 
    ?>
    <form class='mb-5' method='POST' action='./select_category.php'>
    <label >Wybierz kategorię</label>
    <select class="form-control" name='category'>
      <?php
        include 'connection.php';
        $conn = connection();
        $categories_query = 'SELECT DISTINCT kategoria FROM produkty';
        $result1 = mysqli_query($conn, $categories_query); 
        if ($result1) {
            while ($row = mysqli_fetch_assoc($result1)) {
                echo '<option value='.$row['kategoria'].'>'.$row['kategoria'].'</option>';
            }
        }
      ?>
    </select>
    <button tyoe='submit' class='btn btn-primary mt-2'>Szukaj</button>
    </form>
    <div class='d-flex flex-wrap'>
    <?php
    $category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';

    if ($category === '') {
        $products_query = "SELECT * FROM produkty";
    } else {
        $products_query = "SELECT * FROM produkty WHERE kategoria='$category'";
    }
    
    $result = mysqli_query($conn, $products_query); 

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $idp = "collapse".$row['idp'];
            echo '<div class="card w-25 mb-3 me-3">
            <div class="card-body">
                <h5 class="card-title">'.$row['nazwa'].'</h5>
                <p class="card-text">'.$row['cena'].' zł</p>
                <p class="card-text">Kategoria: '.$row['kategoria'].'</p>';
                session_start();
                if($_SESSION['rola']=='klient'){
                    echo'
                    <form method="POST" action="./place_order.php">
                    <input type="hidden" name="order_product" value="'.$row['idp'].'">
                    <button type="submit" class="btn btn-primary">Zamów</button>
                    </form>';
                }
                echo'
                <p>
                <button class="btn btn-outline-secondary mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#'.$idp.'" aria-expanded="false" aria-controls="'.$idp.'">
                  Sprawdź dostępność w sklepach
                </button>
              </p>
              <div class="collapse" id="'.$idp.'">
                <div class="card card-body">
                  <h6>Produkt jest dostępny w sklepach: </h6>';
                  $stores_available = "SELECT * FROM sklepy JOIN sklepy_produkty ON ids=s_id WHERE p_id=".$row['idp'];
                  $res = mysqli_query($conn, $stores_available); 
                  if ($res) {
                      if(mysqli_num_rows($res) > 0) {
                          while ($row1 = mysqli_fetch_assoc($res)) {
                              echo '<p>'.$row1['adres'].', '.$row1['miasto'].', ilość: '.$row1['ilosc'].'</p>';
                          }
                      } else {
                          echo '<p>Brak sklepów</p>';
                      }
                  } else {
                      echo '<p>Błąd zapytania</p>';
                  }                  

            echo '</div>
              </div>
            </div>
            </div>';
        }
    } else {
        echo "Błąd zapytania: " . mysqli_error($conn);
    }
?>
</div>
</div>
      <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    </body>
</html>
</body>
</html>