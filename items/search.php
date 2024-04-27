<?php

include "../connect.php";
$searchText = filterRequest("searchText");
$searchData = getAllData("itemsView", "items_name LIKE '%$searchText%' OR items_name_ar LIKE '%$searchText%'", null, false);
echo json_encode($searchData);
