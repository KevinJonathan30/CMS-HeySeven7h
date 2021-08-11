<?php
        require_once("../connect.php");

        if(isset($_POST["id"]) && isset($_POST["date"]) && isset($_POST["start"]) && isset($_POST["finish"]) && isset($_POST["subject"]) && isset($_POST["topic"]) && isset($_POST["comment"])) {
            $id = $_POST["id"];
            $date = $_POST["date"];
            $start = $_POST["start"];
            $finish = $_POST["finish"];
            $subject = $_POST["subject"];
            $topic = $_POST["topic"];
            $comment = $_POST["comment"];

            $sql = "UPDATE heyseven7h_private_attendance SET date='$date', start='$start', finish='$finish', subject='$subject', topic='$topic', comment='$comment' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        else {
            echo "Parameter not set";
        }
        $conn->close();
?>