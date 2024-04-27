<?php
include "../../../connect.php";
$deliveryEmail = filterRequest("deliveryEmail");
$newPassword = sha1(filterRequest("deliveryPassword"));
$data = array("delivery_password" => $newPassword);
updateData("delivery", $data, " `delivery_email`='$deliveryEmail'");
