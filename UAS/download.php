<?php
include "config.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stat = $db->prepare("select * from book where id=?");
    $stat->bindParam(1, $id);
    $stat->execute();
    $data = $stat->fetch();
    $file = 'media/'.$data['ebook'];
    //var_dump($file); die;
    if(file_exists($file)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
}