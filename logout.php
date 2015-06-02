<?php
	session_start();
	session_destroy();
	
	if($_GET['timeout']=="true"){
		date_default_timezone_set('Australia/Brisbane');
		$date=date('d/m/Y H:i:s');
		$stringData = "$date";
		$file = fopen("logs/logfile.txt","a");
		echo fwrite($file, $stringData." ".$_SESSION['username']."-Logout by timer\r\n")."<br />";
		fclose($file);
	}
	else{
		date_default_timezone_set('Australia/Brisbane');
		$date=date('d/m/Y H:i:s');
		$stringData = "$date";
		$file = fopen("logs/logfile.txt","a");
		echo fwrite($file, $stringData." ".$_SESSION['username']."-Logout by user\r\n");
		fclose($file);
	}
	header("Location: login.php");
?>