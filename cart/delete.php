<?php

include "../connect.php";
$userId = filterRequest("userId");
$itemsId = filterRequest("itemsId");

deleteData("cart", "cart_id=(SELECT cart_id FROM cart WHERE cart_userId='$userId' AND cart_itemsId='$itemsId' AND cart_orderId=0 LIMIT 1)");
