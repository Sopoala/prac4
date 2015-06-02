<?php
include ("Restaurant.php");

$tag = $_POST['tag'];
$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$imgUrl = $_POST['imgUrl'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$description = $_POST['description'];

$restaurant = new Restaurant(null,$tag, $name, $address, $contact, $imgUrl, $latitude, $longitude, $description);

$restaurant -> Insert();

header("Location: admin.php");
?>