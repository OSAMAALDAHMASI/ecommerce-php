<?php
include "../../../connect.php";
$adminEmail = filterRequest("adminEmail");
$newPassword = sha1(filterRequest("adminPassword"));
$data = array("admin_password" => $newPassword);
updateData("admin", $data, " `admin_email`='$adminEmail'");
