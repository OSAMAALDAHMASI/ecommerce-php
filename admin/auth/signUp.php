<?php

include "../../connect.php";

$adminName = filterRequest("adminName");
$adminEmail = filterRequest("adminEmail");
$adminPhone = filterRequest("adminPhone");
$adminPassword = sha1(filterRequest("adminPassword"));
$adminVerifyCode = rand(10000, 99999);


$stmt = $con->prepare("SELECT * FROM admin WHERE admin_email=? OR admin_phone=? ");
$stmt->execute(array($adminEmail, $adminPhone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("Email or Phone Is Exists");
} else {
    $data = array(
        "admin_name" => $adminName,
        "admin_email" => $adminEmail,
        "admin_phone" => $adminPhone,
        "admin_password" => $adminPassword,
        "admin_verifyCode" => $adminVerifyCode,
    );
    sendEmailPhpMailer($adminEmail, $adminVerifyCode);

    insertData("admin", $data);
}
