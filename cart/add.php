<?php

include "../connect.php";
$userId = filterRequest("userId");
$itemsId = filterRequest("itemsId");

$data = array("cart_userId" => $userId, "cart_itemsId" => $itemsId);
insertData("cart", $data);
