<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Aston University - Profile</title>

    <script src="js/navigation.js"></script>
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

    <link href="css/profile.css" rel="stylesheet" />
</head>
<body class="bg-light">
    <!--header-->
    <?php
        include("php/header.php")
    ?>

        <!--checks if user is logged in, and gets user's first name-->
    <?php
        //session_start();

        include_once("connectdb.php");

        if (!isset($_SESSION['username'])){
            header("Location: login.php");
            exit();
        }

        try {
            //gets the user's name
            $fname = $db->prepare("SELECT first_name FROM user WHERE email = ?");
            $fname->execute(array($_SESSION['username']));
            $fname = $fname->fetch();
        } catch (PDOException $ex) {
            echo $ex;
        }
    ?>

    <div class="d-flex w-100 h-100 px-5 py-4 flex-column bg-white">
        <main class="px-3">
            <h1>Hello, <?= $fname["first_name"] ?> </h1>
            <p class="lead">Your booked events are below.</p>
        </main>
    </div>

    <!--shows bookings-->
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center py-5">
            <table class="table p-1">
                <thead>
                    <tr>
                        <th scope="col">Events</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody id="eventList">
                    <?php
                        include_once("connectdb.php");
                        try {
                            //gets the user id from the user email stored in session data
                            $userid = $db->prepare("SELECT id FROM user WHERE email = ?");
                            $userid->execute(array($_SESSION['username']));
                            $userid = $userid->fetch();
                            
                            //sql query to get the events from the bookings table
                            $qry = $db->prepare("SELECT events.name, events.dates, events.time, events.venue FROM bookings INNER JOIN events ON bookings.eventID=events.eventID WHERE bookings.userID = :userid ");
                            $qry->bindParam(':userid', $userid["id"], PDO::PARAM_STR, 64);
                            $qry->execute();

                            if ($qry->rowCount() > 0){                                     //checks if a rows are returned
                                foreach ($qry as $row){                                         //loops trough queried object
                                ?>
                                    <tr>
                                        <td> <b> <?= $row["name"] ?> </b> </td>
                                        <td> <?= $row["venue"] ?> </td>
                                        <td> <?= date("d-m-Y", strtotime($row["dates"])) ?> </td>
                                        <td> <?= $row["time"] ?> </td>
                                    </tr>

                                <?php
                                }
                            } else {
                            ?>
                                <h3> You have no bookings </h3>
                            <?php
                            }
                        } catch (PDOException $ex) {
                            echo $ex;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

