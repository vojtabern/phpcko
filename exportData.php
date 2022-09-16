<?php 
$dbhost = 'localhost';
$dbuser = 'vojta';
$dbpass = 'vojta';
$dbName = 'phpcko';
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbName);
 // zkontroluje připojení
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 echo "Connected successfully";
 //nezachova si razeni, musim nejak poslat $sql
  $x = "SELECT * FROM produkty INNER JOIN vyrobci on vyrobci = vyrobci_idvyrobci INNER JOIN typy_produktu ON idtypy_produktu = typy_produktu_idtypy_produktu ";
  $query =  mysqli_query($conn, $x);;
 
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
        $lineData = array($row['kod_produktu'], $row['cena'], $row['popis'], $row['typ'], $row['vyrobci']); 
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