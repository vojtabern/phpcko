<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="static/CSS/style.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>

    <?php  include 'page/nav.php' ?>
  <body>
    <!-- Formuláře na klinutí, když kliknout data se seřadí. -->
    <div class="container">


                <form method="post" action="">
                    <input name="Kod" type="submit" value="kod_produktu">
                </form>
                <form method="post" action="">
                    <input name="Cena" type="submit" value="cena">
                </form>
                <form method="post" action="">
                    <input name="Popis" type="submit" value="popis">
                </form>

                <form method="post" action="">
                    <input name="Typ_produktu" type="submit" value="typ_produktu">
                </form>
                <form method="post" action="">
                    <input name="Vyrobce" type="submit" value="Vyrobce">
                </form>
                <form method="post" action="">
                  <input name="idproduct" type="submit" method="post" action="" class="bi-arrow-down" value="&uarr;&darr;" class="btn btn-outline-dark btn-sm"><i class="bi-arrow-down"></i>
                </form>
   <?php 
    //connection 
        require_once "con_create.php";
        require_once "vypis.php";
        $conect = $conn;
    //end of connection
    ?>
    
    <?php
    //sql dotaz
    $vyrobci = " JOIN vyrobci on vyrobci = vyrobci_idvyrobci ";
    $typ = " JOIN typy_produktu on idproduct = product_idproduct ";
    $sql = "SELECT * FROM produkty". $vyrobci.$typ;
    //konec sql dotazu
    ?>

    <?php 
    if(isset($_POST['idproduct'])){
      $typ = $typ .' ORDER BY idproduct DESC';
      $sql = "SELECT * FROM produkty". $vyrobci.$typ;
    }
    ?>

    <?php 
  //vypis
    echo "<table>";
    echo "<tr>";
    echo '<th>Id produktu:<button type="button submit" method="post" action="" class="btn btn-outline-dark btn-sm"><i class="bi-arrow-down"></i> </button></th>';
    echo "<th>Kod produktu:</th>";
    echo "<th>Cena:</th>";
    echo "<th>Popis:</th>";
    echo "<th>Typ vyrobku:</th>";
    echo "<th>Vyrobce:</th>";
    echo "</tr>";
    $result = $conn->connection->query($sql);
    $vypis = new Vypis;
    $vypis->Table($result);
    echo "</table>"
    //konec vypisu
    ?>
        <!-- Export tlacitko cast (internet) -->
    </div>
    <div class="container">
        <div class="float-right">
            <a href="exportData.php" class="btn btn-success"><i class="dwn"></i> Export</a>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>