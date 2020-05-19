<?php

include 'contact.php';

class apiContacts
{
    function getAll(){

        $valorName = "client";
        $valorQueryName = $_GET["client"];
        $valorDate = "date";
        $valorQueryDate = $_GET["date"];

        $contact = new contact();
        $products = array();
        $products['register'] = array();        
        $result = $contact->getProducts($valorName, $valorQueryName, $valorDate, $valorQueryDate);
        if ($result->rowCount()) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $register = array(
                    'nombre' => $row['nombre'],
                    'telefono' => $row['telefono'],
                    'direccion' => $row['direccion'],
                    'date' => $row['date'],
                    'qty' => $row['qty'],
                );
                array_push($products['register'], $register);
            }
            http_response_code(200);
            echo json_encode($products);
        } else {
            http_response_code(404);
            echo json_encode(array('message' => 'Element not found'));
        }
    }

}

//Instanciar el objeto api y llamar al metodo getAll(extrayendo informacion)
$api = new apiContacts();
$api->getAll();
