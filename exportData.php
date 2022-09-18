<?php 
$dbhost = 'localhost';
$dbuser = 'vojta';
$dbpass = 'vojta';
$dbName = 'moje';
require_once "con_create.php";
//require "vypis.php";
//require "index.php";

 //nezachova si razeni, musim nejak poslat $sql
    
  $x = 'SELECT * FROM produkty JOIN vyrobci on vyrobci = vyrobci_idvyrobci JOIN typy_produktu on idproduct = product_idproduct ';
  $query = $conn->connection->query($x);
  //$query =  mysqli_query($conn, $x);
 
// dostane záznamy z databáze
 
if(mysqli_num_rows($query) > 0){ 
    $delimiter = ","; 
    $filename = "info_product" . date('Y-m-d') . ".csv"; 
     
    // fopen jak z cčka
    $f = fopen('php://memory', 'w'); 
     
    // setne headers 
    $fields = array('ID', 'CENA', 'POPIS', 'TYP', 'VYROBCI'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id_produktu'], $row['kod_produktu'], $row['cena'], $row['popis'], $row['typ'], $row['vyrobci']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // zpet na zacatek souboru 
    fseek($f, 0); 
     
    // Setne headers
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //Vypíše všechna zbývající data
    fpassthru($f); 
} 
exit; 
 
?>