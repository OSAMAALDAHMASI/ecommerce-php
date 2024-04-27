<?php
include "../../connect.php";
$userEmail = filterRequest("userEmail");
$newPassword = sha1(filterRequest("userPassword"));
$data = array("users_password" => $newPassword);
updateData("users", $data, " `users_email`='$userEmail'");
