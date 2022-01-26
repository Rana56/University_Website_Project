<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>Aston University - Sign Up</title>
    
    <script src="js/navigation.js"></script>

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

    <link href="css/signup.css" rel="stylesheet" />
</head>
<body class="bg-light">
    <!--Header-->
    <?php
        include("php/header.php")
    ?>

    <!--Sign up form-->
    <div class="container" id="form_container">
        <main class="d-flex justify-content-center pt-5 px-5 pb-4">
            <div class="col-md-6">
                <h4 class="mb-3 text-center">Please enter your details.</h4>
                
                <form class="needs-validation" novalidate id="formid" method="post" action="signup.php">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" name="fname" required />
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lname" required />
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">
                                Email
                                <span class="text-muted">(Aston Email)</span>
                            </label>
                            <input type="email" class="form-control" id="email" placeholder="example@aston.ac.uk" name="email" pattern=".+(aston\.ac\.uk)" required />
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="pwd" required autocomplete="off"/>
                            <div class="invalid-feedback" id="pwderror">
                                Please enter your password.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="password2" class="form-label">Re-Enter Password</label>
                            <input type="password" class="form-control" id="password2" name="pwd2" required autocomplete="off"/>
                            <div class="invalid-feedback" id="pwd2error">
                                Please re-enter your password.
                            </div>
                        </div>
                    </div>

                    <button class="w-100 btn btn-primary btn-lg mt-3" type="submit">Sign up</button>

                    <input type="hidden" name="submitted" value="true" /><!-- This allows data to not be seen when form is submitted-->
                </form>
            </div>
        </main>
    </div>

    <script src="js/signup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>

<?php
if (isset($_POST["submitted"])){
    //checks if the fields are filled in
    if (isset($_POST["email"])){
        $email = $_POST["email"];
    } else {
        echo "<p class='text-danger text-center'> The username is empty. </p>";
        exit;
    }

    //checks if passwords are equal
    if (trim($_POST["pwd"]) !== trim($_POST["pwd2"])){
        echo "<p class='text-danger text-center'> Two passwords don't match. </p>";
        exit;
    }

    if (!empty(trim($_POST["pwd"]))){
        //checks if password meets strength requirements
        pwdcheck($_POST["pwd"]);

        $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);			//hashes the password so it is secure and can be saved to the database
    } else {
        echo "<p class='text-danger text-center'> The password is empty. </p>";
        exit;
    }

    if (isset($_POST["fname"])){
        $fname = $_POST["fname"];
    } else {
        echo "<p class='text-danger text-center'> The first name is empty. </p>";
        exit;
    }

    if (isset($_POST["lname"])){
        $lname = $_POST["lname"];
    } else {
        echo "<p class='text-danger text-center'> The last name is empty. </p>";
        exit;
    }

    include(__DIR__."/connectdb.php");			//links to other file and connects to data base

    try {
        //checks if account already registered
        $qcheck = $db->prepare("SELECT id FROM user WHERE email = ?");
        $qcheck->execute(array($_POST['email']));

        if ($qcheck->rowCount() == 0) {

            $qstr = $db->prepare("INSERT INTO user VALUES(null, :email, :password, :fname, :lname)");				//adds values to database, sql query
            $qstr->bindParam(':email', $email, PDO::PARAM_STR, 64);								//binds a parameter to a specific variable name
            $qstr->bindParam(':password', $pwd, PDO::PARAM_STR, 64);
            $qstr->bindParam(':fname', $fname, PDO::PARAM_STR, 64);
            $qstr->bindParam(':lname', $lname, PDO::PARAM_STR, 64);

            $qstr->execute();							//executes the prepared statement

            $id = $db->lastInsertID();					//gets id of last entry

            echo "<h4 class='text-success text-center'> Congratulations! You are now registered. Your ID is: $id </h4>";
        }   else {
            echo "<h4 class='text-danger text-center'> The email has already been registered. Please try agian with a different email. </h4>";
            exit;
        }
    }
    catch (PDOException $ex) {
	    echo("Failed to connect to the database.<br />");
	    echo($ex->getMessage());
	    exit;

    }
}	else {
    //echo "<h4 class='text-success text-center'> Please enter your credentials. </h4>";
    exit;
}

//password check, checks if password meets requirements
function pwdcheck($pass){
    $upper = preg_match('@[A-Z]@', $pass);
    $lower = preg_match('@[a-z]@', $pass);
    $number    = preg_match('@[0-9]@', $pass);

    if(!$upper || !$lower || !$number || strlen($pass) < 6) {
        
        echo "<p class='text-danger text-center'> Password requirements: Minimum character length is 6 - One Upper case letter - One Number. </p>";
        exit;
    }
}
?>