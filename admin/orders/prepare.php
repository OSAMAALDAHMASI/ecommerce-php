<?php
include "../../connect.php";

$userId = filterRequest("userId");
$orderId = filterRequest("orderId");
$orderType = filterRequest("orderType");
if ($orderType == "1") {
    $data = array(
        "orders_status" => 2
    );
} else {
    $data = array(
        "orders_status" => 4
    );
}

// orders_userId
updateData("orders", $data, "orders_id='$orderId' AND orders_status = 1");



if ($orderType == "1") {
    insertAndSendNotification("Success", "Your order on the way ", $userId, "none", "none");
    sendGCM("warning", "There is  a order awaiting Approval", "delivery", "none", "none");
} else {
    insertAndSendNotification("Success", "Your order is ready for pickup ", $userId, "none", "none");
}
