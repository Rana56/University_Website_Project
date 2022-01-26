<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>Aston University - Logged Out</title>

    <script src="js/navigation.js"></script>
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

    <link href="css/headers.css" rel="stylesheet">
</head>
<body>

    <?php
    session_start();

    unset($_SESSION["username"]);               //removes the session variable username

    ?>

    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
                <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="images/aston.png" alt="Aston Logo" width="126" height="53" />
                </a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="events.php" class="nav-link px-2 text-white">Events</a></li>
                    <li><a href="schedule.php" class="nav-link px-2 text-white">Schedule</a></li>
                </ul>

                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-outline-light me-2" onclick="goLogin()">Login</button>
                    <button type="button" class="btn btn-warning" onclick="goSignup()">Sign-up</button>
                </div>
            </div>
        </div>
    </header>

    <div class="cover-container d-flex w-100 h-100 p-5 mx-auto flex-column text-center">
        <main class="px-3">
            <h1>You have been logged out.</h1>
            <p class="lead">Need to login again?</p>
            <p class="lead">
                <button type="button" class="btn btn-outline-dark me-2" onclick="goLogin()">Login</button>
            </p>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>