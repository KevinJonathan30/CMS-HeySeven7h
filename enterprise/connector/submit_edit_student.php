<?php
        require_once("connect.php");

        if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["price"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $price = $_POST["price"];

            $sql = "UPDATE heyseven7h_student SET name='$name', address='$address', phone='$phone', priceperhour=$price WHERE id=$id";

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