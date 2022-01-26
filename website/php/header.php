<?php
    session_start();

    if (isset($_SESSION['username'])){
        ?>
        <!--Header if logged in-->
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

                    <ul class="nav col-md-3 justify-content-end text-end">
                        <li>
                            <a href="profile.php" class="nav-link text-white">
                                <!--svg code for the profile icon-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFFFFF" class="bi bi-person-circle mx-1" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                <span id="profiletxt">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-primary btn-warning" onclick="goLogout()">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <?php
    }   else{
        ?>

        <!--Header if not logged in-->
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
        
        <?php
    }
?>



