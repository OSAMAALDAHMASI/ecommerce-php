<?php

include "../connect.php";
$userId = filterRequest("userId");
$itemsId = filterRequest("itemsId");

deleteData("favorite", "favorite_userId='$userId' AND favorite_itemsId ='$itemsId'");
