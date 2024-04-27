<?php

include "../../connect.php";

$userEmail = filterRequest("userEmail");
$userVerifyCode = rand(10000, 99999);
$stmt = $con->prepare("SELECT * FROM users WHERE users_email=? ");
$stmt->execute(array($userEmail));
$count = $stmt->rowCount();
result($count);
if ($count > 0) {
    $data = array("users_verifyCode" => $userVerifyCode);
    updateData("users", $data, "users_email='$userEmail'", false);
    sendEmailPhpMailer($userEmail, $userVerifyCode);
}
