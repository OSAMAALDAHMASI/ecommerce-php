<?php
include "../connect.php";
$orderId = filterRequest("orderId");

deleteData("orders", "orders_id='$orderId' AND orders_status=0");
