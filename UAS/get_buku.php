<?php 
include 'config.php';
$data = file_get_contents("http://localhost/UAS/datapostgresql.php");
$buku = json_decode($data);
foreach ($buku as $key => $v) {
	$query="INSERT INTO book (id, judul, tahun, author, kategori, ebook) VALUES ('$v->id','$v->judul','$v->tahun','$v->author','$v->kategori','$v->ebook')";
	$q=$db->prepare($query);
	$q->execute();
}

header("location:index.php");
 ?>