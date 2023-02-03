<?php
        session_start();
        require_once("connect.php");

        if(isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["price"])) {
            $name = $_POST["name"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $price = $_POST["price"];
            $tutor_id = $_SESSION["id"];

            $sql = "INSERT INTO heyseven7h_student (id, name, address, phone, priceperhour, tutor_id) VALUES (0, '$name', '$address', '$phone', $price, $tutor_id)";

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