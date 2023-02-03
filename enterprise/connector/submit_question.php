<?php
        require_once("connect.php");

        if(isset($_POST["questionField"]) && isset($_POST["aField"]) && isset($_POST["bField"]) && isset($_POST["cField"]) && isset($_POST["dField"]) && isset($_POST["eField"]) && isset($_POST["correctOption"])) {
            $questionField = $_POST["questionField"];
            $aField = $_POST["aField"];
            $bField = $_POST["bField"];
            $cField = $_POST["cField"];
            $dField = $_POST["dField"];
            $eField = $_POST["eField"];
            $correctOption = $_POST["correctOption"];
            $pembahasanField = $_POST["pembahasanField"];
            $tryout_id = $_POST["tryout_id"];

            $sql = "INSERT INTO heyseven7h_question (id, question, answerA, answerB, answerC, answerD, answerE, correctAnswer, tryout_id, pembahasan)
            VALUES (0, '$questionField', '$aField', '$bField', '$cField', '$dField', '$eField', '$correctOption', $tryout_id, '$pembahasanField')";
            if ($conn->query($sql) === TRUE) {
                echo "Success";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }
        else {
            echo "Parameter not set";
        }
        $conn->close();
?>