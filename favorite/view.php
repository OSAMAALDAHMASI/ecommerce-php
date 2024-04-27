<?php

include "../connect.php";
$id = filterRequest("id");


getAllData("myFavorite", "favorite_userId=?", array($id));
