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
  </head>

    <?php  include 'page/nav.php' ?>
  <body>
    <!-- Formuláře na klinutí, když kliknout data se seřadí. -->
    <div class="container">
        <table>
            <tr>
                <th>
                <form method="post" action="">
                    <input name="Kod" type="submit" value="kod_produktu">
                </form>
                </th>
                <th>
                <form method="post" action="">
                    <input name="Cena" type="submit" value="cena">
                </form>
                </th>
                <th>
                <form method="post" action="">
                    <input name="Popis" type="submit" value="popis">
                </form>
                </th>
                <th><form method="post" action="">
                    <input name="Typ_produktu" type="submit" value="typ_produktu">
                </form></th>
                <th><form method="post" action="">
                    <input name="Vyrobce" type="submit" value="Vyrobce">
                </form></th>
            </tr>

        </table>

        <?php 
        //connection 
            require_once "connect.php";
            $conect = $conn;
        //end of connection
        ?>

        <?php
        $vyrobci = " JOIN vyrobci on vyrobci = vyrobci_idvyrobci ";
        $typ = " JOIN typy_produktu on idproduct = product_idproduct ";
        $sql = "SELECT * FROM produkty". $vyrobci.$typ;
        $conn->connection->query($sql);
        $result = $conect->connection->query($sql);
        
        if ($result !== false && $result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "id_produktu: " . $row["id_produktu"]. " - Kod: " . $row["kod_produktu"]. " - Cena: " . $row["cena"]. "<br>";
            echo "Popis: " . $row["popis"]. " - Typ vyrobku: " . $row["typ"]. " - Vyrobce: " . $row["vyrobci"]. "<br>";
          }
        } else {
          echo "0 results";
        }
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