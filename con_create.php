<?php  
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    //define("DBPASS", "root");
    define("DBNAME", "moje");
    //udaje o databazi potrebne k pripojeni k phpmyadmin
        $LIMIT = "LIMIT 10";
        include "static/create.php";  
    class Connect{
        public $connection;
        private $sql;
        

        public function Connection(){
        $this->connection = new mysqli(DBHOST, DBUSER, /*DBPASS*/);
            if($this->connection->connect_error){
                die("Connection Failed" . " " .$this->connection->connect_error);
            }
            else{
                echo "Connection successfull<br/>";
            }
        }
           
        private function Create(){
            $this->sql = "CREATE DATABASE " . DBNAME;
            if($this->connection->query($this->sql)===TRUE){
                echo "Database created succesfully<br/>";
            } else{
                echo "Error creating database: " . $this->connection->error;
            }
        }

        private function CreateTable($sql){
            $this->sql = $sql;
            if($this->connection->query($this->sql)===true){
                echo "Table in ".DBNAME." was created<br/>";
            }else{
                echo "Error creating table: " . $this->connection->error;
            }     
        }

        public function setTable($sql){
            $this->CreateTable($sql);
        }

        public function getCreate(){
            return $this->Create();
        }
    }


    $conn = new Connect;

    $conn->Connection();
    //selectnu databazi
    $select_db = mysqli_select_db($conn->connection, DBNAME); 
    //pokud dana databaze neexistuje vytvorim ji a s ni i vsechny potrebne tabulky
    if(!$select_db){
        $conn->getCreate();
        $conn->setTable($typy_produktu);   
        $conn->setTable($vyrobci);
        $conn->setTable($produkty);
    } 
?> 