<?php
include ("Restaurant.php");

$restaurantId = $_GET['id'];
$restaurant = new Restaurant();
$restaurant = $restaurant -> GetById($restaurantId);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Restaurant</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
</head>
<body>
	<form class="form-horizontal" method="post" action="editRequest.php" data-redirect-to="admin.php">
		<h3><center>Edit Restaurant</center></h3>
        <input type="hidden" name="restaurantId" value="<?php echo $restaurant -> RestaurantId ?>" />
		<div class="form-group">
		    <label for="tag" class="col-sm-2 control-label">Tag</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="tag" value="<?php echo $restaurant -> tag; ?>" required>
		    </div>
		</div>
		<div class="form-group">
		    <label for="name" class="col-sm-2 control-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="name" value="<?php echo $restaurant -> name; ?>" minlength="4">
		    </div>
		</div>
		<div class="form-group">
		    <label for="address" class="col-sm-2 control-label">Address</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="address" value="<?php echo $restaurant -> address; ?>" minlength="4">
		    </div>
		</div>
		<div class="form-group">
		    <label for="contactNo" class="col-sm-2 control-label">Contact</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="contact" value="<?php echo $restaurant -> contact; ?>" minlength="4">
		    </div>
		</div>
		<div class="form-group">
		    <label for="image" class="col-sm-2 control-label">Image</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="imgUrl" value="<?php echo $restaurant -> imgUrl; ?>" minlength="4">
		    </div>
		</div>		
		<div class="form-group">
		    <label for="latitude" class="col-sm-2 control-label">Latitude</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="latitude" value="<?php echo $restaurant -> latitude; ?>" required>
		    </div>
		</div>
		<div class="form-group">
		    <label for="longitude" class="col-sm-2 control-label">Longitude</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="longitude" value="<?php echo $restaurant -> longitude; ?>" required>
		    </div>
		</div>
		<div class="form-group">
		    <label for="description" class="col-sm-2 control-label">Description</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="description" value="<?php echo $restaurant -> description; ?>" minlength="4">
		    </div>
		</div>
		<div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-md-8">
                    <input type="submit" class="btn btn-primary" value="Save Changes">
                </div>
	</form>			 
 </body>
 </html>