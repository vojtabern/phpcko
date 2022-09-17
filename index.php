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
    <div class="container-fluid"> 
    <div class="container">
                
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
      //$sql = "SELECT * FROM produkty". $vyrobci.$typ;
      //konec sql dotazu
    ?>

    <?php 
      //vypis
      $hlavicka = new Hlavicka;
      $hlavicka->Forms();
      $sql = $hlavicka->Control($typ, $vyrobci);
      //echo $sql;
      $result = $conn->connection->query($sql);
      $vypis = new Vypis;
      $vypis->Table($result);
      echo "</table>"
      //konec vypisu
    ?>
        <!-- Export tlacitko cast (internet) -->
        <form method="post" action="">
        <input name="" type="submit" value="Reset řazení">
      </form>
    </div>
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