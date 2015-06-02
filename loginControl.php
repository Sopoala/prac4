<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$duration = $_POST['duration'];

if(($username == "infs" && $password == "3202") || ($username =="INFS" && $password == "3202"))
{
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$_SESSION['duration'] = $duration;
	$_SESSION['login_time'] = time();
	header('Location: index.php');

	date_default_timezone_set('Australia/Brisbane');
	$date=date('d/m/Y H:i:s');
	$stringData = "$date";
	$file = fopen("logs/logfile.txt","a");
	echo fwrite($file, $stringData." ".$_SESSION['username']."-Login\r\n");
	fclose($file);
}
else
{
   $error = "Username or Password is incorrect";
   $_SESSION['error'] = $error;
   header("Location: login.php");
}
?>