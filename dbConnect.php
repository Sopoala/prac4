<?php
Class DBConnect{
      public $host = 'myprac-server';
      private $user = 'randy';
      private $password = 'Sopoala717';
      public $db = 'myprac-db';
      public $conn;

      function __construct(){}

      public function connect(){
        try{
            $con = sqlsrv_connect($host, array("UID"=>$user, "PWD"=>$password, "Database"=>$db));
            
            $this->conn = $con;
            echo('connected!');
        }
        catch(Exception $ex){
            printf($ex->getMessage());
        }
      }
      
      public function Close($conn){
        $conn = null;
      }
}
?>
