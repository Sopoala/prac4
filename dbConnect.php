<?php
Class DBConnect{
      public $host = 'localhost';
      private $user = 'test';
      private $password = 'test';
      public $db = 'test';
      public $conn;

      function __construct(){}

      public function connect(){
        try{
            $con = mysqli_connect($this->host,$this->user,$this->password,$this->db) or die("Could not connect");
            
            $this->conn = $con;
        }
        catch(Exception $ex){
            printf($ex->getMessage());
        }
      }
      
      public function Close($conn){
        mysqli_close($conn);
      }
}
?>