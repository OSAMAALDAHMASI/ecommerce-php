<?php

include "../connect.php";

$userName = filterRequest("userName");
$userEmail = filterRequest("userEmail");
$userPhone = filterRequest("userPhone");
$userPassword = sha1(filterRequest("userPassword"));
$userVerifyCode = rand(10000, 99999);


$stmt = $con->prepare("SELECT * FROM users WHERE users_email=? OR users_phone=? ");
$stmt->execute(array($userEmail, $userPhone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("Email or Phone Is Exists");
} else {
    $data = array(
        "users_name" => $userName,
        "users_email" => $userEmail,
        "users_phone" => $userPhone,
        "users_password" => $userPassword,
        "users_verifyCode" => $userVerifyCode,
    );
    sendEmailPhpMailer($userEmail, $userVerifyCode);

    insertData("users", $data);
}
