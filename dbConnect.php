<?php
Class DBConnect{
    public $host;
    public $conn;
    function __construct(){}
    public function connect(){
        try{
            $host = 'tcp:myprac-server.database.windows.net,1433';
            $connectionInfo = array("UID" => "randy@myprac-server", "pwd" => "Sopoala717", "Database" => "myprac-db", "LoginTimeout" => 30, "Encrypt" => 1);
            $this->conn = sqlsrv_connect($host, $connectionInfo);
        }
        catch(Exception $ex){
            printf($ex->getMessage());
        }
    }

    public function Close($conn){
        sqlsrv_close($conn);
    }
}
?>
