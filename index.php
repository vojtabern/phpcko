<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php  include 'page/imports.php' ?>
  </head>

    <?php  include 'page/nav.php' ?>
  <body>
    <!-- Formuláře na klinutí, když kliknout data se seřadí. -->
    <div class="container-fluid"> 
      <div class="container">
        <div class="col-md-12">    
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
      $vypis = new Vypis;
      $hlavicka->Forms();
      $sql = $hlavicka->Control($typ, $vyrobci);
      $result = $conn->connection->query($sql);
      //echo $sql;
      
      
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
      <div class="col-md-10 text-center">
        <form action="filter.php" method="post" >  
          Id Produktu<input name="filter" type="radio" value="id_produktu">
          Kod Produktu<input name="filter" type="radio" value="kod_produktu">
          Cena<input name="filter" type="radio" value="cena">
          Popis<input name="filter" type="radio" value="popis">
          Typ výrobku<input name="filter" type="radio" value="typ">
          Výrobce<input name="filter" type="radio" value="vyrobci">
          <input type="submit" value="Vyfiltrovat">
        </form>
      </div>
    </div>
    <?php
    //require "filter.php";
    ?>
  </div>
    <div class="container">
        <div class="float-right">
            <a href="exportData.php" class="btn btn-success"><i class="dwn"></i> Export</a>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php  include 'page/scripts.php' ?>
  </body>
</html>