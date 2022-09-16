
<table>
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
  $sql = "SELECT * FROM produkty where cena > 5000";
  $data = $mysqli->query($sql);
  //output data
  if($data->num_rows > 0){
    while($row = $data->fetch_assoc()){
      echo "<tr><td>" . $row["kod_produktu"] . "</td>";
      echo "<td>". $row["cena"] . " Kč</td>";
      echo "<td>" . $row["popis"] . "</td>";
      //echo "<td>". $row["typ"] . "</td>";
      //echo "<td>". $row["vyrobci"] . "</td>";
      echo "</tr>";
    }
  }
  else{
      echo "0 results";
  }
$mysqli->close();
?>
<table>

