<?php 

class DBconn {

    public $dbname = 'ventasEmpresaPHPUF4';
    public $conn = FALSE;
    
    private $serverName = 'localhost';
    private $userName = 'willyRoot';
    private $password = '';


    public function connect(){
        try{
            $this->conn = new PDO('mysql:host='.$this->serverName.';dbname='.$this->dbname,$this->userName,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }

    public function disconnect(){
        $this->conn = NULL;
        //echo "Disconnected succesfully";
    }   
}


?>