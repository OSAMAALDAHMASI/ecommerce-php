<?php
include "../../connect.php";

$userId = filterRequest("userId");
$orderId = filterRequest("orderId");
$data = array(
    "orders_status" => 4
);
// orders_userId
updateData("orders", $data, "orders_id='$orderId' AND orders_status = 3");
insertAndSendNotification("Success", "Your order has been delivered", "users$userId", "none", "none");

sendGCM("warning", "the order has been delivered to the customer", "services", "none", "none");
