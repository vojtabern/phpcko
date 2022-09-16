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
    <div class="container">
        <table>
            <tr>
                <th><a href="p/action.php">Kod produktu</a></th>
                <th>Cena</th>
                <th>Popis</th><th>Typ produktu</th>
                <th>Vyrobce<th>
            </tr>
    <?php
         $dbhost = 'localhost';
         $dbuser = 'vojta';
         $dbpass = 'vojta';
         $dbName = 'phpcko';
         $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbName);
         if($mysqli->connect_errno){
             die("Connection failed: ". $mysqli->connect_error);
         }
         echo "Connection succes<br/>";
         //sql dotaz
         $sql = "SELECT * FROM produkty INNER JOIN vyrobci on vyrobci = vyrobci_idvyrobci INNER JOIN typy_produktu ON idtypy_produktu = typy_produktu_idtypy_produktu LIMIT 10";

         $data = $mysqli->query($sql);
     
         //output data
         if($data->num_rows > 0){
             while($row = $data->fetch_assoc()){
                echo "<tr><td>" . $row["kod_produktu"] . "</td>";
                echo "<td>". $row["cena"] . " Kč</td>";
                echo "<td>" . $row["popis"] . "</td>";
                 echo "<td>". $row["typ"] . "</td>";
                echo "<td>". $row["vyrobci"] . "</td>";
                echo "</tr>";
             }
         }
         else{
             echo "0 results";
         }
         $mysqli->close();
    ?> 
        </table>

         <form>
            
         </form>
    

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>