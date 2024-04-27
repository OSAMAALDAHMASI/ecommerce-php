<?php

include "../connect.php";
$paymentMethod = filterRequest("paymentMethod");
$deliveryType = filterRequest("deliveryType");
$couponId = filterRequest("couponId");
$orderPrice = filterRequest("orderPrice");
$deliveryPrice = filterRequest("deliveryPrice");
$userId = filterRequest("userId");
$addressId = filterRequest("addressId");
$status = filterRequest("status");


$totalPrice = $orderPrice + $deliveryPrice;
$stmt = $con->prepare("SELECT coupons_discount FROM coupons WHERE coupons_id='$couponId' AND coupons_expired >= '$currentTime' AND coupons_count > 0");
$stmt->execute();
$count = $stmt->rowCount();
$couponsDiscount = $stmt->fetchColumn();
if ($count > 0) {
    $totalPrice = $orderPrice - ($orderPrice * $couponsDiscount / 100) + $deliveryPrice;
}

$data = array(
    "orders_paymentMethod" => $paymentMethod,
    "orders_deliveryType" => $deliveryType,
    "orders_couponId" => $couponId,
    "orders_orderPrice" => $orderPrice,
    "orders_deliveryPrice" => $deliveryPrice,
    "orders_userId" => $userId,
    "orders_addressId" => $addressId,
    // "orders_status" => $status,
    "orders_totalPrice" => $totalPrice,
);
$count = insertData("orders", $data, false);
if ($count > 0) {
    $stmt = $con->prepare("SELECT MAX(orders_id) FROM orders WHERE orders_userId='$userId' AND orders_status=0");
    $stmt->execute();
    $maxOrderId = $stmt->fetchColumn();
    $data = array("cart_orderId" => $maxOrderId);
    updateData("cart", $data, "cart_orderId=0 AND cart_userId='$userId'");
}
