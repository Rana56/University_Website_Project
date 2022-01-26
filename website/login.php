<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Aston University - Login</title>

    <script src="js/navigation.js"></script>
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="css/signin.css" rel="stylesheet" />

</head>

<body class="text-center bg-light">
    <!--header-->
    <?php
        include("php/header.php")
    ?>

    <div class="text-center bodyform">
        <main class="form-signin">
            <form method="post" action="login.php">
                <img src="images/aston.svg" alt="Aston Logo" width="126" height="53" />
                <h1 class="h3 mt-3 mb-3 fw-normal">Please login</h1>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" pattern=".+(aston\.ac\.uk)" />
                    <label for="floatingInput">Aston Email address</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="pwd" class="form-control" id="floatingPassword" placeholder="Password" />
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Login</button>

                <input type="hidden" name="submitted" value="true" /><!-- This allows data to not be seen when form is submitted-->

            </form>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

<?php
    //redirects user if logged in
    if (isset($_SESSION['username'])){
        header("Location: profile.php");
        exit();
    }

    if (isset($_POST["submitted"])){
        if ( !isset($_POST['email'], $_POST['pwd']) ) {
            // Could not get the data that should have been sent.
            exit('Please fill both the username and password fields!');
	    }
        try {
            include("connectdb.php");                  

            $qry = $db->prepare("SELECT password FROM user WHERE email= ? ");
            $qry->execute(array($_POST['email']));

            if($qry->rowCount() > 0){
                $row = $qry->fetch();

                if (password_verify($_POST["pwd"], $row["password"])){              //fetch returns the next row from the result set, this also check the password against the saved password
                    session_start();                                                //starting session allows to store user login
                    $_SESSION['username'] = $_POST['email'];                        //adds user to the session

                    header("Location:profile.php");                                  //redirect user to a new page
                    exit();                                                         //<meta http-equiv="Refresh" content="0; url='https://localhost/htdocs/lab8/course.php'" />

                } else {
                    echo "<p style='color:red'>Login Error - Password incorrect</p>";
                }
            } else {
                echo "<p style='color:red'>Error logging in, account not found </p>";
            }
        } catch (PDOException $ex) {
			echo("Failed to connect to the database. <br />");
			echo($ex->getMessage());
			exit;
        }
    }
?>