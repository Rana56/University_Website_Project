<?php
// get the q parameter from URL
$q = $_REQUEST["q"];

//goes back a directory to find file
include("../connectdb.php");
try {
    //checks what filter it is and prepares a query based on it
    if ($q === "asc"){
        $qry = $db->prepare("SELECT * FROM events ORDER BY dates ASC");
    } else if ($q === "desc"){
        $qry = $db->prepare("SELECT * FROM events ORDER BY dates DESC");
    } else if ($q === "sport"){
        $qry = $db->prepare("SELECT * FROM events WHERE typeID = 1");
    } else if ($q === "culture"){
        $qry = $db->prepare("SELECT * FROM events WHERE typeID = 2");
    } else if ($q === "other"){
        $qry = $db->prepare("SELECT * FROM events WHERE typeID = 3");
    } else {
        echo "Request Error";
        $qry = $db->prepare("SELECT * FROM events ORDER BY dates ASC");
    }

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
    }   else{
        echo "Error Loading";
        exit("Error");
    }
} catch (PDOException $ex) {
    echo $ex;
}
?>