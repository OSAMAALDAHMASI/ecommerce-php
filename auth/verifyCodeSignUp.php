<?php

include "../connect.php";
$email = filterRequest("email");
$verifyCode = filterRequest("verifyCode");

// $stmt = $con->prepare("SELECT * FROM users WHERE users_email = '$email' AND users_verfiycode ='$verfiyCode'");
// $stmt->execute();
$stmt = $con->prepare("SELECT * FROM users WHERE users_email = :email AND users_verifyCode = :verifyCode");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':verifyCode', $verifyCode);
$stmt->execute();

$count = $stmt->rowCount();
if ($count > 0) {
    $data = array("users_approve" => "1");
    updateData("users", $data, " `users_email` = '$email'");
} else {
    printFailure("verifyCode is Not Correct");
}
