<?php
include "../../connect.php";
$deliveryEmail = filterRequest("deliveryEmail");
$deliveryPassword = sha1(filterRequest("deliveryPassword"));
$stmt = $con->prepare("SELECT * FROM `delivery` WHERE `delivery_email` =? AND `delivery_password`=?");
$stmt->execute(array($deliveryEmail, $deliveryPassword));
$count = $stmt->rowCount();
if ($count > 0) {
    $data =  $stmt->fetch(PDO::FETCH_ASSOC);
    $deliveryApprove = $data['delivery_approve'];
    if ($deliveryApprove == 0) {
        echo json_encode(array("status" => "failureApprove", "message" => "Email  is Not Approve"));
    } else {
        echo json_encode(array("status" => "success", "data" => $data));
    }
} else {
    echo json_encode(array("status" => "failure", "message" => "Email Or Password is Not Correct"));
}
