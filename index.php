<?php 
  include ('Restaurant.php');
      
      $r = new Restaurant();
      $rList = $r->GetAll();

       if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['search_string'])){
            
            $rList = $r->Search($_GET['search_string']);            
          }
      }
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Restaurant</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/lightbox.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />

  <script src="http://maps.googleapis.com/maps/api/js" type="text/javascript"></script>
  <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
  <script src="js/lightbox.min.js" type="text/javascript"></script>   
  <script type="text/javascript">
    //Geolocation
    $(document).ready(function(){
            function initialize() { 
                
              var mapOptions = {
                center: { lat: -27.469165, lng: 153.030335},  
                zoom: 14
              };

              var map = new google.maps.Map(document.getElementById('map_canvas'),
                  mapOptions);

                      if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(function (position) {
                   initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                   map.setCenter(initialLocation);
               });
                      }
                      //map.setCenter(new google.maps.LatLng(lat.value,lon.value));

                      var restaurants = [
                          <?php for($i = 0;$i < sizeof($rList);$i++) { 
                              $r = $rList[$i];
                              echo $r->ToJson($i+1).",";
                          } ?>
                      ];

                      for (var i=0;i<restaurants.length;i++){
                              var marker = new google.maps.Marker({
                                      position: { lat: restaurants[i][1], lng: restaurants[i][2] },
                                      icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+restaurants[i][3]+'|FE4353|FFFFFF',
                                      map: map,
                                      title: restaurants[i][0]+ " is here!"
                              }); 
                      }
                }
                      google.maps.event.addDomListener(window, 'load', initialize);                     
              }); 
    </script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div id="top">
        <div class="navbar-header">
            <a class="navbar-brand" href="admin.php">
              Manage Restaurants
            </a> 
        </div>
         <div id="navbar" class="navbar-collapsew">
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Search..." name="search_string" class="form-control">
                    <input type="submit" class="btn btn-primary" value="Search">
                </div> 
                <?php
                  if(!empty($_SESSION['username'])){
                      echo '<a href="logout.php?timeout=false" class="btn btn-success">Logout</a>';}

                  else {
                          echo '<a href="login.php" class="btn btn-success">Login</a>';
                 }
                ?>               
            </form>
         </div>
    </div>
</nav>
    <div id ="my_location">
    </div>
    <div id="main">
        <div id="map">
            <div id="map_canvas"></div>
        </div>
        <?php for($i = 0;$i < sizeof($rList);$i++) { 
            $rs = $rList[$i]; 
            //$imgArr = explode("#",$rs->imgUrl);
            //var_dump ($imgArr);
            ?>
        <div id="location-area">
        <div class="location-detail">
            <div class="location-section">
              <h3>
				<div id = "tag">
                    <?php echo $rs->tag;  ?>
				</div>
                </h3>
            </div>
            <div class="location-info">
                <h3>
                    <?php echo $rs->name;  ?>
                </h3>

                <p>
                    <?php echo $rs->address  ?>
                </p>

                <p>
                    <?php echo $rs->contact;  ?>
                </p>
                <a href="restaurant1.html" class="btn btn-primary">
                    More info
                </a>
				
            </div>
            <div class="location-thumbnail">
              <a href="<?php echo $rs->imgUrl; ?>" data-lightbox="image-1" data-title="Sake Interior Views">
                <img src="<?php echo $rs->imgUrl; ?>" alt="Image"/>
              </a>
            </div>
        </div>
    </div>
 <?php } ?>
</div>
</body>
</html>
