<?php 
$db = "buku";
$user = "postgres";
$pass = "gia123";
$host = "localhost";
$app = "sistem_buku";
try {
	$db = new PDO("pgsql:dbname=$db;host=$host",$user,$pass);
} catch (Exception $e) {
	echo $e->getMessage();
}

 ?>