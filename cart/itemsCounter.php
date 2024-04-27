<?php

include "../connect.php";
$userId = filterRequest("userId");
$itemsId = filterRequest("itemsId");

$stmt = $con->prepare("SELECT COUNT(cart_id) as itemsCount FROM cart WHERE cart_itemsId ='$itemsId' AND cart_userId ='$userId' AND cart_orderId=0");
$stmt->execute();
$count = $stmt->rowCount();
$data = $stmt->fetchColumn();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure", "data" => "0"));
}
