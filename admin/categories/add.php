<?php
include "../../connect.php";
$nameAr = filterRequest("nameAr");
$nameEn = filterRequest("nameEn");
$imageName = imageUpload("../../upload/categories", "file");

$data = array(
    "categories_name" => $nameAr,
    "categories_name_ar" => $nameEn,
    "categories_image" => $imageName,
);

insertData("categories", $data);
