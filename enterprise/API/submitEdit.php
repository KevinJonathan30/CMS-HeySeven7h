<?php
        require_once("../connect.php");

        if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["time"]) && isset($_POST["linkTo"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $time = $_POST["time"];
            $linkTo = $_POST["linkTo"];

            $sql = "UPDATE heyseven7h_tryout SET name='$name', time=$time, linkTo='$linkTo' WHERE id=$id";

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