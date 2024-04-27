<?php
include "../../connect.php";
$email = filterRequest("userEmail");
$verifyCode = filterRequest("verifyCode");

// $stmt = $con->prepare("SELECT * FROM users WHERE users_email = '$email' AND users_verfiycode ='$verfiyCode'");
// $stmt->execute();
$stmt = $con->prepare("SELECT * FROM users WHERE users_email = :email AND users_verifyCode = :verifyCode");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':verifyCode', $verifyCode);
$stmt->execute();
$count = $stmt->rowCount();
result($count);
