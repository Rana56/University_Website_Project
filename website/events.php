<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>Aston University - Events</title>


    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

    <link href="css/events.css" rel="stylesheet">
</head>
<body>
    <!--Header-->
    <?php
        include("php/header.php")
    ?>

    <!--dflex changes item to flex items, flex-column displays items vertically-->
    <div class="d-flex w-100 h-100 px-5 py-4 flex-column text-dark">
        <main class="px-3">
            <h1>Aston events.</h1>
            <p class="lead">Have a look at the available events.</p>
        </main>
    </div>

    <!--Cards -->

    <div class="py-5 bg-light">
        <div class="container">
                
            <?php
            include_once("connectdb.php");
            try {
                $qry = $db->prepare("SELECT * FROM events");
                $qry->execute();

                if ($qry->rowCount() > 0){                                     //checks if a rows are returned
                    foreach ($qry as $row){                                         //loops trough queried object
                        //adds path to image and creates id for buttons
                        $image = "images/events/" . $row["image"];
                        $collapseRef = "#collapse" . $row["eventID"];
                        $collapseID = "collapse" . $row["eventID"];
                        $bookBtnID = "bookbtnid" . $row["eventID"];

                        $likeID = "likeid" . $row["eventID"];
                        ?>

                        <div class="row featurette">

                            <!-- order controls the visual order of content -->
                            <div class="col-md-8 order-md-2">
                                <h2 class="featurette-heading"> <?= $row["name"] ?> </h2>
                                <p class="lead"> <?= $row["description"] ?> </p>

                                <!--Buttons, sends event id-->
                                <button type="button" id=<?= $bookBtnID ?> class="btn btn-warning bookbtn" onclick="book( <?= $row['eventID'] ?> )" >Book</button>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href=<?= $collapseRef ?> role="button" aria-expanded="false" aria-controls="collapseExample">Learn More</a>

                                <!--like button-->
                                <button type="button" class="btn btn-primary" onclick="goLike(<?= $row['eventID'] ?>)" >
                                    Like
                                    <span class="badge bg-secondary" id=<?= $likeID ?> > <?= $row["likes"] ?> </span>
                                </button>

                                <!--This holds the collaped information-->
                                <div class="collapse" id=<?= $collapseID ?> >
                                    <div class="card card-body">
                                        <ul>
                                            <li>Date: <?= date("d-m-Y", strtotime($row["dates"])) ?> </li>              <!--date() changes the format of the date that is recived from the database-->
                                            <li>Time: <?= $row["time"] ?> </li>
                                            <li>Organiser: <?= $row["organiser"] ?> </li>
                                            <li>Venue: <?= $row["venue"] ?> </li>
                                            <li>Contact: <?= $row["contact"] ?> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 order-md-1 d-flex justify-content-center">
                                <img src='<?= $image ?>' alt="<?= $row["name"] ?>"  width="250" height="250" />
                            </div>
                        </div>
                        
                        <hr class="featurette-divider">

                        <?php
                    }
                }
            } catch (PDOException $ex) {
                echo $ex;
            }
            ?>
        </div>

        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p><img src="images/logo.png" width="40" height="40"  alt="icon" id="logo"> - 2021 - Built by Chirag Rana</a></p>
        </footer>
    </div>
    
    <script src="js/navigation.js"></script>
    <script src="js/events.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

