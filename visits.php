<meta http-equiv="Refresh" content="2">
<html>
<head>
    <title>Applcation object in JSP</title>
</head>
<body>

<?php
$count_my_page = ("hitcounter.txt");
if (!file_exists($count_my_page)) {
    $f = fopen($count_my_page, "w");
    fwrite($f,"0");
    fclose($f);
}
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp);
?>
<center>
    <p><h1>Total number of visits: <?php echo $hits[0]; ?></></p>
    <p><h2> Auto Refresh Every 2 Seconds</h2></p>
    <p><h3>Current Time: <?php date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Y h:i:s a', time());
        echo $date;?></h3></p>
</center>
</body>
</html>