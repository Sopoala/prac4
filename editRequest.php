<?php
include ("Restaurant.php");

$restaurantId = $_POST['restaurantId'];
$tag = $_POST['tag'];
$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$imgUrl = $_POST['imgUrl'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$description = $_POST['description'];

$restaurant = new Restaurant($restaurantId, $tag, $name, $address, $contact, $imgUrl, $latitude, $longitude, $description);

$restaurant -> Update($restaurantId);

header("Location:admin.php");
?>