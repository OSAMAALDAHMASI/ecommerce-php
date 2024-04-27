<?php
include "../../connect.php";
$id = filterRequest("id");
$nameAr = filterRequest("nameAr");
$nameEn = filterRequest("nameEn");
$oldImageName = filterRequest("oldImageName");
$imageName = imageUpload("../../upload/categories", "file");
if ($imageName == "empty") {
    $data = array(
        "categories_name" => $nameAr,
        "categories_name_ar" => $nameEn,
    );
} else {
    deleteFile("../../upload/categories", $oldImageName);
    $data = array(
        "categories_name" => $nameAr,
        "categories_name_ar" => $nameEn,
        "categories_image" => $imageName,
    );
}


updateData("categories", $data, "categories_id=$id");
