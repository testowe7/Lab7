<?php 
session_start();

$path = './uploads/';
$file_name = basename($_GET['file']);
$file = "".$_SESSION['current_dir']."/".$file_name."";

if(!$file){ // file does not exist
    die('file not found');
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);
}
?>