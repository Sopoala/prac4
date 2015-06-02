<?php
Class DBConnect{
    public $host = 'au-cdbr-azure-east-a.cloudapp.net';
    private $user = 'b70cdb3db9cf13';
    private $password = 'fdad6b7c';
    public $db = 'mypracdb';
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
