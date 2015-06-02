<?php
include ('Restaurant.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['search_string'])){
        $r = new Restaurant();
        $rList = $r->Search($_GET['search_string']);
        var_dump($rList);
    }
}
else{
    header("Location: index.php");
}
?>