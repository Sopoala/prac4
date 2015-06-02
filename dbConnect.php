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
            $con = sqlsrv_connect('myprac-server',array("UID"=>'randy',"PWD"=>'Sopoala717',"Database"=>'myprac-db'));
            
            $this->conn = $con;
      
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
