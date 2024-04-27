<?php

include "../connect.php";
$userId = filterRequest("userId");

$data = getAllData("cartView", "cart_userId='$userId'", null, false);

$stmt = $con->prepare("SELECT SUM(itemsPriceAll) AS 'totalPrice',SUM(itemsPriceAllWithDiscount) AS 'totalPrice',COUNT(itemsCountAll) AS 'totalCount' FROM `cartView`
WHERE cartView.cart_userId='$userId' GROUP BY cart_userId");
$stmt->execute();

$dataCountPrice = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(array(
    "status" => "success",
    "data" => $data,
    "totalPriceAndCount" => $dataCountPrice
));
