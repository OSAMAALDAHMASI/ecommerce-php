<?php

include "../connect.php";
$coupon = filterRequest("coupon");
$currentTime = date("Y-m-d H:i:s");
$count = getData("coupons", "coupons_name='$coupon' AND coupons_expired >= '$currentTime' AND coupons_count > 0 ",);
