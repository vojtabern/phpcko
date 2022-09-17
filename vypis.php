<?php 
  class Vypis extends Connect{
    public function Table($result){
      if ($result !== false && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id_produktu"]. "</td>";
          echo "<td>" . $row["kod_produktu"]. "</td>";
          echo "<td>" . $row["cena"]. "</td>";
          echo "<td> " . $row["popis"]. "</td>";
          echo "<td>" . $row["typ"]. "</td>" ;
          echo "<td>" . $row["vyrobci"]. "</td>";
        }
      } else {
        echo "0 results";
      }
    }
  }
  ?>