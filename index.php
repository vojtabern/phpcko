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

    <?php 
      include "where.php";
    ?>
    <div class="container">
      <div class="col-md-10 text-center">
    <?php
     if(!empty($_POST["where"]) && !empty($_POST["hodnota"]) && !empty($_POST["jak"])){
        $where = $_POST["where"];
        $value = $_POST["hodnota"];
        $jak = $_POST["jak"];
        //echo var_dump($value);
        if($where == "typ"){
          $sql = "SELECT * FROM produkty ".$vyrobci.$typ." WHERE " . $where. $jak. "'" . $value . "'";
        }
        else if($where == "vyrobci"){
          $sql = "SELECT * FROM produkty ".$vyrobci.$typ. " WHERE " . $where.  $jak. "'" . $value . "'";
        }
        else{
          $sql = "SELECT * FROM produkty ".$vyrobci.$typ." WHERE " . $where.  $jak. "'" . $value . "'";
        }

        $result = $conn->connection->query($sql);
            if ($result !== false && $result->num_rows > 0) {
                $i=0;
                echo "<table><tr>";
                $hlavicka->Header();
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if($i=1){
                      echo "<tr>";
                    }
                    echo  "<td>".$row["id_produktu"]."</td>";
                    echo  "<td>".$row["kod_produktu"]."</td>";
                    echo  "<td>".$row["cena"]."</td>";
                    echo  "<td>".$row["popis"]."</td>";
                    echo  "<td>".$row["typ"]."</td>";
                    echo  "<td>".$row["vyrobci"]."</td>";
                    if($i=1){
                      echo "</tr>";
                      $i=0;
                    }
                    $i++;
                    
                    //echo $row[$where];
                }
                echo "</tr></table>";
            }
            else{
                echo "Zadana hodnota " . $value . " neexistuje, nebo není na vámi zadaném indexu " .$where;
            }
            //echo $sql;

        //echo "<br/>" . $where . " ". $value;


     }

?>
      </div>
  </div>
     <?php include 'page/footer.php' ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php  include 'page/scripts.php' ?>
  </body>
</html>