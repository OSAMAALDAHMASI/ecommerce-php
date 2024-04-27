<?php
include "../connect.php";
$userEmail = filterRequest("userEmail");
$userPassword = sha1(filterRequest("userPassword"));
$stmt = $con->prepare("SELECT * FrOM `users` WHERE `users_email` =? AND `users_password`=?");
$stmt->execute(array($userEmail, $userPassword));
$count = $stmt->rowCount();
if ($count > 0) {
    $data =  $stmt->fetch(PDO::FETCH_ASSOC);
    $userApprove = $data['users_approve'];
    if ($userApprove == 0) {
        echo json_encode(array("status" => "failureApprove", "message" => "Email  is Not Approve"));
    } else {
        echo json_encode(array("status" => "success", "data" => $data));
    }
} else {
    echo json_encode(array("status" => "failure", "message" => "Email Or Password is Not Correct"));
}
