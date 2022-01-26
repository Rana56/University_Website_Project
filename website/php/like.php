<?php
    // get the q parameter from URL, eventid
    $q = $_REQUEST["q"];

    session_start();

    include("../connectdb.php");

    try {
        //gets the likes from database
        $likes = $db->prepare("SELECT likes FROM events WHERE eventID = ?");
        $likes->execute(array($q));
        
        if ($likes->rowCount() > 0){
            $likes = $likes->fetch();
            //adds 1 like to event
            $likes['likes'] += 1;

            //updates like table
            $update = $db->prepare("UPDATE events SET likes = :like WHERE eventID = :eventid");
            $update->bindParam(':like', $likes['likes'], PDO::PARAM_STR, 64);
            $update->bindParam(':eventid', $q, PDO::PARAM_STR, 64);
            $update->execute();
            
            echo $likes['likes'];
            exit;

        }   else {
            echo "Erro - Event not found";
            exit;
        }
        
    } catch (PDOException $ex) {
        echo $ex;
    }

?>