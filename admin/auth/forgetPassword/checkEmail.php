<?php

include "../../../connect.php";

$adminEmail = filterRequest("adminEmail");
$adminVerifyCode = rand(10000, 99999);
$stmt = $con->prepare("SELECT * FROM admin WHERE admin_email=? ");
$stmt->execute(array($adminEmail));
$count = $stmt->rowCount();
result($count);
if ($count > 0) {
    $data = array("admin_verifyCode" => $adminVerifyCode);
    updateData("admin", $data, "admin_email='$adminEmail'", false);
    sendEmailPhpMailer($adminEmail, $adminVerifyCode);
}
