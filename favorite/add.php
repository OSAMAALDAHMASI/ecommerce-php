<?php

include "../connect.php";
$userId = filterRequest("userId");
$itemsId = filterRequest("itemsId");

$data = array(
    "favorite_userId" => $userId,
    "favorite_itemsId" => $itemsId,
);

insertData("favorite", $data);
