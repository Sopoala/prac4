<?php
Class DBConnect{
      public $host = 'myprac-server.database.windows.net';
      private $user = 'randy';
      private $password = 'Sopoala717';
      public $db = 'myprac-db';
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
