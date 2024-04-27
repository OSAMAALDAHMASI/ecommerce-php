<?php
include "../../connect.php";
$id = filterRequest("id");
$imageName = filterRequest("imageName");

$count = deleteData("categories", "categories_id=$id");
if ($count > 0) {
    deleteFile("../../upload/categories", $imageName);
}
