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
<h1>Sklepy</h1>
<div class='d-flex flex-wrap'>
<?php
    include 'connection.php';
    $conn = connection();
    session_start();
    $stores_query = "SELECT * from sklepy ORDER BY adres";
    $result = mysqli_query($conn, $stores_query); 

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ids = "collapse".$row['ids'];
            echo '<div class="card w-25 mb-3 me-3">
            <div class="card-body">
                <h5 class="card-title">'.$row['adres'].'</h5>
                <p class="card-text">'.$row['miasto'].'</p>
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#'.$ids.'" aria-expanded="false" aria-controls="'.$ids.'">
                  Sprawdź dostępne produkty
                </button>
                <div class="collapse mt-3" id="'.$ids.'">
                <div class="card card-body">
                  <h6>Asortyment sklepu: </h6>';
                  $products_available = "SELECT * FROM produkty JOIN sklepy_produkty ON idp=p_id WHERE s_id=".$row['ids'];
                  $res = mysqli_query($conn, $products_available); 
                  if ($res) {
                      if(mysqli_num_rows($res) > 0) {
                          while ($row1 = mysqli_fetch_assoc($res)) {
                              echo '<p>'.$row1['nazwa'].', '.$row1['cena'].', ilość: '.$row1['ilosc'].'</p>';
                          }
                      } else {
                          echo '<p>Brak produktów</p>';
                      }
                  } else {
                      echo '<p>Błąd zapytania</p>';
                  }                  
                
            echo '</div></div></div>
            </div>';
        }
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