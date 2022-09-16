<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include 'action.php' ?>
    </header>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method ="post">
        <p>Your name: <input type="text" name="name"/></p>
        <p>Your age: <input type="text" name="age"/></p>
        <p><input type="submit" /></p>
    </form>
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

    $sql = "SELECT idvyrobci, vyrobci FROM vyrobci";
    $data = $mysqli->query($sql);

    //output data
    if($data->num_rows > 0){
        while($row = $data->fetch_assoc()){
            echo "idvyrobci: " . $row["idvyrobci"] . " Vyrobce: ". $row["vyrobci"] . "<br/>";
        }
    }
    else{
        echo "0 results";
    }
    $mysqli->close();





    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE){
        echo '<p>You are using Ram eater<p>';
        echo $_SERVER['PHP_SELF'], "<br/>";// /phpcko/hello.php
        echo $_SERVER['SERVER_NAME'], "<br/>"; //localhost
        echo $_SERVER['HTTP_REFERER'], "<br/>"; // http://localhost/phpcko/
        echo $_SERVER['HTTP_HOST'], "<br/>"; // localhost
        echo $_SERVER['SCRIPT_NAME']; // /phpcko/hello.php
    }
    ?> 
    <?php 
    if( $_SERVER["REQUEST_METHOD"] == 'POST' ){

        $name = $_REQUEST['name'];
        if(empty($name)){
            echo "Name is empty";
        }
        else{
            echo $name, '<br/>';
        }
    }
    ?>
</body>
</html>

