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
        <center>
        <div class="col-md-6 offset-md-3">
            <form  action="cari.php" method="post" >
                <input class="col-9" type="text" name="keyword" autofocus placeholder="Cari judul buku" autocomplete="off">
                <button type="submit" name="cari">CARI</button>
                <br><br>
            </form>
        </div>
        </center>
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
                $stmt = $db->prepare("select * from book");
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
                ?>
            </tbody>
        </table>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>