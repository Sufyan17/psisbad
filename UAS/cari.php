<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Files to download</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

    <p><br/></p>
    <div class="container">
        <center><h1>HASIL PENCARIAN</h1></center>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>JUDUL</th>
                    <th>TAHUN</th>
                    <th>AUTHOR</th>
                    <th>KATEGORI</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "config.php";
                if(isset($_POST['keyword'])){
                $cari = $_POST['keyword'];
                $stmt = $db->prepare("select * from book where judul like :keywords");
                $stmt->bindValue(':keywords', '%' . $cari . '%');
                $stmt->execute();
                while($row = $stmt->fetch()){
                ?>
                <tr>
                    <td><?php echo $row["judul"] ?></td>
                    <td><?php echo $row["tahun"] ?></td>
                    <td><?php echo $row["author"] ?></td>
                    <td><?php echo $row["kategori"] ?></td>
                    <td class="text-center"><a href="download.php?id=<?php echo $row['id'] ; ?>" class="btn btn-primary">Download</a></td>
                </tr>
                <?php
                }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>