<?php
        session_start();
        require_once("../connect.php");

        if(isset($_POST["date"]) && isset($_POST["start"]) && isset($_POST["finish"]) && isset($_POST["subject"]) && isset($_POST["topic"]) && isset($_POST["comment"]) && isset($_POST["id"])) {
            $date = $_POST["date"];
            $start = $_POST["start"];
            $finish = $_POST["finish"];
            $subject = $_POST["subject"];
            $topic = $_POST["topic"];
            $comment = $_POST["comment"];
            $id = $_POST["id"];
            $tutor_id = $_SESSION["id"];

            $sql = "INSERT INTO heyseven7h_private_attendance (id, date, start, finish, subject, topic, comment, student_id, tutor_id) VALUES (0, '$date', '$start', '$finish', '$subject', '$topic', '$comment', $id,$tutor_id)";

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