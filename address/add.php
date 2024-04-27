<?php

include "../connect.php";
$name = filterRequest("name");
$usersId = filterRequest("usersId");
$phone = filterRequest("phone");
$city = filterRequest("city");
$street = filterRequest("street");
$lat = filterRequest("lat");
$long = filterRequest("long");
$type = filterRequest("type");

$data = array(
    "address_name" => $name,
    "address_usersId"  => $usersId,
    "address_phone" => $phone,
    "address_city" => $city,
    "address_street" => $street,
    "address_lat" => $lat,
    "address_long" => $long,
    "address_type" => $type,


);

insertData("address", $data);
