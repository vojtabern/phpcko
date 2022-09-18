<?php  
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "phpcko");
    //udaje o databazi potrebne k pripojeni k phpmyadmin
        $LIMIT = "LIMIT 10";
        include "static/create.php";  
    class Connect{
        public $connection;
        private $sql;
        private $val = array(
            //id, kod, cena, popis, typ, vyrobce
            array('1', 'Turbodmychadlo GARRETT 753420-5006S', '5690', 
            'Plně repasované turbodmychadlo GARRETT 753420-5006S s kalibračním protokolem o 100% funkčnosti. 
            Poškozené a nezpůsobilé díly byly vyměněny za nové originální, původní funkční komponenty byly 
            opískovány. Po kompletaci byla nastavena podtlaková nebo elektronická regulace. 
            Součástí balení je montážní postup, který vám pomůže vyvarovat se opětovnému poškození 
            repasovaného turbodmychadla.', '1',  '4'),

            array('2', 'Vstřik Common Rail DENSO CRI 095000-5800', '3891', 'Common Railový vstřik DENSO 095000-5800 prošel kompletní repasí a odpovídá kvalitě originálního vstřikovače. Jednotlivé součástky vstřiku byly důkladně prověřeny pod mikroskopem, nevyhovující díly nahrazeny novými (včetně ventilku a koncovky vstřikovače). V rámci výstupní kontroly 
            vstřiky testujeme na certifikovaných testovacích a kalibračních stanicích, ze kterých obdržíte protokol.',
             '3','5'),

            array('3', 'Vstřik Common Rail DELPHI CRI R00002D', '3691', 'Common Railový vstřik DELPHI R00002D prošel kompletní repasí a odpovídá kvalitě originálního vstřikovače. Jednotlivé součástky vstřiku byly důkladně prověřeny pod mikroskopem, nevyhovující díly nahrazeny novými (včetně ventilku a koncovky vstřikovače). V rámci výstupní kontroly vstřiky testujeme na certifikovaných testovacích a kalibračních stanicích, ze kterých obdržíte protokol.',
            '3', '2'),

            array('4', 'Vstřik Common Rail BOSCH CRI 0445110429', '4191', 'Common Railový vstřik BOSCH 0445110429 prošel kompletní repasí a odpovídá kvalitě originálního vstřikovače. Jednotlivé součástky vstřiku byly důkladně prověřeny pod mikroskopem, nevyhovující díly nahrazeny novými (včetně ventilku a koncovky vstřikovače). V rámci výstupní kontroly vstřiky testujeme na certifikovaných testovacích a kalibračních stanicích, ze kterých obdržíte protokol.',
            '3', '1'),

            array('5', 'Vstřik Common Rail BOSCH CRI 0445110131', '3691', 'Common Railový vstřik BOSCH 0445110131 prošel kompletní repasí a odpovídá kvalitě originálního vstřikovače. Jednotlivé součástky vstřiku byly důkladně prověřeny pod mikroskopem, nevyhovující díly nahrazeny novými (včetně ventilku a koncovky vstřikovače). V rámci výstupní kontroly vstřiky testujeme na certifikovaných testovacích a kalibračních stanicích, ze kterých obdržíte protokol.',
            '3', '1'),

            array('6', 'Vysokotlaké čerpadlo DELPHI DFP1 R9042A041A', '8391', 'Repasované vysokotlaké čerpadlo DELPHI R9042A041A zcela odpovídá stavu nového dílu. Nefunkční a poškozené součástky naftového čerpadla byly automaticky vyřazeny a nahrazeny novými, funkční díly jsme očištili a opískovali. Správnou funkčnost vysokotlakého čerpadla garantuje přiložený kalibrační protokol, který je výsledkem dynamického testování v rámci výstupní kontroly.',
            '2', '2'),

            array('7', 'Vysokotlaké čerpadlo BOSCH CP4 0445010507', '10991', 'Repasované vysokotlaké čerpadlo BOSCH 0445010507 zcela odpovídá stavu nového dílu. Nefunkční a poškozené součástky naftového čerpadla byly automaticky vyřazeny a nahrazeny novými, funkční díly jsme očištili a opískovali. Správnou funkčnost vysokotlakého čerpadla garantuje přiložený kalibrační protokol, který je výsledkem dynamického testování v rámci výstupní kontroly.',
            '2', '1'),

            array('8', 'Vysokotlaké čerpadlo BOSCH CP4 0445010506', '11690', 'Repasované vysokotlaké čerpadlo BOSCH 0445010506 zcela odpovídá stavu nového dílu. Nefunkční a poškozené součástky naftového čerpadla byly automaticky vyřazeny a nahrazeny novými, funkční díly jsme očištili a opískovali. Správnou funkčnost vysokotlakého čerpadla garantuje přiložený kalibrační protokol, který je výsledkem dynamického testování v rámci výstupní kontroly.',
            '2', '1'),

            array('9', 'Vysokotlaké čerpadlo DENSO HP2 097300-001X', '12591', 'Repasované vysokotlaké čerpadlo DENSO 097300-001X zcela odpovídá stavu nového dílu. Nefunkční a poškozené součástky naftového čerpadla byly automaticky vyřazeny a nahrazeny novými, funkční díly jsme očištili a opískovali. Správnou funkčnost vysokotlakého čerpadla garantuje přiložený kalibrační protokol, který je výsledkem dynamického testování v rámci výstupní kontroly.',
            '2', '5'),

            array('10', 'Turbodmychadlo KKK 54359700027', '6491', 'Plně repasované turbodmychadlo KKK 54359700027 s kalibračním protokolem o 100% funkčnosti. Poškozené a nezpůsobilé díly byly vyměněny za nové originální, původní funkční komponenty byly opískovány. Po kompletaci byla nastavena podtlaková nebo elektronická regulace. Součástí balení je montážní postup, který vám pomůže vyvarovat se opětovnému poškození repasovaného turbodmychadla.',
            '1', '6'),

            array('11', 'Turbodmychadlo KKK 53039880205', '11390', 'Plně repasované turbodmychadlo KKK 53039880205 s kalibračním protokolem o 100% funkčnosti. Poškozené a nezpůsobilé díly byly vyměněny za nové originální, původní funkční komponenty byly opískovány. Po kompletaci byla nastavena podtlaková nebo elektronická regulace. Součástí balení je montážní postup, který vám pomůže vyvarovat se opětovnému poškození repasovaného turbodmychadla.',
            '1', '6'),

            array('12', 'Turbodmychadlo GARRETT 787556-5017S', '6991', 'Plně repasované turbodmychadlo GARRETT 787556-5017S s kalibračním protokolem o 100% funkčnosti. Poškozené a nezpůsobilé díly byly vyměněny za nové originální, původní funkční komponenty byly opískovány. Po kompletaci byla nastavena podtlaková nebo elektronická regulace. Součástí balení je montážní postup, který vám pomůže vyvarovat se opětovnému poškození repasovaného turbodmychadla.',
            '1', '4'),

            array('13', 'Turbodmychadlo GARRETT 806291-5001S', '7990', 'Plně repasované turbodmychadlo GARRETT 806291-5001S s kalibračním protokolem o 100% funkčnosti. Poškozené a nezpůsobilé díly byly vyměněny za nové originální, původní funkční komponenty byly opískovány. Po kompletaci byla nastavena podtlaková nebo elektronická regulace. Součástí balení je montážní postup, který vám pomůže vyvarovat se opětovnému poškození repasovaného turbodmychadla.',
            '1', '4'),

            array('14', 'Testované vysokotlaké čerpadlo DELPHI DFP1 R9044A051A', '7591', 'Testované originální použité čerpadlo DELPHI DFP1 R9044A051A, které je prověřené a dosahuje výborných funkčních parametrů. Samozřejmostí je zkouška na certifikované testovací stolici, ze které dostanete protokol. Na tento produkt DELPHI nabízíme roční záruku bez omezení najetých kilometrů.',
            '2', '2'),

            array('15', 'Testované vysokotlaké čerpadlo BOSCH CP4 0445010641', '10590', 'Testované originální použité čerpadlo BOSCH CP4 0445010641, které je prověřené a dosahuje výborných funkčních parametrů. Samozřejmostí je zkouška na certifikované testovací stolici, ze které dostanete protokol. Na tento produkt BOSCH nabízíme roční záruku bez omezení najetých kilometrů.',
            '2', '1'),

            array('16', 'Vysokotlaké čerpadlo DENSO HP3 294000-001', '12591', 'Repasované vysokotlaké čerpadlo DENSO 294000-001 zcela odpovídá stavu nového dílu. Nefunkční a poškozené součástky naftového čerpadla byly automaticky vyřazeny a nahrazeny novými, funkční díly jsme očištili a opískovali. Správnou funkčnost vysokotlakého čerpadla garantuje přiložený kalibrační protokol, který je výsledkem dynamického testování v rámci výstupní kontroly.',
            '2', '5'),

            array('17', 'Vysokotlaké čerpadlo DELPHI DFP3 9424A100A', '9291', 'Repasované vysokotlaké čerpadlo DELPHI 9424A100A zcela odpovídá stavu nového dílu. Nefunkční a poškozené součástky naftového čerpadla byly automaticky vyřazeny a nahrazeny novými, funkční díly jsme očištili a opískovali. Správnou funkčnost vysokotlakého čerpadla garantuje přiložený kalibrační protokol, který je výsledkem dynamického testování v rámci výstupní kontroly.',
            '2', '2'),

            array('18', 'Testované vysokotlaké čerpadlo BOSCH CP1 0445010185', '6691', 'Testované originální použité čerpadlo BOSCH CP1 0445010185, které je prověřené a dosahuje výborných funkčních parametrů. Samozřejmostí je zkouška na certifikované testovací stolici, ze které dostanete protokol. Na tento produkt BOSCH nabízíme roční záruku bez omezení najetých kilometrů.',
            '2', '1'),

            array('19', 'Turbodmychadlo KKK 06F145702C', '12991', 'Plně repasované turbodmychadlo KKK 06F145702C s kalibračním protokolem o 100% funkčnosti. Poškozené a nezpůsobilé díly byly vyměněny za nové originální, původní funkční komponenty byly opískovány. Po kompletaci byla nastavena podtlaková nebo elektronická regulace. Součástí balení je montážní postup, který vám pomůže vyvarovat se opětovnému poškození repasovaného turbodmychadla.',
            '1', '6'),

            array('20', 'Vstřik Common Rail DENSO CRI 095000082', '3790', 'Common Railový vstřik DENSO 095000082 prošel kompletní repasí a odpovídá kvalitě originálního vstřikovače. Jednotlivé součástky vstřiku byly důkladně prověřeny pod mikroskopem, nevyhovující díly nahrazeny novými (včetně ventilku a koncovky vstřikovače). V rámci výstupní kontroly vstřiky testujeme na certifikovaných testovacích a kalibračních stanicích, ze kterých obdržíte protokol.',
            '3', '5'),   
        );
        private $vyr = array(
            //id, kod, cena, popis
            array('1',  'Bosch'),
            array('2','Delphi'),
            array('3', 'Garte'),
            array('4', 'Garret'),
            array('5', 'Denso'),
            array('6', 'KKK'),
        );

        private $typ = array(
            //id, kod, cena, popis
            array('1',  'Turbodmychadla'),
            array('2', 'Čerpadla'),
            array('3', 'Vstřikovače'),
        );
        

        public function Connection(){
        $this->connection = new mysqli(DBHOST, DBUSER, DBPASS,/* DBNAME*/);
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

        public function CreateTable($sql){
            $this->sql = $sql;
            if($this->connection->query($this->sql)===true){
                echo "Table in ".DBNAME." was created<br/>";
            }else{
                echo "Error creating table: " . $this->connection->error;
            }     
        }

        public function UserInsertData($sql){
            $this->sql = $sql;
            if($this->connection->multi_query($this->sql)===TRUE){
                echo "New records created successfully";
            }
            else {
                echo "Error: " . $this->sql . "<br>" . $this->connection->error;
            }
        }

        private function InsertData(){
            $this->sql = "";
            for($i=0; $i < count($this->vyr); $i++){
                $this->sql .= "INSERT INTO `vyrobci` (`idvyrobci`, `vyrobci`) VALUES ('{$this->vyr[$i][0]}', '{$this->vyr[$i][1]}');";
            }
            for($i=0; $i < count($this->typ); $i++){
                $this->sql .= "INSERT INTO `typy_produktu` (`idproduct`, `typ`) VALUES ('{$this->typ[$i][0]}', '{$this->typ[$i][1]}');";
            }
            for($i=0; $i < count($this->val); $i++){
                $this->sql .= "INSERT INTO `produkty` (`id_produktu`, `kod_produktu`, `cena`, `popis`, `product_idproduct`, `vyrobci_idvyrobci`) 
                 VALUES ('{$this->val[$i][0]}', '{$this->val[$i][1]}', '{$this->val[$i][2]}', '{$this->val[$i][3]}',
                '{$this->val[$i][4]}', '{$this->val[$i][5]}');";
            }
            $this->connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
            if($this->connection->multi_query($this->sql)===TRUE){
                echo "New records created successfully";
            }else {
                echo "Error: " . $this->sql . "<br>" . $this->connection->error;
            }
        }

        public function setTable($sql){
            $this->CreateTable($sql);
        }

        public function getCreate(){
            return $this->Create();
        }
        public function getInsert(){
            return $this->InsertData();
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
        $conn->getInsert();
    } 
?> 