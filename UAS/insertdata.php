<?php 
	include "koneksi.php";
	if (isset($_POST["submit"])) {
		//var_dump($_FILES); die;
		try {
			$isbn = htmlspecialchars($_POST['isbn']);
			$judul = htmlspecialchars($_POST['judul']);
			$tahun = htmlspecialchars($_POST['tahun']);
			$author = htmlspecialchars($_POST['author']);
			$kategori = htmlspecialchars($_POST['kategori']);
			//$ebook = htmlspecialchars($_POST['ebook']);

			$namaFile = $_FILES['ebook']['name'];
			$ukuranFile = $_FILES['ebook']['size'];
			$error = $_FILES['ebook']['error'];
			$tmpName = $_FILES['ebook']['tmp_name'];

			//upload file
			$ebook = upload();
			if (!$ebook) {
				return false;
			}
			$insert ="INSERT INTO sistem_buku.book(id,judul, tahun, author, kategori, ebook) VALUES ('$isbn','$judul','$tahun','$author','$kategori','$ebook')";
			if ($db->query($insert)) {
				echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
				}
				else{
				echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
				}
		} catch (PDOException $e) {
				echo $e->getMessage();	
		}
	}
	function upload(){
		global $namaFile;
		global $ukuranFile;
		global $error;
		global $tmpName;

		//cek file diupload ?
		if($error === 4){
			echo "<script type= 'text/javascript'>
				alert('UPLOAD FILE TERLEBIH DAHULU');
				</script>";
			return false;
		
		}
		//cek upload pdf
		$ekstensiFileValid = ['pdf'];
		$ekstensiFile = explode('.', $namaFile);
		$ekstensiFile = strtolower(end($ekstensiFile));
		if (!in_array($ekstensiFile, $ekstensiFileValid)) {
			echo "<script type= 'text/javascript'>
				alert('HARUS PDF');
				</script>";
		}
		
		//generate nama file baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiFile;
		//cara upload
		move_uploaded_file($tmpName, 'media/'.$namaFileBaru);
		return $namaFileBaru;
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>INSERT BUKU</title>
 	<link href="css/bootstrap.min.css" rel="stylesheet"/>
 </head>
 <body>

 	<br>
 	<center><H1>HALAMAN INSERT DATA</H1><br><br></center>
 	<form method="POST" action="index.php">
 	<div class="row justify-content-end">
 	<div class="col-6 col-md-4">
 			<button class="btn btn-primary" name="logout" type="submit"><a href="home.php">HOME</a></button>

 	</div>
 	</div>
 	</form>
 	<form method="POST" action="" enctype="multipart/form-data">
 		<br><br>
 		<center>
 			<div class="form-group">
	 			<div class="col-md-4">
		 			<label for="is">ISBN</label>
		 			<input class="form-control form-control-lg" type="text" name="isbn" placeholder="ISBN" id="is" required="required">
		 			<label for="j">JUDUL</label>
		 			<input class="form-control form-control-lg" type="text" name="judul" placeholder="JUDUL" id="j" required="required">
		 			<label for="t">TAHUN</label>
		 			<input class="form-control form-control-lg" type="text" name="tahun" placeholder="TAHUN" id="t" required="required">
		 			<label for="a">AUTHOR</label>
		 			<input class="form-control form-control-lg" type="text" name="author" placeholder="AUTHOR" id="a" required="required">
		 			<label for="k">KATEGORI</label>
		 			<input class="form-control form-control-lg" type="text" name="kategori" placeholder="KATEGORI" id="k" required="required">
		 			<label for="e">EBOOK</label>
		 			<input class="form-control form-control-lg" type="file" name="ebook" id="e">
	 			</div>
 			</div>
 			<button class="btn btn-primary" name="submit" type="submit">SAVE</button>
 		</center>
 	</form>
 	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 </body>
 </html>