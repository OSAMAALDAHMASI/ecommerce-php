<?php

include "../connect.php";
$orderId = filterRequest("orderId");
getAllData("orderDetailsView", "cart_orderId='$orderId'");
