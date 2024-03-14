<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Bebas 3 Admin</title>
        <?php 
            session_start();

            use controller\Controller;
            use model\View;

            require_once("../../../database/koneksi.php");
            require_once("../../../config/auth.php");
            require_once("../../../config/config.php");
            require_once("../../../controller/view.php");
            require_once("../../../model/model.php");

            $model = new view($configs);
            $lihat = new controller($configs);

            if(isset($_GET['aksi'])){
                $aksi = $_GET['aksi'];
                if($aksi == "keluar"){
                    if(isset($_SESSION['status'])){
                        unset($_SESSION['status']);
                        session_unset();
                        session_destroy();
                        $_SESSION = array();
                    }
                    header("location:../index.php");
                    exit(0);
                }
            }
        ?>
    </head>

    <body>