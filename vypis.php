<?php 
    class Hlavicka{
        public function Forms(){
            echo "<table>";
            echo "<tr>";
            echo '<th>
            <form method="post" action="">
            Id produktu:
            <input name="idproduct_up" type="submit" method="post" value="&uarr;" class="btn btn-outline-dark btn-sm">
            <input name="idproduct_down" type="submit" method="post" value="&darr;" class="btn btn-outline-dark btn-sm">
            </form></th>';
           //if($arr === 'kod_produktu'){
            echo '<th>
            <form method="post" action="">
            Kod produktu:
            <input name="codeproduct_up" type="submit" method="post" value="&uarr;" class="btn btn-outline-dark btn-sm">
            <input name="codeproduct_down" type="submit" method="post"  value="&darr;" class="btn btn-outline-dark btn-sm">
            </form></th>';//}
            echo '<th>
            <form method="post" action="">
            Cena:
            <input name="cena_up" type="submit" method="post"  value="&uarr;" class="btn btn-outline-dark btn-sm">
            <input name="cena_down" type="submit" method="post"  value="&darr;" class="btn btn-outline-dark btn-sm">
            </form></th>';
            echo '<th> 
            <form method="post" action="">
            Popis:
            <input name="popis_up" type="submit" method="post"  value="&uarr;" class="btn btn-outline-dark btn-sm">
            <input name="popis_down" type="submit" method="post"  value="&darr;" class="btn btn-outline-dark btn-sm">
            </form></th>';
            echo '<th>
            <form method="post" action="">
            Typ vyrobku:
            <input name="typ_up" type="submit" method="post"  value="&uarr;" class="btn btn-outline-dark btn-sm">
            <input name="typ_down" type="submit" method="post"  value="&darr;" class="btn btn-outline-dark btn-sm">
            </form></th>';
            echo '<th>
            <form method="post" action="">
            Vyrobce:
            <input name="vyrobci_up" type="submit" method="post"  value="&uarr;" class="btn btn-outline-dark btn-sm">
            <input name="vyrobci_down" type="submit" method="post"  value="&darr;" class="btn btn-outline-dark btn-sm">
            </form></th>';
            echo "</tr>";
        }
        public function Control($typ, $vyrobci){
            if(isset($_POST['idproduct_up'])){
                $typ = $typ .' ORDER BY id_produktu ASC';
              }
              else if(isset($_POST['idproduct_down'])){
                $typ = $typ .' ORDER BY id_produktu DESC';
              }
              if(isset($_POST['codeproduct_up'])){
                $typ = $typ .' ORDER BY kod_produktu ASC';
              }
              else if(isset($_POST['codeproduct_down'])){
                $typ = $typ .' ORDER BY kod_produktu DESC';
              }
              if(isset($_POST['cena_up'])){
                $typ = $typ .' ORDER BY cena ASC';
              }
              else if(isset($_POST['cena_down'])){
                $typ = $typ .' ORDER BY cena DESC';
              }
              if(isset($_POST['popis_up'])){
                $typ = $typ .' ORDER BY popis ASC';
              }
              else if(isset($_POST['popis_down'])){
                $typ = $typ .' ORDER BY popis DESC';
              }
              if(isset($_POST['typ_up'])){
                $typ = $typ .' ORDER BY product_idproduct ASC';
              }
              else if(isset($_POST['typ_down'])){
                $typ = $typ .' ORDER BY product_idproduct DESC';
              }
              if(isset($_POST['vyrobci_up'])){
                $typ = $typ .' ORDER BY vyrobci_idvyrobci ASC';
              }
              else if(isset($_POST['vyrobci_down'])){
                $typ = $typ .' ORDER BY vyrobci_idvyrobci DESC';
              }
              return ("SELECT * FROM produkty". $vyrobci.$typ." LIMIT 10");
        }
    }

  class Vypis extends Connect{
    private $pokus = array();
    public function Table($result){
      if ($result !== false && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
            if(!empty($row["id_produktu"])){
                echo "<td>" . $row["id_produktu"]. "</td>";
                array_push($this->pokus,'id_produktu');
            }else{
                echo "<td></td>";
            } 
            if(!empty($row["kod_produktu"])){
                echo "<td>" . $row["kod_produktu"]. "</td>";
                array_push($this->pokus, 'kod_produktu');
            }else{
                echo "<td></td>";
            } 
            if(!empty($row["cena"])){
                echo "<td>" . $row["cena"]. " Kč</td>";
                array_push($this->pokus, 'cena');
            }else{
                echo "<td></td>";
            } 
            if(!empty($row["popis"])){
                echo "<td> " . $row["popis"]. "</td>";
                array_push($this->pokus, 'popis');
            }else{
                echo "<td></td>";
            } 
            if(!empty($row["typ"])){
                echo "<td>" . $row["typ"]. "</td>" ;
                array_push($this->pokus, 'typ');
            }else{
                echo "<td></td>";
            } 
            if(!empty($row["vyrobci"])){
                echo "<td>" . $row["vyrobci"]. "</td>";
                array_push($this->pokus,'vyrobci');
            }else{
                echo "<td></td>";
            } 
        }
      } else {
        echo "0 results";
      }
    }
    public function getArr(){
        return $this->pokus;
    }
  }
  ?>