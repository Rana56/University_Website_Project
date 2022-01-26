<?php
    // get the q parameter from URL, eventid
    $q = $_REQUEST["q"];

    session_start();
    //checks if user is logged in
	if (!isset($_SESSION['username'])){
        echo "false";
		//header("Location: ../login.php");
        exit;
	}

    include("../connectdb.php");

    try {
        //gets the user id from the user email stored in session data
        $userid = $db->prepare("SELECT id FROM user WHERE email = ?");
        $userid->execute(array($_SESSION['username']));
        //gets the first row of pdo object
        $first_row = $userid->fetch();

        //check if user has already booked onto event
        $qcheck = $db->prepare("SELECT * FROM bookings WHERE userID = ? AND eventID = ? ");
        $qcheck->execute(array($first_row['id'], $q));

        if ($qcheck->rowCount() == 0){
            //adds user to the booking
            $book = $db->prepare("INSERT INTO bookings VALUES(null, :userid, :eventid)");
            $book->bindParam(':userid', $first_row['id'], PDO::PARAM_STR, 64);
            $book->bindParam(':eventid', $q, PDO::PARAM_STR, 64);
            $book->execute();
            
            echo "Booked";
            exit;

        }   else {
            //unbooks user
            $delete = $db->prepare("DELETE FROM bookings WHERE userID = :userid AND eventID = :eventid");
            $delete->bindParam(':userid', $first_row['id'], PDO::PARAM_STR, 64);
            $delete->bindParam(':eventid', $q, PDO::PARAM_STR, 64);
            $delete->execute();

            echo "Book";
            exit;
        }
        
    } catch (PDOException $ex) {
        echo $ex;
    }

?>