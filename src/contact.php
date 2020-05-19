<?php
include 'DBconn.php';

class contact extends DBconn{

    public function getAll(){
        echo "alejandro";
        $sql = 'SELECT * FROM contact';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        return $result;
    }

    public function insert($nombre, $telefono, $direccion, $qty, $date){
        $sql = 'INSERT INTO contact VALUES ("'.$nombre.'","'.$telefono.'","'.$direccion.'" ,"'.$qty.'","'.$date.'")';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        return $result;
    }

    function getProducts($valorName, $valorQueryName, $valorDate, $valorQueryDate){

        if ($valorName == 'client') {

            $ladificil = "'%" .$valorQueryName ."%'";

            $query2 = "SELECT * FROM contact WHERE nombre LIKE $ladificil";

            $result = $this->connect()->query($query2);

        } else if($valorDate == "date"){
            $lerica = "'" .$valorQueryDate ."'";

            $sql = "SELECT * FROM contact WHERE date < '$lerica'";
            echo $sql;
            //Al hacer la query normal va, no se porque no va al ponerlo en php

            $result = $this->connect()->query($sql);

        }else{
            $result = $this->connect()->query('SELECT * FROM contact');
        }

        $this->disconnect();

        return $result;
    }
}

?>