<?php

try {
	$db = new PDO("mysql:host=localhost;dbname=buku","root","");
} catch (Exception $e) {
	echo $e->getMessage();
}
?>