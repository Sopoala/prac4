<?php
include ('Restaurant.php');

$restaurantId = $_GET['id'];
$restaurant = new Restaurant();
$restaurant -> Remove($restaurantId);

header("Location: admin.php");

?>
