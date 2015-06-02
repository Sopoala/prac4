<?php

include ("Restaurant.php");


$restaurants = new Restaurant();
$rList = $restaurants -> GetAll();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Admin Page</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/lightbox.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />

  <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
  <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
  <script src="js/lightbox.min.js" type="text/javascript"></script> 
  <script src="js/markerwithlabel.js" type="text/javascript"></script>
  <script src="js/main.js" type="text/javascript"></script>
</head>	
	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
    <div id="top">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
              Go Back to Home Page
            </a> 
        </div>
    </div>
</nav>
		<div id="main">			
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading ofh">
					<div class="fr">
						<a href="addRestaurant.php" class="btn btn-primary">
							Add
						</a>
					</div>
				</div>
				<!-- Table -->
				<table class="table">
					<thead>
						<tr>
							<th>
								Tag #
							</th>
							<th>
								Restaurant Name
							</th>
							<th>
								Edit
							</th>
							<th>
								Delete
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						for($i = 0;$i < sizeof($rList);$i++) { $rs = $rList[$i];
						?>
						<!---->
						<tr>
							<th scope="row">
								<?php echo $rs -> tag
								?>
							</th>
							<td>
								<?php echo $rs -> name
								?>
							</td>
							<td>
								<a href="editRestaurant.php?id=<?php echo $rs -> RestaurantId ?>" class="btn btn-warning">
									Edit
								</a>
							</td>
							<td>
								<a href="delRequest.php?id=<?php echo $rs -> RestaurantId ?>"  class="btn btn-danger remove" onclick="return confirm('Are you sure to delete the record?');">
									Delete
								</a>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
