<?php

include "../connect.php";
$favoriteId = filterRequest("id");

deleteData("favorite", "favorite_id='$favoriteId'");
