<?php 
	include 'koneksi.php';
	$q=$db->prepare("select * from sistem_buku.book");
	$q->execute();
	$q->setFetchMode(PDO::FETCH_OBJ);
	$buku = array();
	foreach ($q as $v) {
		$buku[] = $v;
	}
	echo json_encode($buku);
 ?>