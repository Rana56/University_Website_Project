<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>Aston University - Schedule</title>

    <script src="js/navigation.js"></script>
    <script src="js/filter.js"></script>
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

    <link href="css/schedule.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!--header-->
    <?php
        include("php/header.php")
    ?>

    <!--dflex changes item to flex items, flex-column displays items vertically-->
    <div class="d-flex w-100 h-100 px-5 py-4 flex-column bg-white">
        <main class="px-3">
            <h1>Events Schedule.</h1>
            <p class="lead">Have a look at our schedule of events.</p>
        </main>
    </div>

    <!--List schedule-->
    <main class="py-2">
        <div class="container ">
            <!--Grid system, g- (gutter) is the padding between the columns, cols-md is how many columns for a medium screen-->
            <div class="row py-3">

                <!--dropdown-->

                <div class="col offset-md-10">
                    <div class="dropdown float-right">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                        </button>
                        <!--calls function with relavent parameter when item pressed-->
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item" href="#" onclick="loadFilter('asc')">Date: Ascending</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="loadFilter('desc')">Date: Descending</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="loadFilter('sport')">Event Type: Sports</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="loadFilter('culture')">Event Type: Culture</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="loadFilter('other')">Event Type: Other</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <!--list-->
                <div class="col-9">
                    <table class="table">
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
                            $qry = $db->prepare("SELECT name, time, dates, venue FROM events ORDER BY dates ASC");
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
                            }
                        } catch (PDOException $ex) {
                            echo $ex;
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>