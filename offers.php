
<?php

include "connect.php";
$userId = filterRequest("userId");
// getAllData("itemsView", "categories_id='$categoriesId'");

$stmt = $con->prepare("SELECT itemsView.*,1 AS favorite,( items_price - ( items_price * items_discount / 100 )) AS itemsPriceDiscount FROM itemsView
INNER JOIN favorite ON   favorite.favorite_itemsId = itemsView.items_id AND favorite.favorite_userId ='$userId' WHERE items_discount!=0
UNION ALL 
SELECT itemsView.* ,0 AS favorite ,( items_price - ( items_price * items_discount / 100 )) AS itemsPriceDiscount FROM itemsView WHERE items_discount!=0 AND itemsView.items_id NOT IN (SELECT itemsView.items_id FrOM itemsView
INNER JOIN favorite ON   favorite.favorite_itemsId = itemsView.items_id AND favorite.favorite_userId = '$userId' )");


$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
