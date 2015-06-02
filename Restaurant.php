<?php
include('dbConnect.php');

class Restaurant {
  public $RestaurantId;
  public $tag;
  public $name;
  public $address;
  public $contact;
  public $imgUrl;
  public $latitude;
  public $longitude;
  public $description;

  public function __construct($RestaurantId = null, $tag = null, $name = null, $address = null, $contact = null, $imgUrl = null, $latitude = null, $longitude = null, $description = null) {
    $this -> RestaurantId = $RestaurantId;
    $this -> tag = $tag;
    $this -> name = $name;   
    $this -> address = $address;
    $this -> contact = $contact;
    $this -> imgUrl = $imgUrl;
    $this -> latitude = $latitude;
    $this -> longitude = $longitude;
    $this -> description = $description;
  }

  public function setName($name) {
    $this -> name = $name;
  }

  public function getName() {
    return $this -> name;
  }

  public function setTag($tag) {
    $this -> tag = $tag;
  }

  public function getTag() {
    return $this -> tag;
  }

  public function setAddress($address) {
    $this -> address = $address;
  }

  public function getAddress() {
    return $this -> address;
  }

  public function setContact($contact) {
    $this -> contact = $contact;
  }

  public function getContact() {
    return $this -> contact;
  }

  public function setImgUrl($imgUrl) {
    $this -> imgUrl = $imgUrl;
  }

  public function getImgUrl() {
    return $this -> imgUrl;
  }

  public function setLatitude($latitude) {
    $this -> latitude = $latitude;
  }

  public function getLatitude() {
    return $this -> latitude;
  }

  public function setLongitude($longitude) {
    $this -> longitude = $longitude;
  }

  public function getLongitude() {
    return $this -> longitude;
  }

  public function setDescription($description) {
    $this -> description = $description;
  }

  public function getDescription() {
    return $this -> description;
  }

  public function Insert(){
     try{
        $db = new DBConnect();
        $db->connect();
        $link = $db->conn;

        $query = "INSERT INTO restaurant(tag,name,address,contact,imgUrl,latitude,longitude,description)
                  VALUES ('".$this->tag."','".$this->name."','".$this->address."','".$this->contact."','".$this->imgUrl."',".$this->latitude.",".$this->longitude.",'".$this->description."');";

        mysqli_query($link, $query);

        return mysqli_insert_id($link);
      }
      catch(Exception $ex){
          return $ex->getMessage();
      }
  }
  
  public function GetAll(){
      try{
        $r_arr = array();
        $db = new DBConnect();
        $db->connect();
        $link = $db->conn;

        $query = "SELECT * FROM restaurant";
        
        $result = mysqli_query($link, $query);
        
        while($row = mysqli_fetch_array($result)) { 
            
            $restaurant = new Restaurant();
            $restaurant->RestaurantId = $row["RestaurantId"]; 
            $restaurant->tag = $row["tag"];
            $restaurant->name = $row["name"]; 
            $restaurant->address = $row["address"];             
            $restaurant->contact = $row["contact"]; 
            $restaurant->imgUrl = $row["imgUrl"];              
            $restaurant->latitude = $row["latitude"]; 
            $restaurant->longitude = $row["longitude"];
            $restaurant->description = $row["description"];
            array_push($r_arr, $restaurant);           
        } 
        return $r_arr;
      }
      catch(Exception $ex){
          return $ex->getMessage();
      }
  }
  
 public function GetById($id){
      try{
        $r_arr = array();
        $db = new DBConnect();
        $db->connect();
        $link = $db->conn;

        $query = "SELECT * FROM restaurant where RestaurantId = ".$id;
        
        $result = mysqli_query($link, $query);
        
        while($row = mysqli_fetch_array($result)) { 
            
            $restaurant = new Restaurant();
            $restaurant->RestaurantId = $row["RestaurantId"]; 
            $restaurant->tag = $row["tag"];
            $restaurant->name = $row["name"]; 
            $restaurant->address = $row["address"];             
            $restaurant->contact = $row["contact"]; 
            $restaurant->imgUrl = $row["imgUrl"];              
            $restaurant->latitude = $row["latitude"]; 
            $restaurant->longitude = $row["longitude"];
            $restaurant->description = $row["description"];
            array_push($r_arr, $restaurant);
            
        } 
        return $r_arr[0];
      }
      catch(Exception $ex){
          return $ex->getMessage();
      }
  }
  public function Update($id){
      try{
          $db = new DBConnect();
          $db->connect();
          $link = $db->conn;

          $query = "UPDATE restaurant 
                    SET tag ='".$this->tag."',name = '".$this->name."',address = '".$this->address."',contact = '".$this->contact."',imgUrl = '".$this->imgUrl."',latitude = ".$this->latitude.", longitude = ".$this->longitude.",description = '".$this->description."' WHERE RestaurantId = ".$id.";";

          mysqli_query($link, $query);

          return $id;
      }
      catch(Exception $ex){
          return $ex->getMessage();
      }
  }
  
  public function Remove($id){
      try{
          $db = new DBConnect();
          $db->connect();
          $link = $db->conn;

          $query = "DELETE FROM restaurant WHERE RestaurantId = ".$id.";";

          mysqli_query($link, $query);

          return $id;
      }
      catch(Exception $ex){
          return $ex->getMessage();
      }
  }
  
  public function Search($s_stirng){
      try{
        $r_arr = array();
        $db = new DBConnect();
        $db->connect();
        $link = $db->conn;

        $query = "SELECT * FROM restaurant WHERE CONCAT(name,',',address,',',contact) LIKE '%".$s_stirng."%';";
        $result = mysqli_query($link, $query);
        
        while($row = mysqli_fetch_array($result)) { 
            
            $restaurant = new Restaurant();
            $restaurant->RestaurantId = $row["RestaurantId"]; 
            $restaurant->tag = $row["tag"];
            $restaurant->name = $row["name"]; 
            $restaurant->address = $row["address"];             
            $restaurant->contact = $row["contact"]; 
            $restaurant->imgUrl = $row["imgUrl"];              
            $restaurant->latitude = $row["latitude"]; 
            $restaurant->longitude = $row["longitude"];
            $restaurant->description = $row["description"];
            array_push($r_arr, $restaurant);
            
        } 
        return $r_arr;
        //return mysqli_insert_id($link);
      }
      catch(Exception $ex){
          return $ex->getMessage();
      }
  }
  public function toJson($num){
      return "['".$this->name."',".$this->latitude.",".$this->longitude.",'".$this->tag."']";
  }
  
}
?>