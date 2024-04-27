<?php
include "../connect.php";

$userId = filterRequest("userId");


getAllData("orderView", "orders_userId='$userId' AND orders_status!=4");
