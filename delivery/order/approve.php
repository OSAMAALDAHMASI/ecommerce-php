<?php
include "../../connect.php";
$orderId = filterRequest("orderId");
$deliveryId = filterRequest("deliveryId");
$userId = filterRequest("userId");
$data = array(
    "orders_status" => 3,
    "orders_delivery" => $deliveryId
);
// orders_userId
updateData("orders", $data, "orders_id='$orderId' AND orders_status = 2");
insertAndSendNotification("Success", "Your order has been approved By delivery Your Order in the Way", "users$userId", "none", "refreshOrderPending");

sendGCM("warning", "The Order has been approved by delivery", "services", "none", "none");
sendGCM("warning", "The Order has been approved by delivery$deliveryId", "delivery", "none", "none");
