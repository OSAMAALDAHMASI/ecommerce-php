<?php
include "connect.php";
$userId = filterRequest("userId");
getAllData("notifications", "notifications_userId=$userId");
