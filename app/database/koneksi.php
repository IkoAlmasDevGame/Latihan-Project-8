<?php
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$host = "localhost";
$dbname = "db_bebas3";
$user = "root";
$pass = "";

try{
    $configs = new PDO("mysql:host=$host;dbname=$dbname;", $user,$pass);
    //echo 'sukses';
}catch(PDOException $e){
    echo 'KONEKSI GAGAL' .$e -> getMessage();
}

$view = "../model/view.php";
$controller = "../controller/controllerView.php";
?>