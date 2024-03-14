<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bebas 3 Admin</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>

    <body onload="startTime()">
        <div class="app">
            <div class="layout">
                <nav class="navbar navbar-expand-lg fixed-top bg-body-secondary">
                    <header class="container-fluid">
                        <a href="index.php" class="navbar-brand">Bebas Admin 3</a>
                        <button type="button" class="navbar-toggler" data-bs-target="#navbarToggle"
                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="navbarToggle">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <aside class="collapse navbar-collapse" id="navbarToggle">
                            <ul class="navbar-nav mx-auto ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a href="index.php" aria-current="page" class="nav-link hover">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a href="auth/index.php" aria-current="page" class="nav-link hover">Login</a>
                                </li>
                            </ul>
                        </aside>
                        <div class="ms-auto mx-5 px-5">
                            <span class="card-text" id="time"></span>
                        </div>
                    </header>
                </nav>
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