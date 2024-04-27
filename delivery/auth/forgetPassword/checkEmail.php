<?php

include "../../../connect.php";

$deliveryEmail = filterRequest("deliveryEmail");
$deliveryVerifyCode = rand(10000, 99999);
$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email=? ");
$stmt->execute(array($deliveryEmail));
$count = $stmt->rowCount();
result($count);
if ($count > 0) {
    $data = array("delivery_verifyCode" => $deliveryVerifyCode);
    updateData("delivery", $data, "delivery_email='$deliveryEmail'", false);
    sendEmailPhpMailer($deliveryEmail, $deliveryVerifyCode);
}
