<?php

include "../../connect.php";
$email = filterRequest("email");
$verifyCode = filterRequest("verifyCode");

// $stmt = $con->prepare("SELECT * FROM admin WHERE admin_email = '$email' AND admin_verfiycode ='$verfiyCode'");
// $stmt->execute();
$stmt = $con->prepare("SELECT * FROM admin WHERE admin_email = :email AND admin_verifyCode = :verifyCode");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':verifyCode', $verifyCode);
$stmt->execute();

$count = $stmt->rowCount();
if ($count > 0) {
    $data = array("admin_approve" => "1");
    updateData("admin", $data, " `admin_email` = '$email'");
} else {
    printFailure("verifyCode is Not Correct");
}
