<?php
include "../../connect.php";

$userId = filterRequest("userId");
$orderId = filterRequest("orderId");
$data = array(
    "orders_status" => 1
);
// orders_userId
updateData("orders", $data, "orders_id='$orderId' AND orders_status = 0");
insertAndSendNotification("Success", "Your order has been approved", $userId, "none", "orderApprove");
