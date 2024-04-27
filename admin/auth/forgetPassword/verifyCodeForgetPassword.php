<?php
include "../../../connect.php";
$email = filterRequest("adminEmail");
$verifyCode = filterRequest("verifyCode");

// $stmt = $con->prepare("SELECT * FROM admin WHERE admin_email = '$email' AND admin_verfiycode ='$verfiyCode'");
// $stmt->execute();
$stmt = $con->prepare("SELECT * FROM admin WHERE admin_email = :email AND admin_verifyCode = :verifyCode");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':verifyCode', $verifyCode);
$stmt->execute();
$count = $stmt->rowCount();
result($count);
