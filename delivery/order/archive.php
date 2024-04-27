<?php
include "../../connect.php";
$deliveryId = filterRequest("deliveryId");
getAllData("orderView", " orders_status = 4 AND orders_delivery ='$deliveryId'");
