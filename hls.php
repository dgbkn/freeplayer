<?php
session_start();
if (isset($_GET["video"]) && isset($_SESSION[$_GET["video"]])) {
header('Content-Type: application/x-mpegURL');
$file = $_SESSION[$_GET["video"]]; //Get the filename
readfile($file); //Proxy
die();       
}
session_start();
$sid = session_id();
$path = "http://freeplayer.herokuapp.com/2m.m3u8";
$hash = md5($path.$sid); //You need to use proper encryption. This is not secure at all.
$_SESSION[$hash] = $path;
?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8">
<title>encrypt url video with php hash</title>
</head><body><center> <h2> encrypt url video hls m3u8</h2><br>
<video width="704" height="404" controls>
<source src="hls.php?video=<?= $hash;?>" type="application/x-mpegURL">
</video></center></body></html>
