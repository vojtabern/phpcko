<head><?php  include 'page/imports.php' ?></head>

<?php  include 'page/nav.php' ?>
<body>
    

    <div class="container-fluid">
        <div class="container">
    <?php
        
        if(!empty($_POST["filter"])){
            require "con_create.php";
            //require "vypis.php";
            $filter = $_POST["filter"];
            echo "<table>";
            echo "<tr>";
            if($filter == "typ"){
                $sql = "SELECT ".$filter." FROM typy_produktu LIMIT 10";
                echo "<th>Typ výrobku</th>";
            }
            else if($filter == "vyrobci"){
                $sql = "SELECT ".$filter." FROM vyrobci LIMIT 10";
                echo "<th>Výrobce</th>";
            }
            else{
                $sql = "SELECT ".$filter." FROM produkty LIMIT 10";
                echo "<th>".$filter."</th>";      
            }
            echo "</tr>";
            //$vypis = new Vypis;
            //$conn->connection->query($sql);
            $result = $conn->connection->query($sql);
            if ($result !== false && $result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo  "<tr><td>".$row[$filter]."<td></tr>";
                }
            }
            echo "</table>";
        }
        else{
            echo "<h1>Nic si nevybral</h1>";
            require "index.php";
        }
    ?>
    </div>
    </div>
</body>
<?php include "page/scripts.php" ?>  