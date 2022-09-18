


<body>
<div class="container">
    <div class="col-md-10 text-center">
    <form action="index.php" method="post" >  
        Co chcete zobrazit: <input name="where" type="text" value="id_produktu">
        <input name="jak" type="text" value="=">
        <input name="hodnota" type="text" value="2">
        <input type="submit" value="Zobrazit">
    </form>
    </div>
</div>

<div class="container">
    <div class="col-md-10 text-center">

<?php
     /*if(!empty($_POST["where"]) && !empty($_POST["hodnota"])){
        require "con_create.php";
        $where = $_POST["where"];
        $value = $_POST["hodnota"];
        //echo var_dump($value);
        $sql = "SELECT * FROM produkty WHERE " . $where.  " LIKE '" . $value . "'";

        $result = $conn->connection->query($sql);
            if ($result !== false && $result->num_rows > 0) {
                echo "<table><tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    //print_r($row);
                    echo  "<td>".$row["id_produktu"]."</td>";
                    echo  "<td>".$row["kod_produktu"]."</td>";
                    echo  "<td>".$row["cena"]."</td>";
                    echo  "<td>".$row["popis"]."</td>";
                    //echo  "<p>".$row["typ"]."</p>";
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
*/
?>
</div></div>
