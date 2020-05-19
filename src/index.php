<?php
require_once 'vendor/autoload.php';
include_once 'contact.php';

$contactos = new contact();

$faker = Faker\Factory::create();

$input = array();

for ($i=0; $i<1000; $i++){
    $input[$i]['nombre'] = $faker->name;
    $input[$i]['telefono'] = $faker->phoneNumber;
    $input[$i]['direccion'] = $faker->address;
    $fechaPrevia = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null);
    $dateFormate = $fechaPrevia->format('Y-m-d');
    $input[$i]['date'] = $dateFormate;
    $input[$i]['qty'] = $faker->randomDigit;

    echo  $input[$i]['nombre'];
}


for ($i=0; $i<1000; $i++){
    $res = $contactos->insert($input[$i]['nombre'], $input[$i]['telefono'], $input[$i]['direccion'], $input[$i]['qty'], $input[$i]['date']);
}

?> 

<html>

<a href="apiContacts.php">API VENTAS</a>

</html>

