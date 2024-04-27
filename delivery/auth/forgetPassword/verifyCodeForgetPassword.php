<?php
include "../../../connect.php";
$email = filterRequest("deliveryEmail");
$verifyCode = filterRequest("verifyCode");

// $stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = '$email' AND delivery_verfiycode ='$verfiyCode'");
// $stmt->execute();
$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = :email AND delivery_verifyCode = :verifyCode");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':verifyCode', $verifyCode);
$stmt->execute();
$count = $stmt->rowCount();
result($count);
