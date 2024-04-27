<?php
include "../../connect.php";
$adminEmail = filterRequest("adminEmail");
$adminPassword = sha1(filterRequest("adminPassword"));
$stmt = $con->prepare("SELECT * FROM `admin` WHERE `admin_email` =? AND `admin_password`=?");
$stmt->execute(array($adminEmail, $adminPassword));
$count = $stmt->rowCount();
if ($count > 0) {
    $data =  $stmt->fetch(PDO::FETCH_ASSOC);
    $adminApprove = $data['admin_approve'];
    if ($adminApprove == 0) {
        echo json_encode(array("status" => "failureApprove", "message" => "Email  is Not Approve"));
    } else {
        echo json_encode(array("status" => "success", "data" => $data));
    }
} else {
    echo json_encode(array("status" => "failure", "message" => "Email Or Password is Not Correct"));
}
