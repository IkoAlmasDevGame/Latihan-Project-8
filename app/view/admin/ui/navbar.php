<?php 
if($_SESSION["user_level"] == ""){
    header("location:../index.php");
    exit(0);
}
?>

<?php 
if($_SESSION["user_level"] == "Admin"){
?>
<div class="col-md-12 col-lg-12">
    <nav class="navbar navbar-expand-lg bg-body-secondary flex-wrap">
        <header class="container-fluid">
            <a href="../dashboard/index.php?nama=<?=$_SESSION['nama_pengguna']?>" class="navbar-brand">Dashboad Bebas
                Admin</a>
            <button type="button" class="navbar-toggler" data-bs-target="#navbarToggle" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="navbarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>

            <aside class="collapse navbar-collapse" id="navbarToggle">
                <ul class="navbar-nav mx-auto ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="../dashboard/index.php?nama=<?=$_SESSION['nama_pengguna']?>" aria-current="page"
                            class="nav-link hover">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="../ui/header.php?aksi=keluar" onclick="javascript:return confirm('')"
                            aria-current="page" class="nav-link hover">Log out</a>
                    </li>
                </ul>
            </aside>
        </header>
    </nav>
</div>
<?php
}else{
    header("location:../index.php");
    exit(0);
}
?>