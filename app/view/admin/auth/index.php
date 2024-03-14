<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Dashboard Bebas 3</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <?php 
        require_once("../../../database/koneksi.php");
        if(isset($_GET["act"])){
            session_start();
            if($_GET["act"] == "signin"){
                if(isset($_POST["submit"])){
                $userMail = htmlspecialchars($_POST['userMail']);
                $password = htmlspecialchars($_POST['password']);
                password_verify($password, PASSWORD_DEFAULT);
                                
                if($userMail == "" || $password == ""){
                    header("location:index.php");
                    exit(0);
                }

                $table = "tb_user";
                $sql = "SELECT $table WHERE email = '$userMail' and password = '$password' || username = '$userMail' and password = '$password'";
                $db = $configs->prepare($sql);
                $db->execute();
                $cek = $db->rowCount();

                if($cek > 0){
                    $response = array($userMail,$password);
                    $response[$table] = array($userMail,$password);
                    if($row = $db->fetch()){
                        if($row['user_level'] == "Admin"){
                            $_SESSION['id'] = $row['id_pengguna'];
                            $_SESSION['nama_pengguna'] = $row['nama'];
                            $_SESSION['email_pengguna'] = $row['email'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['user_level'] = "Admin";
                            header("location:../dashboard/index.php?nama=".$_SESSION['nama_pengguna']);
                        }
                        $_SESSION['status'] = true;
                        array_push($response[$table], $row);
                        /* Created_At Timestamp */ 
                        exit(0);
                    }
                }else{
                    $_SESSION['status'] = false;
                    header("location:index.php");
                    exit(0);
                }
            }
        }
    }
    ?>
    </head>

    <body onload="startTime()">
        <div class="app">
            <div class="layout">
                <nav class="navbar navbar-expand-lg bg-body-secondary">
                    <header class="container-fluid">
                        <a href="index.php" class="navbar-brand">Bebas 3</a>
                        <button type="button" class="navbar-toggler" data-bs-target="#navbarToggle"
                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="navbarToggle">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <aside class="collapse navbar-collapse" id="navbarToggle">
                            <ul class="navbar-nav mx-auto ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a href="../index.php" aria-current="page" class="nav-link hover">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php" aria-current="page" class="nav-link hover">Login</a>
                                </li>
                            </ul>
                        </aside>
                        <div class="ms-auto mx-5 px-5">
                            <span class="card-text" id="time"></span>
                        </div>
                    </header>
                </nav>

                <section class="min-vh-100">
                    <div class="container-fluid p-5 py-5 bg-body-secondary rounded-1 min-vh-100">
                        <div class="container-fluid py-5 bg-dark rounded-1 min-vh-100">
                            <div class="bg-light p-5 rounded-1 min-vh-100">
                                <h5 class="fs-5 fw-lighter text-center">Login Bebas 3</h5>
                                <div class="justify-content-center d-flex align-items-center flex-wrap pt-5 mt-5">
                                    <div class="card col-md-5 col-lg-5">
                                        <div class="card-header bg-transparent">
                                            <h3 class="fs-5 text-center fw-lighter">
                                                Login Admin
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="index.php?act=signin" method="post">
                                                <div class="row align-items-center form-group mb-2 mb-lg-0">
                                                    <label for="userMail" class="input-group-addon">Email /
                                                        Username</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" name="userMail" id="userMail"
                                                                class="form-control"
                                                                placeholder="masukkan username atau email anda ..."
                                                                required aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="passMail" class="input-group-addon">Kata
                                                        Sandi</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="password" name="password" id="passMail"
                                                                class="form-control"
                                                                placeholder="masukkan kata sandi anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <p class="card-footer container">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary hover">
                                                            <i class="fa fa-sign-in-alt"></i>
                                                            <span>Login</span>
                                                        </button>
                                                        <button type="reset" class="btn btn-danger hover">
                                                            <i class="fa fa-eraser"></i>
                                                            <span>Hapus</span>
                                                        </button>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript">
        function startTime() {
            var day = ["Ahad", "Itsnain", "tsulatsa", "Arbia", "Khamiis ", "Jumu’ah", "Sabtu"];
            var today = new Date();
            var tahun = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time').innerHTML =
                day[today.getDay()] + ", " + h + ":" + m + ":" + s + ", " + tahun;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
        </script>
    </body>

</html>