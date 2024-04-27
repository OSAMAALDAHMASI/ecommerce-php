<?php

include "../../connect.php";

$deliveryName = filterRequest("deliveryName");
$deliveryEmail = filterRequest("deliveryEmail");
$deliveryPhone = filterRequest("deliveryPhone");
$deliveryPassword = sha1(filterRequest("deliveryPassword"));
$deliveryVerifyCode = rand(10000, 99999);


$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email=? OR delivery_phone=? ");
$stmt->execute(array($deliveryEmail, $deliveryPhone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("Email or Phone Is Exists");
} else {
    $data = array(
        "delivery_name" => $deliveryName,
        "delivery_email" => $deliveryEmail,
        "delivery_phone" => $deliveryPhone,
        "delivery_password" => $deliveryPassword,
        "delivery_verifyCode" => $deliveryVerifyCode,
    );
    sendEmailPhpMailer($deliveryEmail, $deliveryVerifyCode);

    insertData("delivery", $data);
}
