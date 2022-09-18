<head><?php  include 'page/imports.php' ?></head>

<?php  include 'page/nav.php' ?>


<div class="container">
      <form action="" method="post" >  
          Přidání noveho záznamu:<br/> 
          <input name="id" type="number" min="21" step="1" value="id_produktu">
          <input name="kod" type="text" value="kod_produktu">
          <input name="cena" type="text" value="cena">
          <input name="popis" type="text" value="popis">
          <input name="typ" type="number" min="1" step="1" max="3" value="typ">
          <input name="vyrobce" type="number" min="1" max="6" step="1" value="vyrobci">
          <input type="submit" value="Pridat">
      </form>
    </div>
  </div>


<?php
    require_once "con_create.php";
      if(!empty($_POST["kod"]) && !empty($_POST["id"]) && !empty($_POST["cena"]) && !empty($_POST["popis"]) 
      && !empty($_POST["typ"])&& !empty($_POST["vyrobce"])){

        $sql = "INSERT INTO `produkty` (`id_produktu`, `kod_produktu`, `cena`, `popis`, `product_idproduct`, `vyrobci_idvyrobci`) 
        VALUES ('{$_POST["id"]}', '{$_POST["kod"]}', '{$_POST["cena"]}', '{$_POST["popis"]}',
       '{$_POST["typ"]}', '{$_POST["vyrobce"]}');";
       $conn->UserInsertData($sql);
      }
      else{
        echo "Nebyla zadana vsechna data";
      }



?>