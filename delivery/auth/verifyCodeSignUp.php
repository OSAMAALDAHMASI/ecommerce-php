<?php

include "../../connect.php";
$email = filterRequest("email");
$verifyCode = filterRequest("verifyCode");

// $stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = '$email' AND delivery_verfiycode ='$verfiyCode'");
// $stmt->execute();
$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = :email AND delivery_verifyCode = :verifyCode");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':verifyCode', $verifyCode);
$stmt->execute();

$count = $stmt->rowCount();
if ($count > 0) {
    $data = array("delivery_approve" => "1");
    updateData("delivery", $data, " `delivery_email` = '$email'");
} else {
    printFailure("verifyCode is Not Correct");
}
